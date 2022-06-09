<template>
  <div class="container">
    <h3>產品:{{ name }}</h3>
    <img :src="src" alt="" />
    <p>材質:{{ material }}</p>
    <p>尺寸:{{ size }}</p>
    <p>描述:{{ desc }}</p>
    <!-- 關閉按鈕 -->
    <button class="close-btn" @click="close">
      <!-- 使用Font Awesome的Icon -->
      <i class="fa-solid fa-xmark"></i>
    </button>
  </div>
</template>
<script>
export default {
  data() {
    return {
        list:[]
    };
  },
  methods: {
    close() {
      $(".modal-overlay").removeClass("open-modal");
    },
  },
  computed:{
      name(){

      }
  },
  async created() {
    const { data: res } = await this.$axios.get(
      "http://localhost/connect/getProduct.php"
    );
    this.list = res;
    console.log(this.list);
  },
};
</script>
<style scoped>
.container {
  margin: 0;
  padding: 0;
}

.container img {
  width: 300px;
  height: 100%;
}
.close-btn {
  position: absolute;
  left: 93%;
  bottom: 95%;
  font-size: 22px;
  border: transparent;
  cursor: grab;
}
</style>

