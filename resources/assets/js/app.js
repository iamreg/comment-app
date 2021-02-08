
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import VueToastr from "vue-toastr"
import moment from 'vue-moment'
import store from './store'

window.Vue = require('vue');

Vue.use(BootstrapVue)
Vue.use(VueToastr)
Vue.use(moment)

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('post-component', require('./components/PostComponent.vue'));
Vue.component('comment-form-component', require('./components/CommentFormComponent.vue'));
Vue.component('comment-component', require('./components/CommentComponent.vue'));

const app = new Vue({
    el: '#app',
    store
});
