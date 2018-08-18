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
        <div v-if="!display">
            <label>{{ $Lang.trans('Label') }}</label>
            <input type="text" v-model="surveyElement.config.title" class="form-control border-radius-input" />
            <div>
                <label>{{ $Lang.trans('Options') }}</label>
                <div class="option-container" v-for="(field, index) in surveyElement.config.list" :key="field.uid">
                    <div class="option-input">
                        <input type="text" v-model="surveyElement.config.list[index].title" class="form-control border-radius-input" />
                    </div>
                    <div class="option-action">
                        <i @click="removeOption(index)" class="fa fa-minus text-success"></i>
                    </div>
                </div>
                <div>
                    <a type="button" @click.prevent="addOption">&nbsp&nbsp&nbsp<i class="fa fa-plus text-success"></i></a>
                </div>
            </div>
        </div>

        <div v-if="display">
            <label>{{ surveyElement.config.title }}</label>
            <div v-for="(field, index) in surveyElement.config.list" :key="field.uid">
                <label>{{ field.title }}</label>    
                <input  :disabled="live == false"   :name="field.uid"  @keyup="check()"   v-model="surveyElement.config.list[index].answer" type="number" class="form-control" />
        </div>  


          <!-- <select v-model="surveyElement.answer" class="form-control">
                <option :value="null">{{ $Lang.trans('Choose an option') }}</option>
                <option v-for="option in surveyElement.config.options" :value="option">{{ option }}</option>
            </select>  -->
        </div>
    </div>
</template>

<script>
    import uniqueString from 'unique-string';

    Array.prototype.unique=function(a){
        return function(){return this.filter(a)}}(function(a,b,c){return c.indexOf(a,b+1)<0
    });

    export default {
        props: ['display', 'surveyElement'],

        data() {
            return {
                counter: 5
            }
        },


        methods: {
            /*addOption() {
                this.counter++;
                this.surveyElement.config.options.push(`${this.counter}`);
            },*/

            addOption() {
                this.surveyElement.config.list.push({
                    uid: uniqueString(),
                    title: Lang.trans('Text'),
                    answer: ''
                });
            },

            removeOption(index) {
                this.surveyElement.config.list.splice(index, 1);
            },
    
            check() {
                let elementsArray = []
                let numElements = this.surveyElement.config.list.length;
                this.surveyElement.config.list.forEach((list, index) => {
                      if(list.answer > numElements || list.answer <= 0 ) {
                           list.answer = "";
                      }
                });
            }
        },

        watch: {
            'surveyElement.config.list':{
                handler: function (list, oldList) {
                    let answer = {};
                    list.forEach(field => {
                        answer[field.uid] = field.answer;
                    });
                    this.surveyElement.answer = answer;
                }
            }
        }


    }
</script>
