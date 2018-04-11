import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex)

// 默认导出这个vue实例对象， 这里存放公用数据和公用方法

export default new Vuex.Store({
  // 相当于data
  state:{
    user:{
      id:0,
      account:''
    },
    loading:false,
    plist:{
      list:[],
      curr:1,
      total:1
    },
    cart:[],
    orderList:[]
  },
  actions:{
    ass({commit,state}){
	    	Vue.http.get('/api/userCheck.php').then(function (res) {
	      var data = res.data;
	      if (data.status == 1){
	      commit('updateUser', data.user)
        }
      })
    }
  },
  mutations:{
    updateUser(state, user){
      Object.assign(state.user, user)
    }
  }
})