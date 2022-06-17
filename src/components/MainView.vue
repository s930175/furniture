<template>
  <!-- 活動輪播圖 -->
  <div class="container-fruid mb-3">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
          aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
          aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
          aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="../assets/carousel1.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="../assets/carousel2.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="../assets/carousel3.jpg" class="d-block w-100" alt="...">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>

  <div class="col-10 mx-auto">
    <hr class="hrBorder">
  </div>


  <!-- 暢銷產品cards -->
  <div class="container-fruid">
    <div class="col-10 mx-auto">
      <h2 class="text-start"><i class="bi bi-trophy"></i>人氣產品</h2>
      <h5 class="text-start">心動不如馬上行動！現在就拿起 他/她 的魔法小卡刷下去！</h5>

      <div class="row d-flex flex-nowrap scroll">
        <div class="col-sm">
          <img src="https://i.imgur.com/IJrYTO0.jpg" style="width:150;height: 150px ;" alt="">
          <h4>摺疊桌</h4>
          <p>$ 3,000</p>

        </div>

        <div class="col-sm">
          <img src="https://i.imgur.com/DTi2LW6.jpg" style="width:150;height: 150px ;" alt="">
          <h4>辦公椅</h4>
          <p>$ 886</p>
        </div>

        <div class="col-sm">
          <img src="https://i.imgur.com/dzRCeXF.jpg" style="width:150;height: 150px ;" alt="">
          <h4>長形置物櫃</h4>
          <p>$ 4,580</p>
        </div>

        <div class="col-sm">
          <img src="https://i.imgur.com/ybGjsoz.jpg" style="width:150;height: 150px ;" alt="">
          <h4>工作檯燈</h4>
          <p>$ 1,440</p>
        </div>

        <div class="col-sm">
          <img src="https://i.imgur.com/XdhyLfX.jpg" style="width:150;height: 150px ;" alt="">
          <h4>塑膠椅</h4>
          <p>$ 250</p>
        </div>

        <div class="col-sm">
          <img src="https://i.imgur.com/1Bstdzb.jpg" style="width:150;height: 150px ;" alt="">
          <h4>壁掛式摺疊桌</h4>
          <p>$ 800</p>
        </div>

        <div class="col-sm">
          <img src="https://i.imgur.com/iU7pFe6.jpg" style="width:150;height: 150px ;" alt="">
          <h4>沙發椅</h4>
          <p>$ 1,450</p>
        </div>

      </div>
    </div>
  </div>

  <div class="col-10 mx-auto">
    <hr class="hrBorder">
  </div>

  <!-- 家具特輯 -->
  <div class="container-fruid" >
    <div class="col-10 d-md-flex mx-auto">

      <div class="p-1 col-md-4">
        <div class="card">
          <img src="../assets/logo-bg.jpg" class="card-img-top" style="width: 100%;" alt="...">
          <div class="card-body my-1">
            <h5 class="card-text">春夏活動開跑啦</h5>
            <p>...<a style="color:rgb(68, 54, 43)" href="#">繼續閱讀</a></p>
          </div>
        </div>
      </div>

      <div class="p-1 col-md-4">
        <div class="card">
          <img src="../assets/logo-bg.jpg" class="card-img-top" style="width: 100%;" alt="...">
          <div class="card-body my-1">
            <h5 class="card-text">秋冬活動開跑啦</h5>
            <p>...<a style="color:rgb(68, 54, 43)" href="#">繼續閱讀</a></p>
          </div>
        </div>
      </div>

      <div class="p-1 col-md-4">
        <div class="card">
          <img src="../assets/logo-bg.jpg" class="card-img-top" style="width: 100%;" alt="...">
          <div class="card-body my-1">
            <h5 class="card-text">負責人開跑啦</h5>
            <p>...<a style="color:rgb(68, 54, 43)" href="#">繼續閱讀</a></p>
          </div>
        </div>
      </div>

    </div>
  </div>

  <div class="col-10 mx-auto">
    <hr class="hrBorder">
  </div>

  <!-- 如何購買 -->
  <div class="container-fruid">
    <div class="col-10 mx-auto">
      <h1 class="text-center">如何購買</h1>
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
  padding: 0;
  list-style: none;
  font-family: Arial, Helvetica, sans-serif;
}

.hrBorder {
  margin: 10 0 10 0;
  border: 5px;
}

.scroll {
  overflow-x: auto;
}

/* 滾動條整體，可以設置寬度等 */
.scroll::-webkit-scrollbar {
  width: 5px;
  height: 10px;
}

/* scrollbar-track 為外層軌道 */
.scroll::-webkit-scrollbar-track {
  border-radius: 10px;
  background: rgb(242, 233, 224);

}

/* scrollbar-thumb滾動的滑條 */
.scroll::-webkit-scrollbar-thumb {
  border-radius: 10px;
  background: rgb(68, 54, 43);
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