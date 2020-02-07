/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');

window.Vue = require('vue');

import VModal from 'vue-js-modal';
Vue.use(VModal);

import Swal from 'sweetalert2';
window.Swal = Swal;
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('new-campaign-modal', require('./components/NewCampaignModal.vue').default);
Vue.component('new-business-modal', require('./components/NewBusinessModal.vue').default);
//Vue.component('upload-image-modal', require('./components/ImageDropModal.vue').default);
Vue.component('dropdown', require('./components/Dropdown.vue').default);
Vue.component('design-campaign', require('./campaigns/DesignCampaign.vue').default);
Vue.component('support-button', require('./components/SupportButton.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

new Vue({
    el: '#app',
});

new Vue({
    el: '#footer',
});