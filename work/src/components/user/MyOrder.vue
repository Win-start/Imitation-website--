<template>
  <b-container fluid>
    <div class="middle">
      <div class="user">
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link" @click="$router.push('/user/Account')">我的钱包</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active">我的预约</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" @click="$router.push('/user/Collect')">我的收藏</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" @click="$router.push('/user/Setting')">个人信息</a>
          </li>
        </ul>
        <table>
          <tr>
            <th>图片</th>
            <th>主题名</th>
            <th>定金</th>
            <th>价格</th>
            <th>状态</th>
            <th>创建时间</th>
          </tr>
          <tr v-for="(item,index) in items">
            <td><img :src="item.image" style="width: 100px;height: 100px;"></td>
            <td>{{item.name}}</td>
            <td>{{item.deposit}}</td>
            <td>{{item.price}}</td>
            <td v-if="item.state == 1 ">已预约</td>
            <td v-else-if="item.state == 2"><button type="button" class="btn" data-toggle="modal" data-target="#tabelModal"
                style="color: wheat;font-weight: bold;">订单已完成，去评价</button></td>
            <td v-else>已评价</td>
            <td>{{item.create_time}}</td>
          </tr>
        </table>
        <div class="modal fade" id="tabelModal" tabindex="-1" role="dialog" aria-labelledby="tabelModalLabel"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="tabelModalLabel">评价</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form>
                <div class="modal-body">
                  <div class="form-group">
                    <label for="exampleFormControlTextarea1">评论内容</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" v-model="context"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlFile1">上传图片</label>
                    <input type="file" class="form-control-file" id="exampleFormControlFile1">
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary" @click="save(item.id)">Save changes</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </b-container>
</template>

<script>
  export default {
    name: 'MyOrder',
    data() {
      return {
        items: [],
        context: '',
        img: ''
      }
    },
    created() {
      this.getOrder()
    },
    methods: {
      getOrder() {
        var vm = this
        vm.$axios.post('http://localhost:8088/admin/public/order/get', {
          user_id: JSON.parse(localStorage.getItem("User")).user_id
        }).then(res => {
          vm.items = res.data
          console.log(vm.items)
        })
      },
      save() {
        // var vm = this
        // vm.$axios.post('http://localhost:8088/admin/public/comment/save', {
        //   user_id: JSON.parse(localStorage.getItem("User")).user_id,
        //   product_id:id,
        //   contact:vm.comtext,
        //   order_id:vm.items.order_id
        // }).then(res => {

        //   console.log(res.data)
        // })
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

  table {
    width: 100%;
    text-align: center;
  }
</style>
