<style scoped="">
    .btn-wishlist {
        border: 0px!important;
        background: transparent;
    }
    .btn-wishlist:hover,  .btn-wishlist:focus{
        border: 0px!important;
        background: transparent;
    }
    .wishlist-icon{
        color: #c7c5c5;
    }
    .wishlist-icon-saved{
        color: #ff4343;
        text-shadow: 0px 0px 5px #ff4343;
    }
</style>

<template>
    <span class="wishlist-item" @click="addToWishlist()">
        <button title="Add to wishlist" tabindex="0" class="btn btn-danger btn-sm btn-wishlist">

            <i class="fa fa-heart wishlist-icon" v-if="!already_added" title="Click to add item in the wishlist"></i>
            <i class="fa fa-heart wishlist-icon-saved"  title="Click to delete item from the wishlist" v-else></i>
        </button>
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
            },
            route: {
              type: String
            },
            api_token: {
              type: String,
              required: true
            }
          },
        mounted() {
            let app = this;
            app.checkWishlist();
        },
        data(){
            return {
              already_added: false
            }
          },
        methods: {
            addToWishlist(){
              var app = this;
              axios.post(app.url+'/api/wishlists/store', {
                product_id: app.id,
                api_token: app.api_token
              })
              .then((response) => {
                $.notifyClose();
                $.notify({
                    icon: 'fa fa-heart',
                    title: '',
                    message: response.data.Message
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
                    delay: 6000,
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
                // bus.$emit("totalItemChanged", response.data.totalItems);
                app.checkWishlist();

                // If in the wishlist page, then reload 
                if(app.route == 'wishlists'){
                  location.reload();
                }
              })
              .catch((e) => {
                console.log(e);
              })
            },
            checkWishlist(){
                let app = this;
                axios.get(app.url+'/api/wishlists/check/'+app.id+'/'+app.api_token)
                  .then((response) => {
                    // console.log(response.data.status)
                    if (response.data.status == 'success') {
                        // console.log('find');
                        app.already_added = true;
                    }else{
                        // console.log('not find');
                        app.already_added = false;
                    }
                  });
            }
        }
    }
</script>
