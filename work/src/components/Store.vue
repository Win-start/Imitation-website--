<template>
  <div class="container-fluid">
    <div class="middle">
      <div class="row">
        <div class="col-9">
          <div class="store">
            <img :src="store.image" style="margin-top: 20px;width: 95%;" />
            <div style="width: 95%;margin: auto;text-align: left;">
              <span>{{store.lo_name}}</span><br />
              <span>电话：{{store.lo_phone}}</span><br />
              <span>地址：{{store.lo_address}}</span>
            </div>
          </div>
          <div class="Astore">
            <img src="../../static/img/store/A.jpg" class="img-fluid"></b-img>
            <img src="../../static/img/store/B.jpg" class="img-fluid"></b-img>
            <img src="../../static/img/store/C.jpg" class="img-fluid"></b-img>
            <img src="../../static/img/store/D.jpg" class="img-fluid"></b-img>
            <img src="../../static/img/store/E.jpg" class="img-fluid"></b-img>
          </div>
        </div>
        <div class="col-3">
          <a class="title">全国总店</a>
          <b-list-group>
            <b-list-group-item v-for="(c,index) in storeCategory" @click="goto('/Store','Store',c.lo_id)">
              {{c.lo_name}}
            </b-list-group-item>
          </b-list-group>
        </div>
      </div>
    </div>
  </div>

</template>

<script>
  export default {
    name: "Store",
    data() {
      return {
        store: [],
        storeCategory: []
      }
    },
    created() {
      this.AllStore()
    },
    methods: {
      AllStore() {
        var vm = this
        this.$axios.get('http://localhost:8088/admin/public/store/all').then(res => {
          vm.storeCategory = res.data
        })
      },
      goto(path, name, val) {
        this.$router.push({
          path: path,
          name: name,
          params : {
            id: val
          }
        });
        this.$router.go(0);
      },
    },
    mounted() {
      var vm = this
      vm.$axios.get('http://localhost:8088/admin/public/store/' + this.$route.params.id).then(res => {
        vm.store = res.data
      })
    },
  }
</script>

<style scoped="scoped">
  .container-fluid {
    background: url(../../static/img/background.png) repeat 100% 100% / cover;
    padding-bottom: 6.8em;
  }

  .middle {
    text-align: center;
    width: 80%;
    height: 100%;
    margin: 0 auto;
    background: rgba(255, 255, 255, .35);
    box-shadow: 12px 0px 5px #d8d5c2, -10px 0px 5px #d8d5c2;
  }

  .card-body {
    background: #c0a976;
    color: white;
  }

  .list-group {
    width: 75%;
    margin: 0 auto;
  }

  .list-group-item {
    margin-bottom: 20px;
    background: #c0a976;
    color: white;
  }

  .list-group-item-action:hover {
    background-color: #c0a976;
    color: #ab885b;
  }

  a.title {
    font-size: 24px;
    color: #ab885b;
    display: inline-block;
    height: 2em;
    width: 5em;
    line-height: 2em;
    margin: 25px auto 10px;
    position: relative;
    text-decoration: none;
  }

  a.title::before {
    content: '';
    height: 1px;
    width: 100%;
    background: #b6832b;
    position: absolute;
    bottom: 2px;
    left: 0;
    text-align: center;
  }

  a.title::after {
    content: '';
    height: 3px;
    width: 20%;
    background: #b6832b;
    position: absolute;
    left: 0;
    right: 0;
    bottom: 1px;
    margin: 0 auto;
  }

  .store {
    background-color: white;
    width: 90%;
    margin: 0 auto;
    margin-top: 50px;
  }

  .store p {
    text-align: left;
  }

  .Astore {
    margin: 30px;
    margin-bottom: 20px;
  }

  .Astore .img-fluid {
    width: 96%;
    margin-bottom: 20px;
  }
</style>
