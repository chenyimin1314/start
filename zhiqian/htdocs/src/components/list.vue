<template>
  <div>
	<section class="list" @scroll="scrollHandler" ref="listDom">
    	<ul class=" clearfix">
        	<li v-for="(item,index) in list">
            	<router-link :to="'/p/'+item.id">
                	<dl>
                    	<dd><img :src="item.img"  @error="imgErr(index)"></dd>
                        <dt>
                        	<p>￥:{{item.price}}</p>
                            <p>{{item.name}}</p>
                        </dt>
                    </dl>
               </router-link>
         </li>
            
        </ul>
        <section class="list-bottomla clearfix">
            <div class="itemEnd" v-if="curr <= total">拖动,显示更多珠宝</div>
            <div class="itemEnd nol" v-else>到底了</div>
        </section>
    </section> 
  </div>
</template>

<script>
  
import store from '../store'
import top from './top'

export default {
  name: 'list',
  data() {
    return {

    }
  },
  created(){
    if(store.plist.curr <= store.plist.total){
      this.selectProducts()
    }
  },
  computed:{
    list(){
      return store.plist.list
    },
    curr(){
      return store.plist.curr
    },
    total(){
      return store.plist.total
    }
  },
  methods:{
    scrollHandler(){
      if(store.loading || store.plist.curr > store.plist.total){
        return
      }
      var listDom = this.$refs.listDom;
      if(listDom.scrollHeight - listDom.scrollTop - listDom.clientHeight < 100){
        this.selectProducts()
      }
    },
    imgErr(index){
      store.plist.list[index].img = require('../assets/images/nopic.png')
    },
    selectProducts(){
      this.$http.get('/api/product.php?pnum=6&p='+store.plist.curr).then(res => {
        var data = res.data;
        if(data.status == 1){
          data.list.forEach(item => {
            item.img = '/api'+item.img
          })
          store.plist.list = store.plist.list.concat(data.list)
          store.plist.total = data.total
          store.plist.curr++
        }
      })
    }
  }
}
</script>


<style >

</style>
