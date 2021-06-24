<style scoped="">
    .search-results{
        height: auto;
        overflow-y: scroll;
        min-width: 555px;
        background: #fff;
        position: absolute;
        z-index: 5000;
        max-height: 400px;
        box-shadow: 25px 5px 41px -8px #1a599461;
    }

    .search-results>ul{
        list-style: none;
    } 

    .search-results>ul>li{
        display: block;
    }
    .search-results>ul>li>a{
        background: #1e65a714;
        padding: 10px 20px;
        display: block;
        color: #f1a104;
        font-size: 16px;
        font-weight: bold;
    }
    .product-suggestion-title {
        color: #1e65a7;
        font-weight: normal;
    }
    .search-results>ul>li>a:hover, .search-results>ul>li>a:hover .product-suggestion-title {
        background: #1e65a7;
        color: #fff;
    }
</style>

<template>
     <div>
         <form class="theme-form-two d-none d-xl-block right-space">
            <div class="form-group">
                <input type="text" class="form-control" id="inputPassword2" placeholder="Search a Products" required="required" v-model="search_text" @keyup="searchProducts">
                <button type="submit" class="btn btn-theme in-btn"><i class="fa fa-search" aria-hidden="true"></i></button>
            </div>
        </form>
        <div class="clearfix"></div>
        <div class="search-results" v-if="search_text.length > 0">
            <ul>
                <li v-for="product in products">
                    <a :href="url+'/products/'+product.slug">
                        <span class="product-suggestion-title">{{ product.title }}</span>
                        <br>
                        {{ product.price }} ৳
                    </a>
                </li>
            </ul>
        </div>
        
     </div>

</template>

<script>
    export default {
        props: {
            url: {
              type: String,
              required: true
            }
          },
        mounted() {
            
        },
        data(){
            return {
              search_text: '',
              products: []
            }
          },
          methods: {
            searchProducts(){
              var app = this;
              // console.log(app.search_text);
              if (app.search_text.length > 0) {
                axios.get(app.url+'/api/products/search/'+app.search_text)
                  .then((response) => {
                    // console.log(response)
                    app.products = response.data.products;
                  })
                  .catch((e) => {
                    console.log(e);
                  })
              }else{
                app.products = [];
              }
              
            }
        }

    }
</script>
