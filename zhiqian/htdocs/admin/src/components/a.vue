<template>
	<div class="childComp-02" v-if="isShow">
    {{aa}}
    <div><button @click="fn">这是子组件02</button></div>
  </div>
</template>

<script>
	export default{
    props:['aaaa'],
    methods:{
      fn(){
        this.$emit("fc",this.dataIf)
      }
    }
  }
</script>

<style>
</style>