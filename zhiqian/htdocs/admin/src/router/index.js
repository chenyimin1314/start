import Vue from 'vue'
import Router from 'vue-router'
import main from '@/components/main'
import index from '@/components/index'
import order from '@/components/order'
import login from '@/components/login'

Vue.use(Router)

export default new Router({
  routes: [{
      path: '*',
      redirect: '/main/index'
    },
    {
      path: '/login',
      name: 'login',
      component: login
    },
    {
      path: '/main',
      name: 'main',
      component: main,
      children: [{
        path: 'index',
        name: 'index',
        component: index
      },{
        path: 'order',
        name: 'order',
        component: order
      }]
    }
  ]
})
