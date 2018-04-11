
import Vue from 'vue'
import VueResource from 'vue-resource'
import App from './App'
import router from './router'

import store from './store'
import './assets/css/style_ios.css'
import './assets/js/fontsize'

Vue.use(VueResource)

Vue.config.productionTip = false

store.dispatch('ass')

Vue.http.interceptors.push( (req, next) => {
	store.commit('updateloading',true)
  next(res => {
  	store.commit('updateloading',false)
    var data = res.data
    if(data.status == 1001){
      router.push('/login')
    }
  })
})

new Vue({
  el: '#app',
  router,
  template: '<App/>',
  components: { App }
})
