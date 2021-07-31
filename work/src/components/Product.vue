<template>
  <div>
    <b-img src="../../static/img/themeA.jpg" fluid alt="Responsive image"></b-img>
    <div class="container-fluid">
      <div class="middle">
        <div class="row">
          <div class="col-9">
            <h2 style="margin-top: 45px;">{{theme.name}}</h2>
            <b-container class="bv-example-row">
              <b-row>
                <b-col>价格：{{theme.price}}</b-col>
                <b-col @click="collect" v-if="collects == true">
                  <b-icon-heart class="h2"></b-icon-heart>
                </b-col>
                <b-col @click="delcollect" v-else>
                  <b-icon-heart-fill class="h2"></b-icon-heart-fill>
                </b-col>
                <div class="w-100"></div>
                <b-col>定金：{{theme.deposit}}</b-col>
                <b-col>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
                    立即预约
                  </button>
                </b-col>
              </b-row>
            </b-container>
            <!-- <b-icon-heart-fill></b-icon-heart-fill> -->
            <div id="decription" class="themeimg"></div>
            <!-- <div style="margin: 30px;">
             <img src="../../static/img/theme/X1.jpg" class="img-fluid"></b-img>
              <img src="../../static/img/theme/X2.jpg" class="img-fluid"></b-img>
              <img src="../../static/img/theme/X3.jpg" class="img-fluid"></b-img>
              <img src="../../static/img/theme/X4.jpg" class="img-fluid"></b-img>
            </div> -->
          </div>
          <div class="col-3">
            <Category></Category>
          </div>
        </div>
        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
          aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">预约</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p>主题名：{{theme.name}}</p>
                <p>价格：{{theme.price}}</p>
                <p>定金：{{theme.deposit}}</p>
                <p>请选择支付方式：电子钱包</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">退出</button>
                <button type="button" class="btn btn-primary" @click="buy">立即支付</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import Category from '@/components/Category'
  export default {
    name: "Product",
    data() {
      return {
        theme: [],
        account: '',
        collects: false
      }
    },
    created() {
      this.getCollect()
    },
    components: {
      Category: Category
    },
    methods: {
      buy() {
        var vm = this
        vm.$axios.post('http://localhost:8088/admin/public/order/to', {
          user_id: JSON.parse(localStorage.getItem("User")).user_id,
          product_id: this.$route.params.id,
          state: 1,
          deposit: vm.theme.deposit
        }).then(res => {
          if (res.data.msg == '成功') {
            this.$alert('支付成功')
            // document.getElementsByClassName('modal-backdrop').removeAttribute("class", "类名")
            // this.$router.push('/user/MyOrder');
          } else {
            this.$alert('余额不足，支付失败')
          }
        })
      },
      collect() {
        var vm = this
        vm.$axios.post('http://localhost:8088/admin/public/collect/add', {
          user_id: JSON.parse(localStorage.getItem("User")).user_id,
          product_id: this.$route.params.id
        }).then(res => {
          this.$alert('收藏成功')
          this.getCollect()
        })
      },
      delcollect(){
        var vm = this
        vm.$axios.post('http://localhost:8088/admin/public/collect/del', {
          user_id: JSON.parse(localStorage.getItem("User")).user_id,
          product_id: this.$route.params.id
        }).then(res => {
          this.$alert('取消收藏')
          this.getCollect()
        })
      },
      getCollect(){
        var vm = this
        vm.$axios.post('http://localhost:8088/admin/public/collect/get', {
          user_id: JSON.parse(localStorage.getItem("User")).user_id,
          product_id: this.$route.params.id
        }).then(res => {
          if (res.data.msg == "成功") {
            vm.collects = true
          } else{
            vm.collects = false
          }
          console.log(res.data.msg,vm.collects)
        })
      }
    },
    mounted() {
      console.log(this.$route.params.id)
      var vm = this
      vm.$axios.get('http://localhost:8088/admin/public/theme/' + this.$route.params.id).then(res => {
          vm.theme = res.data
          var decription = document.getElementById("decription");
          decription.innerHTML = vm.theme.decription;
        })
    },
  }
</script>

<style scoped="scoped">
  .container-fluid {
    background: url(../../static/img/background.png) repeat 100% 100% / cover;
    padding-bottom: 6.8em;
    height: 100%;
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

  g {
    color: #c0a976;
  }
</style>
