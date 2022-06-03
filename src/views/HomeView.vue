<template>
  <Carouse></Carouse>
  <MainView></MainView>
  <FooterView></FooterView>
</template>

<script>
// @ is an alias to /src
import HelloWorld from '@/components/HelloWorld.vue'
import Carouse from "../components/CarouselView.vue"
import MainView from "../components/MainView.vue"
import FooterView from '@/components/FooterView.vue'

export default {
  components: {
    HelloWorld,
    Carouse,
    MainView,
    FooterView
  }
}
</script>
