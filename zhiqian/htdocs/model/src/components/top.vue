<template>
	<div>
		 <div class="head"><img src="../assets/css/1.jpg" alt="" /></div>
		 <div class="navs clearfix">
		     	<div class="kong"></div>
		     	<div></div>
		     	 <dl class="clearfix">
		     	 	<dt ><img src="../assets/images/pro.png" alt="" /></dt>
		     	 	<dd>{{ti}}</dd>
		     	 	<p>{{ke}}&nbsp;</p>
		     	 </dl>
	     </div>
	     <div class="tip">{{tips}}</div>
	 </div>
</template>
<script>
import store from '../store';
export default  {
		name:'top',
		props:{
			ti:{
				type:String,
				default:'购物车'
			},
			ke:{
				type:String,
				default:'客服'
			},
			tips:{
				type:String,
				default:'登入后可享更多特权 ，点击登入'
			}
		},
		methods:{
			
	  },
	  computed:{

	  }
}
</script>

<style scoped>
	.head{
		position: fixed;
		top: 0;
		left: 0;
		height: 55px;
		width: 100%;
		z-index: 1000;
	}
	.head img{
		height:100%;
		width: 100%;
	}
	.navs{
		height: 100px;
		width: 100%;
		background: #F8F8F8;
		line-height: 55px;
	}
	.navs .kong{
		height: 50px;
	}
	.navs dl{
		 height: 45%;
		width: 100%;
		text-align: center;
		display: flex;
	}
	.navs dl dt{
		height: 100%;
		width: 33%;
	}
	.navs dl dt img{
    height: 15px;
    margin: 5% auto auto  -50%;
		width: 13px;
	}
	.navs dl dd{
		height: 100%;
		width: 33%;
		color: #333333;
		font-weight: bolder;
		
	}
	.navs dl p{
		height: 100%;
		width: 33%;
		text-align: right;
		color: red;
	}
	.navs dl dd img{
		height: 45px;
		width: 45px;
		margin: 10px auto auto 60%;
	}
	.tip{
		height: 30px;
		width: 100%;
		background: #F3E2C2;
		font-size: 5px;
		color: #73716E;
		line-height: 30px;
		text-align: center;
	}
</style>