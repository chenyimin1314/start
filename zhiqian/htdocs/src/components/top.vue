<template>
	<header class="header clearfix">
	    	<div class="left">
	           <a href="javascript:;" v-if="hasc"  >
	           	<div class="back" @click="fan"></div>
	           </a>
	        </div>
	        <div class="middle jewelryBox"><span class="bold god">{{ti}}</span><em v-if="len!=''">({{len}})</em></div>
	  </header>
</template>

<script>
import store from '../store';

export default {
	name:'top',
	methods:{
		fan(){
			history.go(-1)
		}
	},
	computed:{
		hasc(){
			var  flag=false;
			if(this.$route.name=="product"){
				flag=true
			}
			return flag
		}
	},
	props:{
		ti:{
			type:String,
			default:'标题'
		},
		len:{
			type:String,
			default:''
		}
	}
}
</script>

<style>
</style>