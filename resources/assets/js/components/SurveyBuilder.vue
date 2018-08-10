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

    .question-action {
        cursor: pointer;
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
      <form :action="$Config.base_url+'/encuestas/save2'" ref="builderform" @submit.prevent="countQuestions" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div v-if="!editLogo" class="text-center">
                        <img :src="$Config.base_url+template.url" style="max-witdh: 350px; max-height: 500px;" />
                        <i @click="editLogo = true" class="question-action text-success fa fa-pencil"></i>
                    </div>
                     <div v-show="editLogo" class="text-center">
                        <label>Logo</label>
                        <input type="file" name="surveyLogo" />
                    </div>
                </div>
            </div>
            <div class="survey-builder">
                <div class="root-controls">
                    <div class="survey-question-type-title btn">
                        Tipo de Pregunta<i class="fa fa-question-circle"></i>
                    </div>
                    <app-draggable :clone="clone" :list="rootElements" :options="{ group: { name: 'elements', pull: 'clone' }, sort: false }">
                        <div v-for="rootElement in rootElements" @click="addElement(rootElement)">
                            <app-root-element :root-element="rootElement"></app-root-element>
                        </div>
                    </app-draggable>
                    <div class="survey-question-type-title btn">
                         &nbsp&nbsp&nbsp&nbsp&nbsp&nbspTemplates<i class="fa fa-question-circle"></i>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    </div>
                </div>
                <div class="survey-questions">
                    <app-draggable class="survey-questions-container" :list="surveyElements" :options="{ group: { name: 'elements', pull: false } }">
                        <div v-for="(surveyElement, index) in surveyElements" :key="surveyElement.uid">
                            <app-survey-question v-show="!surveyElement.hide" :survey-element="surveyElement" :live="live" :index="index"></app-survey-question>
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
                        <a :href="$Config.base_url+'/mis_encuestas'" class="btn btn-default">Cancelar</a>
                        <button type="submit" class="btn">&nbsp;Guardar&nbsp;</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    import uniqueString from 'unique-string';
    import Bus from './../Bus';
    import rootElements from './../root-elements';

    export default {
        props: {
            initialElements: {
                default: () => []
            },
            template: {
                default: () => {}
            },
            maximunElements: {
                default: 10
            },
            live: {
                default: true
            }
        },

        data() {
            return {
                template_id: this.template.id,
                surveyElements: this.initialElements,
                rootElements: rootElements,
                editLogo: this.template.url ? false : true
            }
        },

        computed: {
            questionsJson() {
                return JSON.stringify(this.surveyElements);
            }
        },

        mounted() {
            Bus.$on('remove-question', this.removeQuestion);
            Bus.$on('toggle-hide-elements', this.toggleHideElements);
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
                    this.clone(rootElement)
                );
            },

            clone(element) {
                element.uid = uniqueString();
                element.onClone && element.onClone();

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

            toggleHideElements(toShow, toHide) {
                toShow.forEach(uid => {
                    const element = this.surveyElements.find(e => e.uid == uid);
                    element.hide = false;
                });
                toHide.forEach(uid => {
                    const element = this.surveyElements.find(e => e.uid == uid);
                    element.hide = true;
                });
            },

            countQuestions() {
               if(this.template.type == 0 && this.surveyElements.length > 10) {
                    //alert('No puedes ingresar mas de 10 preguntas.');
                    swal({
                      type: 'error',
                      title: '¡Lo sentimos!',
                      text: 'No puedes ingresar más de 10 preguntas en encuestas gratuitas.'
                    })
                    return false;
                }
                this.$refs.builderform.submit();
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
