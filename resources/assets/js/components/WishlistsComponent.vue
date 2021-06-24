<template>
    <div class='container mt-4'>
      <h4 class="title mt-2">My Wishlist Items</h4>
      <div class="row">
        <div class="col-sm-9" >

            <div class="card card-body p-3 table-responsive" v-if="wishlists.length">
               <table class="table table-cart">
                <thead>
                  <tr>
                    <th width="5%">No.</th>
                    <th width="15%">Item</th>
                    <th width="8%"></th>
                    <th width="15%">Quantity</th>
                    <th width="15%">Unit Price</th>
                    <th width="15%">Sub total</th>
                    <th width="15%">Delete</th>
                </tr>
            </thead>
            <tbody>
              <tr v-for="(cart, index) in wishlists">
                <td>{{ index+1 }}</td>
                <td><a :href="url+'/products/'+cart.product.slug" class="cart-product-title">{{ cart.product.title }}</a>
                </td>
                <td><img :src="url+'/images/products/'+cart.image" width="60px"></td>
                <td>
                    <input type="number"  class="form-control" v-model="cart.product_quantity" style="width: 65px;" @change="updateQuantity(cart.id, index)" min="1" />
                </td>
                <td> ৳ {{ cart.product.price }}</td>
                <td>৳ {{ cart.product.price *  cart.product_quantity }}</td>
                <td><button type="submit" class="btn btn-outline-danger btn-sm" @click="deleteWishlistItem(cart.id)"><i class="fa fa-trash"></i></button></td>
            </tr>

        </tbody>
    </table>
</div>

<div class="alert alert-warning" v-else>
  <strong>There is no item in your cart.</strong>
  <br>

</div>
<p class="float-right mt-2">
  <a :href="url+'/products'" class="btn btn-info">Continue Shopping..</a>
</p>
<div class="clearfix"></div>

</div>
</div>

</div>
</template>

<script>

    import {bus} from '../app';

    export default {
        props: {
            url: {
              type: String,
              required: true
          }
      },
      mounted() {
        var app = this;
        app.fetchCartItems();
        app.setTotalAmounts();
    },
    data(){
        return {
          wishlists: [],
          totals: 0
      }
  },
  methods: {

    deleteWishlistItem(cart_id){
        var app = this;
        axios.post(app.url+'/api/wishlists/delete/'+cart_id)
        .then((response) => {
            console.log(response)
            if (response.data.success == true) {
                app.generateNotification(response.data.message, 'success', 5000);
                app.fetchCartItems();
                app.setTotalAmounts();
                app.setTotalItems();
            }else{
                app.generateNotification(response.data.message, 'danger', 5000);
                app.fetchCartItems();
                app.setTotalAmounts();
            }
        })
    },

    fetchCartItems(){
        var app = this;
        axios.get(app.url+'/api/wishlists')
        .then((response) => {
            app.wishlists = response.data.data;
        })
        .catch((e) => {
            console.log(e);
        });
    },

    generateNotification(message, type, timeout){
        $.notify({
            icon: 'fa fa-check',
            title: type.toUpperCase(),
            message: '<br />'+message
        },{
            element: 'body',
            position: null,
            type: type,
            allow_dismiss: true,
            newest_on_top: false,
            showProgressbar: true,
            placement: {
                from: "top",
                align: "right"
            },
            offset: 20,
            spacing: 10,
            z_index: 1031,
            delay: timeout,
            animate: {
                enter: 'animated fadeInDown',
                exit: 'animated fadeOutUp'
            },
            icon_type: 'class',
            template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
            '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
            '<span data-notify="icon"></span> ' +
            '<span data-notify="title">{1}</span> ' +
            '<span data-notify="message">{2}</span>' +
            '<a href="{3}" target="{4}" data-notify="url"></a>' +
            '</div>'
        });
    }
}
}
</script>
