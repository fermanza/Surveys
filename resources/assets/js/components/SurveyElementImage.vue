<style scoped>
    
</style>
<template>
    <div>
        <div v-if="!display">
            <label>Etiqueta</label>
            <input type="text" v-model="surveyElement.config.title" class="form-control" />
        </div>
        <div v-if="display">
            <label>{{ surveyElement.config.title }}</label>
            <input type="file" :name="surveyElement.uid" />
        </div>
    </div>
</template>
<script>
    export default {
        props: ['display', 'surveyElement']
    }
</script>
