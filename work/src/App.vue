<template>
  <div id="container">
    <div class="container">
      <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="#"><img src="./assets/logo01.png"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
          aria-expanded="false" aria-label="Toggle navigation">
          <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-justify"
            viewBox="0 0 16 16" style="color: white;">
            <path fill-rule="evenodd" d="M2 12.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z" />
          </svg>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" @click="$router.push('/')">首页</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" @click="$router.push('/Theme')">最新主题</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">每周客照</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" @click="$router.push('/Comment')">客户评价</a>
            </li>
            <!--            <li class="nav-item">
              <a class="nav-link" @click="$router.push('/Login')" v-if="!users">登录</a>
              <a class="nav-link" @click="out" v-else>退出</a>
            </li> -->
          </ul>
          <div class="dropdown">
            <a class="btn btn-secondary dropdown-toggle" v-if="users == null" @click="$router.push('/Login')" role="button"
              id="dropdownMenuLink" aria-expanded="false">
              个人中心
            </a>
            <a class="btn btn-secondary dropdown-toggle" v-else role="button" id="dropdownMenuLink" data-toggle="dropdown"
              aria-expanded="false">
              {{users.user_name}}
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <a class="dropdown-item" @click="$router.push('/user/Account')">我的钱包</a>
              <a class="dropdown-item" @click="$router.push('/user/MyOrder')">我的预约</a>
              <a class="dropdown-item" @click="$router.push('/user/Collect')">我的收藏</a>
              <a class="dropdown-item" @click="$router.push('/user/Setting')">个人信息</a>
              <a class="dropdown-item" @click="out">退出</a>
            </div>
          </div>
        </div>
      </nav>
    </div>
    <router-view />
    <footer>
      <div class="container">
        <div class="flex-container">
          <div class="flex-item">
            <img src="./assets/logo01.png" style="margin-bottom: 30px;" />
            <h3>全国免费服务热线</h3>
            <hr />
            <h5>400-9011-888</h5>
            <div class="flex-container">
              <div class="flex-item">
                <img src="../static/img/dingwei.png" width="30px" />
              </div>
              <div class="flex-item">
                <p>运营中心地址：北京市丰台区西三环南路55号顺和智库财富广场二层西侧d区201室</p>
                <p>运营中心：北京盘子女人坊文化传播有限公司 </p>
                <p>【跨界合作】喻女士135XXXXXXXX（微信） </p>
              </div>
            </div>
          </div>
          <div class="flex-item">

          </div>
        </div>
      </div>
    </footer>
  </div>
</template>

<script>
  export default {
    name: 'App',
    data() {
      return {
        users: null
      }
    },
    methods: {
      out() {
        this.users = null;
        window.localStorage.removeItem('User');
        this.$router.push('/Login')
      },
      UserInfo(user) {
        this.users = user;
      }
    },
    computed: {
      getUser() {
        return this.$store.state.user;
      },
    },
    watch: {
      getUser: function(newVal, oldVal) {
        this.UserInfo(newVal)
      },
    },
    created() {
      var user = JSON.parse(window.localStorage.getItem('User'))
      this.UserInfo(user);
    }
  }
</script>

<style>
  #container {
    width: 100%;
    background-color: #333;
  }

  nav {
    background-color: #333 !important;
  }

  a {
    color: white;
  }

  .nav-link:hover {
    color: #b28360 !important;

  }

  .flex-container {
    display: flex;
    color: white;
    margin-top: 30px;
  }

  hr {
    background-color: white;
  }

  /*  .underline::before {
      content: '';
      position: absolute;
      bottom: 20%;
      left: 0;
      right: 0;
      margin: auto;
      width: 100%;
      height: 3px;
      background: #b28360;
  } */
</style>
