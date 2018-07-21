import Vue from 'vue';
import _ from 'lodash';
import draggable from 'vuedraggable';

window.Vue = Vue;
window._ = _;

Vue.component('app-draggable', draggable);
Vue.component('app-survey-builder', require('./components/SurveyBuilder.vue'));
Vue.component('app-root-element', require('./components/RootElement.vue'));
Vue.component('app-survey-question', require('./components/SurveyQuestion.vue'));
Vue.component('app-survey-element-text', require('./components/SurveyElementText.vue'));
Vue.component('app-survey-element-header', require('./components/SurveyElementHeader.vue'));
Vue.component('app-survey-element-textarea', require('./components/SurveyElementTextarea.vue'));
Vue.component('app-survey-element-select', require('./components/SurveyElementSelect.vue'));
Vue.component('app-survey-element-multiple-text', require('./components/SurveyElementMultipleText.vue'));
Vue.component('app-survey-element-multiple-check', require('./components/SurveyElementMultipleCheck.vue'));
// matrix
// matrix scaled

// slider
// star rating
// imagen

// contact information

const app = new Vue({
    el: '#app'
});
