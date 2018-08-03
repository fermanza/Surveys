<style scoped>
    
</style>

<template>
    <div>
        <div v-if="!display">
            <label> {{ $Lang.trans('Label') }} </label>
            <input type="text" v-model="surveyElement.config.title" class="form-control" />
        </div>
        <div v-if="display">
            <h6>{{ surveyElement.config.title }}</h6>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['display', 'surveyElement']
    }
</script>
