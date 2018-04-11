// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import VueResource from 'vue-resource'
import ElementUI from 'element-ui'
import 'element-ui/lib/theme-default/index.css'
import App from './App'
import router from './router'
import store from './store'

Vue.config.productionTip = false

Vue.use(VueResource)
Vue.use(ElementUI)

store.dispatch('userCheck')

Vue.http.interceptors.push( (req, next) => {

  store.commit('updateLoading', true)

  next(res => {
    
    store.commit('updateLoading', false)

    let data = res.data
    if(data.status == 1001){
      router.push('/login')
    }
  })
} )

new Vue({
  el: '#app',
  router,
  template: '<App/>',
  components: { App }
})
