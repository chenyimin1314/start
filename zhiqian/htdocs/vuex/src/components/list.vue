<template>
	  <div class="list clearfix" @scroll="scroll" ref="listDom">
    <div v-for="(item, index) in plist.list" class="item">
      <img :src="item.img" @error="imgerr(index)" alt="">
      <div class="title">{{item.name}}</div>
      <div class="price">{{item.price}}</div>
    </div>
    <div class="tag" v-if="isEnd">到底了</div>
    <div class="tag" v-else>上拉滑动刷新</div>
  </div>
</template>

<script>
import store from '../store'

 
export default {
  name: 'list',
  data () {
   return{
   	
   }
  },
  
  created(){
  	store.dispatch('fn');
  },
  computed:{
  	plist(){
  		return store.state.plist
  	}
  },
  methods:{
  	scroll(){
  		let listd=this.$refs.listDom
  		if(store.state.loading||store.state.plist.curr>store.state.plist.total){
  			return
  		}
  		if(listd.scrollHeight-listd.scrollTop-listd.clientHeight<100){
  			store.dispatch('fn');
  		}
  		
  	},
  	imgerr(index){
        store.state.plist.list[index].img = require('../assets/images/nopic.png')
      }
  }
}
</script>

<style scoped>
	.list{
  overflow: auto;
  height: calc(100vh - 120px);
}

.item{
  width: 50%;
  float: left;
  padding-top: 5px;
  padding-bottom: 5px;
}

img{
  width: 100%;
  height: 200px;
  padding: 20px;
}

.title{
  width: 100%;
  white-space:nowrap; 
  overflow:hidden; 
  text-overflow:ellipsis;
  padding: 5px;
}

.price{
  width: 100%;
}

.tag{
  float: left;
  width: 100%;
  text-align: center;
}
</style>