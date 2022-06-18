<template>
  <div class="card-slider">
    <div class="card-slider-items">
      <transition-group name="flip-list">
        <div
          class="card-slider-item"
          v-for="item in showImages"
          :key="item.id"
          :data-id="item.id"
        >
          <a><img :src="item.src" /></a>
        </div>
      </transition-group>
    </div>
  </div>
  <!-- <Describe :parentDesc="item.desc"></Describe> -->
  
  <!-- 輪播圖按鈕 < >  -->
  <div class="btn">
    <button @click="change(now - 1)" class="btnPrev">
      <i class="fa-solid fa-angle-left"></i>
    </button>
    <button @click="change(now + 1)" class="btnNext">
      <i class="fa-solid fa-angle-right"></i>
    </button>
  </div>
</template>

<script>
import Describe from "./DescribeView.vue";
import Carouse from "./CarouselView.vue";

export default {
  components: {
    Describe,
    Carouse,
  },
  data() {
    return {
      //切換
      now: 0,
      count: 0,
      imgs: [],
      count: 0,
    };
  },
  computed: {
    allImages() {
      // 10 + 4
      const ary = [];
      const total = this.imgs.length;
      let count;
      if (total > 0) {
        while (ary.length < 28 + 4) {
          count = Math.floor(ary.length / total);
          for (let i = 0; i < total; i++) {
            ary.push({
              id: count + "-" + this.imgs[i].id,
              src: this.imgs[i].src,
            });
            // console.log(count + "-" + this.imgs[i].id);
          }
        }
      }
      return ary;
    },
    showImages() {
      const start = this.now - 4;
      return this.allImages.slice(start).concat(this.allImages.slice(0, start));
    },
  },
  methods: {
    change(index) {
      const limit = this.allImages.length - 1;
      this.now = index < 0 ? limit : index > limit ? 0 : index;
      // if (index < 0) {
      //   this.now = limit
      // } else if (index > limit) {
      //   this.now = 0
      // } else {
      //   this.now = index
      // }
    },
  },
  watch: {},
  async created() {
    //用來塞入BS的JS
    (function () {});
    const { data:res } = await this.$axios.get(
      "./getProduct.php"
    );
    // console.log(res)
    // console.log('nmsl')
    this.imgs = res
  },
};
// $(document).ready(function () {
//   var dataUrl = "http://localhost:8080/furniture_imgs/home.json";
//   $.ajax({
//     url: dataUrl,
//     method: "GET",
//     dataType: "json",
//     data: "",
//     async: true,
//     success: (res) => {
//       console.log(res);
//       vm.information = res;
//     },
//     error: (err) => {
//       console.log(err);
//     },
//   });
// });
</script>

<style scoped>
button {
  border: none;
  background-color: transparent;
}
.card-slider {
  display: flex;
  width: 100%;
  overflow: hidden;
}
.card-slider-items {
  z-index: -1;
  display: flex;
  width: 100%;
  margin-left: calc(-25% * 2.5);
}
.card-slider-item {
  z-index: -1;
  flex: calc(15% - 20px) 0 0;
  margin: 10px;
  padding: 10px;
}
.card-slider-item:hover {
  width: 800px;
}
.card-slider-item:first-child,
.card-slider-item:last-child {
  z-index: -10;
  visibility: hidden;
  border: transparent;
}

img {
  width: 100%;
  border: transparent;
}

.flip-list-move {
  transition: transform 0.5s;
}
.btn {
  margin: 10px;
}
</style>


