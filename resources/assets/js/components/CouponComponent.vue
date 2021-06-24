
<template>
    <div class="couponArea">
      <div class="">
        <input type="text" name="code" id="code" class="couponInput" placeholder="Use Coupon for discount" v-model="code" >
        <div v-if="success" class="customMsg">
          <span class="text-success ">{{ message }}</span>
        </div>
        <div class="customMsg" v-else>
          <span class="text-danger">{{ message }}</span>
        </div>
      </div>
      <div class="couponCheck">
        <button class="couponBtn" id="applyCouponButton" @click="applyCoupon">
          Check
        </button>
      </div>
    </div>
</template>

<script>

    import {bus} from '../app';

    export default {
        props: {
            total_price: {
              type: String,
              required: true
            },
            total_items: {
              type: String,
              required: true
            },
            shipping_cost: {
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
              code: '',
              message: '',
              success: false
            }
          },
        methods: {
            applyCoupon(){
              var app = this;
              axios.post(app.url+'/api/coupons/search', {
                coupon_code: app.code,
                total_price: app.total_price,
                total_items: app.total_items,
              })
              .then((response) => {

                $.notifyClose();
                var discount_amount = response.data.discount_amount;
                if(discount_amount > 0){
                    let coupon_text = "<strong class='total-price'>৳ " + discount_amount+ "</strong>"
                    $("#coupon-entry").html(coupon_text);
                    let total_cost = parseFloat(app.total_price) - parseFloat(discount_amount) + parseFloat(app.shipping_cost);
                    $("#total-cost").text('৳ '+total_cost);
                    app.message = "congratulations Coupon Accepted.";
                    app.success = true;
                    
                    // Set Coupon on form
                    $("#coupon_code").val(''+app.code);
                }else{
                  $("#coupon-entry").html('');
                  let total_cost = parseFloat(app.total_price) + parseFloat(app.shipping_cost);
                  $("#total-cost").text('৳ '+total_cost);
                  app.message = "Coupon didn't match !";
                  app.success = false;
                  
                  // Set Coupon on form
                  $("#coupon_code").val('');
                }
              })
              .catch((e) => {
                console.log(e);
              })
            }
        }
    }
</script>
