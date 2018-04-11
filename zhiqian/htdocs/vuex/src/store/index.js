import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex)

export default new Vuex.Store({
  state:{
    user:{
      id:0,
      account:''
    },
     plist:{
      list:[],
      curr:0,
      total:1
    },
    loading:false
  },
  actions:{
    ass({commit,state}){
	    	Vue.http.get('/api/userCheck.php').then(function (res) {
	      var data = res.data;
	      if (data.status == 1){
	      commit('updateUser', data.user)
        }
      })
    },
    login({commit},obj){
     return Vue.http.post('/api/login.php',obj)
    },
    fn({commit,state}){
    	Vue.http.get('/api/product.php?pnum=6&p='+(state.plist.curr+1)).then( re => {
    		let data=re.data;
    		if(data.status==1){
    			data.list.forEach( item => {
    				item.img='/api'+item.img
    			})
    			
    			commit('updatelist',data)
    		}
    	})
    }
  },
  mutations:{
  	updateloading(state, data){
      state.loading=data
    },
    updateUser(state, user){
      Object.assign(state.user, user)
    },
    updatelist(state,plist){
    	 state.plist.list = state.plist.list.concat( plist.list )
    	state.plist.total=plist.total
    	state.plist.curr++
    }
  }
})
