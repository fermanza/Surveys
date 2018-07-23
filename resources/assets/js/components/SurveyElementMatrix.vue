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
            <label>Etiqueta</label>
            <input type="text" v-model="element.config.title" class="form-control" />
            <div class="checkbox">
                <label>
                    <input type="checkbox" v-model="element.config.multiple" />
                    Permitir múltiple
                </label>
            </div>
            <div>
                <label>Filas</label>
                <div class="option-container" v-for="(row, index) in element.config.rows">
                    <div class="option-input">
                        <input type="text" v-model="element.config.rows[index].text" class="form-control" />
                    </div>
                    <div class="option-action">
                        <i @click="removeRow(index)" class="fa fa-times text-danger"></i>
                    </div>
                </div>
                <div>
                    <button @click="addRow" class="btn btn-success">Agregar</button>
                </div>
            </div>
            <br />
            <div>
                <label>Columnas</label>
                <div class="option-container" v-for="(col, index) in element.config.cols">
                    <div class="option-input">
                        <input type="text" v-model="element.config.cols[index].text" class="form-control" />
                    </div>
                    <div class="option-action">
                        <i @click="removeCol(index)" class="fa fa-times text-danger"></i>
                    </div>
                </div>
                <div>
                    <button @click="addColumn" class="btn btn-success">Agregar</button>
                </div>
            </div>
        </div>
        <div v-if="display">
            <label>{{ surveyElement.config.title }}</label>
            <table class="table table-stripped">
                <tr>
                    <td>&nbsp;</td>
                    <th v-for="column in element.config.cols">{{ column.text }}</th>
                </tr>
                <tr v-for="(row, rowIndex) in element.config.rows">
                    <th>{{ row.text }}</th>
                    <td v-for="(column, colIndex) in element.config.cols">
                        <input :type="element.config.multiple ? 'checkbox' : 'radio'" :name="row.uid" :value="column.uid" v-model="element.answer[row.uid]" />
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
                element: this.surveyElement
            }
        },

        methods: {
            addRow() {
                this.element.config.rows.push({
                    uid: uniqueString(),
                    text: 'Fila'
                });
            },

            addColumn() {
                this.element.config.cols.push({
                    uid: uniqueString(),
                    text: 'Columna'
                });
            },

            removeRow(index) {
                this.element.config.rows.splice(index, 1);
            },

            removeCol(index) {
                this.element.config.cols.splice(index, 1);
            },
        },

        watch: {
            'element.config.rows': {
                handler: function (rows, oldRows) {
                    let answer = {};
                    rows.forEach(row => {
                        answer[row.uid] = this.element.config.multiple ? [] : '';
                    });
                    this.element.answer = answer;
                },
                immediate: true
            },

            'element.config.multiple': {
                handler: function (multiple, oldMultiple) {
                    let answer = {};
                    this.element.config.rows.forEach(row => {
                        answer[row.uid] = multiple ? [] : '';
                    });
                    this.element.answer = answer;
                },
                immediate: true
            }
        }
    }
</script>
