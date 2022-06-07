<template>
  <div class="d-inline-block">
    <div class="card me-3 mb-3">
      <img :src="src" alt="" />
      <div class="porduct">
        <p class="porduct_name">
          產品: <strong>{{ name }}</strong>
        </p>
        <p>價錢: {{ price }}</p>
        <p class="desc">商品描述: {{ desc }}</p>
        <button class="learn">查看更多</button>
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
export default {
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
      // this.cartList=this.cartList.push(this.cartList)
      // this.cartList =JSON.stringify([{ id: this.id, count: this.count,name:this.name,price:this.price }])
      // localStorage.setItem("ProductCount", this.cartList);
      // this.count = localStorage.getItem('ProductCount')
    },
  },
  computed: {
    ProductCount() {
      return localStorage.getItem("ProductCount");
    },
  },
  props: ["id", "price", "src", "name", "desc"],
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
}
</style>