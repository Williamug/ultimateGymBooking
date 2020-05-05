/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import { Form, HasError, AlertError } from 'vform';
import Swal from 'sweetalert2';

window.Swal = Swal;
const Toast = Swal.mixin({
	toast: true,
	position: 'top-end',
	showConfirmButton: false,
	timer: 3000
	});

window.Toast = Toast;

window.Vue = require('vue');
window.Form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('role-component', require('./components/RoleModelComponent.vue').default);
Vue.component('email-template-component', require('./components/EmailTemplateComponent.vue').default);
Vue.component('service-component', require('./components/ServiceComponent.vue').default);

const app = new Vue({
    el: '#app',
});
