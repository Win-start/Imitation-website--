<template>
  <b-container fluid>
    <div class="middle">
      <div class="user">
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link active">我的钱包</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" @click="$router.push('/user/MyOrder')">我的预约</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" @click="$router.push('/user/Collect')">我的收藏</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" @click="$router.push('/user/Setting')">个人信息</a>
          </li>
        </ul>
        <div class="contact">
          <h3 v-if="money == null">我的钱包(当前余额为：{{0}})</h3>
          <h3 v-else>我的钱包(当前余额为：{{money}})</h3>
              <label>金额：</label>
              <el-input type="text" v-model="account"></el-input>
          </div>
          <el-button class="pull-right margin-top-20" @click="save">充值</el-button>
        </div>
      </div>
    </div>
  </b-container>
</template>

<script>
  export default{
    name:'Account',
    data() {
      return{
        money:null,
        account:''
      }
    },
    created() {
      this.getAccount()
    },
    methods:{
      getAccount(){
        var vm =this
        vm.$axios.post('http://localhost:8088/admin/public/account/get',{
          user_id:JSON.parse(localStorage.getItem("User")).user_id
        }).then(res=>{
          vm.money = res.data[0].money
        })
      },
      save(){
        var vm =this
        if(vm.account > 0){
          vm.$axios.post('http://localhost:8088/admin/public/account/save',{
            user_id:JSON.parse(localStorage.getItem("User")).user_id,
            money:vm.account
          }).then(res=>{
            console.log(res.data)
            if (res.data.msg == '成功') {
              vm.$alert('充值成功')
              vm.getAccount()
            }
          })          
        } else{
          vm.$alert('请输入大于0的金额')
        }
      }
    }
  }
</script>

<style  scoped="scoped">
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
    float: right;
  }
  .el-input{
    margin-bottom: 10px;
  }
</style>
