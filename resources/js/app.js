/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

Vue.component('v-header', require('./components/Header.vue').default);
Vue.component('pagination', require('laravel-vue-pagination'));

import { BootstrapVue, BootstrapVueIcons} from 'bootstrap-vue';
import router from './router';
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

Vue.use(BootstrapVue);
Vue.use(BootstrapVueIcons);

const app = new Vue({
    el: '#app',
    router: router
});