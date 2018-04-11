<template>
  <div id="app">
  	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <!--缓存组件-->
    <keep-alive>
      <router-view></router-view>
    </keep-alive>
<!--    
    <loginbox></loginbox>-->
    
    <nav class="m_nav clearfix">
    	
    	<router-link to="/">
        	<dl>
            	<dd class="ico1"></dd>
                <dt>首页</dt>
            </dl>
        </router-link>
        
        <router-link to="/list">
        	<dl>
            	<dd class="ico2" id="ass"></dd>
                <dt>商品列表</dt>
            </dl>
        </router-link>
        
        <router-link to="/detail">
        	<dl>
            	<dd class="ico3"></dd>
                <dt>详情页</dt>
            </dl>
        </router-link>
        
        <router-link to="/my">
        	<dl>
            	<dd class="ico4"></dd>
                <dt>我的</dt>
            </dl>
        </router-link>
        
    </nav>
  </div>
</template>

<script>
  
import loginbox from './components/loginbox'
export default {
  name: 'app',
  components:{
     loginbox
  }
}
</script>

<style>
#ass{
	text-align: center;
  font-size: 1px;
}
</style>
