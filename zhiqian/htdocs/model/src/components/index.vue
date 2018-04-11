<template>
  <div >
  	<div class="body" @scroll="scroll" ref="lou">
  	   <div class="head"><img src="../assets/css/1.jpg" alt="" /></div>
			 <div class="navs clearfix">
		     	<div class="kong"></div>
		     	  <dl class="clearfix">
			     	  <dt><img src="../assets/css/5.png" alt="" /></dt>
			     	 	<dd><img src="../assets/css/sou.jpg" alt="" /></dd>
		       	 </dl>
	     </div>
       <div class="Img" >
      	<mt-swipe :auto="4000">
					    <mt-swipe-item  v-for="imgd in imgdata"><img  :src="imgd.img"/></mt-swipe-item>
		   	</mt-swipe>
      </div>
      <table class="table">
      	  <tr>
      	  	<td v-for="biaos in  biao" style="border-bottom: 1px solid #CCCCCC;">
      	  	 <img :src="biaos.img" alt="" />
      	  	 <div>{{biaos.name}}</div>
      	     </td>
      	  </tr>
      	   <tr class="trtwo">
      	  	<td v-for="biaola in  biaoxia">
      	  	 <img :src="biaola.img" alt="" />
      	  	 <div>{{biaola.name}}</div>
      	     </td>
      	  </tr>
      </table>
     <div class="shangou">
      <table class="table2">
       	<tr class="table2tr1"><th colspan="3">{{shangou}}&nbsp;<span>{{xian}}</span></th></tr>
       	<tr class="table2tr2">
	       		<td v-for="shano in shan">
	       			<router-link :to="'/xiang/'+shano.id">
	       			 <img :src="shano.img" alt="" />
	       			 <div class="time">{{time}}</div>
	       			 <div>{{shano.zhe}}</div>
	       			</router-link>
	       		</td>
       	</tr>
       </table>
       <ul class="ul clearfix">
       	 <li class="ulli1" >
       	 	 <img :src="shantwo[0].img" alt="" />
       	 </li>
       	 <li class="ulli2 lin" @click="dlist">
       	 	<div class="line1">
       	 		<dl>
	       	 		<dt>{{shantwo[1].name}}</dt>
	       	 		<dd>{{shantwo[1].zhe}}</dd>
       	 	  </dl>
       	 	</div>
       	 	<div class="line2">
       	 	 	  <img :src="shantwo[1].img" alt="" />
       	 	</div>
       	 </li>
       	 <li class="ulli3 lin" @click="dlist">
       	 	<div class="line1">
       	 		<dl>
	       	 		<dt>{{shantwo[2].name}}</dt>
	       	 		<dd>{{shantwo[2].zhe}}</dd>
       	 	  </dl>
       	 	</div>
       	 	 <div class="line2">
       	 	 	<img :src="shantwo[2].img" alt="" />
       	 	 </div>
       	 </li>
       </ul>
    </div>
    
     <div class="jingxuan">
     	<header class="jing1">精选推荐</header>
    	 <ul class="jingul1 clearfix">
    		<li v-for="jing1 in jing">
    			<dl>
    				<dt><img :src="jing1.img" alt="" /></dt>
    				<dd>
    					<p>{{jing1.name}}</p>
    				 	<p>{{jing1.zhe}}</p>
    				</dd>
    			</dl>
    		</li>
    	</ul>
       <ul class="jingul2 clearfix">
      	<li v-for="jing2 in jingtwo"><p>{{jing2.name}}</p></li>
       </ul>
       <ul class="jingul3 clearfix">
        	<li v-for="jing3 in jingsan">
        		<dl>
        			<dt><img :src="jing3.img" alt="" /></dt>
        			<dd>
        				<p>{{jing3.name}}</p>
        				<p>{{jing3.price}}</p>
        			</dd>
        		</dl>
        	</li>
        </ul>
    </div>
    
    <div class="qi">
    	  <table class="qitable">
    	  	 <tr class="qitabletr1">
    	  	 	<td colspan="3">
    	  	 		<img :src="qite[0].img" alt="" />
    	  	 	</td>
    	  	 </tr>
    	  	 <tr class="qitabletr2">
    	  	 	<td v-for="qit1 in qit">
    	  	 		 <dl>
    	  	 		 	<dt><img :src="qit1.img" alt="" /></dt>
    	  	 		 	<dd>
    	  	 		 		<p>{{qit1.name}}</p>
    	  	 		 		<p>{{qit1.price}}</p>
    	  	 		 	</dd>
    	  	 		 </dl>
    	  	 	</td>
    	  	 </tr>
    	  </table>
        <table class="qitable">
    	  	 <tr class="qitabletr1">
    	  	 	<td colspan="3">
    	  	 		<img :src="qite[0].img" alt="" />
    	  	 	</td>
    	  	 </tr>
    	  	 <tr class="qitabletr2">
    	  	 	<td v-for="qit1 in qit">
    	  	 		 <dl>
    	  	 		 	<dt><img :src="qit1.img" alt="" /></dt>
    	  	 		 	<dd>
    	  	 		 		<p>{{qit1.name}}</p>
    	  	 		 		<p>{{qit1.price}}</p>
    	  	 		 	</dd>
    	  	 		 </dl>
    	  	 	</td>
    	  	 </tr>
    	  </table>
    	  <table class="qitable">
    	  	 <tr class="qitabletr1">
    	  	 	<td colspan="3">
    	  	 		<img :src="qite[0].img" alt="" />
    	  	 	</td>
    	  	 </tr>
    	  	 <tr class="qitabletr2">
    	  	 	<td v-for="qit1 in qit">
    	  	 		 <dl>
    	  	 		 	<dt><img :src="qit1.img" alt="" /></dt>
    	  	 		 	<dd>
    	  	 		 		<p>{{qit1.name}}</p>
    	  	 		 		<p>{{qit1.price}}</p>
    	  	 		 	</dd>
    	  	 		 </dl>
    	  	 	</td>
    	  	 </tr>
    	  </table>
    </div>
    <div class="lou" v-if="lousc" @click="ll" ><img src="../assets/images/y-icon2.png" alt="" /></div>
    </div>
