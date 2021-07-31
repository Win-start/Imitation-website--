<template>
  <b-container fluid>
    <div class="middle">
      <div class="user">
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link" @click="$router.push('/user/Account')">我的钱包</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" @click="$router.push('/user/MyOrder')">我的预约</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" @click="$router.push('/user/Collect')">我的收藏</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active">个人信息</a>
          </li>
        </ul>
        <div class="contact">
          <h3>个人信息</h3>
          <div class="flex-container">
            <div class="flex-item">
              <label>账号：</label>
              <el-input value="" type="text" v-model="name"></el-input>
              <label>联系电话：</label>
              <el-input value="" type="text" v-model="phone"></el-input>
              <el-button class="pull-right margin-top-20" @click="UpdateUser">保存</el-button>
            </div>
            <div class="flex-item">
              <label>原密码：</label>
              <el-input type="password" v-model="pass"></el-input>
              <label>新密码：</label>
              <el-input type="password" v-model="repass"></el-input>
              <el-button class="pull-right margin-top-20" @click="UpdatePassword">保存</el-button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </b-container>
</template>

<script>
  export default {
    name: 'Setting',
    data() {
      return {
        name: JSON.parse(localStorage.getItem("User")).user_name,
        phone: JSON.parse(localStorage.getItem("User")).phone,
        pass: '',
        repass: ''
      }
    },
    created() {},
    methods: {
      UpdatePassword() {
        var vm = this
        if (!vm.pass) {
          this.$alert('请输入原密码')
        } else if (!vm.repass) {
          this.$alert('请输入新密码')
        } else {
          vm.$axios.post('http://localhost:8088/admin/public/user/password', {
            user_id: JSON.parse(localStorage.getItem("User")).user_id,
            password: vm.pass,
            repassword: vm.repass
          }).then(res => {
            if (res.data.msg == '失败') {
              this.$alert('原密码错误')
            } else {
              this.$alert('密码修改成功')
              vm.pass = "",
              vm.repass = ""
            }
          })
        }

      },
      UpdateUser() {
        var vm = this
        if(!vm.name){
          this.$alert('请输入新账号')
        }else if(!vm.phone){
          this.$alert('请输入联系电话')
        } else{
          vm.$axios.post('http://localhost:8088/admin/public/user/update', {
          user_name: vm.name,
          phone: vm.phone,
          user_id: JSON.parse(localStorage.getItem("User")).user_id,
        }).then(res => {
          if (res.data.msg == '失败') {
            this.$alert('信息修改失败')
          } else {
            this.$alert('信息修改成功')
          }
        })
        }
        
      }
    }
  }
</script>

<style scoped="scoped">
  .container-fluid {
    background: url(../../../static/img/background.png) repeat 100% 100% / cover;
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

  .user {
    width: 70%;
    margin: 0 auto;
    color: black;
  }

  .nav-tabs {
    border-bottom: 1px solid #c0a976;
  }

  .contact {
    padding-top: 30px;
  }

  h3 {
    text-align: center;
    margin-bottom: 25px;
  }

  .el-button {
    margin-top: 10px;
  }

  .el-input {
    margin-bottom: 10px;
    width: 90%;
  }

  .flex-container {
    display: flex;
    text-align: left;
  }
</style>
