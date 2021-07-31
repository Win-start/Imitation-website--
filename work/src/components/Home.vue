<template>
  <div>
    <b-carousel id="carousel-1" :interval="4000" controls indicators background="#ababab" img-width="1024" img-height="480"
      style="text-shadow: 1px 1px 2px #333;" @sliding-start="onSlideStart" @sliding-end="onSlideEnd">
      <b-carousel-slide img-src="../../static/img/1.jpg"></b-carousel-slide>
      <b-carousel-slide img-src="../../static/img/2.jpg"></b-carousel-slide>
      <b-carousel-slide img-src="../../static/img/3.jpg"></b-carousel-slide>
      <b-carousel-slide img-src="../../static/img/4.jpg"></b-carousel-slide>
      <b-carousel-slide img-src="../../static/img/5.jpg"></b-carousel-slide>
      <b-carousel-slide img-src="../../static/img/6.jpg"></b-carousel-slide>
    </b-carousel>
    <div class="strength">
      <div class="container">
        <div class="row">
          <div class="col-3">
            <div class="left">
              <img src="../../static/img/home1.png">
            </div>
            <div class="right">
              <h3>18年匠心专注</h3>
              <p class="hidden">作为古装艺术摄影专业品牌，盘子女人坊连续18年匠心专注，只为发现你的东方美。</p>
              <p style="width: 4em;border-bottom: 2px solid #fff;"></p>
            </div>
          </div>
          <div class="col-3">
            <div class="left">
              <img src="../../static/img/home2.png">
            </div>
            <div class="right">
              <h3>200+品牌实体店</h3>
              <p class="hidden">200+品牌实体店均可体验：北京、上海、广州、深圳、天津、南京、武汉、长沙、沈阳、长春、石家庄、济南、太原、昆明、青岛、苏州、厦门等。</p>
              <p style="width: 4em;border-bottom: 2px solid #fff;"></p>
            </div>
          </div>
          <div class="col-3">
            <div class="left">
              <img src="../../static/img/home3.png">
            </div>
            <div class="right">
              <h3>1500余套主题海量选择</h3>
              <p class="hidden">百人研发大师团队匠心精铸，从古典文学、影视等中国传统文化中萃取灵感，至今共研发1500余套原创中国风艺术主题。</p>
              <p style="width: 4em;border-bottom: 2px solid #fff;"></p>
            </div>
          </div>
          <div class="col-3">
            <div class="left">
              <img src="../../static/img/home4.png">
            </div>
            <div class="right">
              <h3>消费者权益保障</h3>
              <p class="hidden">万余平数码工厂保障，承诺全程无隐形消费、拍摄不满意无条件免费重拍、产品可享受两年内免费保修服务，钻石会员终身免费保修。</p>
              <p style="width: 4em;border-bottom: 2px solid #fff;"></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="middle">
        <div class="start">
          <a class="title">明星体验</a>
          <p>穿越时空之美 古装文化摄影</p>
          <div class="start-up">
            <img src="../../static/img/明星体验师1.jpg" />
          </div>
        </div>
        <div class="theme">
          <a class="title">最新主题</a>
          <p>我们以发现每一位女性的东方美为使命，细致打磨每一个主题，每张图片的背后都是匠人匠心的坚持</p>
          <div class="row row-cols-3">
            <b-card-group v-for="(t,index) in theme">
              <b-card :title="t.name" :img-src="t.image" img-alt="Image" img-top @click="$router.push('/Product/'+t.id)">
                <!-- <b-card-text></b-card-text> -->
              </b-card>
            </b-card-group>
          </div>
          <span @click="$router.push('/Theme')">点击查看更多主题</span>
        </div>
        <div class="more">
          <a class="title">每周客照</a>
          <p>在盘子女人坊，每一张客片都是艺术品</p>
          <div class="more-up">
            <video id="myvideo" src="../../static/img/more.mp4" controls="controls" poster="../../static/img/more1.jpg"></video>
          </div>
          <b-card-group deck>
            <b-card img-src="../../static/img/theme1.jpg" img-alt="Image" img-top>
              <b-card-text>《大宋宫词.萧太后》</b-card-text>
            </b-card>
            <b-card img-src="../../static/img/theme2.jpg" img-alt="Image" img-top>
              <b-card-text>《大宋宫词.萧太后》</b-card-text>
            </b-card>
            <b-card img-src="../../static/img/theme3.jpg" img-alt="Image" img-top>
              <b-card-text>《大宋宫词.萧太后》</b-card-text>
            </b-card>
            <b-card img-src="../../static/img/theme3.jpg" img-alt="Image" img-top>
              <b-card-text>《大宋宫词.萧太后》</b-card-text>
            </b-card>
          </b-card-group>
          <span @click="$router.push('/Theme')">点击查看更多客照</span>
        </div>
        <div class="store">
          <a class="title">全国门店</a>
          <div class="row">
            <div class="col-3" v-for="(s,index) in store" @click="$router.push('/Store/'+s.lo_id)">
              <a>
                <div>
                  <img src="../../static/img/store1.png">
                </div>
                <span>{{s.lo_name}}</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    name: 'Home',
    data() {
      return {
        theme: [],
        store: []
      }
    },
    created() {
      this.getTheme()
      this.getStore()
    },
    methods: {
      getTheme() {
        var vm = this
        vm.$axios.get('http://localhost:8088/admin/public/theme/new').then(res => {
          vm.theme = res.data
          // console.log(res.data)
        })
      },
      getStore() {
        var vm = this
        vm.$axios.get('http://localhost:8088/admin/public/store/get').then(res => {
          vm.store = res.data
          // console.log(res.data)
        })
      },
      onSlideStart(slide) {
        this.sliding = true
      },
      onSlideEnd(slide) {
        this.sliding = false
      },
      goto(path, name, val) {
        this.$router.push({
          path: path,
          name: name,
          params: {
            id: val
          }
        });
      }
    }
  }
