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
        <div v-show="!display">
            <label>Etiqueta</label>
            <input type="text" v-model="surveyElement.config.title" class="form-control" />
            <div>
                <label>Opciones</label>
                <div class="option-container" v-for="(option, index) in surveyElement.config.list">
                    <div class="option-input">
                        <input type="text" v-model="surveyElement.config.list[index]" class="form-control" />
                    </div>
                    <div class="option-action">
                        <i @click="removeOption(index)" class="fa fa-times text-danger"></i>
                    </div>
                </div>
                <div>
                    <button type="button" @click="addOption" class="btn btn-success">Agregar</button>
                </div>
            </div>
            <app-survey-hider :hide-config="surveyElement.config.hideConfig" :survey-element-uid="surveyElement.uid" :answer="surveyElement.answer"></app-survey-hider>
        </div>
        <div v-if="display">
            <label>{{ surveyElement.config.title }}</label>
            <select :name="surveyElement.uid" v-model="surveyElement.answer" class="form-control">
                <option :value="null">Seleccione Opción</option>
                <option v-for="option in surveyElement.config.list" :value="option">{{ option }}</option>
            </select>
        </div>
    </div>
</template>

<script>
    import Bus from './../../Bus';

    export default {
        props: ['display', 'surveyElement'],

        methods: {
            addOption() {
                this.surveyElement.config.list.push('Opción');
            },

            removeOption(index) {
                this.surveyElement.config.list.splice(index, 1);
            }
        },

        watch: {
            'surveyElement.config.list': {
                handler: function (list, oldList) {
                    let options = {};
                    list.forEach(option => {
                        options[option] = this.surveyElement.config.hideConfig.options[option] || [];
                    });
                    this.surveyElement.config.hideConfig.options = options;
                },
                immediate: true
            },

            'surveyElement.answer': function (answer, oldAnswer) {
                if (answer && this.surveyElement.config.hideConfig.allow) {
                    Bus.$emit('toggle-hide-elements', this.surveyElement.config.hideConfig.options[oldAnswer] || [], this.surveyElement.config.hideConfig.options[answer]);
                } else if (!answer) {
                    Bus.$emit('toggle-hide-elements', this.surveyElement.config.hideConfig.options[oldAnswer] || [], []);
                }
            }
        }
    }
</script>
