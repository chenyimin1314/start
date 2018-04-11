<template>
	<div>
         <router-view/>
         <nav class="nav">
		    	<router-link to="/mian/kefu">
		        	<dl>
		            	<dt class="ico1"><img src="../assets/images/usericon.png" alt="" /></dt>
		                <dd>客服</dd>
		            </dl>
		        </router-link>
		        
		        <router-link to="/mian/index">
		        	<dl>
		            	<dt class="ico2"><img src="../assets/images/s-icon.png" alt="" /></dt>
		                <dd class="ss">首页</dd>
		            </dl>
		        </router-link>
		        
		        <router-link to="/mian/detail">
		        	<dl>
		            	<dt class="ico3"><img src="../assets/images/gw.png" alt="" /></icon></dt>
		                <dd>购物车</dd>
		            </dl>
		        </router-link>
		        
		        <router-link to="/mian/my">
		        	<dl>
		            	<dt class="ico4"><img src="../assets/images/user.jpg" alt="" /></dt>
		                <dd>会员</dd>
		            </dl>
		         </router-link>
         </nav>
	</div>
</template>

<script>
	import top from './top'
	import store from '../store'
	import cs from '../assets/cs.css'
    export default {
	 name:'mian',
	 data(){
	 	return{
	 		
	 	}
	 },
	 methods:{
	 	
	 }
   }
</script>

<style >

</style>