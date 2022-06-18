<template>
 <nav class="navbar navbar-expand-lg navbar-light text-nowrap mb-1" style="background-color:rgb(242, 233, 224)">
  <div class="container py-3">

    
      <router-link to="/" class="navbar-brand mx-auto">
      <div class="logoMask">HA家居</div>
      </router-link>
    

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse fs-5" id="navbarSupportedContent">
      <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
        <li class="nav-item mx-5">
          <router-link class="nav-link" aria-current="page" to="/">首頁</router-link>
        </li>

        <li class="nav-item mx-5">
          <router-link class="nav-link" to="/product">所有產品</router-link>
        </li>

        <!-- 待更改 -->
        <li class="nav-item dropdown mx-5">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            各項優惠
          </a>
          <ul class="dropdown-menu menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">買五送一</a></li>
            <li><a class="dropdown-item" href="#">特價50%off</a></li>
            <li><a class="dropdown-item" href="#">0元起標</a></li>
            <li><a class="dropdown-item" href="#">優惠活動</a></li>
            <li><a class="dropdown-item" href="#">滿千送百</a></li>
          </ul>
        </li>

        <li class="nav-item mx-5">
          <router-link class="nav-link" to="/login">會員</router-link>
        </li>
        <li class="nav-item mx-5">
          <router-link class="nav-link" to="/cart"><i class="bi bi-cart3"></i></router-link>
        </li>

        
      </ul>
    </div>
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

<style lang="less">
// mask為logo設定
.navbar{
  z-index: 100;
}
.logoMask {
  display: flex;
  margin: auto 10px;
  font-size: 3rem;
  font-weight: 1000;
  color: transparent;
  // background-clip: text背景被剪裁成文字圖樣
  background-clip: text;
  background-image: url("../assets/logo-bg.jpg");
  /* background-repeat: no-repeat; */
  background-position: center center;
  background-size: cover;
}
.navbarColor{
background-color:rgb(242, 233, 224);
box-shadow:0px 0px 8px rgb(68, 54, 43);
}

.nav-item a{
  color:rgb(68, 54, 43)
}

.nav-item a:hover {
  text-decoration: underline;
  text-decoration-color: rgb(68, 54, 43);
}


.menu li a:hover {
  background:rgb(68, 54, 43) ;
  color: #fff;
}
</style>