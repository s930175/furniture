<template>
<NavbarView></NavbarView>
  <!-- <nav id="nav">
    <router-link to="/">Home</router-link> |
    <router-link to="/product">Product</router-link> |
    <router-link to="/cart">Cart</router-link> |
    <router-link to="/login" class="login d-show">Login</router-link>
    TODO:logout畫面
    <router-link to="/logout" class="logout d-none">Logout</router-link>
  </nav> -->
  <router-view />
<FooterView></FooterView>
</template>
<script>
import NavbarView from "./components/NavbarView.vue"
import FooterView from "./components/FooterView.vue"

export default {
  components: {
    NavbarView,
    FooterView,
  },
  methods:{

  }
}

</script>

<style lang="less">
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}

#nav {

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
