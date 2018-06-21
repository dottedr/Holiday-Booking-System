
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

import UserData from './components/UserData.vue';//dashboard with stats
import Calendar from './components/Calendar.vue';

import Team from './components/Team.vue';
import EmployeeEdit from './components/EmployeeEdit.vue';

import NewRequest from './components/NewRequest.vue';
import ViewRequests from './components/ViewRequests.vue';
import SingleRequest from './components/SingleRequest.vue';


Vue.component('side-menu', SideMenu);

Vue.component('user-data', UserData);
Vue.component('calendar', Calendar);

//place for a template to create an employee
Vue.component('team', Team);
Vue.component('employee-edit', EmployeeEdit);

Vue.component('new-request', NewRequest);
Vue.component('view-requests', ViewRequests);
Vue.component('single-request', SingleRequest);


const app = new Vue({
        el: '#app'
});