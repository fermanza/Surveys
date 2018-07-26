<style scoped>
    
</style>

<template>
    <div>
        <div v-show="!display">
            <label>Etiqueta</label>
            <input type="text" v-model="surveyElement.config.title" class="form-control" />
            <app-survey-hider :hide-config="surveyElement.config.hideConfig" :survey-element-uid="surveyElement.uid" :answer="surveyElement.answer"></app-survey-hider>
        </div>
        <div v-if="display">
            <label>{{ surveyElement.config.title }}</label>
            <star-rating v-model="surveyElement.answer"></star-rating>
        </div>
    </div>
</template>

<script>
    import Bus from './../../Bus';

    export default {
        props: ['display', 'surveyElement'],

        watch: {
            'surveyElement.answer': function (answer, oldAnswer) {
                if (this.surveyElement.config.hideConfig.allow) {
                    Bus.$emit('toggle-hide-elements', this.surveyElement.config.hideConfig.options[oldAnswer] || [], this.surveyElement.config.hideConfig.options[answer]);
                }
            }
        }
    }
</script>
