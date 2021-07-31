<template>
  <div>
    <b-img src="../../static/img/comment-bg.jpg" fluid alt="Responsive image"></b-img>
    <div class="container-fluid">
      <div class="middle">
        <b-card-group columns>
          <b-card :img-src="comment.image" img-alt="Image" v-for="(comment,index) in comments">
                <b-card-text>
                  {{comment.contact}}
                </b-card-text>
                <template v-slot:footer>
                  <small class="text-muted">{{comment.user_name}}</small>
                </template>
              </b-card>
          </b-card-group>
      </div>
    </div>
  </div>
</template>

<script>
  export default{
    name:'Comment',
    data(){
      return{
        comments:[]
      }
    },
    created() {
      this.getComment()
    },
    methods:{
      getComment(){
        var vm = this
        vm.$axios.get('http://localhost:8088/admin/public/comment/get').then(res => {
          vm.comments = res.data
          console.log(vm.comments)
        })
      },
    }
  }
</script>

<style scoped="scoped">
  .container-fluid {
    background: url(../../static/img/background.png) repeat 100% 100% / cover;
  }

  .middle {
    text-align: center;
    width: 80%;
    height: 100%;
    margin: 0 auto;
    background: rgba(255, 255, 255, .35);
    box-shadow: 12px 0px 5px #d8d5c2, -10px 0px 5px #d8d5c2;
    padding-top: 30px;
  }
  .card-columns{
    column-count: 4;
    width: 95%;
    margin:0 auto;
  }
  .card-footer{
    background-color: #f1f1f1;
  }
</style>
