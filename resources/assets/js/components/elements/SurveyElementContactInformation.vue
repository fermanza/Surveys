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
            <label>{{ $Lang.trans('Label') }}</label>
            <div class="questions-data-container">
                <input type="text" v-model="surveyElement.config.title" class="form-control border-radius-input" />
                <div v-for="(field, index) in surveyElement.config.list" :key="field.uid">
                    <label>{{ $Lang.trans('Label') }}</label>
                    <br />
                    <label class="checkbox-inline">
                        <input type="checkbox" v-model="surveyElement.config.list[index].include" />
                      {{ $Lang.trans('Include') }} 
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" v-model="surveyElement.config.list[index].required" />
                      {{ $Lang.trans('Required') }} 
                    </label>
                    <input type="text" v-model="surveyElement.config.list[index].title" class="form-control border-radius-input" v-bind:disabled="true" />
                </div>
            </div>
        </div>
        <div v-if="display">
            <label class="background-gray">{{ surveyElement.config.title }}</label>
            <div class="questions-data-container">
                <div v-for="(field, index) in fieldsToInclude" :key="field.uid">
                    <label>{{ field.title }}</label>
                    <input :type="field.type" :name="field.uid" v-model="surveyElement.config.list[index].answer" class="form-control border-radius-input" :required="live && surveyElement.config.list[index].required" />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import uniqueString from 'unique-string';

    export default {
        props: {
            display: {
                default: true
            },
            surveyElement: {
                required: true
            },
            live: {
                default: true
            }
        },

        computed: {
            fieldsToInclude() {
                return this.surveyElement.config.list.filter(f => f.include);
            }
        },

        methods: {
            addField() {
                this.surveyElement.config.list.push({
                    uid: uniqueString(),
                    title: Lang.trans('Text'),
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
