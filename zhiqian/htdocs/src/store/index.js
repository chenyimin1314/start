import Vue from 'vue';


export default new Vue({
  data:{
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
    order:[]
  },
  methods:{

  }
})