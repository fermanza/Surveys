<style scoped>
    
</style>

<template>
    <div>
        <div v-show="!display">
            <label>{{ $Lang.trans('Label') }}</label>
            <div class="questions-data-container">
                <input type="text" v-model="surveyElement.config.title" class="form-control" />
                <app-survey-hider :hide-config="surveyElement.config.hideConfig" :survey-element-uid="surveyElement.uid" :answer="surveyElement.answer" :index="index"></app-survey-hider>
            </div>
        </div>
        <div v-if="display">
            <label class="background-gray">{{ surveyElement.config.title }}</label>
            <div class="questions-data-container">
                <star-rating v-model="surveyElement.answer"></star-rating>
            </div>
        </div>
    </div>
</template>

<script>
    import Bus from './../../Bus';

    export default {
        props: ['display', 'surveyElement', 'index'],

        watch: {
            'surveyElement.answer': function (answer, oldAnswer) {
                if (this.surveyElement.config.hideConfig.allow) {
                    Bus.$emit('toggle-hide-elements', this.surveyElement.config.hideConfig.options[oldAnswer] || [], this.surveyElement.config.hideConfig.options[answer]);
                }
            }
        }
    }
</script>
