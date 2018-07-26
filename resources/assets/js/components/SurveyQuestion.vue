<style scoped>
    .survey-question {
        position: relative;
        padding-top: 20px;
    }

    .controls {
        position: absolute;
        top: 0;
        right: 0;
    }
    .question-action {
        cursor: pointer;

    }

    .close-component {
         border: 2px solid #70878C;
    }

    .background-grey {
        background: #eee;
    }
</style>

<template>
    <div :class="display ? '' : 'background-grey'" class="survey-question">
        <div class="controls">
            <i v-if="display" @click="display = false" class="question-action text-success fa fa-pencil"></i>
            <i @click="removeQuestion" class="question-action text-success fa fa-times"></i>
        </div>
        <div>
            <component :is="parseComponent(surveyElement)" :survey-element="surveyElement" :display="display"></component>
        </div>
        <div v-if="!display" class="text-center">
            <button type="button" @click="display = true" class="question-action close-component ">Save</button>
        </div>
    </div>
</template>

<script>
    import Bus from './../Bus';

    export default {
        props: ['surveyElement'],

        data() {
            return {
                display: true
            }
        },

        methods: {
            parseComponent(surveyElement) {
                return `app-survey-element-${surveyElement.type}`;
            },

            removeQuestion() {
                Bus.$emit('remove-question', this.surveyElement.uid);
            }
        }
    }
</script>