</script>

<style scoped="scoped">
  .strength {
    background: #c0a977;
    overflow: hidden;
    color: #fff;
    font-size: 14px;
  }

  .left {
    width: 10%;
    display: table-cell;
    padding-right: 10px;
  }

  .right {
    display: table-cell;
  }

  .strength .col-3 {
    margin-top: 25px;
    padding: 1em;
  }

  .strength .col-3::before {
    content: '';
    position: absolute;
    width: 2px;
    background: #fff;
    height: 70%;
    top: 1em;
    bottom: 0;
    right: 0;
  }

  h3 {
    font: normal bold 20px/24px 'Microsoft YaHei';
  }

  .hidden {
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 3;
    overflow: hidden;
  }

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

  a {
    text-decoration: none;
  }

  a.title {
    font-size: 42px;
    color: #ab885b;
    display: inline-block;
    height: 2em;
    width: 5em;
    line-height: 2em;
    margin: 25px auto 10px;
    position: relative;
  }

  a.title::before {
    content: '';
    height: 1px;
    width: 100%;
    background: #b6832b;
    position: absolute;
    bottom: 10px;
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
    bottom: 9px;
    margin: 0 auto;
  }

  .start-up {
    width: 95%;
    margin: 0 auto;
  }

  .start-up img,
  .theme .col-4 a img {
    width: 100%;
  }

  .theme,
  .more,
  .store {
    width: 95%;
    margin: 0 auto;
  }

  .theme .card {
    margin-bottom: 2em;
  }

  .theme .card-body,
  .more .card-body {
    background: #c0a976;
    color: white;
  }

  .theme span,
  .more span {
    display: inline-block;
    width: 13em;
    height: 4em;
    background: #c0a976;
    border-radius: .5em;
    line-height: 4em;
    text-align: center;
    font-size: 18px;
    cursor: pointer;
    margin: 2em;
    color: white;
  }

  #myvideo {
    width: 100%;
  }

  .store .col-3 {
    margin-top: 25px;
    padding: 1em;

  }

  .store .col-3 a {
    width: 100%;
    margin: 0 auto;
    border-radius: 10px;
    height: 100%;
    display: inline-block;
    color: #000;
    position: relative;
  }

  .store .col-3 div {
    position: relative;
    border: 1px solid #c0a977;
    border-right: none;
    left: 0;
    top: 0;
    width: 35%;
    height: 100%;
    background-color: #c0a977;
    text-align: center;
    border-radius: 10px 0 0 10px;
  }

  .store .col-3 span {
    border: 1px solid #c0a977;
    border-left: none;
    position: absolute;
    left: 35%;
    top: 0;
    width: 65%;
    height: 100%;
    text-align: center !important;
    font-size: 18px;
    color: #696767;
    border-radius: 0 10px 10px 0;
    line-height: 60px;
  }
</style>
