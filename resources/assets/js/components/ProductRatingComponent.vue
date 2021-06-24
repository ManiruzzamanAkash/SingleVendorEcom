<style scoped>
	fieldset, label { margin: 0; padding: 0; }

	/****** Style Star Rating Widget *****/

	.rating { 
	  border: none;
	  float: left;
	}

	.rating > input { display: none; } 
	.rating > label:before {
	    margin: 5px;
	    font-size: 40px;
	    font-family: FontAwesome;
	    display: inline-block;
	    content: "\F005";
	    margin-top: -15px;
	}

	.rating > .half:before { 
	  content: "\f089";
	  position: absolute;
	}

	.rating > label { 
	  color: #ddd; 
	 float: right; 
	}

	/***** CSS Magic to Highlight Stars on Hover *****/

	.rating > input:checked ~ label, /* show gold star when clicked */
	.rating:not(:checked) > label:hover, /* hover current star */
	.rating:not(:checked) > label:hover ~ label { color: #FFD700;  } /* hover previous stars in list */

	.rating > input:checked + label:hover, /* hover current star when changing rating */
	.rating > input:checked ~ label:hover,
	.rating > label:hover ~ input:checked ~ label, /* lighten current selection */
	.rating > input:checked ~ label:hover ~ label { color: #FFED85;  } 
</style>
<template>
	<div class="product-rating-component">
		<form class="theme-form-one" method="post">
            <div class="form-row">
                <div class="col-md-12 ">
                    <div class="media">
                        <div class="media-body ml-3">
                            <fieldset class="rating">
						    <input type="radio" id="star5" name="rating" value="5"  @click="setPoint(5)"/><label class = "full" for="star5" title="Awesome - 5 stars"></label>
						    <input type="radio" id="star4half" name="rating" value="4.5"  @click="setPoint(4.5)"/><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
						    <input type="radio" id="star4" name="rating" value="4" @click="setPoint(4)"/><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
						    <input type="radio" id="star3half" name="rating" value="3.5"  @click="setPoint(3.5)"/><label class="half" for="star3half" title="Good - 3.5 stars"></label>
						    <input type="radio" id="star3" name="rating" value="3"  @click="setPoint(3)"/><label class = "full" for="star3" title="Good - 3 stars"></label>
						    <input type="radio" id="star2half" name="rating" value="2.5"  @click="setPoint(2.5)"/><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
						    <input type="radio" id="star2" name="rating" value="2"  @click="setPoint(2)"/><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
						    <input type="radio" id="star1half" name="rating" value="1.5"  @click="setPoint(1.5)"/><label class="half" for="star1half" title="Bad - 1.5 stars"></label>
						    <input type="radio" id="star1" name="rating" value="1"  @click="setPoint(1)"/><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
						    <input type="radio" id="starhalf" name="rating" value="half" @click="setPoint(0.5)"/><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
						</fieldset>
						<input type="hidden" name="point" v-model="point" id="point">
                        </div>
                    </div>
                </div>
                <div class="write-review">
                    <input type="text" class="form-control w-100" id="review" placeholder="Enter your Review Title" required  v-model="title">
                </div>
                <div class="write-review">
                    <textarea class="form-control w-100" placeholder="Wrire Your Review Message Here" id="exampleFormControlTextarea1" rows="3"  v-model="description"></textarea>
                </div>
                <div class="submit">
                    <button class="submitBtn" type="button" @click="addRating()">Submit</button>
                </div>
            </div>
        </form>
	</div>
</template>

<script>
	export default {
		props : {
			id: {
              type: String,
              required: true
            },
			api_token: {
              type: String,
              required: true
            },
      url: {
        type: String,
        required: true
      }

		},

		mounted() {
            let app = this;
        },

        data(){
            return {
              'title': '',
              'description': '',
              'point': 0,
            }
      	},

      	methods: {
            addRating(){
              var app = this;
              axios.post(app.url+'/api/review/store', {
                product_id: app.id,
                api_token: app.api_token,
                title: app.title,
                description: app.description,
                point: app.point
              })
              .then((response) => {
              	app.title = ''
              	app.description = ''
              	app.point = ''
                
                $.notify({
                    icon: 'fa fa-check',
                    title: 'Success!',
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
                // app.checkWishlist();
              })
              .catch((e) => {
                console.log(e);
              })
            },

            // Set Point
            setPoint(point){
            	$("#point").val(point);
            	var app = this;
            	app.point = point;
            }

        }

	}
</script>