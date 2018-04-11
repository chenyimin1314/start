<template>
  <div >
    <input type="text" v-model="account">
    <input type="password" v-model="password">
    <button @click="login">登录</button>
  </div>
</template>

<script>
  import store from '../store';
  export default {
    name: 'login',
    data() {
      return {
        account: '',
        password: ''
      }
    },
    methods: {
      login() {
        store.dispatch('login', {
          account: this.account,
          password: this.password
        }).then(res => {
          let data = res.data
          if (data.status == 1) {
            store.commit('updateUser', data.user)
            this.$router.push('/mian/shou')
          }
        })
      }
    }
  }

</script>


<style scoped>

</style>
