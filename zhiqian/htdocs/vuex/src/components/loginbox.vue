<!--<template>
  <div class="login-box" :class="{'on':uid==-1}">
	<div class="out-login">
    	<div class="po-re">
        	<a href="javascript:;" class="out-del"></a>
            <div class="lo-topimg"></div>
            <p class="lo-toptitle">登录</p>
            <div class="lo-inputbox">
                <input type="text" placeholder="输入账号" class="lo-input" v-model="account">
                <input type="password" placeholder="输入密码" class="lo-input lo-input1" v-model="password">
                <a href="javascript:;" class="lo-dell"></a>
            </div>
            <a href="javascript:;" class="lo-btn" @click="login">确定</a>
        </div>
    </div>
	     <div class="bg1"></div>
  </div>
</template>

<script>
import store from '../store';

export default {
  name: 'loginbox',
  data() {
    return {
      account:'',
      password:''
    }
  },
  computed:{
    uid(){
      return store.user.id
    }
  },
  methods:{
   login(){
      store.dispatch('login',{account:this.account, password:this.password}).then(function(res){
      var data = res.data
      if(data.status == 1){
        Object.assign(state.user, user)
      }
      
     })
   }
  }
}
</script>


<style scoped>
.login-box{
  display: none
}
.login-box.on{
  display: block
}
</style>-->
 <!--<header class="header clearfix">
	    	<div class="left">
	           <a href="javascript:;" v-if="hasc"  >
	           	<div class="back" @click="fan"></div>
	           </a>
	        </div>
	        <div class="middle jewelryBox"><span class="bold god">{{ti}}</span><em v-if="len!=''">({{len}})</em></div>
	  </header>-->
	  
	  
		 </router-view>
         
         <!--<nav class="m_nav clearfix">
    	<router-link to="/">
        	<dl>
            	<dd class="ico1"></dd>
                <dt>首页</dt>
            </dl>
        </router-link>
        
        <router-link to="">
        	<dl>
            	<dd class="ico2" id="ass"></dd>
                <dt>商品列表</dt>
            </dl>
        </router-link>
        
        <router-link to="">
        	<dl>
            	<dd class="ico3"></dd>
                <dt>详情页</dt>
            </dl>
        </router-link>
        
        <router-link to="">
        	<dl>
            	<dd class="ico4"></dd>
                <dt>我的</dt>
            </dl>
         </router-link>
      </nav>-->