</div>
</template>

<script>
	import store from '../store'
	import cs from '../assets/cs.css'
	
  export default {
    name: 'index',
    data(){
      return {
      toLearnList:[
        '首页','竞标','拍卖广告','拍卖广告','经典案例','联系我们' ,'联系我们' 
      ],
      showAll:false,
      showdata:false,
      shangou:'闪购',
      xian:"限量抢购，抢完为止",
      lousc:false,
      time:''
      }
    },
    created(){
    	setInterval(() => {
    		var xx=new Date("2017/11/18 10:00")
    		var sx=new Date()
    		var a=xx.getTime()-sx.getTime();
//  		let time=Date.now()
// 		let s = 1509779982594 - time
   		let days = parseInt(a/(1000*60*60*24))
   		   var _shi=a%(24*60*60*1000);
   		let h = parseInt(_shi/(1000*60*60))
   		 var _zhong=a%(60*60*1000);
   		let m = parseInt(_zhong/(1000*60))
   		var _miao=a%(60*1000)
   		let ss = parseInt(_miao/(1000))
   		this.time = days + ':' + h + ':' + m + ':' + ss
    	}, 1000)
    },
   computed:{
   	 		qite(){
   		return store.qite
   	},
   	 		qit(){
   		return store.qit
   	},
   		jingsan(){
   		return store.jingsan
   	},
   		jingtwo(){
   		return store.jingtwo
   	},
   	jing(){
   		return store.jing
   	},
   		shantwo(){
   		return store.shantwo
   	},
   	shan(){
   		return store.shan
   	},
   	biaoxia(){
   		return store.biaoxia
   	},
   	biao(){
   		return store.biao
   	},
   	plist(){
   		return  store.plist
   	},
   	imgdata(){
   		return  store.lunbo
   	},
    showList:function(){
      if(this.showAll == false){                   
        var showList = [];　　　　　　　　　　　　　　　 
        if(this.toLearnList.length > 0){　　　　　　
          for(var i=0;i<0;i++){
            showList.push(this.toLearnList[i])
          }
        }else{
          showList = this.toLearnList
        }
        return showList;　　　　　　　　　　　　　　　　
      }else{
        return this.toLearnList;
      }
    }
  },
    methods:{
    	dlist(){
   		this.$router.push('/list')
    	},
    	ll(){
//  		document.documentElement.scrollTop=document.body.scrollTop=0;
	      let aa=this.$refs.lou;
          aa.scrollTop = 0;
    	},
    	scroll(){
    			this.lousc=false;
	      let aa=this.$refs.lou;
	       if(aa.scrollTop>=250){
	       	 this.lousc=true;
	       }else{
	       	this.lousc=false;
	       }
//	        console.log(this.lousc)
    	},
    	wanclick(){
    		
    	},
    	gengclick(){
    	
    		if(this.showdata==false){
    		    this.showdata=true;
    		}else{
    			 this.showdata= false;
    		}
    	},
    	create(s){
    		let time=new Date(s)
    		return  time.getFullYear()+'-'+(time.getMonth()+1)+'-'+time.getDate()
    	}
    }
  }
</script>
<style  scoped>
 
</style>
