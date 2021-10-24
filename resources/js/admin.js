/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap-admin')

$(document).on('reset', 'form', function (e) {
  $(e.target)
    .find('textarea')
    .each((i, element) => $(element).text(''))
})

$(document).on('click', '[data-dismiss]', function (e) {
  $(this)
    .closest('.modal')
    .find('form')
    .each(function (i, element) {
      $(this).removeAttr('data-update')
      $(this).trigger('reset')
    })
})

$('[data-selectable-rows]').on('click', 'tr', function (e) {
  $(this).toggleClass('selected')
})

require('./controller/ingredients')
require('./controller/products')
require('./controller/combos')
require('./controller/providers')

// window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
//     el: '#app',
// });
