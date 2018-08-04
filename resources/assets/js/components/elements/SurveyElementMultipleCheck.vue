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
        <div v-show="!display">
            <div class="checkbox">
                <label>
                    <input type="checkbox" v-model="surveyElement.config.multiple" />
                    {{ $Lang.trans('Allow multiple') }}
                </label>
            </div>
            <input type="text" v-model="surveyElement.config.title" class="form-control" />
            <div class="field-container" v-for="(field, index) in surveyElement.config.list">
                <div class="field-input">
                    <label>{{ $Lang.trans('Label') }}</label>
                    <input type="text" v-model="surveyElement.config.list[index]" class="form-control" />
                </div>
                <div class="field-action">
                    <i @click="removeField(index)" class="fa fa-minus text-success"></i>
                </div>
            </div>
            <div>
                <a type="button" @click.prevent="addField" >&nbsp&nbsp&nbsp<i class="fa fa-plus text-success"></i></a>
            </div>
            <app-survey-hider v-show="!surveyElement.config.multiple" :hide-config="surveyElement.config.hideConfig" :survey-element-uid="surveyElement.uid" :answer="surveyElement.answer" :index="index"></app-survey-hider>
        </div>
        <div v-if="display">
            <label>{{ surveyElement.config.title }}</label>
            <div v-for="(field, index) in surveyElement.config.list">
                <div :class="surveyElement.config.multiple ? 'checkbox' : 'radio'">
                    <label>
                        <input :type="surveyElement.config.multiple ? 'checkbox' : 'radio'" :name="surveyElement.uid" :value="field" v-model="surveyElement.answer" />
                        {{ field }}
                    </label>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import uniqueString from 'unique-string';
    import Bus from './../../Bus';

    export default {
        props: ['display', 'surveyElement', 'index'],

        methods: {
            addField() {
                this.surveyElement.config.list.push(Lang.trans('Option'));
            },

            removeField(index) {
                this.surveyElement.config.list.splice(index, 1);
            }
        },

        watch: {
            'surveyElement.config.multiple': {
                handler: function (rows, oldRows) {
                    this.surveyElement.answer = this.surveyElement.config.multiple ? [] : '';
                },
                immediate: true
            },

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
                if (answer && !this.surveyElement.config.multiple && this.surveyElement.config.hideConfig.allow) {
                    Bus.$emit('toggle-hide-elements', this.surveyElement.config.hideConfig.options[oldAnswer] || [], this.surveyElement.config.hideConfig.options[answer]);
                }
            }
        }
    }
</script>
