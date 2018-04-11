<template>
  <div>
    <top title="商品详情"></top>
    
    <!--banner-->
    <div class="swiper-container datail-banner">
        <img :src="product.img" >
    </div>

    <section class="tle">
    	<div class="datailTop-box">
        	<div class="title"><span class="god">CARTIER</span> {{product.name}}</div>
            <div class="bon clearfix">
            	<div class="left">
                	<p>价格</p>
                    <p class="bold">¥ {{product.price}}</p>
                </div>
                <div class="middle">
                	<p>详情</p>
                    <p class="bold">{{product.detail}}</p>
                </div>
                <div class="right"></div>
            </div>
        </div>
        <div class="padb">
            
        </div>
    </section>

	<div class="Ldatailbottom borderTop clearfix">
    	<div class="Lkh borderRight"></div>
        <div class="Lsc borderRight"></div>
        <div class="Lh borderRight" @click="routerCart">进入购物车</div>
        <div class="Ljr" @click="addCart">加入购物车</div>
        <!--<div class="Lbtn"> </div>-->
    </div>
  </div>
</template>

<script>
  
import top from './top';

export default {
  name: 'product',
  components:{
    top
  },
  data() {
    return {
      product:{
       
        name:''
      }
    }
  },
  created(){
    this.$http.get('/api/product.php?id='+this.$route.params.id).then(function(res){
      var data = res.data
      if(data.status == 1){
        data.product.img = '/api' + data.product.img
        Object.assign(this.product, data.product)
      }
    })
  },
  computed:{
  
  },
  methods:{
    routerCart(){
      // 等价, 路由跳转router-link的第二种方法
      this.$router.push('/detail')
      // this.$router.push({name:'cart'})
    },
    addCart(){
      this.$http.post('/api/cart.php', {pid:this.$route.params.id}).then(res => {
        let data = res.data
        if(data.status == 1){
         alert('购买成功')
        }
      })
    }
    
  }
}
</script>

<!-- 如果写上scoped 那么样式只能在这个组件上使用 -->
<style scoped>

</style>
