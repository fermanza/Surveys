<style scoped>
    .field-container {
        display: flex;
    }

    .field-input {
        flex: 1;
    }

    .field-action {
        flex-basis: 25px;
    }

    .field-action {
        cursor: pointer;
    }
</style>

<template>
    <div>
        <div v-if="!display">
            <div class="checkbox">
                <label>
                    <input type="checkbox" v-model="element.config.multiple" />
                    Permitir múltiple
                </label>
            </div>
            <input type="text" v-model="surveyElement.config.title" class="form-control" />
            <div class="field-container" v-for="(field, index) in element.config.list">
                <div class="field-input">
                    <label>Etiqueta</label>
                    <input type="text" v-model="element.config.list[index]" class="form-control" />
                </div>
                <div class="field-action">
                    <i @click="removeField(index)" class="fa fa-times text-danger"></i>
                </div>
            </div>
            <div>
                <button @click="addField" class="btn btn-success">Agregar</button>
            </div>
        </div>
        <div v-if="display">
            <label>{{ surveyElement.config.title }}</label>
            <div v-for="(field, index) in element.config.list">
                <div :class="element.config.multiple ? 'checkbox' : 'radio'">
                    <label>
                        <input :type="element.config.multiple ? 'checkbox' : 'radio'" :name="element.uid" :value="field" v-model="element.answer" />
                        {{ field }}
                    </label>
                </div>
            </div>
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
            }
        },

        methods: {
            addField() {
                this.element.config.list.push('Opción');
            },

            removeField(index) {
                this.element.config.list.splice(index, 1);
            }
        }
    }
</script>
