import Vue from 'vue'
import Router from 'vue-router'
import mian from '@/components/mian'
import index from '@/components/index'

Vue.use(Router)

export default new Router({
  routes: [ 
   {
     path: '*',
    redirect: '/mian/index'
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
    }
     ]
    }]
})
