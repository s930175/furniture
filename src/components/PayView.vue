<template>
  <h1>你的訂單</h1>
  <div>
    <ul>
      <li>商品名:{{ name }} 價格:{{ price }} 數量:{{ count }}</li>
      <!-- <li>{{}}</li>
      <li>{{}}</li> -->
    </ul>
  </div>
  <!-- <p>{{ cartList }}</p> -->
</template>
<script>
export default {

//$emit到cartview
    props:["name", "price", "count"," desc "]
};
</script>
<style scoped>
</style>