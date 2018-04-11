<template>
  <div class="wrapper">
    <header>
      <aa>11111</aa>
    </header>
    <nav class="clearfix">
      <router-link to="/main/index">商品管理</router-link>
      <router-link to="/main/order">订单管理</router-link>
    </nav>
    <main>
      <router-view />
    </main>
  </div>
</template>

<script>
  import aa from './aa';
  import store from '../store'
  export default {
    name: 'main',
    data() {
      return {

      }
    },
    computed:{

    }
  }

</script>

<style scoped>
header{
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 50px;
  background-color: black;
  z-index: 10;
}
nav{
  background-color: #F5F5F5;
  width: 260px;
  position: fixed;
  top: 0;
  left: 0;
  padding-top:60px; 
  height:100vh;
}
nav a{
  float: left;
  display: inline-block;
  width: 100%;
  text-decoration: none;
  color: #428BCA;
  padding: 10px 0 10px 10px;
}
.router-link-active{
  background-color: #428BCA;
  color: white;
}
main{
  padding: 60px 0 0 280px;
}

</style>
