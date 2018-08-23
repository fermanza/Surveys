<style scoped>

</style>

<template>
    <div>
        <div v-if="!display">
            <label>{{ $Lang.trans('Label') }}</label>
            <div class="questions-data-container">
                <input type="text" v-model="surveyElement.config.title" class="form-control" />
            </div>
        </div>
        <div v-if="display">
            <label class="background-gray">{{ surveyElement.config.title }}</label>
            <div class="questions-data-container">
                <input type="text" :name="surveyElement.uid" v-model="surveyElement.answer" class="form-control border-radius-input" />
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['display', 'surveyElement']
    }
</script>
