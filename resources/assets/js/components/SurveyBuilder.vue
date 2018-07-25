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
                <input type="file" name="surveyLogo" id="surveyLogo">
                </div>
        </div>
        <div class="survey-builder">
            <div class="root-controls">
                <div class="survey-question-type-title btn">
                    Tipo de Pregunta<i class="fa fa-question-circle"></i>
                </div>
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
        <div>
            <!-- <form action=axios.get('/encuestas/save2') method="POST"> -->
              
                <input type="hidden" name="questions" :value="questionsJson" />
                <input type="hidden" name="template" :value="template_id" />
                <div class="row">
                    <div class="col-md-3" ></div>
                    <div class="col-md-6" align="center">
                    <a href="/mis_encuestas" class="btn btn-default">Cancelar</a>
                    <button class="btn" id="guardar">&nbsp;Guardar&nbsp;</button>
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
                file: '',
                rootElements: [
                    {
                        uid: '',
                        type: 'text',
                        title: 'Single Text Box',
                        className: 'fa-font',
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
                        config: {
                            title: 'Dropdown',
                            list: ['Option 1', 'Option 2']
                        },
                        answer: null
                    },
                    {
                        uid: '',
                        type: 'multiple-text',
                        title: 'Multiple Textbooks',
                        className: 'fa-align-left',
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
                        config: {
                            title: 'Multiple Choice',
                            list: ['Option 1', 'Option 2'],
                            multiple: false
                        },
                        answer: []
                    },
                    {
                        uid: '',
                        type: 'slider',
                        title: 'Slider',
                        className: 'fa-sliders-h',
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
                        config: {
                            title: 'Star rating'
                        },
                        answer: ''
                    },
                    {
                        uid: '',
                        type: 'ranking',
                        title: 'Ranking',
                        className: 'fa-sort-numeric-down',
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
            },
            setFile() {
                return this.file;
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
