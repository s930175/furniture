<template>
  <a @click="productFilter = 'all'" href="javascript:;"><strong>所有商品</strong></a> |
  <a @click="productFilter = 'buy'" href="javascript:;"><strong>購物車</strong></a>
  <Carouse></Carouse>
  <Describe
    @choosen="putIntoCart"
    v-for="item in showProducts"
    :key="item.id"
    :="item"
  >
  </Describe>
  <router-link to="/cart" class="pay" @click="haha">結帳</router-link>
  <!-- <PayView :count="item.count" v-for="item in showProducts" :key="item.id" :="item"></PayView> -->
  <!-- <router-link to="/cart"><a @click="productFilter='buy'" href="javascript:;">結帳</a></router-link> -->
</template>

<script>
import Describe from "../components/DescribeView.vue";
import Carouse from "../components/CarouselView.vue";
import PayView from "../components/PayView.vue";
export default {
  components: {
    Describe,
    Carouse,
    PayView,
  },
  data() {
    return {
      // choosenProduct: localStorage.setItem("choosenProduct") || [],
      // choosenProduct:[],
      productFilter: "all",
      cartList: [],
      imgs: []
    };
  },
  computed: {
    showProducts() {
      switch (this.productFilter) {
        case "all":
          return this.imgs;
          break;
        case "buy":
          this.cartList = JSON.stringify(this.imgs);
          localStorage.setItem("ProductCount", this.cartList);
          return this.imgs.filter((item) => item.count > 0);
      }
    },
  },
  methods: {
    putIntoCart(info) {
      this.imgs.map(function (item) {
        if (item.id == info.id) {
          item.count = info.count;
        }
      });
      // console.log(this.imgs);
    },
    haha() {
      this.cartList = JSON.stringify(this.imgs);
      localStorage.setItem("ProductCount", this.cartList);
    },
  },
  watch: {},
  // mounted() {

  //   axios.get('../furniture_imgs/home.json')
  //   .then(response => this.information = response)
  // },
    async created() {
    //用來塞入BS的JS
    (function () {});
    const { data:res } = await this.$axios.get(
      "http://localhost/connect/getProduct.php"
    );
    console.log(res)
    // console.log('nmsl')
    this.imgs = res
  },
};
</script>

<style scoped>
img {
  width: 100%;
  border: transparent;
}
a {
  margin: 40px;
  text-decoration: none;
  color: black;
  font-family: Arial, Helvetica, sans-serif;
}
.pay {
  padding: 10px;
  border: 1px solid #aaa;
  border-radius: 5px;
}
</style>

