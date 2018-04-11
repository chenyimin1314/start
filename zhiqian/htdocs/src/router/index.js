import Vue from 'vue'
import Router from 'vue-router'
import Hello from '@/components/Hello'
import list from '@/components/list'
import product from '@/components/product'
import detail from '@/components/detail'

import oder from '@/components/oder'

import my from '@/components/my'
import add from '@/components/add'

// 让Vue具备路由的功能
Vue.use(Router)

export default new Router({
  routes: [
   {
      path: '*',
      name: 'list'
    },
    {
      path: '/',
      name: 'Hello',
      component: Hello
    },
    {
      path: '/list',
      name: 'list',
      component: list
    },
    {
      path: '/p/:id',
      name: 'product',
      component: product
    },
    {
      path: '/detail',
      name: 'detail',
      component: detail
    },
       {
      path: '/my',
      name: 'my',
      component: my,
      // 子路由
      children: [{
        path: 'oder',
        name: 'oder',
        component: oder
      }, {
        path: 'add',
        name: 'add',
        component: add
      }]
    }
  ]
})
