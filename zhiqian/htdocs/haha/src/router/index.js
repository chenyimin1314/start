import Vue from 'vue'
import Router from 'vue-router'
import Hello from '@/components/Hello'


// 让Vue具备路由的功能
Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'Hello',
      component: Hello
    }
  ]
})
