<style scoped>
    .option-container {
        display: flex;
    }

    .option-input {
        flex: 1;
    }

    .option-action {
        flex-basis: 25px;
    }

    .option-action {
        cursor: pointer;
    }
</style>

<template>
    <div>
        <div v-show="!display">
            <label>{{$Lang.trans('Label')}}</label>
            <input type="text" v-model="surveyElement.config.title" class="form-control border-radius-input" />
            <div>
                <label>{{$Lang.trans('Options')}}</label>
                <div class="option-container" v-for="(option, index) in surveyElement.config.list">
                    <div class="option-input">
                        <input type="text" v-model="surveyElement.config.list[index]" class="form-control border-radius-input" />
                    </div>
                    <div class="option-action">
                        <i @click="removeOption(index)" class="fa fa-minus text-success"></i>
                    </div>
                </div>
                <div>
                    <a type="button" @click.prevent="addOption">&nbsp&nbsp&nbsp<i class="fa fa-plus text-success"></i></a>
                </div>
            </div>
            <app-survey-hider :hide-config="surveyElement.config.hideConfig" :survey-element-uid="surveyElement.uid" :answer="surveyElement.answer" :index="index"></app-survey-hider>
        </div>
        <div v-if="display">
            <label>{{ surveyElement.config.title }}</label>
            <select :name="surveyElement.uid" v-model="surveyElement.answer" class="form-control border-radius-input">
                <option :value="null">{{$Lang.trans('Choose an option')}}</option>
                <option v-for="option in surveyElement.config.list" :value="option">{{ option }}</option>
            </select>
        </div>
    </div>
</template>

<script>
    import Bus from './../../Bus';

    export default {
        props: ['display', 'surveyElement', 'index'],

        methods: {
            addOption() {
                this.surveyElement.config.list.push(Lang.trans('Option'));
            },

            removeOption(index) {
                this.surveyElement.config.list.splice(index, 1);
            }
        },

        watch: {
            'surveyElement.config.list': {
                handler: function (list, oldList) {
                    let options = {};
                    list.forEach(option => {
                        options[option] = this.surveyElement.config.hideConfig.options[option] || [];
                    });
                    this.surveyElement.config.hideConfig.options = options;
                },
                immediate: true
            },

            'surveyElement.answer': function (answer, oldAnswer) {
                if (answer && this.surveyElement.config.hideConfig.allow) {
                    Bus.$emit('toggle-hide-elements', this.surveyElement.config.hideConfig.options[oldAnswer] || [], this.surveyElement.config.hideConfig.options[answer]);
                } else if (!answer) {
                    Bus.$emit('toggle-hide-elements', this.surveyElement.config.hideConfig.options[oldAnswer] || [], []);
                }
            }
        }
    }
</script>
