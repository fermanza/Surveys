<style scoped>
    .survey-question {
        margin: 5px 0;
       border-bottom: 1px solid #DBE8D1;
    }

    .footer-logo {
        text-align: center;
    }
    .footer-logo > p {
        margin: 0;
    }
    .footer-logo > img {
        width: 20%;
    }


</style>

<template>
    <div>
        <form :action="$Config.base_url+'/saveAnswer'" method="POST">
            <transition-group-translate-y>
                <div v-for="element in surveyElements" :key="element.uid" class="survey-question double-border">
                    <component :is="parseComponent(element)" v-show="!element.hide" :survey-element="element" :display="true"></component>
                </div>
            </transition-group-translate-y>
            <div>

                    <div class="row">
                            <div class="col-md-3"></div>  
                            <div class="col-md-6 footer-logo">
                                    <p> {{ $Lang.trans('Powered by Survenia.com') }} </p>
                                    <img :src="$Config.base_url+'/images/logo-survenia-color.png'">
                            </div>
                    </div>


                    <input type="hidden" name="answer" :value="questionsJson" />
                    <input type="hidden" name="template" :value="template_id" />
                    <br /><br />
                    <button type="submit" class="btn">{{ $Lang.trans('Answer') }} </button>
                <br />
            </div>
        </form>
    </div>
</template>

<script>
    import Bus from './../Bus';

    export default {
        props: ['elements', 'template'],

        data() {
            return {
                surveyElements: this.elements,
                questionsJson: '[]',
                template_id: this.template,
            }
        },

        mounted() {
            Bus.$on('toggle-hide-elements', this.toggleHideElements);
        },

        methods: {
            parseComponent(element) {
                return `app-survey-element-${element.type}`;
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
        },

        watch: {
            'surveyElements': {
                handler: function (elements, oldElements) {
                    this.questionsJson = JSON.stringify(this.surveyElements);
                },
                immediate: true,
                deep: true
            }
        }
    }
</script>
