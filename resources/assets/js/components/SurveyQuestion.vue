<style scoped>
    .survey-question {
        position: relative;
        padding-top: 20px;
        margin: 5px 0;
        border-bottom: 1px solid #DBE8D1;
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
            <i v-if="display" @click="display = false" :class="'survey-questions-icon-color-'+selected_template_style.name+' fa fa-pencil'"></i>
            <i @click="removeQuestion" :class="'survey-questions-icon-color-'+selected_template_style.name+' fa fa-times'"></i>
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
            templates_style: ''
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
            },

            setTemplateStyle(selected_template_style) {
                this.selected_template_style = selected_template_style;
            },
        }
    }
</script>
