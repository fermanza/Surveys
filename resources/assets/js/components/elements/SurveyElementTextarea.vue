<style scoped>
    textarea {
        resize: none;
    }


</style>

<template>
    <div>
        <div v-if="!display">
            <label>{{ $Lang.trans('Label') }}</label>
            <input type="text" v-model="surveyElement.config.title" class="form-control" />
        </div>
        <div v-if="display">
            <label>{{ surveyElement.config.title }}</label>
            <textarea :name="surveyElement.uid" rows="4" v-model="surveyElement.answer" class="form-control"></textarea>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['display', 'surveyElement']
    }
</script>
