// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import VueResource from 'vue-resource'
import App from './App'
import router from './router'

// 导入store，用来保存公用数据和方法
import store from './store'

// 导入css文件
import './assets/css/style_ios.css'
// 导入js
import './assets/js/fontsize'


// 让Vue具备调接口的功能
Vue.use(VueResource)

Vue.config.productionTip = false

Vue.http.interceptors.push(function (req, next) {
  store.loading = true
  next(function (res) {
    var data = res.data;
    if (data.status == 1001) {
      // 用户id如果为-1，那么就是没登录状态
      store.user.id = -1;
    }
    store.loading = false
  })
})

Vue.http.get('/api/userCheck.php').then(function (res) {
  var data = res.data;
  if (data.status == 1) {
    // 如果是登录状态，那么就更新用户信息
    Object.assign(store.user, data.user)
  }

})

new Vue({
  // el 跟$mount功能一样
  // el: '#app',
  router,
  template: '<App></App>',
  components: {
    App
  }
}).$mount('#app')
