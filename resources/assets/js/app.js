require('./bootstrap');

window.Vue = require('vue');
import Vuelidate from 'vuelidate';
Vue.use(Vuelidate);

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('add-cart', require('./components/CartComponent.vue'));
Vue.component('add-wishlist', require('./components/WishlistComponent.vue'));
Vue.component('cart-total-item', require('./components/CartTotalComponent.vue'));
Vue.component('cart-items', require('./components/CartItemsComponent.vue'));
Vue.component('wishlist-items', require('./components/WishlistsComponent.vue'));
Vue.component('coupon-check', require('./components/CouponComponent.vue'));

// Product Rating Component
Vue.component('product-rating', require('./components/ProductRatingComponent.vue'));

// Search Products Component
Vue.component('search-component', require('./components/SearchComponent.vue'));
Vue.component('search-category-component', require('./components/SearchCategoryComponent.vue'));

// Pagination
Vue.component('pagination', require('laravel-vue-pagination'));

// Authentication Components

Vue.component('login-user', require('./components/Login.vue'));
Vue.component('register-user', require('./components/Register.vue'));

export const bus = new Vue();

const app = new Vue({
    el: '#app',
    methods: {

    }
});