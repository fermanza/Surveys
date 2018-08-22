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
                <div class="field-container" v-for="(field, index) in surveyElement.config.list" :key="field.uid">
                    <div class="field-input">
                        <label>{{ $Lang.trans('Label') }}</label>
                        <input type="text" v-model="surveyElement.config.list[index].title" class="form-control border-radius-input" />
                    </div>
                    <div class="field-action">
                        <i @click="removeField(index)" class="fa fa-minus text-success"></i>
                    </div>
                </div>
                <div>
                    <a type="button" @click.prevent="addField">&nbsp&nbsp&nbsp<i class="fa fa-plus text-success"></i></a>
                </div>
            </div>
        </div>
        <div v-if="display">
            <label class="background-gray">{{ surveyElement.config.title }}</label>
            <div class="questions-data-container">
                <div v-for="(field, index) in surveyElement.config.list" :key="field.uid">
                    <label>{{ field.title }}</label>
                    <input type="text" :name="field.uid" v-model="surveyElement.config.list[index].answer" class="form-control border-radius-input" />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import uniqueString from 'unique-string';

    export default {
        props: ['display', 'surveyElement'],

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
            'surveyElement.config.list': {
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
