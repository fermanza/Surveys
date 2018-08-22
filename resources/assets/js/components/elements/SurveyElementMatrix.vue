<style scoped>
    .option-container {
        display: flex;
    }

    .option-input {
        flex: 1;
    }

    .option-action {
        flex-basis: 25px;
    }

    .option-action {
        cursor: pointer;
    }
</style>

<template>
    <div>
        <div v-if="!display">
            <label>{{ $Lang.trans('Label') }}</label>
            <div class="questions-data-container">
                <input type="text" v-model="surveyElement.config.title" class="form-control" />
                <div class="checkbox">
                    <label>
                        <input type="checkbox" v-model="surveyElement.config.multiple" />
                          {{ $Lang.trans('Allow multiple') }}
                    </label>
                </div>
                <div>
                    <label>{{ $Lang.trans('Rows') }}</label>
                    <div class="option-container" v-for="(row, index) in surveyElement.config.rows" :key="row.uid">
                        <div class="option-input">
                            <input type="text" v-model="surveyElement.config.rows[index].text" class="form-control" />
                        </div>
                        <div class="option-action">
                            <i @click="removeRow(index)" class="fa fa-minus text-success"></i>
                        </div>
                    </div>
                    <div>
                        <a type="button" @click.prevent="addRow">&nbsp&nbsp&nbsp<i class="fa fa-plus text-success"></i></a>
                    </div>
                </div>
                <br />
                <div>
                    <label>{{ $Lang.trans('Columns') }}</label>
                    <div class="option-container" v-for="(col, index) in surveyElement.config.cols" :key="col.uid">
                        <div class="option-input">
                            <input type="text" v-model="surveyElement.config.cols[index].text" class="form-control" />
                        </div>
                        <div class="option-action">
                            <i @click="removeCol(index)" class="fa fa-minus text-success"></i>
                        </div>
                    </div>
                    <div>
                        <a type="button" @click="addCol">&nbsp&nbsp&nbsp<i class="fa fa-plus text-success"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div v-if="display">
            <label class="background-gray">{{ surveyElement.config.title }}</label>
            <div class="questions-data-container">
                <table class="table table-stripped">
                    <tr>
                        <td>&nbsp;</td>
                        <th v-for="col in surveyElement.config.cols" :key="col.uid" class="font-color-data">{{ col.text }}</th>
                    </tr>
                    <tr v-for="(row, rowIndex) in surveyElement.config.rows" :key="row.uid">
                        <th class="font-color-data">{{ row.text }}</th>
                        <td v-for="(col, colIndex) in surveyElement.config.cols" :key="col.uid">
                            <input :type="surveyElement.config.multiple ? 'checkbox' : 'radio'" :name="row.uid" :value="col.uid" v-model="surveyElement.answer[row.uid]" />
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    import uniqueString from 'unique-string';

    export default {
        props: ['display', 'surveyElement'],

        methods: {
            addRow() {
                this.surveyElement.config.rows.push({
                    uid: uniqueString(),
                    text:  Lang.trans('Row')
                });
            },

            addCol() {
                this.surveyElement.config.cols.push({
                    uid: uniqueString(),
                    text: Lang.trans('Column')
                });
            },

            removeRow(index) {
                this.surveyElement.config.rows.splice(index, 1);
            },

            removeCol(index) {
                this.surveyElement.config.cols.splice(index, 1);
            },
        },

        watch: {
            'surveyElement.config.rows': {
                handler: function (rows, oldRows) {
                    let answer = {};
                    rows.forEach(row => {
                        answer[row.uid] = this.surveyElement.config.multiple ? [] : '';
                    });
                    this.surveyElement.answer = answer;
                },
                immediate: true
            },

            'surveyElement.config.multiple': {
                handler: function (multiple, oldMultiple) {
                    let answer = {};
                    this.surveyElement.config.rows.forEach(row => {
                        answer[row.uid] = multiple ? [] : '';
                    });
                    this.surveyElement.answer = answer;
                },
                immediate: true
            }
        }
    }
</script>
