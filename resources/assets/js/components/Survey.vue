<style scoped>
    
</style>

<template>
    <div>
        <transition-group-translate-y>
            <div v-for="element in surveyElements" :key="element.uid">
                <component :is="parseComponent(element)" v-show="!element.hide" :survey-element="element" :display="true"></component>
            </div>
        </transition-group-translate-y>
        <div>
            <form :action="$Config.base_url+'/saveAnswer'" method="POST">
                <input type="hidden" name="answer" :value="questionsJson" />
                <input type="hidden" name="template" :value="template_id" />
                <br /><br />
                <button type="submit" class="btn">Contestar</button>
            </form>
            <br />
        </div>
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
