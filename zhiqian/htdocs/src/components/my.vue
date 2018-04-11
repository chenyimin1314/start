<template>
  <div>
  	<top ti="我的订单"></top>
  
	<section class="zboxmain">
		
	     <ul>
	     	<li > <router-link to="/my/oder">订单列表</router-link></li>
	     	<li > <router-link to="/my/add"> 其他</router-link></li>
	     </ul>
             <div v-if="hasc">
             	欢迎使用
             </div>
	     <router-view ></router-view>
	
    </section>
        
  </div>
</template>
<script>
  
import store from '../store';
import top from './top';

export default {
  name: 'my',
  components:{
  	  top
     },
  data() {
    return {
    
    }
  },
	computed:{
		hasc(){
			var  flag=false;
			if(this.$route.name=="my"){
				flag=true
			}
			return flag
		}
	}
 
}
</script>


<style >
ul li{
	display: inline-block;
	font-size: 20px;
}
</style>