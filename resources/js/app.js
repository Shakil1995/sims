require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

window.Vue=require('vue')

Vue.component('example-component',require('./components/ExampleComponets.vue').default)

const app=new Vue ({
    el: '#app'
});