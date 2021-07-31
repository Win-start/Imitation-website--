<template>
  <div>
    <b-img src="../../static/img/themeA.jpg" fluid alt="Responsive image"></b-img>
    <div class="container-fluid">
      <div class="middle">
        <div class="row">
          <div class="col-9">
            <div class="row row-cols-1 row-cols-md-3" style="margin: 30px;">
              <div class="col mb-4" v-for="(t,index) in theme">
                <div class="card" @click="goto('/Product','Product',t.id)">
                  <!-- <a  :href="'./Product/'+t.id"> -->
                  <img :src="t.image" class="card-img-top" alt="...">
                  <div class="card-body">
                    <p class="card-text">{{t.name}}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-3">
            <Category></Category>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import Category from '@/components/Category'
  export default {
    name: "ThemeCategory",
    data() {
      return {
        theme: [],
      }
    },
    created() {
      this.getTheme()
    },
    components:{
      Category:Category
    },
    methods: {
      getTheme() {
        console.log(this.$route.params.id)
        var vm = this
        this.$axios.get('http://localhost:8088/admin/public/themecategory/' + this.$route.params.id).then(res => {
          vm.theme = res.data
        })
      },
      goto(path, name, val) {
        // var user = this.Storage.Local.get('User');
        var vm = this;
        this.$router.push({
          path: path,
          name: name,
          params : {
            id: val
          }
        });
        this.Storage.Session.set('data', params);
      }
    }
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
</style>
