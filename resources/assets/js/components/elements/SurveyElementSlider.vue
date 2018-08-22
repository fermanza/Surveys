<style scoped>
    
</style>

<template>
    <div>
        <div v-if="!display">
            <label>{{ $Lang.trans('Label') }}</label>
            <div class="questions-data-container">
                <input type="text" v-model="surveyElement.config.title" class="form-control" />
                <label>0%</label>
                <input type="text" v-model="surveyElement.config.zero" class="form-control" />
                <label>50%</label>
                <input type="text" v-model="surveyElement.config.half" class="form-control" />
                <label>100%</label>
                <input type="text" v-model="surveyElement.config.full" class="form-control" />
            </div>
        </div>
        <div v-if="display">
            <label class="background-gray">{{ surveyElement.config.title }}</label>
            <div class="questions-data-container">
                <div class="row">
                   <div class="col-xs-4">{{ surveyElement.config.zero }} </div> 
                   <div class="col-xs-4 text-center">{{ surveyElement.config.half }}</div> 
                   <div class="col-xs-4 text-right">{{ surveyElement.config.full }}</div> 
                </div>
                <input type="range" min="0" max="100" step="1" :name="surveyElement.uid" v-model="surveyElement.answer" class="form-control" />
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['display', 'surveyElement']
    }
</script>
