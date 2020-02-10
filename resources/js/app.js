require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';

window.Vue.use(VueRouter);

import IndexComponent from './components/products/IndexComponent.vue';
import ListComponent from './components/products/ListComponent.vue';



Vue.component('index-component', require('./components/products/IndexComponent.vue').default);
Vue.component('list-component', require('./components/products/ListComponent.vue').default);
const routes = [
    {
        path: '/',
        components: {
            IndexComponent: IndexComponent
        }
    },
]

const router = new VueRouter({ routes })

const app = new Vue({ router }).$mount('#app')