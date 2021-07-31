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
            <a class="nav-link active">我的收藏</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" @click="$router.push('/user/Setting')">个人信息</a>
          </li>
        </ul>
        <div>
          <b-card-group columns>
            <b-card :img-src="t.image" img-alt="Image" img-top @click="$router.push('/Product/'+t.id)" v-for="(t,index) in items">
              <b-card-text>{{t.name}}</b-card-text>
            </b-card>
          </b-card-group>
        </div>
      </div>
    </div>
    </div>
  </b-container>
</template>

<script>
  export default {
    name: 'Collect',
    data() {
      return {
        items: []
      }
    },
    created() {
      this.getCollect()
    },
    methods: {
      getCollect() {
        var vm = this
        vm.$axios.post('http://localhost:8088/admin/public/collect/user', {
          user_id: JSON.parse(localStorage.getItem("User")).user_id
        }).then(res => {
          vm.items = res.data
          console.log(vm.items)
        })
      },
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
  .card-body p{
    text-align: center;
  }
  .card-columns{
    column-count: 3;
    margin:0 auto;
    padding-top: 30px;
  }
</style>
