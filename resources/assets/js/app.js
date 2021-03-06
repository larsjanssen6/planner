import swal from 'sweetalert2'

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

window.swal = swal;

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('roles',          require('./components/authorization/roles.vue'));
Vue.component('MultiSelect',    require('./components/shared/MultiSelect.vue'));

/*
 Charts
*/

Vue.component('BarChart',                       require('./components/charts/BarChart.vue'));
Vue.component('PieChart',                       require('./components/charts/PieChart.vue'));

const app = new Vue({
    el: '#app'
});


$("form").submit(() => {
    $("#submit").addClass("is-loading");
return true;
});

setTimeout(() => {
    $('#is-popUp').fadeOut('fast');
}, 3500);
