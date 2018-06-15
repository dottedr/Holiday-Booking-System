
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import FullCalendar from 'vue-full-calendar'
Vue.use(FullCalendar);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import SideMenu from './components/SideMenu.vue';
import UserData from './components/UserData.vue';
import Calendar from './components/Calendar.vue';
import NewRequest from './components/NewRequest.vue';

Vue.component('side-menu', SideMenu);
Vue.component('user-data', UserData);
Vue.component('calendar', Calendar);
Vue.component('new-request', NewRequest);



const app = new Vue({
    el: '#app'
});
