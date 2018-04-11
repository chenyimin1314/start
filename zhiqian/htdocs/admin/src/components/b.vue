<template>
<a :fromParentToChild="fromParentToChild" :isShow="show" @showParentComp="eventFromChild"></a>
</template>

<script>
import a from './a.vue'
  export default{
    data(){
      return{
        show:false,//是否展示子组件内容
        fromParentToChild:""
      }
    },
    components:{a},
    methods:{
      showChild(){
        this.show = true
      },
      eventFromChild(dataIf){
        console.log(dataIf.show)
        this.show=dataIf.show
        this.fromParentToChild = dataIf.mes
      },
      eventFromChild02(dataIf){
        console.log(dataIf.show)
        this.show=dataIf.show
        this.fromParentToChild = dataIf.mes
      }
    }
  }
</script>

<style>
</style>