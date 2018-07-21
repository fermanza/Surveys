<style scoped>
    .survey-builder {
        display: flex;
        border: 1px solid black; /* Mejorar estilos */
    }

    .root-controls {
        flex-basis: 400px;
        border: 1px solid lightblue; /* Mejorar estilos */
    }

    .survey-questions {
        flex: 1;
        border: 1px solid pink; /* Mejorar estilos */
    }

    .survey-questions-container {
        min-height: 100px;
    }
</style>

<template>
    <div class="survey-builder">
        <div class="root-controls">
            <app-draggable :clone="clone" :list="rootElements" :options="{ group: { name: 'elements', pull: 'clone' } }">
                <div v-for="rootElement in rootElements">
                    <app-root-element :root-element="rootElement"></app-root-element>
                </div>
            </app-draggable>
        </div>
        <div class="survey-questions">
            <app-draggable class="survey-questions-container" :list="surveyElements" :options="{ group: { name: 'elements', pull: false } }">
                <div v-for="surveyElement in surveyElements">
                    <app-survey-question :survey-element="surveyElement"></app-survey-question>
                </div>
            </app-draggable>
        </div>
    </div>
</template>

<script>
    import uniqueString from 'unique-string';
    import Bus from './../Bus';

    export default {
        data() {
            return {
                rootElements: [
                    {
                        uid: '',
                        type: 'text',
                        title: 'Texto',
                        className: 'fa-font',
                        config: {
                            title: 'Texto'
                        },
                        answer: ''
                    },
                    {
                        uid: '',
                        type: 'header',
                        title: 'Parrafo',
                        className: 'fa-heading',
                        config: {
                            title: 'Parrafo'
                        },
                        answer: ''
                    },
                    {
                        uid: '',
                        type: 'textarea',
                        title: 'Comentarios',
                        className: 'fa-comments',
                        config: {
                            title: 'Comentarios'
                        },
                        answer: ''
                    },
                    {
                        uid: '',
                        type: 'select',
                        title: 'Dropdown',
                        className: 'fa-caret-square-down',
                        config: {
                            title: 'Dropdown',
                            list: ['Opción 1', 'Opción 2']
                        },
                        answer: null
                    },
                    {
                        uid: '',
                        type: 'multiple-text',
                        title: 'Texto Múltiple',
                        className: 'fa-align-left',
                        config: {
                            title: 'Texto Múltiple',
                            list: [
                                {
                                    uid: uniqueString(),
                                    title: 'Texto 1',
                                    answer: ''
                                },
                                {
                                    uid: uniqueString(),
                                    title: 'Texto 2',
                                    answer: ''
                                }
                            ]
                        },
                        answer: {}
                    },
                    {
                        uid: '',
                        type: 'multiple-check',
                        title: 'Múltiple Check',
                        className: 'fa-check-square',
                        config: {
                            title: 'Múltiple Check',
                            list: ['Opción 1', 'Opción 2'],
                            multiple: false
                        },
                        answer: []
                    }
                ],
                surveyElements: [],
            }
        },

        mounted() {
            Bus.$on('remove-question', this.removeQuestion);
        },

        methods: {
            removeQuestion(uid) {
                const index = _.findIndex(this.surveyElements, { uid });
                this.surveyElements.splice(index, 1);
            },

            clone(element) {
                element.uid = uniqueString();

                return _.cloneDeep(element);
            }
        }
    }
</script>
