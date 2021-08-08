<template>
	<div class="container content-holder">
		<div class="row">
			<div class="content-area">
				<div class="content-detail" v-if="carts.length">
					<h4 class="titleArea">
						My Cart (<cart-total-item></cart-total-item>)
					</h4>

					<div
						class="details"
						v-for="(cart, index) in carts"
						:key="index"
					>
						<div class="item-detail">
							<div class="itemImg">
								<a
									:href="
										url + '/products/' + cart.product.slug
									"
									class="thumbnail"
								>
									<img
										:src="
											url +
											'/images/products/' +
											cart.image
										"
										class="blur-up lazyload"
									/>
								</a>
							</div>
							<div class="item-opts">
								<div class="item-title">
									<a
										:href="
											url +
											'/products/' +
											cart.product.slug
										"
										class=""
									>
										{{ cart.product.title }}
									</a>
								</div>
								<div class="prodPrice">
									<div class="price">
										৳ {{ cart.product.price }}
									</div>
									<div class="oldprice">
										৳ {{ cart.product.offer_price }}
									</div>
								</div>
								<div class="delivery-detail">
									Delivery in
									{{ cart.product.delivery_time }} days..!
								</div>
								<div class="qnt">
									<input
										type="number"
										class="form-control"
										v-model="cart.product_quantity"
										style="width: 65px"
										@change="updateQuantity(cart.id, index)"
										min="1"
									/>
									<span>Change your product Quantity</span>
								</div>
							</div>
						</div>

						<div class="cart-actions">
							<button
								type="submit"
								class="action"
								@click="deleteCartItem(cart.id)"
							>
								<i class="fa fa-trash"></i>
							</button>
						</div>
					</div>
				</div>

				<div class="empty-holder" v-else>
					<div class="emptyContent">
						<div class="empty-logo">
							<i
								class="fa fa-cart-arrow-down"
								aria-hidden="true"
							></i>
						</div>
						<div class="empty-heading">
							<!-- looks like you have no items in your shopping cart. -->
							!! You have no item in your Cart. !!
						</div>
					</div>
				</div>

				<div class="clearfix"></div>
			</div>

			<div class="price-detail" v-if="carts.length">
				<div class="priceArea">
					<h4 class="titleArea">price</h4>
					<div class="total-area">
						<div class="name">Total Price:</div>
						<div class="pPrice">৳{{ totals }}</div>
					</div>
					<div class="">
						<p>
							<a :href="url + '/checkout'" class="procBtn"
								>PROCEED</a
							>
						</p>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="anthrSec">
					<div class="logo">
						<i class="fa fa-plane" aria-hidden="true"></i>
					</div>
					<div class="note">
						Best delivery experience,<br />
						Get your product on time.
					</div>
				</div>
				<div class="anthrSec">
					<div class="logo">
						<i class="fa fa-thumbs-up" aria-hidden="true"></i>
					</div>
					<div class="note">
						All products are 100% Authentic,<br />
						Get exact what you order.
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
import { bus } from "../app";

export default {
	props: {
		url: {
			type: String,
			required: true,
		},
	},
	mounted() {
		var app = this;
		app.fetchCartItems();
		app.setTotalAmounts();
	},
	data() {
		return {
			carts: [],
			totals: 0,
		};
	},
	methods: {
		updateQuantity(cart_id, index) {
			var app = this;
			axios
				.post(app.url + "/api/carts/quantity-update/" + cart_id, {
					product_quantity: app.carts[index].product_quantity,
				})
				.then((response) => {
					console.log(response);
					if (response.data.success == true) {
						app.generateNotification(
							response.data.message,
							"success",
							5000
						);
						app.fetchCartItems();
						app.setTotalAmounts();
						app.setTotalItems();
					} else {
						app.generateNotification(
							response.data.message,
							"danger",
							5000
						);
						app.fetchCartItems();
						app.setTotalAmounts();
					}
				});
		},

		deleteCartItem(cart_id) {
			var app = this;
			axios
				.post(app.url + "/api/carts/delete/" + cart_id)
				.then((response) => {
					console.log(response);
					if (response.data.success == true) {
						app.generateNotification(
							response.data.message,
							"success",
							5000
						);
						app.fetchCartItems();
						app.setTotalAmounts();
						app.setTotalItems();
					} else {
						app.generateNotification(
							response.data.message,
							"danger",
							5000
						);
						app.fetchCartItems();
						app.setTotalAmounts();
					}
				});
		},

		fetchCartItems() {
			var app = this;
			axios
				.get(app.url + "/api/carts")
				.then((response) => {
					app.carts = response.data.data;
				})
				.catch((e) => {
					console.log(e);
				});
		},

		setTotalAmounts() {
			var app = this;
			axios
				.get(app.url + "/api/carts/total-amounts")
				.then((response) => {
					app.totals = response.data;
				})
				.catch((e) => {
					console.log(e);
				});
		},

		setTotalItems() {
			var app = this;
			axios
				.get(app.url + "/api/carts/total")
				.then((response) => {
					bus.$emit("totalItemChanged", response.data);
				})
				.catch((e) => {
					console.log(e);
				});
		},

		generateNotification(message, type, timeout) {
			$.notifyClose();
			$.notify(
				{
					icon: "fa fa-check",
					title: type.toUpperCase(),
					message: "<br />" + message,
				},
				{
					element: "body",
					position: null,
					type: type,
					allow_dismiss: true,
					newest_on_top: false,
					showProgressbar: true,
					placement: {
						from: "bottom",
						align: "center",
					},
					offset: 20,
					spacing: 10,
					z_index: 1031,
					delay: timeout,
					animate: {
						enter: "animated fadeInDown",
						exit: "animated fadeOutUp",
					},
					icon_type: "class",
					template:
						'<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0} notify-simple" role="alert">' +
						'<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
						'<span data-notify="icon"></span> ' +
						'<span data-notify="title">{1}</span> ' +
						'<span data-notify="message">{2}</span>' +
						'<a href="{3}" target="{4}" data-notify="url"></a>' +
						"</div>",
				}
			);
		},
	},
};
</script>
