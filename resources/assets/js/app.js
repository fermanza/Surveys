import Vue from 'vue';
import _ from 'lodash';
import draggable from 'vuedraggable';
import StarRating from 'vue-star-rating';


window.Vue = Vue;
window._ = _;


Vue.component('star-rating', StarRating);
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
Vue.component('app-survey-element-slider', require('./components/SurveyElementSlider.vue'));
Vue.component('app-survey-element-image', require('./components/SurveyElementImage.vue'));
Vue.component('app-survey-element-contact-information', require('./components/SurveyElementContactInformation.vue'));
Vue.component('app-survey-element-star-rating', require('./components/SurveyElementStarRating.vue'));


// matrix
// matrix scaled
// star rating


const app = new Vue({
    el: '#app'
});
