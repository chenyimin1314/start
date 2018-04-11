<template>
	<div>
		<header class="header clearfix">
	    	<div class="left">
	           <a href="javascript:;" v-if="hasc"  >
	           	<div class="back" @click="fan"></div>
	           </a>
	        </div>
	        <div class="middle jewelryBox"><span class="bold god" >{{ti}}</span><em v-if="len!=''">({{len}})</em></div>
	  </header>
	  
         111
		<router-view/>
         
         <nav class="m_nav clearfix ">
    	<router-link to="/mian/shou">
        	<dl>
            	<dd class="ico1"></dd>
                <dt>首页</dt>
            </dl>
        </router-link>
        
        <router-link to="/mian/list">
        	<dl>
            	<dd class="ico2" id="ass"></dd>
                <dt class="ss">商品列表</dt>
            </dl>
        </router-link>
        
        <router-link to="/mian/order">
        	<dl>
            	<dd class="ico3"></dd>
                <dt>详情页</dt>
            </dl>
        </router-link>
        
        <router-link to="/mian">
        	<dl>
            	<dd class="ico4"></dd>
                <dt>我的</dt>
            </dl>
         </router-link>
      </nav>
      
	</div>

</template>

<script>
	import store from '../store'
	import '../assets/css/style_ios.css'
     import '../assets/js/fontsize'
    export default {
	 name:'mian',
	 data(){
	 	return{
	 		
	 	}
	 },
	 props:{
		ti:{
			type:String,
			default:'标题'
		},
		len:{
			type:String,
			default:''
		}
	}

   }
</script>

<style scoped>
a.router-link-exact-active{
	color: blue;
}
</style>