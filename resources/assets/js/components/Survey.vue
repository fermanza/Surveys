<style scoped>
    
</style>

<template>
    <div>
        <div v-for="element in surveyElements" :key="element.uid">
            <component :is="parseComponent(element)" :survey-element="element" :display="true"></component>
        </div>
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
    export default {
        props: ['elements', 'template'],

        data() {
            return {
                surveyElements: this.elements,
                questionsJson: '[]',
                template_id: this.template,
            }
        },

        methods: {
            parseComponent(element) {
                return `app-survey-element-${element.type}`;
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
