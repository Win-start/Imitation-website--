<template>
  <b-container fluid>
    <div class="middle">
      <form>
        <h1>用户登录</h1>
        <div class="form-group row">
          <label for="inputName" class="col-sm-2 col-form-label">账号：</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="exampleInputName" v-model="user.name">
            <label style="float: left;">{{tips.nameErr}}</label>
          </div>
        </div>
        <div class="form-group row">
          <label for="inputPassword3" class="col-sm-2 col-form-label">密码：</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" id="inputPassword3" v-model="user.password">
            <label style="float: left;">{{tips.pasErr}}</label>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-10 offset-2">
            <a class="btn" @click="logins">登录</a>
            <a class="btn" @click="$router.push('/Register')">注册</a>
          </div>
        </div>
      </form>
    </div>
  </b-container>
</template>

<script>
  export default {
    name: 'Login',
    data() {
      return {
        user: {
          name: "",
          password: ""
        },
        tips: {
          nameErr: "",
          pasErr: ""
        }
      }
    },
    methods: {
      logins() {
        var vm = this
        if (!vm.user.name) {
          vm.tips.nameErr = "请输入账号"
          vm.tips.pasErr = ""
        } else if (!vm.user.password) {
          vm.tips.pasErr = "请输入密码"
          vm.tips.nameErr = ""
        } else {
          this.$axios.post('http://localhost:8088/admin/public/user/login', {
            phone: vm.user.name,
            password: vm.user.password,
          }).then(res => {
            if (res.data.msg == '成功') {
              vm.$router.push('/');
              console.log(res.data.data)
              window.localStorage.setItem("User", JSON.stringify(res.data.data[0]))
              this.$store.commit('setUser')
            } else {
              vm.$alert('密码错误');
            }
          })
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
    /* text-align: center; */
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
