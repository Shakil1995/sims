require('./bootstrap');

// import Alpine from 'alpinejs';

// window.Alpine = Alpine;

// Alpine.start();

window.Vue=require('vue')

Vue.component('example-component',require('./components/ExampleComponets').default)
Vue.component('product-Add',require('./components/products/productAdd').default)

const app = new Vue ({
    el: '#app'
});