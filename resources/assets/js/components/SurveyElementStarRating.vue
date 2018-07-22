<style scoped>
    
</style>

<template>
    <div>
        <div v-if="!display">
            <input type="text" v-model="surveyElement.config.title" class="form-control" />
            <star-rating></star-rating>
        </div>
        <div v-if="display">
            <label>{{ surveyElement.config.title }}</label>
            <star-rating></star-rating>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['display', 'surveyElement']
    }
</script>