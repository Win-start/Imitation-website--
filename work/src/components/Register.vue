<template>
  <b-container fluid>
    <div class="middle">
      <el-form :model="ruleForm" status-icon :rules="rules" ref="ruleForm" label-width="100px" class="demo-ruleForm">
        <h1>用户注册</h1>
        <el-form-item label="手机号" prop="phone">
          <el-input v-model.number="ruleForm.phone">
            <el-button @click="sendSmsMsg" slot="append" type="primary" icon="el-icon-mobile-phone">发送</el-button>
          </el-input>
        </el-form-item>
        <el-form-item label="验证码" prop="number">
          <el-input v-model.number="ruleForm.number"></el-input>
        </el-form-item>
        <el-form-item label="密码" prop="pass">
          <el-input type="password" v-model="ruleForm.pass" autocomplete="off"></el-input>
        </el-form-item>
        <el-form-item label="确认密码" prop="checkPass">
          <el-input type="password" v-model="ruleForm.checkPass" autocomplete="off"></el-input>
        </el-form-item>
        <el-form-item>
          <el-button type="primary" @click="Register">提交</el-button>
          <el-button type="primary" @click="$router.push('/Login')">登录</el-button>
        </el-form-item>
      </el-form>
    </div>
  </b-container>
</template>

<script>
  export default {
    name: 'Login',
    data() {
      var checkphone = (rule, value, callback) => {
        var mobile = /^(13[0-9]{9})|(18[0-9]{9})|(14[0-9]{9})|(17[0-9]{9})|(15[0-9]{9})$/;
        if (!value) {
          return callback(new Error('手机号不能为空'));
        } else if (!mobile.test(value)) {
          return callback(new Error('请输入正确的手机号码'));
        }
      };
      var validatePass = (rule, value, callback) => {
        if (value === '') {
          callback(new Error('请输入密码'));
        } else {
          if (this.ruleForm.checkPass !== '') {
            this.$refs.ruleForm.validateField('checkPass');
          }
          callback();
        }
      };
      var validatePass2 = (rule, value, callback) => {
        if (value === '') {
          callback(new Error('请再次输入密码'));
        } else if (value !== this.ruleForm.pass) {
          callback(new Error('两次输入密码不一致!'));
        } else {
          callback();
        }
      };
      return {
        ruleForm: {
          pass: '',
          checkPass: '',
          phone: '',
          number: '',
        },
        rules: {
          pass: [{
            validator: validatePass,
            trigger: 'blur'
          }],
          checkPass: [{
            validator: validatePass2,
            trigger: 'blur'
          }],
          phone: [{
            validator: checkphone,
            trigger: 'blur'
          }]
        }
      };
    },
    methods: {
      Register() {
        var mobile = /^(13[0-9]{9})|(18[0-9]{9})|(14[0-9]{9})|(17[0-9]{9})|(15[0-9]{9})$/;
        var vm = this
        if (!mobile.test(vm.ruleForm.phone)) {
          this.$alert('请输入正确的手机号码', '验证码');
        } else if (vm.ruleForm.number != "123456") {
          this.$alert('请输入正确的验证码');
        } else if (vm.ruleForm.pass != vm.ruleForm.checkPass) {
          this.$alert('两次密码不一致');
        } else {
          this.$axios.post('http://localhost:8088/admin/public/user/add', {
            phone: vm.ruleForm.phone,
            password: vm.ruleForm.pass
          }).then(res => {
            if (res.data.msg == '成功') {
              vm.$alert('注册成功');
              vm.ruleForm.phone = "",
              vm.ruleForm.number = "",
              vm.ruleForm.pass = "",
              vm.ruleForm.checkPass = ""
            } else {
              vm.$alert('注册失败');
            }
          })
        }
      },
      sendSmsMsg() {
        var mobile = /^(13[0-9]{9})|(18[0-9]{9})|(14[0-9]{9})|(17[0-9]{9})|(15[0-9]{9})$/;
        var vm = this
        if (mobile.test(vm.ruleForm.phone)) {
          this.$alert('您手机的验证码为：123456');
        } else {
          this.$alert('请输入正确的手机号码');
        }
      }
    },
  }
</script>

<style>
  .container-fluid {
    background: url(../../static/img/background.png) repeat 100% 100% / cover;
    height: 1200px;
    padding-bottom: 6.8em;
  }

  .middle {
    width: 80%;
    height: 100%;
    margin: 0 auto;
    background: rgba(255, 255, 255, .35);
    box-shadow: 12px 0px 5px #d8d5c2, -10px 0px 5px #d8d5c2;
    padding-top: 40px;
  }

  form {
    width: 40%;
    margin: 0 auto;
    padding-top: 40px;
  }

  form h1 {
    text-align: left;
    margin-bottom: 50px;
  }

  .col-form-label {
    font-size: 18px;
  }

  .btn {
    background: #c0a976;
    color: white;
  }
</style>
