<template>
	<div>
		<div class="bodyx">
			<emitTest>
			    <div class="leftx"  slot="left" @click="fan"><img src="../assets/css/w.png" alt="" /></div>
			    <div slot="center" class="centerx">
			     	<span>商品</span>
			     	<span>详情</span> 
			     	<span>评价</span>
			    </div>
			    <div slot="right" class="rightx">筛选</div>
			    <div class="tipx" slot="tips">型号:  编号： 品牌：</div>
			</emitTest>
		     <div class="zhong">
		     	<dl>
		     		<dt><img :src="obj.img" alt="" /></dt>
		     		<dd>
		     			<p><span>{{obj.price}}</span></p>
		     			<p>{{obj.zhe}}</p>
		     		</dd>
		     	</dl>
		     </div>
			<div class="foot clearfix" >
				<div class="fl">
					<p><img src="../assets/images/usericon.png" alt="" /></p>
					<p>客服</p>
				</div>
			    <div class="fr">
			    	<span>下载app资讯领红包</span><div>立即下载</div>
			    </div>
		  </div>
		</div>	
	</div>
</template>

<script>
 import store from '../store'
 import emitTest from './emitTest'
 import cha from '../assets/cha.css'
 export default {
  	name:'xiang',
  	components:{
  		emitTest
  	},
  	created(){
  		console.log(this.obj)
  	},
  	computed:{
  		obj(){
  		let pid=this.$route.params.id
  		let aa=[]
  		store.shan.forEach(item => {
  			if(item.id==pid){
  			aa=item
  			}
  		})
  		return aa
  		}

  	},
  	methods:{
  		fan(){
  			history.go(-1)
  		}
  	}
  }
</script>

<style scoped>
	.clearfix:after{visibility:hidden;display:block;font-size:0;content: " ";clear:both;height:0;}
	*{
	   margin: 0;
	   padding: 0;
	}
	.bodyx{
		height: 100vh;
	}
	.leftx img{
		height: 30px;
		width: 50px;
		margin: 10% auto auto -40% ;
	}
	.centerx{
		font-weight: 100;
	}
	.tipx{
		border-top: 1px solid #DDDDDD ;
		background: #F8F8F8;
	}
	.foot {
		height: 50px;
		width: 100%;
		background: #F5F5F5;
		position: fixed;
		left: 0;
		bottom: 0;
		border: 1px solid #DDDDDD;
	}
	.foot .fl{
		height: 100%;
		width: 18%;
		border-right: 1px solid #DDDDDD;
		float: left;
	}
	.foot .fl img{
		height: 20px;
		width: 20px;
	}
	.foot .fl p{
		font-size:13px ;
		text-align: center;
		color: #BBBABA;
		margin-top: 5%;
	}
	.foot .fr{
		height: 100%;
		width: 77%;
		float: right;
		line-height:40px
	}
	.foot .fr span{
		color: #C14A52;
		margin-left: 7%;
	}
	.foot .fr div{
		display: inline-block;
		background: #AE0C17;
		height: 35px;
		width: 100px;
		color: white;
		text-align: center;
		font-weight: bold;
		margin-top: 3%;
		margin-left: 3%;
		font-size: 13px;
		border-radius: 2px;
	}
	.zhong{
		height: 400px;
		width: 100%;
	}
	.zhong dl{
		height: 100%;
		width: 100%;
	}
	.zhong dl dt{
		height: 50%;
		width: 100%;
		background: red;
	}
	.zhong dl dt img{
		height: 100%;
		width: 100%;
		margin: auto;
	}
	.zhong dl dd{
		height: 50%;
		width: 100%;
		text-align: center;
		color: #A2A2A2;
	}
	.zhong dl dd p span{
	   font-weight: bolder;
	   color: red;
	}
</style>