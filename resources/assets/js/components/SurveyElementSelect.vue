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
                    <button @click="addOption" class="btn btn-success">Agregar</button>
                </div>
            </div>
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
    export default {
        props: ['display', 'surveyElement'],

        data() {
            return {
                element: this.surveyElement
            }
        },

        methods: {
            addOption() {
                this.element.config.list.push('Opción');
            },

            removeOption(index) {
                this.element.config.list.splice(index, 1);
            }
        }
    }
</script>
