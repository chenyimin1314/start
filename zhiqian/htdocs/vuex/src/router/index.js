import Vue from 'vue'
import Router from 'vue-router'
import shou from '@/components/shou'
import list from '@/components/list' 
import login from '@/components/login'
import mian from '@/components/mian'
import order from '@/components/order'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '*',
      name: '/mian/shou'
    },
    {
      path: '/login',
      name: 'login',
      component: login
    },
    {
      path: '/mian',
      name: 'mian',
      component:mian,
      children:[{
	      path: 'list',
	      name: 'list',
	      component: list
	    },{
	      path: 'order',
	      name: 'order',
	      component:order
	    },{
	      path: 'shou',
	      name: 'shou',
	      component:shou
	    }
      ]
    }
  ]
})
