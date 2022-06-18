<template>
  <div class="d-inline-block">
    <div class="card me-3 mb-3">
      <img :src="src" alt="" />
      <div class="porduct">
        <p class="porduct_name">
          產品: <strong>{{ name }}</strong>
        </p>
        <p>價錢: {{ price }}</p>
        <p class="desc">產品描述: {{ desc }}</p>


        <div class="modal-overlay">
          <div class="modal-container">
            <h3>產品:{{ this.name }}</h3>
            <img :src="src" alt="" />
            <p>材質:{{ material }}</p>
            <p>尺寸:{{ size }}</p>
            <p>描述:{{ desc }}</p>
            <button class="close-btn" @click="close">
              <i class="fa-solid fa-xmark"></i>
            </button>
          </div>
        </div>
        <button class="learn modal-btn" type="button" @click="learnMore">
          查看更多
        </button>


      </div>
      <div class="btn">
        <button class="btn-count" @click="reductCount">-</button>
        <span>{{ count }}</span>
        <button class="btn-count" @click="addCount">+</button>
        <button class="btn-add" @click="addCart">加到購物車</button>
      </div>
    </div>
  </div>
</template>
<script>
import Describe2View from "./Describe2View.vue";
export default {
  components: {
    Describe2View,
  },
  data() {
    return {
      count: 0,
      cartList: [],
    };
  },
  methods: {
    reductCount() {
      if (this.count > 0) {
        this.count--;
        this.$emit("choosen", {
          id: this.id,
          count: this.count,
          name: this.name,
          price: this.price,
        });
        this.$emit("cart", {
          id: this.id,
          count: this.count,
          name: this.name,
          price: this.price,
        });
      }
    },
    addCount() {
      if (this.count < 9) {
        this.count++;
        this.$emit("choosen", {
          id: this.id,
          count: this.count,
          name: this.name,
          price: this.price,
        });
        this.$emit("cart", {
          id: this.id,
          count: this.count,
          name: this.name,
          price: this.price,
        });
      }
    },
    addCart() {
      if (this.count == 0) {
        return false;
      }
      alert(`成功加入購物車，數量:${this.count}`);
    },
    learnMore() {
      $(".modal-overlay").addClass("open-modal");
      console.log();
    },
    close() {
      $(".modal-overlay").removeClass("open-modal");
    },
  },
  computed: {
  
  },
  props: [
    "id",
    "price",
    "src",
    "name",
    "desc",
    "category",
    "size",
    "material",
    "weight",
  ],
  // async created() {
  //   const { data: res } = await this.$axios.get(
  //     "http://localhost/connect/getProduct.php"
  //   );
  //   this.cartList = res;
  //   // console.log(res);
  //   // console.log('nmsl')
  // },
};
// TODO:篩選器，搜尋結果
</script>

<style scoped>
img {
  width: 300px;
  height: 300px;
  overflow: hidden;
  border: 1px solid #aaaaaa;
  border-radius: 30px;
}
.card {
  display: flex;
  flex-direction: column;
  vertical-align: middle;
  padding: 10px 5px;
  height: 560px;
}
.product {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  height: 255px;
}
.desc {
  width: 300px;
  height: 110px;
}
.btn-count {
  font-size: 16px;
  border: none;
  border-radius: 50%;
  margin: 10px;
  background-color: #eee;
}
.btn-add {
  margin: 5px;
  padding: 5px;
  border: 1px solid #aaa;
  border-radius: 10px;
}
.learn {
  padding: 3px;
  border: 1px solid #aaa;
  border-radius: 10%;
  margin: 5px;
  cursor: help;
}
.modal-overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(255, 255, 255, 0.05);
  display: grid;
  place-items: center;
  transition: var(--transition);
  visibility: hidden;
  z-index: -10;
}
.modal-container {
  width: 400px;
  height: 600px;
  padding: 10px;
  box-sizing: border-box;
  position: relative;
  background-color: #eee;
}
.close-btn {
  position: absolute;
  left: 93%;
  bottom: 95%;
  font-size: 22px;
  border: transparent;
  cursor: grab;
}
.open-modal {
  visibility: visible;
  z-index: 10;
}
</style>