import Vue from 'vue'
import store from './index'
export default {
	bian({commit,state,dispatch}, formd){
		Vue.http.post('/api/product/update.php', formd).then(res => {
	      let data = res.data
	      if (data.status == 1){
	       dispatch('selectPlist',state.plist.curr)
	      }
	   })
	},
	xin({commit,state,dispatch}, formd){
		Vue.http.post('/api/product.php', formd).then(res => {
	      let data = res.data
	      if (data.status == 1){
	       dispatch('selectPlist',state.plist.curr)
	      }
	     })
	},
 uplocka({commit}, obj) {
    Vue.http.put('/api/product/update.php', obj).then(res => {
      let data = res.data
      if (data.status == 1) {
        if(typeof obj.id == 'number'){
          commit('uplock', obj)
        }else{
          commit('uplocks', obj)
        }
      }
    })
  },
 delP({commit}, id) {
    Vue.http.delete('/api/product.php', {body:{id:id}}).then(res => {
      let data = res.data
      if (data.status == 1) {
        commit('delP')
      }
    })
  },
    userCheck({commit}){
      Vue.http.get('/api/userCheck.php').then(res => {
        let data = res.data
        if(data.status == 1){
          commit('updateUser', data.user)
        }
      })
    },
    login({commit}, obj){
      return Vue.http.post('/api/login.php', obj)
    },
    selectPlist({commit, state},index){
      Vue.http.get('/api/admin/product.php?pnum='+state.plist.pnum+'&p='+index).then(res => {
        let data = res.data
        if(data.status == 1){
          data.list.forEach(item => {
            item.img = '/api' + item.img
          })
          data.index=index;
          commit('updatePlist', data)
        }
      })
    }
}
