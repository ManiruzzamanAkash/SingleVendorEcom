require('./bootstrap');

import Vue from 'vue';
import Vuelidate from 'vuelidate';

Vue.use(Vuelidate);


Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('add-cart', require('./components/CartComponent.vue').default);
Vue.component('add-wishlist', require('./components/WishlistComponent.vue').default);
Vue.component('cart-total-item', require('./components/CartTotalComponent.vue').default);
Vue.component('cart-items', require('./components/CartItemsComponent.vue').default);
Vue.component('wishlist-items', require('./components/WishlistsComponent.vue').default);
Vue.component('coupon-check', require('./components/CouponComponent.vue').default);

// Product Rating Component
Vue.component('product-rating', require('./components/ProductRatingComponent.vue').default);

// Search Products Component
Vue.component('search-component', require('./components/SearchComponent.vue').default);
Vue.component('search-category-component', require('./components/SearchCategoryComponent.vue').default);

// Pagination
Vue.component('pagination', require('laravel-vue-pagination').default);

// Authentication Components
Vue.component('login-user', require('./components/Login.vue').default);
Vue.component('register-user', require('./components/Register.vue').default);

export const bus = new Vue();

const app = new Vue({
    el: '#app',
    methods: {

    }
});