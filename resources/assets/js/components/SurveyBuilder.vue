<style scoped>
    .survey-builder {
        display: flex;
        background: #fafafa;
        padding: 20px;
    }

    .root-controls {
        flex-basis: 250px;
    }

    .survey-questions {
        flex: 1;
    }

    .survey-questions-container {
        min-height: 600px;
        background: #fff;
        padding: 20px;
    }

    @media screen and (max-width: 768px) {
        .root-controls {
            flex-basis: 50px;
        }

        .survey-question-type-title {
            display: none;
        }
    }
</style>

<template>
    <div>
        <form :action="$Config.base_url+'/encuestas/save2'" method="POST" enctype="multipart/form-data"> 
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4" align="center">
                    <label>Logo</label>
                    <input type="file" name="surveyLogo" />
                </div>
            </div>
            <div class="survey-builder">
                <div class="root-controls">
                    <div class="survey-question-type-title btn">
                        Tipo de Pregunta<i class="fa fa-question-circle"></i>
                    </div>
                    <app-draggable :clone="clone" :list="rootElements" :options="{ group: { name: 'elements', pull: 'clone' } }">
                        <div v-for="rootElement in rootElements" @click="addElement(rootElement)">
                            <app-root-element :root-element="rootElement"></app-root-element>
                        </div>
                    </app-draggable>
                </div>
                <div class="survey-questions">
                    <app-draggable class="survey-questions-container" :list="surveyElements" :options="{ group: { name: 'elements', pull: false } }">
                        <div v-for="surveyElement in surveyElements">
                            <app-survey-question v-show="!surveyElement.hide" :survey-element="surveyElement"></app-survey-question>
                        </div>
                    </app-draggable>
                </div>
            </div>
            <div>
                <input type="hidden" name="questions" :value="questionsJson" />
                <input type="hidden" name="template" :value="template_id" />
                <div class="row">
                    <div class="col-md-3" ></div>
                    <div class="col-md-6" align="center">
                    <a href="/mis_encuestas" class="btn btn-default">Cancelar</a>
                    <button type="submit" class="btn" id="guardar">&nbsp;Guardar&nbsp;</button>
                    </div>
                </div>
            </div>
        </form>   
    </div>
</template>

