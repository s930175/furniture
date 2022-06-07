<template>
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
  />
  <div>
    <form action="" method="post" target="hidefrime">
      <h1>你的訂單</h1>
      <ul class="order">
        <li v-for="shop in addcartList" :key="shop.id">
          <strong>商品名:</strong>{{ shop.name }} <strong>價格:</strong
          >{{ shop.price }} <strong>數量:</strong>{{ shop.count }}
              <input id="p1" type="text" v-model="shop.name" name="chooseproduct"/>
              <input id="p2" type="text" v-model="cartUser" name="cartUser"/>
        </li>
        <!-- <p>共計:{{ this.sum }}</p> -->
      </ul>
      <button class="order-btn" @click="clearCart">清除</button>
      <input
        class="order-btn"
        @click="pay"
        type="submit"
        name="cart"
        value="結帳"
      />
    </form>
    <iframe name="hidefrime" class="d-none"></iframe>
  </div>

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
      sum: 0,
      user:"",
      pro:[],
    };
  },
  computed: {
    addcartList() {
      if (!localStorage.getItem("ProductCount")) return; //如果localstorage沒有值就return
      this.cartList = JSON.parse(localStorage.getItem("ProductCount"));
      const copy = [];
      for (let i = 0; i < this.cartList.length; i++) {
        if (this.cartList[i].count > 0) {
          copy.push(this.cartList[i]);
        }
      }

      // 傳入後端的東西
      for(let a= 0; a<copy.length; a++){
        this.pro.push(copy[a].id) 
        // console.log(this.pro);
      }
      
      // console.log(this.pro)
      return copy;
    },
    cartUser(){
      if (!localStorage.getItem("user")) return; //如果localstorage沒有值就return
      this.user = JSON.parse(localStorage.getItem("user"));
      // console.log(this.user.account);
      return this.user.account;
    },
    // sum() {
    //   let total = 0;
    //   this.addcartList.forEach(function (shop) {
    //     total += shop.price * shop.count;
    //     return total;
    //   });
    // },
  },
  methods: {
    clearCart() {
      this.cartList = localStorage.clear();
    },
    async pay() {
      // this.addcartList.forEach(function (shop) {
      //   this.sum += shop.price * shop.count;
      //   return this.sum;
      // });
      $(".list").removeClass("d-none");
      let data = new FormData();
        // data.append('要POST出去的東西', 輸入值)
        data.append("chooseproduct", this.pro);
        data.append("cartUser", this.user.account);
        console.log(this.pro)
        console.log(this.user.account)
        // console.log(result);
  //  接下來寫PHP把POST的東西接住
  // 再用PHP傳出資料庫訂單內容
    },
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
.fa-xmark {
  padding-left: 10px;
}
.order {
  padding: 30px;
}
.order strong {
  padding-left: 50px;
}
.order-btn {
  border: 1px solid #aaa;
  border-radius: 30px;
  background-color: #eee;
  padding: 10px;
  margin-top: 400px;
}
</style>

