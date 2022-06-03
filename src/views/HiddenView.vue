<template>
  <Describe
    v-for="item in showProducts"
    :key="item.id"
    :="item"
    @choosen="putIntoCart"
  ></Describe>
</template>
<script>
import Describe from "../components/DescribeView.vue";
export default {
  components: {
    Describe,
  },
  methods: {
    putIntoCart(info) {
      this.imgs.map(function (item) {
        if (item.id == info.id) {
          item.count = info.count;
        }
      });
      console.log(this.imgs);
    },
  },
};
</script>
<style scoped>
</style>