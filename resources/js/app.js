/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import $ from 'jquery';

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */
// $('.p-menu--button').on('click', function() {
//   if( $(this).hasClass('active')){
//     $(this).removeClass('active');
//     $('.p-menu--wrap').addClass('close').removeClass('open');
//   }else {
//     $(this).addClass('active');
//     $('.p-menu--wrap').addClass('open').removeClass('close');
//   }
// });
// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
window.$ = window.jQuery = require('jquery');

Vue.config.devtools = true;
require('./bootstrap');
require('./main');
import './bootstrap'
import './main'

window.Vue = require('vue');
window.$ = require('jquery');

import Vue from 'vue'
import ProductLike from './components/ProductLike'
import ProductTagsInput from './components/ProductTagsInput'
import ProductImgPreview from './components/ProductImgPreview'

const app = new Vue({
    el: '#app',
    components: {
        ProductLike,
        ProductTagsInput,
        ProductImgPreview
    }
});
