import Vue from 'vue'
import Router from 'vue-router'
import mian from '@/components/mian'
import index from '@/components/index'
import detail from '@/components/detail'
import kefu from '@/components/kefu'
import my from '@/components/my'
import list from '@/components/list'
import xiang from '@/components/xiang'
import category from '@/components/category'

Vue.use(Router)

export default new Router({
  routes: [ 
  {
   path: '*',
  redirect: '/mian/index'
  },
    {
      path: '/category',
      name: 'category',
      component: category
    },{
      path: '/list',
      name: 'list',
      component: list
    },
    {  path: '/xiang/:id',
      name: 'xiang',
      component: xiang
    },
    {
      path: '/mian',
      name: 'mian',
      component:mian,
      children:[
     {
      path: 'index',
      name: 'index',
      component: index
    },
    {
      path: 'detail',
      name: 'detail',
      component: detail
    },
     {
      path: 'my',
      name: 'my',
      component: my
    },
    {
      path: 'kefu',
      name: 'kefu',
      component: kefu
    }
     ]
    }]
})
