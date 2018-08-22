<style scoped>
    .controls {
        position: absolute;
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
    <div :class="display ? '' : 'background-grey'" class="survey-question double-border">
        <div class="controls">
            <i v-if="display" @click="display = false" class="survey-questions-action-button fa fa-pencil"></i>
            <i @click="removeQuestion" class="survey-questions-action-button-margin fa fa-times"></i>
        </div>
        <div class="component-container">
            <component :is="parseComponent(surveyElement)" :survey-element="surveyElement" :display="display" :live="live" :index="index"></component>
        </div>
  
        <div v-if="!display" class="text-center">
            <button type="button" @click="display = true" class="question-action close-component ">{{ $Lang.trans('Save') }}</button>
        </div>
    </div>
</template>

<script>
    import Bus from './../Bus';

    export default {
        props: {
            surveyElement: {
                required: true
            },
            live: {
                default: false
            },
            index: {
                required: true
            },
            selected_template_style: {
                required: true
            },
        },

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
