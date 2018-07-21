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
            <div class="field-container" v-for="(field, index) in surveyElement.config.list">
                <div class="field-input">
                    <label>Etiqueta</label>
                    <input type="text" v-model="surveyElement.config.list[index].title" class="form-control" />
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
            <div v-for="(field, index) in surveyElement.config.list">
                <label>{{ field.title }}</label>
                <input type="text" :name="field.uid" v-model="surveyElement.config.list[index].answer" class="form-control" />
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
                this.element.config.list.push({
                    uid: uniqueString(),
                    title: 'Texto',
                    answer: ''
                });
            },

            removeField(index) {
                this.element.config.list.splice(index, 1);
            }
        },

        watch: {
            'element.config.list':{
                handler: function (list, oldList) {
                    let answer = {};
                    list.forEach(field => {
                        answer[field.uid] = field.answer;
                    });
                    this.element.answer = answer;
                },
                deep: true
            } 
        }
    }
</script>
