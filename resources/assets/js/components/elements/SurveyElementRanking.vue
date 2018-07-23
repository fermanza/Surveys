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
            <div>
                <label>Opciones</label>
                <div class="option-container" v-for="(option, index) in element.config.options">
                    <div class="option-input">
                        <input type="text" v-model="element.config.options[index]" class="form-control" />
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
            <select v-model="element.answer" class="form-control">
                <option :value="null">Seleccione Opción</option>
                <option v-for="option in element.config.options" :value="option">{{ option }}</option>
            </select>
        </div>
    </div>
</template>

<script>
    import uniqueString from 'unique-string';

    export default {
        props: ['display', 'surveyElement'],

        data() {
            return {
                element: this.surveyElement,
                counter: 5
            }
        },

        methods: {
            addOption() {
                this.counter++;
                this.element.config.options.push(`${this.counter}`);
            },

            removeOption(index) {
                this.element.config.options.splice(index, 1);
            }
        }
    }
</script>
