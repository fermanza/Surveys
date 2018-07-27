<style scoped>
    
</style>
<template>
    <div>
        <div v-show="!display">
            <label>Imagen</label>
            <input type="file" :name="'images['+ surveyElement.uid +']'"  />
        </div>
        <div v-if="display">
            <label v-if="!surveyElement.answer">Imagen</label>
            <img v-if="surveyElement.answer" :src="$Config.base_url+surveyElement.answer" width="250" >
        </div>
    </div>
</template>
<script>
    export default {
        props: ['display', 'surveyElement']
    }
</script>
