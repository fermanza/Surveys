import Vue from 'vue';
import _ from 'lodash';
import draggable from 'vuedraggable';
import StarRating from 'vue-star-rating';
import vueSelect from 'v-select2-component';
Vue.prototype.$Config = window.Config;

window.Vue = Vue;
window._ = _;

Vue.component('star-rating', StarRating);
Vue.component('vue-select', vueSelect);
Vue.component('app-draggable', draggable);

Vue.component('app-survey', require('./components/Survey.vue'));
Vue.component('app-survey-builder', require('./components/SurveyBuilder.vue'));
Vue.component('app-root-element', require('./components/RootElement.vue'));
Vue.component('app-survey-question', require('./components/SurveyQuestion.vue'));
Vue.component('app-survey-hider', require('./components/SurveyHider.vue'));
Vue.component('app-survey-element-text', require('./components/elements/SurveyElementText.vue'));
Vue.component('app-survey-element-header', require('./components/elements/SurveyElementHeader.vue'));
Vue.component('app-survey-element-textarea', require('./components/elements/SurveyElementTextarea.vue'));
Vue.component('app-survey-element-select', require('./components/elements/SurveyElementSelect.vue'));
Vue.component('app-survey-element-multiple-text', require('./components/elements/SurveyElementMultipleText.vue'));
Vue.component('app-survey-element-multiple-check', require('./components/elements/SurveyElementMultipleCheck.vue'));
Vue.component('app-survey-element-slider', require('./components/elements/SurveyElementSlider.vue'));
Vue.component('app-survey-element-image', require('./components/elements/SurveyElementImage.vue'));
Vue.component('app-survey-element-contact-information', require('./components/elements/SurveyElementContactInformation.vue'));
Vue.component('app-survey-element-star-rating', require('./components/elements/SurveyElementStarRating.vue'));
Vue.component('app-survey-element-ranking', require('./components/elements/SurveyElementRanking.vue'));
Vue.component('app-survey-element-matrix', require('./components/elements/SurveyElementMatrix.vue'));
Vue.component('app-survey-element-matrix-scale', require('./components/elements/SurveyElementMatrixScale.vue'));

Vue.component('transition-group-translate-y', require('./components/transitions/GroupTranslateY.vue'));

if (document.querySelectorAll('#app').length) {
    new Vue({
        el: '#app'
    });
}
