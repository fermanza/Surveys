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

    .matrix-intersection {
        padding: 0 2px;
    }
</style>

<template>
    <div>
        <div v-if="!display">
            <label>Etiqueta</label>
            <input type="text" v-model="surveyElement.config.title" class="form-control" />
            <div>
                <label>Filas</label>
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
                <label>Columnas</label>
                <div class="option-container" v-for="(col, index) in surveyElement.config.cols" :key="col.uid">
                    <div class="option-input">
                        <input type="text" v-model="surveyElement.config.cols[index].text" class="form-control" />
                    </div>
                    <div class="option-action">
                        <i @click="removeCol(index)" class="fa fa-minus text-success"></i>
                    </div>
                </div>
                <div>
                    <a type="button" @click.prevent="addCol">&nbsp&nbsp&nbsp<i class="fa fa-plus text-success"></i></a>
                </div>
            </div>
            <br />
            <div>
                <label>Opciones</label>
                <div class="option-container" v-for="(option, index) in surveyElement.config.options">
                    <div class="option-input">
                        <input type="text" v-model="surveyElement.config.options[index]" class="form-control" />
                    </div>
                    <div class="option-action">
                        <i @click="removeOption(index)" class="fa fa-minus text-success"></i>
                    </div>
                </div>
                <div>
                    <a type="button" @click.prevent="addOption">&nbsp&nbsp&nbsp<i class="fa fa-plus text-success"></i></a>
                </div>
            </div>
        </div>
        <div v-if="display">
            <label>{{ surveyElement.config.title }}</label>
            <table class="table table-stripped">
                <tr>
                    <td>&nbsp;</td>
                    <th v-for="col in surveyElement.config.cols" :key="col.uid">{{ col.text }}</th>
                </tr>
                <tr v-for="(row, rowIndex) in surveyElement.config.rows" :key="row.uid">
                    <th>{{ row.text }}</th>
                    <td v-for="(col, colIndex) in surveyElement.config.cols" :key="col.uid" class="matrix-intersection">
                        <select v-model="surveyElement.answer[row.uid][col.uid]" class="form-control">
                            <option :value="null">Seleccione Opción</option>
                            <option v-for="option in surveyElement.config.options" :value="option">{{ option }}</option>
                        </select>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</template>

<script>
    import uniqueString from 'unique-string';

    export default {
        props: ['display', 'surveyElement'],

        data() {
            return {
                counter: 5
            }
        },

        methods: {
            addRow() {
                this.surveyElement.config.rows.push({
                    uid: uniqueString(),
                    text: 'Fila'
                });
            },

            addCol() {
                this.surveyElement.config.cols.push({
                    uid: uniqueString(),
                    text: 'Columna'
                });
            },

            addOption() {
                this.counter++;
                this.surveyElement.config.options.push(`${this.counter}`);
            },

            removeRow(index) {
                this.surveyElement.config.rows.splice(index, 1);
            },

            removeCol(index) {
                this.surveyElement.config.cols.splice(index, 1);
            },

            removeOption(index) {
                this.surveyElement.config.options.splice(index, 1);
            }
        },

        watch: {
            'surveyElement.config.rows': {
                handler: function (rows, oldRows) {
                    let answer = {};
                    rows.forEach(row => {
                        if (!answer.hasOwnProperty(row.uid)) {
                            answer[row.uid] = {};
                        }
                        this.surveyElement.config.cols.forEach(col => {
                            answer[row.uid][col.uid] = null;
                        });
                    });
                    this.surveyElement.answer = answer;
                },
                immediate: true
            },

            'surveyElement.config.cols': {
                handler: function (cols, oldCols) {
                    let answer = {};
                    this.surveyElement.config.rows.forEach(row => {
                        if (!answer.hasOwnProperty(row.uid)) {
                            answer[row.uid] = {};
                        }
                        cols.forEach(col => {
                            answer[row.uid][col.uid] = null;
                        });
                    });
                    this.surveyElement.answer = answer;
                },
                immediate: true
            }
        }
    }
</script>
