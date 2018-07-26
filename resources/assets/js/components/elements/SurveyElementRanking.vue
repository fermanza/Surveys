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
            <select v-model="surveyElement.answer" class="form-control">
                <option :value="null">Seleccione Opción</option>
                <option v-for="option in surveyElement.config.options" :value="option">{{ option }}</option>
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
                counter: 5
            }
        },

        methods: {
            addOption() {
                this.counter++;
                this.surveyElement.config.options.push(`${this.counter}`);
            },

            removeOption(index) {
                this.surveyElement.config.options.splice(index, 1);
            }
        }
    }
</script>
