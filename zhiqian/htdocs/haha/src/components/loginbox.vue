<template>
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
    // 获取用户id
    uid(){
      return store.user.id
    }
  },
  methods:{
   login(){
  
     this.$http.post('/api/login.php', {account:this.account, password:this.password}).then(function(res){
      var data = res.data
      if(data.status == 1){
   
        Object.assign(store.user, data.user)
  
        this.$router.push('/')
      }
     })
   }
  }
}
</script>

<!-- 如果写上scoped 那么样式只能在这个组件上使用 -->
<style scoped>
.login-box{
  display: none
}
.login-box.on{
  display: block
}
</style>
