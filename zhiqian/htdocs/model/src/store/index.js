import Vue from 'vue'

let catList = [];
let plist = [];
try {
  catList = localStorage.getItem('catList') ? JSON.parse( localStorage.getItem('catList') ) : []
  plist = localStorage.getItem('plist') ? JSON.parse( localStorage.getItem('plist') ) : []
} catch (error) {
  catList = [];
  plist = [];
}


export default new Vue({
data:{
	 catList,
    plist,
    plist:[{name:'iphone3',img:require('../assets/img/0.jpg'),di:'广东'},
          {name:'iphone3s',img:require('../assets/img/10.jpg'),di:'江西'},
          {name:'iphone4',img:require('../assets/img/11.jpg'),di:'重庆'},
          {name:'iphone4s',img:require('../assets/img/12.jpg'),di:'广西'},
          {name:'iphone5',img:require('../assets/img/13.jpg'),di:'广西'}],
    lunbo:[{id:1,img:require('../assets/css/11.jpg')},
			    {id:2,img:require('../assets/css/12.jpg')},
			    {id:2,img:require('../assets/css/13.jpg')},
			    {id:2,img:require('../assets/css/14.jpg')}],
    biao: [{name:'选表中心',img:require('../assets/css/b1.png')},
			    {name:'线下体验',img:require('../assets/css/b2.png')},
			    {name:'名匠维修',img:require('../assets/css/b3.png')},
			    {name:'全球购表',img:require('../assets/css/b4.png')}],
		biaoxia:[{name:'闪购特惠',img:require('../assets/css/b5.png')},
				   {name:'会员福利',img:require('../assets/css/b6.png')},
				   {name:'钟表文化',img:require('../assets/css/b7.png')},
				    {name:'法式优雅',img:require('../assets/css/b8.png')}],
		shan: [{id:1,price:'￥11202',zhe:'6.5折',img:require('../assets/css/s1.jpg')},
				   {id:2,price:'￥11202',zhe:'6.0折',img:require('../assets/css/s2.jpg')},
				   {id:3,price:'￥31702',zhe:'6.3折',img:require('../assets/css/s3.jpg')}],
    shantwo:[{img:require('../assets/css/s4.jpg')},
           {name:'商务男装',zhe:'6.0折',img:require('../assets/css/s5.jpg')},
			     {name:'赫柏林腕表',zhe:'5.0折',img:require('../assets/css/s6.jpg')}],
		jing:[{name:'浪群专场',zhe:'全场6.5折起',img:require('../assets/css/jing1.jpg')},
		      {name:'亨利墓时',zhe:'全场6.0折起',img:require('../assets/css/j2.jpg')}],
		jingtwo:[{name:'欧米茄'},{name:'美度'},{name:'爱皮特'},{name:'爱宝时'},
		        {name:'郝宝林'},{name:'狄我思'},{name:'库尔沃'},{name:'波高'}],
	  jingsan:[{name:'科尔马',price:'￥11702',img:require('../assets/css/j3.jpg')},
	         {name:'艾尼吗',price:'￥123325',img:require('../assets/css/j4.jpg')},
	         {name:'爱皮特',price:'￥15000',img:require('../assets/css/j5.jpg')}],
	  qit:[{name:'天梭男士',price:'￥123325',img:require('../assets/css/q2.jpg')},
	         {name:'狄我思',price:'￥15000',img:require('../assets/css/q3.jpg')},
	        {name:'莫斯表',price:'￥15000',img:require('../assets/css/q4.jpg')}],
	  qite:[{name:'科尔马',price:'￥11702',img:require('../assets/css/q1.jpg')}],
	  list:[{name:'亨利慕时</',zhe:'5.5折',price:'￥121702',img:require('../assets/css/ss1.jpg')},
				  {name:'亨利慕时',zhe:'5.1折',price:'￥131702',img:require('../assets/css/ss2.jpg')},
				  {name:'亨利慕时',zhe:'5.9折',price:'￥121702',img:require('../assets/css/ss3.jpg')},
				  {name:'亨利慕时',zhe:'5.7折',price:'￥116702',img:require('../assets/css/ss4.jpg')},
				  {name:'亨利慕时',zhe:'5.2折',price:'￥181702',img:require('../assets/css/ss5.jpg')},
	        {name:'亨利慕时',zhe:'5.0折',price:'￥112702',img:require('../assets/css/ss6.jpg')}]
     }
})