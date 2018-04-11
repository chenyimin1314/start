<template>
	<div>
		<top ti="登入" ke="注册" tips="注册送50元现金红包，现在注册"></top>
		<div class="form">
		 <el-form :model="ruleForm2" :rules="rules2" ref="ruleForm2"  label-width="60px" class="demo-ruleForm">
		  <el-form-item label="手机号" prop="pass" >
		    <el-input type="password"   v-model="ruleForm2.pass" auto-complete="off"></el-input>
		  </el-form-item>
		  <el-form-item label="验证码" prop="age">
		    <el-input v-model.number="ruleForm2.age"></el-input>
		  </el-form-item>
		  <el-form-item >
		    <el-button type="primary"  @click="submitForm('ruleForm2')">立即登入</el-button>
		  </el-form-item>
         </el-form>
         </div>
	</div>
</template>

<script>

import top from './top'
export default {
    name: 'my',
     components:{
          top
      },
    data() {
      var checkAge = (rule, value, callback) => {
        if (!value) {
          return callback(new Error('验证码不能为空'));
        }
        setTimeout(() => {
          if (!Number.isInteger(value)) {
            callback(new Error('请输入数字值'));
          } else {
            if (value < 6) {
              callback(new Error('必须为6位数字'));
            } else {
              callback();
            }
          }
        }, 1000);
      };
      var validatePass = (rule, value, callback) => {
        if (value === '') {
          callback(new Error('请输入手机号码'));
        } else {
          if (this.ruleForm2.checkPass !== '') {
            this.$refs.ruleForm2.validateField('checkPass');
          }
          callback();
        }
      };
      var validatePass2 = (rule, value, callback) => {
        if (value === '') {
          callback(new Error('请再次输入密码'));
        } else if (value !== this.ruleForm2.pass) {
          callback(new Error('两次输入密码不一致!'));
        } else {
          callback();
        }
      };
      return {
        ruleForm2: {
          pass: '',
          checkPass: '',
          age: ''
        },
        rules2: {
          pass: [
            { validator: validatePass, trigger: 'blur' }
          ],
          checkPass: [
            { validator: validatePass2, trigger: 'blur' }
          ],
          age: [
            { validator: checkAge, trigger: 'blur' }
          ]
        }
      };
    },
    methods: {
      submitForm(formName) {
        this.$refs[formName].validate((valid) => {
          if (valid) {
            alert('成功');
          } else {
            console.log('错误!!');
            return false;
          }
        });
      },
      resetForm(formName) {
        this.$refs[formName].resetFields();
      }
    }
  }
</script>
</script>

<style>
	.demo-ruleForm{
		width: 100%;
		margin: 20px auto auto -5px;
	}
</style>