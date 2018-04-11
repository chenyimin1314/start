import store from './index'

export default {
    updateLoading(state, data){
      state.loading = data
    },
    updateUser(state, user){
      Object.assign(state.user, user)
    },
    updatePlist(state, plist){
      state.plist.list=plist.list
      state.plist.total=plist.total
      state.plist.totalCount=plist.totalCount
      state.plist.curr=plist.index
    },
   delP(state){
    store.dispatch('selectPlist', state.plist.curr)
   },
   uplock(state,obj){
   	let prod=state.plist.list.find(item => item.id==obj.id)
   	prod.lock=obj.lock
   },
    uplocks(state, obj){
    let ids = obj.id.split(',')
    let prod = state.plist.list.forEach(item => {
      if( ids.indexOf( item.id.toString() ) > -1 ){
        item.lock = obj.lock
      }
    })
    
   }
  }
