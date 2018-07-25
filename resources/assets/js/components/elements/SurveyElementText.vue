<style scoped>

</style>

<template>
    <div>
        <div v-if="!display">
            <label>Etiqueta</label>
            <input type="text" v-model="surveyElement.config.title" @click="cleanText" @blur="addText" class="form-control" />
        </div>
        <div v-if="display">
            <label>{{ surveyElement.config.title }}</label>
            <input type="text" :name="surveyElement.uid" v-model="surveyElement.answer" class="form-control" />
        </div>
    </div>
</template>

<script>
    export default {
        props: ['display', 'surveyElement'],

        data() {
            return {
                element: this.surveyElement,
                oldTitle: this.surveyElement.config.title,
            }
        },
        methods: {
            cleanText() {
                this.oldTitle = this.surveyElement.config.title;
                this.surveyElement.config.title = "";
            },
            addText() {
                if(this.surveyElement.config.title == ''){
                    this.surveyElement.config.title = this.oldTitle;
                }
            }
        }
    }
</script>
