<style scoped>
    
</style>

<template>
    <div>
        <div v-if="!display">
            <input type="text" v-model="surveyElement.config.title" class="form-control" />
        </div>
        <div v-if="display">
            <label>{{ surveyElement.config.title }}</label>
            <star-rating v-model="element.answer"></star-rating>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['display', 'surveyElement'],

        data() {
            return {
                element: this.surveyElement
            }
        }
    }
</script>