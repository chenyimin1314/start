<template>
  <div>
	    <div class="top clearfix">
	      <h1>分类管理</h1>
	      <div class="top-r">
	        <el-button-group>
	        </el-button-group>
	      </div>
	    </div>
	    <div class="middle">
	      <el-form label-width="80px">
	        <el-form-item>
	          <el-input v-model="input"  placeholder="请输入分类名称"></el-input>
	          <el-input v-model="inputd"  placeholder="请输入商品详情"></el-input>
	          <el-input v-model="inputs" placeholder="请输入价格"></el-input>
	          <el-button @click="save">新增分类</el-button>
	        </el-form-item>
	      </el-form>
	
	      <el-table :data="catList" style="width: 100%">
	      	<el-table-column property="name" label="分类详情">
	        </el-table-column>
	        <el-table-column property="id" label="id">
	        </el-table-column>
	        <el-table-column property="detail" label="商品详情">
	        </el-table-column>
	        <el-table-column property="price" label="商品价格">
	        </el-table-column>
	        <el-table-column>
	          <template scope="scope">
	            <el-button-group>
	              <el-button>编辑</el-button>
	              <el-button @click="del(scope.row.id)">删除</el-button>
	            </el-button-group>
	          </template>
	        </el-table-column>
	      </el-table>
	    </div>
<!--
    	  <el-input v-model="data"  placeholder="请输入"></el-input>
    	  <div class="lei" v-for="item in shuju.filter(x =>x.lei==0)" v-if="item.name.indexOf(data)>-1
    	  	||shuju.find(x =>x.lei=1&&x.pid=item.id&&x.name.indexOf(data)>1)||
       shuju.find(x =>x.lei=1&&x.pid=item.id&&shuju.find(c =>c.lei=2&&c.pid=x.id&&c.name.indexOf(data)>-1))">
    	 	  <span class="a">{{item.name}}</span>
	    	 	   <div class="b" v-for="item2 in shuju.filter(x =>x.lei==1&&x.pid==item.id)"
	    	 	   		v-if="item2.name.indexOf(data)>-1||shuju.find(x =>x.lei==2&&x.pid==item2.id&&
	    	 	   		x.name.indexOf(data)>-1)">
	    	 	     <span>{{item2.name}}</span>
	    	 	        <div class="c" v-for="item3 in shuju.filter(x =>x.lei==2&&x.pid==item2.id)"
	    	 	        	v-if="item3.name.indexOf(data)>-1">
	    	 	          <span>{{item3.name}}</span>
	    	         </div>
	    	     </div>-->
    	 </div>
    	 
    	 <!--<div class="lei" v-for="item in shu">
    	 	  <span class="a">{{item.name}}</span>
    	 	  <br />
	    	 	   <div class="b" v-for="item2 in item.child">
	    	 	     <span>{{item2.name}}</span>
	    	 	        <div class="c" v-for="item3 in item2.child">
	    	 	          <span>{{item3.name}}</span>
	    	         </div>
	    	     </div>
    	 </div>-->
 
  </div>
</template>

<script>
  import store from '../store'
  export default {
    name: 'category',
    data() {
      return {
        input: '',
        data:'',
        shuju:[
          {
          	id:1,
//         分类id
          	lei:0,
//        	 	层级
          	pid:0,
//        	查找父id
          	name:'数码'
          	//名称
          },
          {
          	id:2,
          	lei:0,
          	pid:0,
          	name:'家电'
          },{
          	id:3,
          	lei:0,
          	pid:0,
          	name:'电器'
          },{
          	id:13,
          	lei:1,
          	pid:1,
          	name:'手机'
          },
          {
          	id:14,
          	lei:1,
          	pid:2,
          	name:'电视机'
          },{
          	id:15,
          	lei:1,
          	pid:3,
          	name:'冰箱'
          },{
          	id:4,
          	lei:2,
          	pid:13,
          	name:'华为荣耀'
          },{
          	id:5,
          	lei:2,
          	pid:13,
          	name:'iPhone X'
          },{
          	id:6,
          	lei:2,
          	pid:13,
          	name:'小米mix2'
          },{
          	id:7,
          	lei:2,
          	pid:14,
          	name:'松下 冰箱'
          },{
          	id:8,
          	lei:2,
          	pid:14,
          	name:'格力冰箱'
          },{
          	id:9,
          	lei:2,
          	pid:14,
          	name:'美的冰箱'
          },{
          	id:10,
          	lei:2,
          	pid:15,
          	name:'乐视电视'
          },{
          	id:11,
          	lei:2,
          	pid:15,
          	name:'小米电视'
          },{
          	id:12,
          	lei:2,
          	pid:15,
          	name:'索尼电视'
          }
        ]
      }
    },
    computed: {
    	shu(){
//  		var arr=[]
//  		this.shuju.forEach(item => {
//  			 if(item.lei==0){
//  			 	 arr.push(item)
//  			 	 item.child=[]
//  			 	 this.shuju.forEach(item2 => {
//		    			 if(item2.pid==item.id){
//		    			 	 item.child.push(item2)
//		    			 	  item2.child=[]
//		    			      item2.child=[]
//				    			 	 this.shuju.forEach(item3 => {
//						    			 if(item3.pid==item2.id){
//						    			 	 item2.child.push(item3)
//						    			 }
//						    		})
//		    			 }
//		    		})
//  			 }
//  		})
//  		return arr
    	},
      catList() {
        return store.catList
      }
    },
    created() {

    },
    methods: {
      del(id){
        for (var i = 0; i < store.catList.length; i++) {
          var item = store.catList[i];
          if(item.id == id){
            store.catList.splice(i, 1)
            localStorage.setItem('catList', JSON.stringify(store.catList))
            break;
          }
        }
      },
      save() {
        store.catList.push({
          id: 'cat_' + Date.now(),
          name: this.input,
          detail:this.inputd,
           price:'￥'+ this.inputs
        })
        localStorage.setItem('catList', JSON.stringify(store.catList))
      }
    }
  }

</script>

<style scoped>
  .page-box {
    float: right;
    margin: 20px 20px 20px 0;
  }
.b,.c{
	margin-left: 50px;
	color: blue;
}
</style>
