<template>
  <div class="banner"></div>
  <div class="sec">
    <div class="container0">
      <div class="row">
        <div class="item col-sm">
          <h2>Lorem, ipsum dolor.</h2>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas,
            consequatur.
          </p>
          <p>
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nam
            corporis molestias necessitatibus repudiandae laborum! Vitae
            eligendi minima asperiores in atque?
          </p>
        </div>
        <div class="item col-sm">
          <h2>Lorem, ipsum dolor.</h2>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas,
            consequatur.
          </p>
          <p>
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nam
            corporis molestias necessitatibus repudiandae laborum! Vitae
            eligendi minima asperiores in atque?
          </p>
        </div>
      </div>
    </div>
  </div>
  <div class="wrap">
    <div class="container">
      <h1>Lorem ipsum dolor sit ipsum</h1>
      <div class="txt row">
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus
          necessitatibus et dolores iste, temporibus tenetur dolor dolorum
          alias? Animi iusto voluptates non sit optio, aut eos dolor eveniet nam
          explicabo.Dolor dolorum alias?
        </p>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat ipsum
          reiciendis, nesciunt voluptatem in deserunt reprehenderit eveniet
          facere mollitia, tenetur quis dolorem corporis quos omnis iusto cum
          rem! Nesciunt perferendis exercitationem modi vero possimus ab.
        </p>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci
          laborum quas quos dicta sint itaque ipsam, maxime ea amet maiores
          facere ad voluptatum similique incidunt molestiae commodi perspiciatis
          ratione aliquid? Atque quod quaerat possimus at fugiat ad maiores,
          expedita est.
        </p>
      </div>
    </div>
  </div>
  <div class="how">
    <h1>如何購買</h1>
    <ul>
      <li>進入產品頁面</li>
      <li>↓</li>
      <li>選擇數量，並加到購物車</li>
      <li>↓</li>
      <li>進入產品頁面中的<strong style="color:red">購物車子畫面</strong>確認最終數量及產品</li>
      <li>↓</li>
      <li>進入訂單畫面，點選結帳</li>
      <li>↓</li>
      <li>恭喜完成!!</li>
    </ul>
    <router-link to="/product" class="routerLink">立即開始→</router-link>
  </div>
</template>

<script>
export default {
  data() {
    return {};
  },
};
</script>

<style scoped>
* {
  margin: 0;
  padding: 0;
  list-style: none;
  font-family: Arial, Helvetica, sans-serif;
}
.banner {
  height: 500px;
  background: url("https://picsum.photos/1440/300?random=10") center top / cover;
}
.sec {
  position: relative;
}
.sec .container0 {
  width: 100%;
  margin: auto;
  display: flex;
  padding: 50px 0;
  position: relative;
  z-index: 2;
  background-color: beige;
}
.sec .item {
  width: 75%;
  margin: 10px 50px;
  border: 1px solid #aaa;
  border-radius: 20px;
  box-shadow: 3px 3px 5px 4px #ddd;
}
.sec .item h2 {
  margin-bottom: 1.3em;
  text-shadow: 2px 2px 2px #bbb;
}
.sec .item p {
  line-height: 1.7;
  margin-bottom: 1.6em;
}
.sec::after {
  content: "";
  display: block;
  position: absolute;
  width: 150px;
  height: 150px;
  background-color: beige;
  top: 0;
  left: 50%;
  transform: translateX(-30%) translateY(-60%);
  border-radius: 50%;
  box-shadow: 178px 0 0 60px beige, 327px 34px 0 20px beige, 480px 9px 0 60px beige,
    690px 71px 0 60px beige, 880px 0 0 89px beige, -178px 0 0 30px beige,
    -320px 34px 0 20px beige, -480px 9px 0 60px beige, -690px 71px 0 60px beige,
    -1100px 0 0 89px beige, 100px 0 0 56px rgba(0, 0, 0, 0.5),
    298px 10px 0 40px rgba(0, 0, 0, 0.5), 540px -40px 0 50px rgba(0, 0, 0, 0.5),
    740px -30px 0 30px rgba(0, 0, 0, 0.5),
    880px -100px 0 80px rgba(0, 0, 0, 0.5), 1000px 0 0 80px rgba(0, 0, 0, 0.5),
    -178px 0 0 30px rgba(0, 0, 0, 0.5), -298px 0 0 56px rgba(0, 0, 0, 0.5),
    -540px 10px 0 50px rgba(0, 0, 0, 0.5),
    -740px -40px 0 86px rgba(0, 0, 0, 0.5),
    -780px -70px 0 60px rgba(0, 0, 0, 0.5), -1200px 0 0 80px rgba(0, 0, 0, 0.5);
}
.sec::before {
  content: "";
  position: absolute;
  width: 100%;
  height: 200px;
  background-color: white;
  z-index: 1;
  top: 0;
  left: 0;
}
.wrap {
  margin: 10px 0;
}
.container {
  position: relative;
  width: 100%;
  margin: auto;
}
.container h1 {
  width: 40%;
  font-size: 45px;
  box-sizing: border-box;
  padding: 15px;
  color: #aaa;
  float: right;
  position: relative;
}
.container h1::before {
  content: "";
  display: block;
  position: absolute;
  z-index: -1;
  width: 50%;
  height: 50%;
  border: 30px solid #eee;
  bottom: 0;
  transform: rotate(20deg);
}
.container h1::after {
  content: "";
  display: block;
  /*絕對定位必定block*/
  position: absolute;
  z-index: -2;
  width: 50%;
  height: 50%;
  border: 30px solid #eee;
  /* background-color: #eee; */
  top: 0;
  transform: rotate(45deg);
}
.container .txt {
  column-count: 2;
  column-gap: 30px;
}
.container p {
  margin-bottom: 1.2em;
}

.how h1 {
  padding: 20px;
}
.how li {
  padding: 2px;
  font-size: 18px;
}
.routerLink {
  text-decoration: none;
  color: rgb(0, 0, 0);
  line-height: 4rem;
  font-size: 24px;
  border: 1px solid #aaa;
  padding: 10px;
  border-radius: 50px;
}
</style>