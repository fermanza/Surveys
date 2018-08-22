<style scoped>
    .survey-builder {
        display: flex;
        background: #fafafa;
        padding: 20px;
    }
    .root-controls {
        flex-basis: 250px;
    }
    .footer-logo {
        text-align: center;
        margin-bottom: 6%;
    }
    .footer-logo > p {
        margin: 0;
    }
    .footer-logo > img {
        width: 20%;
    }

    .component-container > div > label {
        font-size: 20px;
    }
    .container-footer {
        width: 90% !important;
        margin: 0 auto;
        background: white;
        padding: 15px;
        padding-top: 25px;
        margin-top: -20px;
    }
    @media (max-width: 767px){
        .survey-builder {
            display: flex;
            background: #fafafa;
            padding: 5px;
        }

        .root-controls {
            flex-basis: 10% !important;
        }

        .templates {
            display: block;
            width: 100%;
        }
        .container-footer {
            width: 95% !important;
            margin: 0 auto;
            background: white;
            padding: 10px;
            padding-top: 20px;
            margin-top: -20px;
        }
    }

</style>

<template>
    <div>
      <form :action="$Config.base_url+'/encuestas/save2'" ref="builderform" @submit.prevent="countQuestions" method="POST" enctype="multipart/form-data">
            <div class="survey-builder">
                <div class="root-controls">
                    <div class="survey-question-type-title btn-green">
                        <span class="display-big">{{$Lang.trans('Type of question')}}</span><span class="display-small">TP</span> <i class="fa fa-question-circle"></i>
                    </div>
                    <app-draggable :clone="clone" :list="rootElements" :options="{ group: { name: 'elements', pull: 'clone' }, sort: false }">
                        <div v-for="rootElement in rootElements" @click="addElement(rootElement)">
                            <app-root-element :root-element="rootElement"></app-root-element>
                        </div>
                    </app-draggable>
                    <div class="survey-question-type-title btn-blue">
                         <span class="display-big">Templates</span><span class="display-small">TPL</span> <i class="fa fa-question-circle"></i>
                    </div>
                    <app-templates-style :templates_style="templates_style" :initial_selected="template.templates_style_id" 
                            @selected_template_style="setTemplateStyle">
                    </app-templates-style>
                </div>
                <div :class="'survey-questions-'+selected_template_style.name">
                    <div v-if="!editLogo" :class="'bar-container-'+selected_template_style.name" style="text-align: center;">
                        <img :src="$Config.base_url+template.url" style="max-witdh: 350px; max-height: 500px;" />
                        <i @click="editLogo = true" class="question-action text-success fa fa-pencil"></i>
                    </div>
                     <div v-show="editLogo" :class="'bar-container-'+selected_template_style.name"  style="text-align: center;">
                        <label>Logo</label>
                        <input type="file" name="surveyLogo" />
                    </div>
                    <app-draggable :class="'survey-questions-container-'+selected_template_style.name" :list="surveyElements" :options="{ group: { name: 'elements', pull: false } }">
                        <div v-for="(surveyElement, index) in surveyElements" :key="surveyElement.uid">
                            <app-survey-question v-show="!surveyElement.hide" :survey-element="surveyElement" :live="live" :index="index"></app-survey-question>
                        </div>
                    </app-draggable>
                        <div class="row container-footer" >
                                <div class="col-md-3 " ></div>  
                                <div class="col-md-6 footer-logo">
                                        <p> {{ $Lang.trans('Powered by Survenia.com') }} </p>
                                        <img :src="$Config.base_url+'/images/logo-survenia-color.png'">
                                </div>
                        </div>
                </div>  
            </div>
            <div>
                <input type="hidden" name="questions" :value="questionsJson" />
                <input type="hidden" name="templates_style_id" :value="selected_template_style.id" />
                <input type="hidden" name="template" :value="template_id" />
              
                <div class="row">
                    <div class="col-md-3" ></div>
                    <div class="col-md-6" align="center">
                        <a :href="$Config.base_url+'/mis_encuestas'" class="btn btn-default">{{$Lang.trans('Cancel')}}</a>
                        <button type="submit" class="btn">&nbsp;{{$Lang.trans('Save')}}&nbsp;</button>
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
            },
            templates_style: {
                default: () => []
            }
        },

        data() {
            return {
                template_id: this.template.id,
                surveyElements: this.initialElements,
                rootElements: rootElements,
                editLogo: this.template.url ? false : true,
                selected_template_style: {}
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

            setTemplateStyle(selected_template_style) {
                this.selected_template_style = selected_template_style;
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
