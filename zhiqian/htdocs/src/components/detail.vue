<template>
	<div>
    <top  :len="detail.length.toString()" ti="订单"></top>
    
	<section class="zboxmain">
    	<div class="zboxb borderTop">
            <div class="zbox-list borderBottom" v-for="(item,index) in detail">
                <div class="thrbox clearfix">
                    <div class="left" @click="check(index)"><span :class="{'acti':item.check}"></span></div>
                    <div class="middle">
                        <dl class="clearfix">
                            <dd><img  :src="item.img"  @error="imgerr(index)"></dd>
                            <dt>
                                <p class="title"><a href="###">{{item.name}}</a></p>
                                <p class="tow"><a href="###">15克拉</a></p>
                                <p class="god1 f24">￥{{item.price}}</p>
                            </dt>
                        </dl>
                        
                    </div>
                       <div class="zhen">
                          <span class="jian" @click="jian(index)">-</span>
	                        <input type="text" value="" v-model="item.cnum" @blur="shu(index)" class="shu"/>
	                        <span class="jia" @click="jia(index)">+</span>
	                        <button class="shan" @click="del(index)" >删除</button>
                        </div>
                    <div class="right"><span></span></div>
                </div>
            </div>
        </div>
    </section>


		<div class="botnBox clearfix">
	        <div class="left borderRight borderTop">
	        	<dl ><dd @click="allcheck" :class="{'hover':checkall}" ></dd><dt>全选</dt></dl>
	            <div class="rc">合计 : <span class="god1">￥{{total}}</span></div>
	        </div>
	        <div class="right bg-god" @click="xia">下单</div>
	    </div>
        
    </div>
</template>
 
<script>
import  store from '../store'
import top from './top';
 export default{
 	 name:'detail',
 	 components:{
  	  top
     },
 	 created(){
 	 	this.fn()
 	 },
 	 computed:{
 	 	total(){
 	 		var t=0;
 	 		store.cart.filter(function(item){
 	 			return item.check
 	 		}).forEach(function(item){
 	 			t+=item.cnum*item.price
 	 		})
 	 		return t
 	 	},
 	 	detail(){
 	 		return store.cart
 	 	},
 	 	checkall(){
 	 		return store.cart.length==store.cart.filter(item => {
 	 			return item.check
 	 		}).length
 	 	}
 	 },
 	 methods:{
 	 	xia(){
            var pids=[]
            var nums=[]
            
            store.cart.filter( item => {
            	return item.check
            }).forEach( prod => {
            	pids.push(prod.pid)
            	nums.push(prod.cnum)
            })
         pids=pids.join(',')
         nums=nums.join(',')
         
      	this.$http.post('/api/order.php',{pids:pids,nums:nums}).then(function(re){
      		var data=re.data;
      		if(data.status==1){
      			store.cart==store.cart.filter( item => {
	      		 	 return !item.check
	      		 })
      			if(confirm("下单成功,是否进入结算页面")){
      				this.$router.push('/my/oder')
      			}else{
      				this.$router.push('/detail')
      			}
      		}
      	})
      	
 	 	},
 	 	del(index){
 	 		var p=store.cart[index];
 	 		 this.$http.delete('/api/cart.php', {body:{pid:p.pid}}).then(res => {
	        let data = res.data;
	        if(data.status == 1){
	        	store.cart.splice(index,1)
	        }
	      })
 	 	},
 	 	shu(index){
 	 		var p=store.cart[index];
 	 		 this.$http.put('/api/cart.php', {pid:p.pid, cnum:p.cnum } ).then(res => {
	        let data = res.data;
	        if(data.status == 1){
	        }
	      })
 	 	},
 	 	jia(index){
 	 		var p=store.cart[index];
 	 		 this.$http.put('/api/cart.php', {pid:p.pid, cnum:(p.cnum+1)} ).then(res => {
	        let data = res.data;
	        if(data.status == 1){
	              p.cnum++;
	        }
	      })
 	 	},
 	 	jian(index){
 	 		var p=store.cart[index];
 	 		if(p.cnum<=1){
 	 			return
 	 		}
 	 		 this.$http.put('/api/cart.php', {pid:p.pid, cnum:(p.cnum-1)} ).then(res => {
	        let data = res.data;
	        if(data.status == 1){
	           p.cnum--;
	        }
	      })
 	 	},
 	 	allcheck(){
 	 		let checkall = this.checkall
	         let pids = store.cart.map(item => {
	           return item.pid
	         }).join(',')
         
	      this.$http.put('/api/cart.php', {pid:pids,check:checkall?0:1}).then(res => {
	        let data = res.data
	        if(data.status == 1){
	          // 同步下前端的数据
	          store.cart.forEach(item => {
	            item.check = checkall?0:1
	          })
	        }
	      })
 	 	},
 	 	check(index){
	      let p = store.cart[index]
	      this.$http.put('/api/cart.php', {pid:p.pid, check:p.check?0:1}).then(res => {
	        let data = res.data;
	        if(data.status == 1){
	          p.check = p.check?0:1
	        }
	      })
       },
 	 	imgerr(index){
 	 		store.cart[index].img=require('../assets/images/nopic.png')
 	 	},
 	 	fn(){
 	 		this.$http.get('/api/cart.php').then(function(re){
 	 			var data=re.data;
 	 			if(data.status==1){
 	 				data.list.forEach(function(item){
 	 					item.img='/api'+item.img
 	 				})
 	 		 	   store.cart=data.list
 	 			}
 	 		})
 	 	}
 	 }
 }
</script>

<style>

 .zhen{
 display: flex;
 position: absolute;
 right: 10px;
 top: 30px;
 
 }
 .zhen span{
 display: block;
 height: 20px;
 width: 20px;
 margin-left: 20px;
 text-align: center;
 }
 .shu{
  width: 50px;
 }
 
 .left a{
 	display: block;
 	height: 30px;
 	width: 50px;
 }
 </style>
