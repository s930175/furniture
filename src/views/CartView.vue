<template>
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
  />
   <div :class="summ == 0 ? 'd-show' : 'd-none'">
    <div class="payCart-row">
      <div class="payCart-container">
        <tr>
          <td>訂單編號</td>
          <td>訂購人</td>
          <td>訂購產品</td>
          <td>總額</td>
        </tr>
        <hr>
        <tr v-for="payCart in payCarts" :key="payCart.id">
          <td>{{payCart["id"]}}</td>
          <td>{{payCart["user_name"]}}</td>
          <td>{{payCart["product_name"]}}</td>
          <td>{{payCart["amount"]}}</td>
        </tr>
      </div>
    </div>
  </div>
  <div>
    <form
      action="http://localhost/connect/getCart.php"
      method="post"
      target="hidefrime"
    >
      <input
        class="d-none"
        id="p2"
        type="text"
        v-model="cartUser"
        name="cartUsers"
      />
      <input
        type="submit"
        :class="summ == 0 ? 'd-show' : 'd-none'"
        value="查看我的訂單"
        @click="payCart"
      />
    </form>
    <iframe name="hidefrime" class="d-none"></iframe>
  </div>
  <div class="cartbody">
    <form
      action="http://localhost/connect/doCart.php"
      method="POST"
      target="hidefrime"
    >
      <h1 class="h1">{{ finish }}</h1>
      <ul class="order">
        <li v-for="shop in addcartList" :key="shop.id">
          <strong>商品名:</strong>{{ shop.name }} <strong>價格:</strong
          >{{ shop.price }} <strong>數量:</strong>{{ shop.count }}
        </li>
        <input
          class="d-none"
          id="p1"
          type="text"
          v-model="pro"
          name="chooseproduct"
        />
        <input
          class="d-none"
          id="p1"
          type="text"
          v-model="pro2"
          name="chooseproduct2"
        />
        <input
          class="d-none"
          id="p2"
          type="text"
          v-model="cartUser"
          name="cartUser"
        />
        <p class="p" :class="summ == 0 ? 'd-none' : 'd-show'">
          共計:{{ summ }} 元
        </p>
        <input class="d-none" type="text" v-model="why" name="amount" />
      </ul>
      <button
        :class="summ == 0 ? 'd-none' : 'd-show'"
        class="order-btn"
        @click="clearCart"
      >
        清除
      </button>
      <input
        :class="summ == 0 ? 'd-none' : 'd-show'"
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
// import PayView from "@/components/PayView.vue";
export default {
  components: {
    Describe,
    // PayView,
  },
  data() {
    return {
      cartList: [],
      user: "",
      pro: [],
      pro2: [],
      fin: "未完成訂單",
      why: 0,
      payCarts: [],
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
      for (let a = 0; a < copy.length; a++) {
        this.pro.push(copy[a].count);
        this.pro2.push(copy[a].name);
        // console.log(this.pro);
      }
      // console.log(this.pro);
      this.pro = this.pro.join("、");
      this.pro2 = this.pro2.join("、");
      // console.log(this.pro);
      // console.log(this.pro2);
      return copy;
    },
    cartUser() {
      if (!localStorage.getItem("user")) return; //如果localstorage沒有值就return
      this.user = JSON.parse(localStorage.getItem("user"));
      // console.log(this.user.account);
      return this.user.account;
    },
    finish() {
      if (!localStorage.getItem("ProductCount")) {
        this.fin = "無未完成訂單";
      } else {
        this.fin = "尚未完成的訂單";
      }
      return this.fin;
    },
    summ() {
      let sum = 0;
      if (localStorage.getItem("ProductCount")) {
        this.addcartList.forEach(function (shop) {
          sum += shop.price * shop.count;
        });
        // console.log(sum);
        this.why = sum;
        // console.log(this.why)
        return sum;
      } else {
        return 0;
      }
    },
  },
  methods: {
    clearCart() {
      this.cartList = localStorage.removeItem("ProductCount");
    },
    pay() {
      // this.addcartList.forEach(function (shop) {
      //   this.sum += shop.price * shop.count;
      //   return this.sum;
      // });
      this.cartList = localStorage.removeItem("ProductCount");
      this.fin = "無未完成訂單";
      $(".list").removeClass("d-none");
      let data = new FormData();
      // data.append('要POST出去的東西', 輸入值)
      data.append("chooseproduct", this.pro);
      data.append("chooseproduct2", this.pro2);
      data.append("cartUser", this.user.account);
      data.append("amount", this.why);
      // console.log(this.pro);
      // console.log(this.pro2);
      // console.log(this.user.account);
      // console.log(this.why);
      // let { data: result } = await this.$axios.post(
      //   "./doCart.php",
      //   data
      // );
      // console.log(result);
      localStorage.removeItem("ProductCount");
    },
    async payCart() {
      let data = new FormData();
      data.append("cartUsers", this.user.account);
      // console.log(this.user.account)
      const { data: cartDatas } = await this.$axios.post(
        // POST要記得加data!!!!!!!!!!!!!!
        "http://localhost/connect/getCart.php",
        data
      );
      // console.log(cartDatas);
      this.payCarts = cartDatas;
      console.log(this.payCarts);
    },
  },
  // async created() {
  //   let data = new FormData();
  //   data.append("cartUser", this.user.account);
  // },
};
</script>

<style scoped>
.cartbody {
  height: 700px;
}
.h1 {
  margin-top: 50px;
}
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
.payCart-row{
  display: flex;
  justify-content: center;
}
.payCart-container{
  padding: 10px;
}
.payCart-container td{
  width: 200px;
  padding: 0;
}
</style>
