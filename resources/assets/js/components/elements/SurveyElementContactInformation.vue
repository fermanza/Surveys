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
            <div v-for="(field, index) in surveyElement.config.list" :key="field.uid">
                <label>Etiqueta</label>
                <br />
                <label class="checkbox-inline">
                    Incluir&nbsp;<input type="checkbox" v-model="surveyElement.config.list[index].include" />
                </label>
                <label class="checkbox-inline">
                    Requerido&nbsp;<input type="checkbox" v-model="surveyElement.config.list[index].required" />
                </label>
                <input type="text" v-model="surveyElement.config.list[index].title" class="form-control" />
            </div>
        </div>
        <div v-if="display">
            <div v-for="(field, index) in fieldsToInclude" :key="field.uid">
                <label>{{ field.title }}</label>
                <input :type="field.type" :name="field.uid" v-model="surveyElement.config.list[index].answer" class="form-control" :required="surveyElement.config.list[index].required" />
            </div>
        </div>
    </div>
</template>

<script>
    import uniqueString from 'unique-string';

    export default {
        props: ['display', 'surveyElement'],

        computed: {
            fieldsToInclude() {
                return this.surveyElement.config.list.filter(f => f.include);
            }
        },

        methods: {
            addField() {
                this.surveyElement.config.list.push({
                    uid: uniqueString(),
                    title: 'Texto',
                    answer: ''
                });
            },

            removeField(index) {
                this.surveyElement.config.list.splice(index, 1);
            }
        },

        watch: {
            'surveyElement.config.list':{
                handler: function (list, oldList) {
                    let answer = {};
                    list.forEach(field => {
                        answer[field.uid] = field.answer;
                    });
                    this.surveyElement.answer = answer;
                }
            }
        }
    }
</script>
