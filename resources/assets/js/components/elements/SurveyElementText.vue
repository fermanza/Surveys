<style scoped>

</style>

<template>
    <div>
        <div v-if="!display">
            <label>{{ $Lang.trans('Label') }}</label>
            <input type="text" v-model="surveyElement.config.title" class="form-control" />
        </div>
        <div v-if="display">
            <label>{{ surveyElement.config.title }}</label>
            <input type="text" :name="surveyElement.uid" v-model="surveyElement.answer" class="form-control" />
        </div>
    </div>
</template>

<script>
    export default {
        props: ['display', 'surveyElement']
    }
</script>
