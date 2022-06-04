<template>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
  <nav>
    <h1>NavBar</h1>
    <div class="nmsl">
      <div class="main-nav">
        <router-link class="main_option" to="/">首頁</router-link>
        <router-link class="main_option" to="/product">所有產品</router-link>
        <router-link class="main_option" to="/cart">結帳</router-link>
        <router-link class="main_option" to="/login">登入</router-link>
        <router-link class="main_option" to="/add" >加入會員</router-link>

      </div>
      <label for="switch"><i class="fa-solid fa-burger"></i></label>
      <!--漢堡按鈕圖示-->
      <input type="checkbox" id="switch" />
      <!--選單開關-->
      <ul class="menu">
        <!--選單內容-->
        <li><a href="##">Home</a></li>
        <li><a href="##">About</a></li>
        <li><a href="##">Graphy</a></li>
        <li><a href="##">Intro</a></li>
        <li><a href="##">Contact</a></li>
      </ul>
    </div>
  </nav>
</template>

<script>
export default {
  data() {
    return {
      filter: "all",
    };
  },
  mouted() {
    //用來塞入BS的JS
    (function () {});
  },
};
</script>
<style scoped lang="less">
* {
  margin: 0;
  padding: 0;
  list-style: none;
  text-decoration: none;
  box-sizing: border-box;
  font-family: Arial, Helvetica, sans-serif;
}
nav {
  background: #eee;
  box-shadow: 0 3px 5px #63636388;
  height: 72px;
}
nav::after {
  content: "";
  display: block;
  clear: both;
  position: relative;
}
h1 {
  float: left;
  padding-left: 5%;
  line-height: 72px;
  font-size: 26px;
}
.nmsl {
  height: 72px;
}
.main-nav {
  display: flex;
  justify-content: space-around;
  width: 60%;
  font-size: 16px;
}
.main-nav .main_option {
  line-height: 72px;
  color: #000;
}
/* 隱藏 */
input {
  display: none;
}
/* 漢堡本人 */
label {
  /* float: right; */
  position: absolute;
  top: -5%;
  right: 0;
  left: 90%;
  bottom: 0;
}
i {
  margin: 30px 10px 0 0;
  font-size: 28px;
  line-height: 92px;
}
/* 選單列 */
.menu {
  /* clear後可以把東西往下擠(文不繞圖)，將東西移動到float外的下方 */
  clear: both;
  background: #fff;
  /* 高度設為0，超出高度0的隱藏 */
  max-height: 0;
  overflow: hidden;
  display: flex;
  justify-content: space-around;
  margin-bottom: 20px;
  box-shadow: 0 3px 5px #63636388;
}
.menu li {
  text-align: center;
  border-bottom: 1px solid #efefef;
  /* width: 100px; */
}
.menu li a {
  display: block;
  padding: 10px 0;
  font-size: 18px;
  color: #5d5d5d;
  transition: 0.5s;
}
.menu li a:hover {
  background: #5d5d5d;
  color: #fff;
  padding: 10px;
}
/* 當checkbox:checked時， max-height最高高度可以讓list完全顯示 */
input:checked ~ .menu {
  max-height: 250px; /* 50*5 */
}

.main-nav {
  a {
    font-weight: bold;
    color: #2c3e50;
    text-decoration: none;
    text-shadow: #aaa;

    &.router-link-exact-active {
      color: #aaa;
    }
  }
}
</style>