<script>
    import uniqueString from 'unique-string';
    import Bus from './../Bus';

    export default {
        props: {
            initialElements: {
                default: () => []
            },
            template: {
                default: () => ""
            }
        },

        data() {
            return {
                template_id: this.template,
                surveyElements: this.initialElements,
                rootElements: [
                    {
                        uid: '',
                        type: 'text',
                        title: 'Single Text Box',
                        className: 'fa-font',
                        hide: false,
                        config: {
                            title: 'Single Text Box'
                        },
                        answer: ''
                    },
                    {
                        uid: '',
                        type: 'header',
                        title: 'Texto',
                        className: 'fa-heading',
                        hide: false,
                        config: {
                            title: 'Texto'
                        },
                        answer: ''
                    },
                    {
                        uid: '',
                        type: 'textarea',
                        title: 'Comment Box',
                        className: 'fa-comments',
                        hide: false,
                        config: {
                            title: 'Comment Box'
                        },
                        answer: ''
                    },
                    {
                        uid: '',
                        type: 'select',
                        title: 'Dropdown',
                        className: 'fa-caret-square-down',
                        hide: false,
                        config: {
                            title: 'Dropdown',
                            list: ['Option 1', 'Option 2'],
                            hideConfig: {
                                allow: false,
                                scope: [],
                                options: {}
                            }
                        },
                        answer: null
                    },
                    {
                        uid: '',
                        type: 'multiple-text',
                        title: 'Multiple Textbooks',
                        className: 'fa-align-left',
                        hide: false,
                        config: {
                            title: 'Multiple Textbooks',
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
                        title: 'Multiple Choice',
                        className: 'fa-check-square',
                        hide: false,
                        config: {
                            title: 'Multiple Choice',
                            list: ['Option 1', 'Option 2'],
                            multiple: false,
                            hideConfig: {
                                allow: false,
                                scope: [],
                                options: {}
                            }
                        },
                        answer: []
                    },
                    {
                        uid: '',
                        type: 'slider',
                        title: 'Slider',
                        className: 'fa-sliders-h',
                        hide: false,
                        config: {
                            title: 'Slider',
                            zero: 'Malo',
                            half: 'Regular',
                            full: 'Bueno'
                        },
                        answer: 0
                    },
                      {
                        uid: '',
                        type: 'image',
                        title: 'Image',
                        className: 'fa-image',
                        hide: false,
                        config: {
                            title: 'Image'
                        },
                        answer: ''
                    },
                    {
                        uid: '',
                        type: 'contact-information',
                        title: 'Contact Information',
                        className: 'fa-info',
                        hide: false,
                        config: {
                            title: 'Contact Information',
                            list: [
                                {
                                    uid: uniqueString(),
                                    title: 'Nombre',
                                    answer: '',
                                    required: false,
                                    include: true
                                },
                                {
                                    uid: uniqueString(),
                                    title: 'Apellido',
                                    answer: '',
                                    required: false,
                                    include: true
                                },
                                {
                                    uid: uniqueString(),
                                    title: 'E-mail',
                                    answer: '',
                                    required: false,
                                    include: true
                                },
                                {
                                    uid: uniqueString(),
                                    title: 'Empresa',
                                    answer: '',
                                    required: false,
                                    include: true
                                },
                                {
                                    uid: uniqueString(),
                                    title: 'Teléfono',
                                    answer: '',
                                    required: false,
                                    include: true
                                },
                                {
                                    uid: uniqueString(),
                                    title: 'Dirección',
                                    answer: '',
                                    required: false,
                                    include: true
                                },
                                {
                                    uid: uniqueString(),
                                    title: 'Ciudad',
                                    answer: '',
                                    required: false,
                                    include: true
                                },
                                {
                                    uid: uniqueString(),
                                    title: 'País',
                                    answer: '',
                                    required: false,
                                    include: true
                                },
                                {
                                    uid: uniqueString(),
                                    title: 'Sexo',
                                    answer: '',
                                    required: false,
                                    include: true
                                },
                                {
                                    uid: uniqueString(),
                                    title: 'Fecha de Nacimiento',
                                    answer: 'mm/dd/yyyy',
                                    required: false,
                                    include: true
                                }
                            ]
                        },
                        answer: []
                    },
                    {
                        uid: '',
                        type: 'matrix',
                        title: 'Matrix',
                        className: 'fa-th',
                        hide: false,
                        config: {
                            title: 'Matrix',
                            multiple: false,
                            rows: [
                                {
                                    uid: uniqueString(),
                                    text: 'Fila 1',
                                },
                                {
                                    uid: uniqueString(),
                                    text: 'Fila 2',
                                },
                                {
                                    uid: uniqueString(),
                                    text: 'Fila 3',
                                },
                            ],
                            cols: [
                                {
                                    uid: uniqueString(),
                                    text: 'Columna 1',
                                },
                                {
                                    uid: uniqueString(),
                                    text: 'Columna 2',
                                },
                                {
                                    uid: uniqueString(),
                                    text: 'Columna 3',
                                },
                            ],
                        },
                        answer: {}
                    },
                    {
                        uid: '',
                        type: 'matrix-scale',
                        title: 'Matrix Ranking Scale',
                        className: 'fa-th',
                        hide: false,
                        config: {
                            title: 'Matrix Ranking Scale',
                            rows: [
                                {
                                    uid: uniqueString(),
                                    text: 'Fila 1',
                                },
                                {
                                    uid: uniqueString(),
                                    text: 'Fila 2',
                                },
                                {
                                    uid: uniqueString(),
                                    text: 'Fila 3',
                                },
                            ],
                            cols: [
                                {
                                    uid: uniqueString(),
                                    text: 'Columna 1',
                                },
                                {
                                    uid: uniqueString(),
                                    text: 'Columna 2',
                                },
                                {
                                    uid: uniqueString(),
                                    text: 'Columna 3',
                                },
                            ],
                            options: ['1', '2', '3', '4', '5']
                        },
                        answer: {}
                    },
                    {
                        uid: '',
                        type: 'star-rating',
                        title: 'Star Rating',
                        className: 'fa-star',
                        hide: false,
                        config: {
                            title: 'Star rating',
                            hideConfig: {
                                allow: false,
                                scope: [],
                                options: {
                                    1: [],
                                    2: [],
                                    3: [],
                                    4: [],
                                    5: [],
                                }
                            }
                        },
                        answer: 0
                    },
                    {
                        uid: '',
                        type: 'ranking',
                        title: 'Ranking',
                        className: 'fa-sort-numeric-down',
                        hide: false,
                        config: {
                            title: 'Ranking',
                            options: ['1', '2', '3', '4', '5']
                        },
                        answer: null
                    }
                ]
            }
        },

        computed: {
            questionsJson() {
                return JSON.stringify(this.surveyElements);
            }
        },

        mounted() {
            Bus.$on('remove-question', this.removeQuestion);
            Bus.$on('hide-elements', this.hideElements);
            Bus.$on('get-available-elements', () => {
                this.emitAvailableElements(this.surveyElements);
            });
            this.selectAllTextOnInputClick();
        },

        methods: {
            removeQuestion(uid) {
                const index = _.findIndex(this.surveyElements, { uid });
                this.surveyElements.splice(index, 1);
            },

            addElement(rootElement) {
                this.surveyElements.push(
                    _.cloneDeep(rootElement)
                );
            },

            clone(element) {
                element.uid = uniqueString();

                return _.cloneDeep(element);
            },

            selectAllTextOnInputClick() {
                $(this.$el).on('click', 'input', function (e) {
                    e.target.select();
                });
            },

            emitAvailableElements(surveyElements) {
                const availableElements = surveyElements.map(surveyElement => {
                    return {
                        uid: surveyElement.uid,
                        text: surveyElement.config.title,
                    }
                });
                Bus.$emit('available-elements', availableElements);
            },

            hideElements(options, scope) {
                scope.forEach(scopeElement => {
                    const element = this.surveyElements.find(e => e.uid == scopeElement.uid);
                    element.hide = options.includes(element.uid) ? true : false;
                })
            }
        },

        watch: {
            'surveyElements': {
                handler: function (surveyElements, oldSurveyElements) {
                    this.emitAvailableElements(surveyElements);
                },
                immediate: true
            },
        }
    }
</script>
