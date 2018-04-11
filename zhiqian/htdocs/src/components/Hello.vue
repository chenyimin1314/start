<template>
  <div class="hello">
    <ul>
      <li v-for="item in arr">{{item}}</li>
    </ul>
    <ul>
      <li v-for="item in list">{{item}}</li>
    </ul>
    <button @click="add">新增</button>
  </div>
</template>

<script>
  
export default {
  name: 'hello',
  data() {
    return {
      arr:[1,2,3]
    }
  },
  computed:{
    list(){
      var newList = [];
      this.arr.forEach(function(item){
        newList.push(item+1)
      })
      return newList
    }
  },
  methods:{
    add(){
      this.arr.push(1);
    }
  }
}
</script>

<!-- 如果写上scoped 那么样式只能在这个组件上使用 -->
<style scoped>
/*@import 'css地址';*/
h1, h2 {
  font-weight: normal;
}

ul {
  list-style-type: none;
  padding: 0;
}

li {
  display: inline-block;
  margin: 0 10px;
}

a {
  color: #42b983;
}
</style>
