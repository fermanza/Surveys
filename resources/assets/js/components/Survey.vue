<style scoped>
    
</style>

<template>
    <div>
        <div v-for="element in surveyElements">
            <component :is="parseComponent(element)" :survey-element="element" :display="true"></component>
        </div>
        <div>
            <form action="/encuestas/contestar" method="POST">
                <input type="hidden" name="questions" :value="questionsJson" />
                <button class="btn">Contestar</button>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['elements'],

        data() {
            return {
                surveyElements: this.elements,
                questionsJson: '[]'
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
