<template>
  <div>
    <div class="top clearfix">
      <h1>商品管理</h1>
      <div class="top-r">
        <el-button-group>
          <el-button @click="xin">新增商品</el-button>
          <el-button @click="allup">批量上架</el-button>
          <el-button @click="alldown">批量下架</el-button>
          <el-button @click='alldel'>批量删除</el-button>
        </el-button-group>
      </div>
    </div>
    
    <div class="taotal">
      <el-table ref="listTable" :data="plist.list"  tooltip-effect="dark" style="width: 100%" @selection-change="handleSelectionChange">
        <el-table-column type="selection" width="55">
        </el-table-column>
        
        <el-table-column prop="name" label="商品名称" width="120">
        </el-table-column>
        
        <el-table-column label="商品图片" width="120">
          <template scope="scope">
            <img style="width:60px;" :src="scope.row.img"  @error="imgerr(scope.row.id)" alt="">
          </template>
        </el-table-column>
        
        <el-table-column prop="detail" label="详情" width="120">
        </el-table-column>
        
        <el-table-column  label="上下架" width="120">
        	<template scope="scope">
            {{scope.row.lock?'下架':'上架'}}
          </template>
        </el-table-column>
        
        <el-table-column prop="createTime" label="日期" width="">
        	<template scope="scope">
            {{create(scope.row.createTime*1000)}}
          </template>
        </el-table-column>
   
        <el-table-column label="操作">
        	<template scope="scope">
            <el-button-group>
		          <el-button @click="bian(scope.row.id)">编辑</el-button>
		          <el-button @click="uplock(scope.row.id, scope.row.lock?0:1)" >{{scope.row.lock?'上架':'下架'}}</el-button>
		          <el-button @click="del(scope.row.id)">删除</el-button>
           </el-button-group>
          </template>
        </el-table-column>
        
      </el-table>
      
   <div class="page">
          	 <el-pagination layout="prev, pager, next" :current-page="curr" 
          	 	 :page-size="plist.pnum" :page-count="plist.total" @current-change="changepage">
          	 </el-pagination>
          </div>
    </div>
    
    
    
    <el-dialog :title="title" :visible.sync="dialogFormVisible">
    	
        <el-form :model="pForm" :rules="rules" ref="pDom" label-width="110px">
        	
	         <el-form-item label="商品名称" prop="name">
	         <el-input v-model="pForm.name"></el-input>
	         </el-form-item>

	      
	      <el-form-item label="商品详情" prop="detail">
          <el-input type="textarea" clase="detail" v-model="pForm.detail"></el-input>
        </el-form-item>
	      
	      <el-form-item label="商品图片" >
	      <img :src="pForm.img"  style="width: 50px;" alt="" />
	      </el-form-item>
	      
	      <el-form-item label="选择图片" >
	        <el-input  type='file' class="file-select"></el-input>
	      </el-form-item>
	      
	      <el-form-item label="上下架" prop="lock">
	        <el-checkbox  v-model="pForm.lock"></el-checkbox>
	      </el-form-item>
	 
	      <el-form-item label="商品价格" prop="price">
          <el-input  class="price" type="number" v-model="pForm.price"></el-input>
        </el-form-item>
      
       </el-form>
 
			  <div slot="footer" class="dialog-footer">
			    <el-button @click="qu">取 消</el-button>
			    <el-button type="primary" @click="save">确 定</el-button>
			  </div>
</el-dialog>
    
    
  </div>
</template>

<script>
  import store from '../store'
  export default {
    name: 'index',
    data() {
      return {
        pids:'',
        dialogFormVisible:false,
        title:'新增商品',
        pForm: {
          name: '',
          lock:false,
          price:'',
          detail:'',
          id:''
        },
        rules: {
          name: [{
            required: true,
            message: '请输入商品名称',
            trigger: 'blur'
          }],
           detail: [{
            required: true,
            message: '请输入商品详情',
            trigger: 'blur'
          }],
           price: [{
            required: true,
            message: '请输入商品价格',
            trigger: 'blur'
          }]
        }
      }
    },
    computed:{
    	plist(){
    		return store.state.plist;
    	}
    },
    created() {
      store.dispatch('selectPlist',1)
    },
    methods:{
    	qu(){
    		 this.$refs.pDom.resetFields()
    		document.querySelector('.file-select [type=file]').value = ''
        this.pForm.lock = 0
        this.pForm.id = ''
        this.dialogFormVisible = false
    	},
    	bian(id){
    		this.dialogFormVisible = true
    		this.title="商品编辑"
    		this.pForm.id=id
    		let prod=store.state.plist.list.find( item => item.id==id)
    		this.pForm.name=prod.name
    		this.pForm.detail=prod.detail
    		this.pForm.price=prod.price
    		this.pForm.name=prod.name
    		this.pForm.lock=prod.lock?false:true
    		this.pForm.img=prod.img
    	},
    	xin(){
    		this.title="新增商品"
    		this.dialogFormVisible = true
    	
    	},
    	save(){
    		this.$refs.pDom.validate(valid => {
    			if(valid){
    				let formd=new FormData()
	    				formd.append('name',this.pForm.name)
	    				formd.append('detail',this.pForm.detail)
	    				formd.append('price',this.pForm.price)
	    				formd.append('name',this.pForm.name)
	    				formd.append('lock',this.pForm.lock?0:1)
    				 let file=document.querySelector('.file-select [type=file]').files
    				 if(file.length>0){
    				 	formd.append('file',file[0])
    				 }
    				 
    				 if(this.pForm.id){
    				 	formd.append('id',this.pForm.id)
    				 		store.dispatch('bian',formd)
    				 }else{
    				 		store.dispatch('xin',formd)
    				 }
    				 
    			}else{
    				
    			}
    		})
    		 this.$refs.pDom.resetFields()
    		document.querySelector('.file-select [type=file]').value = ''
        this.pForm.lock = 0
        this.pForm.id = ''
        this.dialogFormVisible = false
    	},
    	allup(){
    		store.dispatch('uplocka', {id:this.pids, lock:0})
    	},
     alldown(){
        store.dispatch('uplocka', {id:this.pids, lock:1})
      },
    	alldel(){
    			store.dispatch('delP',this.pids)
    	},
    	uplock(id,lock){
    		store.dispatch('uplocka',{id:id,lock:lock})
    	},
    	del(id){
    		store.dispatch('delP',id)
    	},
    	changepage(index){
    		 store.dispatch('selectPlist',index)
    	},
    	create(times){
    		let time=new Date(times)
    		return time.getFullYear()+'-'+(time.getMonth()+1)+'-'+time.getDate()
    	},
    	imgerr(id){
    		let prod=store.state.plist.list.find(item => {
    			 return item.id==id
    		})
    		prod.img=require('../assets/nopic.png')
    	},
    	handleSelectionChange(selectedData) {
        this.pids = selectedData.map(item => item.id).join(',')
     }
    }
  }

</script>

<style scoped>
.page{
	float: right;
	margin: 20px  20px 30px ;
}
</style>
