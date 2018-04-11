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

store.dispatch('ass')


new Vue({
  router,
  template: '<App></App>',
  components: {
    App
  }
}).$mount('#app')

