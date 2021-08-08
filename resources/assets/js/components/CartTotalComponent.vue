<template>
  <span class="count">{{ totals }}</span>
</template>

<script>
import { bus } from "../app";

export default {
  data() {
    return {
      totals: 0
    };
  },
  props: ["url"],
  mounted() {
    // Count total items
    var app = this;

    axios
      .get(app.url + "/api/carts/total")
      .then(response => {
        app.totals = response.data;
      })
      .catch(e => {
        console.log(e);
      });

    // app.$on('total-items', function(value){
    //  app.totals = value;
    // });
  },
  methods: {
    totalItemsCount(value) {
      var app = this;
      app.totals = value;
    }
  },
  
  created() {
    bus.$on("totalItemChanged", data => {
      this.totals = data;
    });
  }
};
</script>
