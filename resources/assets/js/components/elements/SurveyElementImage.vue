<style scoped>
    
</style>
<template>
    <div>
        <div v-show="!display">
            <label>{{ $Lang.trans('Image') }}</label>
            <div class="questions-data-container">
                <input type="file" :name="'images['+ surveyElement.uid +']'" />
            </div>
        </div>
        <div v-if="display">
            <label v-if="!surveyElement.answer" class="background-gray">{{ $Lang.trans('Image') }}</label>
            <div class="questions-data-container">
                <img v-if="surveyElement.answer" :src="$Config.base_url+surveyElement.answer" width="250" >
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props: ['display', 'surveyElement']
    }
</script>
