<template>
  <div>
    <router-view/>
  </div>
</template>

<script>
export default {
  name: 'app'
}
</script>

<style>
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
.clearfix:after{
  content: ' ';
  clear: both;
  display: block;
}
main .top{
  border-bottom: 1px solid #EEEEEE;
  padding-bottom: 10px;
  margin-right: 20px;
}
main .top h1{
  float: left;
  display: inline-block;
}
main .top .top-r{
  float: right;
  display: inline-block;
  margin-right: 15px;
}
</style>
