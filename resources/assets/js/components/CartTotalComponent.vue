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
    console.log("URL", app.url);
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
      console.log("Allah Help");
      var app = this;
      console.log("value");
      console.log(value);
      app.totals = value;
    }
  },
  created() {
    bus.$on("totalItemChanged", data => {
      this.totals = data;
      console.log(data);
    });
  }
};
</script>
