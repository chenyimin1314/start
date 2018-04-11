<template>
  <div>
 
    	<div class="zboxb borderTop" v-for="(item,index) in list">
          <div class="order-msg">
            <div class="l">订单号：{{item.id}} 总价：{{item.total}}</div>
            <div class="r" v-if="item.status == 0"><button @click="fu(index)">付款</button></div>
            <div class="r" v-if="item.status == 1">等待发货</div>
            <div class="r" v-if="item.status == 2"><button @click="que(index)">确认收货</button></div>
            <div class="r" v-if="item.status == 3">交易完成</div>
          </div>
          <div class="zbox-list borderBottom" v-for="(prod,pindex) in item.prods">
                <div class="thrbox clearfix">
                    <div class="middle">
                        <dl class="clearfix">
                            <dd><img :src="prod.img" @error="imgerr(index,pindex)"></dd>
                            <dt>
                                <p class="title"><a href="###">{{prod.name}}</a></p>
                                <p class="tow">购买数量：{{prod.cnum}}</p>
                                <p class="god1 f24">￥{{prod.price}}</p>
                            </dt>
                        </dl>
                        
                    </div>
                    <div class="right"><span></span></div>
                </div>
            </div>
       </div>
        
  </div>
</template>

<script>
  
import store from '../store'

export default {
  name: 'oder',
  data() {
    return {
    
    }
  },
  created(){
    this.fn()
  },
  computed:{
    list(){
      return store.order
    }
  },
  methods:{
    que(index){
      let order = store.order[index]
      this.$http.put('/api/order.php', {id:order.id, status:3}).then(res => {
        let data = res.data;
        if(data.status == 1){
          order.status = 3
        }
      })
    },
    fu(index){
      let order = store.order[index]
      this.$http.put('/api/order.php', {id:order.id, status:1}).then(res => {
        let data = res.data;
        if(data.status == 1){
          order.status = 1
        }
      })
    },
    imgerr(index,pindex){
      store.order[index].prods[pindex].img = require('../assets/images/nopic.png')
    },
    fn(){
      this.$http.get('/api/order.php').then(res => {
        var data = res.data;
        if(data.status == 1){
          data.list.forEach(item => {
            item.prods.forEach(prod => {
              prod.img = '/api'+prod.img
            })
          })
          store.order = data.list
        }
      })
    }
  }
}
</script>


<style scoped>
.zbox-list .btn-box{
    position: absolute;
    right: 50px;
    top:33px;
  }

  .zbox-list .btn-box .num-text{
    width:20px;
  }

  .order-msg{
    overflow: hidden;
    font-size: 0.28rem;
    border-bottom: 1px solid #ddd;
  }

  .order-msg .l{
    float: left
  }

  .order-msg .r{
    float: right
  }
</style>