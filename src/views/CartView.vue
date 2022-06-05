<template>
 <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
  />
  <div>
    <h1>你的訂單</h1>
    <ul class="order">
      <li v-for="shop in addcartList" :key="shop.id">
      <strong>商品名:</strong>{{shop.name}}      
      <strong>價格:</strong>{{shop.price}}       
      <strong>數量:</strong>{{shop.count}}  <i @click="removed" class="fa-solid fa-xmark d-none"></i></li>
    </ul>
  </div>
  <button class="order-btn" @click="clearCart">清除</button>
  <button class="order-btn" @click="pay">結帳</button>
  <ol class="list d-none">
    <li>
      <i class="fa-solid fa-1"></i>
      填寫訂單
    </li>
    <li class="active">
      <i class="fa-solid fa-2"></i>
      收到訂單
    </li>
    <li>
      <i class="fa-solid fa-3"></i>
      檢貨中
    </li>
    <li>
      <i class="fa-solid fa-4"></i>
      運送中
    </li>
    <li>
      <i class="fa-solid fa-4"></i>
      已送達
    </li>
  </ol>
</template>

<script>
import Describe from "../components/DescribeView.vue";
import PayView from "@/components/PayView.vue";
export default {
  components: {
    Describe,
    PayView,
  },
  data() {
    return {
      cartList: [],
    };
  },
  computed: {
    addcartList() {
      // this.cartList = JSON.parse(localStorage.getItem('ProductCount'))
      // console.log(this.cartList)
      if (!localStorage.getItem("ProductCount")) return; //如果localstorage沒有值就return
      this.cartList = JSON.parse(localStorage.getItem("ProductCount"));
      // this.cartList.forEach(function (item) {
      //   if (item.count > 0) {
      //     return `
      // 商品名:${item.name}
      // 售價:${item.price}
      // 數量:${item.count}`;
      //   }
      // });
      // for (let i = 0; i < 9; i++) {
      //   if (this.cartList[i].count > 0) {
      //     return `
      // 商品名:${this.cartList[i].name}
      // 售價:${this.cartList[i].price}
      // 數量:${this.cartList[i].count}`;
      //   }
      // }
      const copy = [];
      for (let i = 0; i < this.cartList.length; i++) {
        if (this.cartList[i].count > 0) {
          copy.push(this.cartList[i]);
        }
      }
      console.log(copy)
      return copy;
    },
  },
  methods: {
    clearCart() {
      this.cartList = localStorage.clear();
    },
    pay() {
      let sum = 0;
      this.addcartList.forEach(function (shop) {
        sum += shop.price * shop.count;
        $(".list").removeClass('d-none')
      });
      confirm(`總共是${sum}元!!!`);
    },
    removed(){
      this.addcartList.splice(1)
      console.log(this.addcartList)
    }
  },
};
</script>

<style scoped>
img {
  width: 100%;
  border: transparent;
}
a {
  text-decoration: none;
  color: black;
  font-family: Arial, Helvetica, sans-serif;
}

* {
  margin: 0;
  padding: 0;
  list-style: none;
  font-family: Arial, Helvetica, sans-serif;
}
.list {
  width: 100%;
  display: flex;
  justify-content: center;
  margin: 50px 0 50px 0;
}
.list li {
  display: flex;
  flex-direction: column;
  justify-content: center;
  text-align: center;
  width: 100px;
  height: 100px;
  background-image: linear-gradient(9deg, #185a9d, #43cea2);
  border-radius: 50%;
  position: relative;
  font-size: 20px;
  color: #fff;
  box-shadow: 0px 0px 0px 4px #fff;
}
.list li .fa {
  font-size: 20px;
  margin-bottom: 6px;
}
.list li + li {
  margin-left: 100px;
}
.list li + li::before {
  content: "";
  position: absolute;
  width: 100px;
  height: 5px;
  background-color: #43cea2;
  z-index: -1;
  box-shadow: 0px 0px 0px 5px #fff;
  top: 0;
  bottom: 0;
  left: -100px;
  margin: auto;
}
.list li.active ~ li {
  background-image: linear-gradient(9deg, #999, #ccc);
}
.list li.active ~ li::before {
  background-color: #999;
}
.fa-xmark{
  padding-left: 10px;
}
.order{
  padding: 30px;
}
.order strong{
  padding-left: 50px;
}
.order-btn{
  border: 1px solid #aaa;
  border-radius: 30px;
  background-color: #eee;
  padding: 10px;
  margin-top: 400px;
}
</style>

