<template>
  <div id="login-box">
  	
    <el-form :model="loginForm" :rules="rules" ref="loginDom" label-width="60px">
      <el-form-item label="账号" prop="account">
        <el-input v-model="loginForm.account"></el-input>
      </el-form-item>
      
      <el-form-item label="密码" prop="password">
        <el-input type="password" v-model="loginForm.password"></el-input>
      </el-form-item>

      <el-form-item>
        <el-button type="primary" @click="login">登录</el-button>
      </el-form-item>
    </el-form>
  </div>
</template>

<script>
  import store from '../store';
  export default {
    name: 'login',
    data() {
      return {
        loginForm: {
          account: '',
          password: ''
        },
        rules: {
          account: [{
            required: true,
            message: '请输入账号',
            trigger: 'blur'
          }],
          password: [{
            required: true,
            message: '请输入密码',
            trigger: 'blur'
          }]
        }
      }
    },
    methods:{
      login(){
        this.$refs.loginDom.validate((valid) => {
          if (valid) {
            store.dispatch('login', {
              account: this.loginForm.account,
              password: this.loginForm.password
            }).then(res => {
              let data = res.data
              if (data.status == 1) {
                store.commit('updateUser', data.user)
                this.$router.push('/main/index')
              }
            })
          }else {
            return false;
          }
        });
      }
    }
  }

</script>
<style scoped>
  #login-box {
    width: 400px;
    height: 200px;
    padding: 20px;
    border: 1px solid #eee;
    border-radius: 5px;
    position: absolute;
    top: 50%;
    left: 50%;
    margin-left: -200px;
    margin-top: -100px;
  }
</style>
