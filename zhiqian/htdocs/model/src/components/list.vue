<template>
	 <div>
       <div class="body"  @scroll="scr" ref="sdom" >
	        <emitTest>
		     <div class="left"  slot="left"><img src="../assets/css/w.png" alt="" /></div>
		     <div slot="center" class="center"><el-input v-model="input" style='width: 240px' placeholder="请输入内容"></el-input></div>
		     <div slot="right" class="right">筛选</div>
		     <div slot="tips" class="tips">
		     	<div>人气</div>
		        <div>价格</div>
		        <div>折扣</div>
		        <div>闪购</div>
		     </div>
	        </emitTest>
      
	        <ul class="ul clearfix">
	        	 <router-link to="/xiang">
		        	<li v-for="plist1 in plist">
		        		<dl>
		        			<dt><img :src="plist1.img" alt="" /></dt>
		        			<dd>
		        				<p>{{plist1.name}}</p>
		        				<p><span>{{plist1.price}}</span>&nbsp;{{plist1.zhe}}</p>
		        			</dd>
		        		</dl>
		        	</li>
	        	</router-link>
	        </ul>  	
	        <div class="lous"  v-if="louss" @click='lll' ><img src="../assets/images/y-icon2.png" alt="" /></div>
	    </div>
	 
    </div>
</template>

<script>
  import store from '../store'
  import emitTest from './emitTest'
   import cha from '../assets/cha.css'
  export default {
    name: 'list',
    data(){
    	return{
    		input: '',
    		louss:false
    	}
    },
    computed:{
    	plist(){
    		return store.list
    	}
    },
    components: {
      emitTest
    },
    methods:{
    	lll(){
    		let aa=this.$refs.sdom;
          aa.scrollTop = 0;
    	},
      scr(){
     	this.louss=false
    	let aa=this.$refs.sdom;
	    	if(aa.scrollTop>=50){
	    		this.louss=true
	    	}else{
	    		this.louss=false
	    	}
       }
    }
  }

</script>

<style scoped>
.clearfix:after{visibility:hidden;display:block;font-size:0;content: " ";clear:both;height:0;}
	
  .nava dl dt img{
    height: 25px;
    margin: 15% auto auto  -50%;
		width: 40px;
	}
 .center{
 	margin-left: -48%;
 }
 .right{
 	color: #AA1313;
 }
 .tips{
 	background: white;
 	display: flex;
 	font-weight: bolder;
 	font-size: 15px;
 }
 .tips div{
 	width: 25%;
 }
 .body{
 	height: 100vh;
 	overflow: auto;
 	background: #CCCCCC;
 }
 .ul{
 	height: 100%;
 	width: 100%;
 }
 .ul li{
 	height: 230px;
 	width: 47%;
 	list-style: none;
 	float: left;
 	background: white;
 	margin-left: 2%;
 	margin-top: 2%;
 	font-size: 10px;
 	font-weight: bolder;
 	color: #B2A59C;
 }

 .ul li  img{
 	height: 170px;
 	width: 150px;
 }
 .ul li dl dd p span{
 	color: #AE0E16;
 }
 .lous{
		position: fixed;
		right: 1px ;
		bottom: 100px;
	}
</style>