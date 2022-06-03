<template>
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
  />
  <div class="wrap">
    <div class="item">
      <div class="icon">
        <i class="fa-solid fa-gear"></i>
      </div>
      <div class="txt">
        <h3>Lorem ipsum dolor sit.</h3>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic illum
          nisi officia beatae exercitationem quasi dolores quos? Reiciendis,
          impedit laudantium.
        </p>
      </div>
    </div>
    <div class="item">
      <div class="icon">
        <i class="fa-solid fa-fire"></i>
      </div>
      <div class="txt">
        <h3>Lorem ipsum dolor sit.</h3>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic illum
          nisi officia beatae exercitationem quasi dolores quos? Reiciendis,
          impedit laudantium.
        </p>
      </div>
    </div>
    <div class="item">
      <div class="icon">
        <i class="fa-solid fa-hand-holding-dollar"></i>
      </div>
      <div class="txt">
        <h3>Lorem ipsum dolor sit.</h3>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic illum
          nisi officia beatae exercitationem quasi dolores quos? Reiciendis,
          impedit laudantium.
        </p>
      </div>
    </div>
  </div>
</template>

<script>
export default {};
</script>
<style scoped>
/* * {
  margin: 0;
  padding: 0;
  list-style: none;
  font-family: Arial, Helvetica, sans-serif;
} */
body {
  display: flex;
  align-items: center;
  background-image: linear-gradient(-45deg, #fffaf0, #f8c3c1);
}
.wrap {
  display: flex;
  width: 100%;
  margin: 100px auto;
  padding-top: 75px;
  justify-content: center;
}

.item {
  width: 370px;
  margin: 0 1%;
  text-align: center;
  border: 10px solid #f9cec2;
  background-color: white;
  border-radius: 20px;
  box-shadow: 10px 20px 50px #f7b6a7;
  /*左右 上下 模糊*/
}

.item h3 {
  color: #f5afac;
}

.item p {
  color: #ccc;
}
.item .icon {
  width: 150px;
  height: 150px;
  background-color: #fff;
  margin: -75px auto 0;
  /*破格*/
  font-size: 4rem;
  line-height: 150px;
  /*單行文字垂直置中*/
  border-radius: 50%;
  color: #f5afac;
  position: relative;
}
.item .icon::before {
  content: "";
  position: absolute;
  width: 100%;
  height: 100%;
  border-top: 10px solid #f9cec2;
  border-right: 10px solid #f9cec2;
  border-bottom: 10px solid transparent;
  border-left: 10px solid transparent;
  left: -10px;
  top: -10px;
  border-radius: 50%;
  transform: rotate(-45deg);
}
.item:hover .fa-solid {
  animation: shakes 0.3s linear infinite alternate;
}
.item .txt {
  padding: 20px 20px 2em;
}
@keyframes shakes {
  0% {
    transform: rotate(-10deg);
  }
  100% {
    transform: rotate(10deg);
  }
}
</style>