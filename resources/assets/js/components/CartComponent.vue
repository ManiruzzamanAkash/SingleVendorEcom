<template>
    <span class="cart-item" @click="addToCart()">
        <button title="Add to cart" tabindex="0" class="addToCart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
    </span>
</template>

<script>

    import {bus} from '../app';

    export default {
        props: {
            id: {
              type: String,
              required: true
            },
            url: {
              type: String,
              required: true
            }
          },
        mounted() {
            
        },
        data(){
            return {
              
            }
          },
        methods: {
            addToCart(){
              var app = this;
              var lastProductSize = localStorage.getItem('lastProductSize');
              

              axios.post(app.url+'/api/carts/store', {
                product_id: app.id,
                size: lastProductSize
              })
              .then((response) => {

                $.notifyClose();
                console.log(response);


                $.notify({
                    icon: 'fa fa-shopping-cart',
                    title: '',
                    // message: response.data.Message + '<br> Total '+response.data.totalItems+' items has been added !! <br><a href="'+app.url+'/carts" class="cart-link">Go to Cart</a>'
                    message: response.data.Message + '<br> Total '+response.data.totalItems+' items has been added !!'
                },{
                    element: 'body',
                    position: null,
                    type: "success",
                    allow_dismiss: true,
                    newest_on_top: false,
                    showProgressbar: true,
                    placement: {
                        from: "bottom",
                        align: "center"
                    },
                    offset: 20,
                    spacing: 10,
                    z_index: 1031,
                    delay: 5000,
                    animate: {
                        enter: 'animated fadeInDown',
                        exit: 'animated fadeOutUp'
                    },
                    icon_type: 'class',
                    template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0} notify-simple" role="alert">' +
                    '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                    '<span data-notify="icon"></span> ' +
                    '<span data-notify="title">{1}</span> ' +
                    '<span data-notify="message">{2}</span>' +
                    '<a href="{3}" target="{4}" data-notify="url"></a>' +
                    '</div>'
                });

                // Pass Data to the head component and increment the number of added item in the cart
                // this.$dispatch('total_items', response.data.totalItems);
                // app.$emit("total-items", response.data.totalItems);
                bus.$emit("totalItemChanged", response.data.totalItems);
            
              })
              .catch((e) => {
                console.log(e);
              })
            }
        }
    }
</script>
