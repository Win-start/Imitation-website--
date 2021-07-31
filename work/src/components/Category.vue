<template>
  <div>
    <a class="title">拍摄类型</a>
    <b-list-group>
      <b-list-group-item v-for="(c,index) in category" :key="c.category_name" @click="goto('/ThemeCategory','ThemeCategory',c.category_id)">
        {{c.category_name}}
      </b-list-group-item>
    </b-list-group>
    </div>
</template>

<script>
  export default {
    name: "Category",
    data() {
      return {
        category: []
      }
    },
    created() {
      this.getCategory()
    },
    methods: {
      getCategory() {
        var vm = this
        this.$axios.get('http://localhost:8088/admin/public/theme/category').then(res => {
          vm.category = res.data
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
    }
  }
</script>

<style>
  .list-group {
    width: 75%;
    margin: 0 auto;
  }

  .list-group-item {
    margin-bottom: 20px;
    background: #c0a976;
    color: white;
  }
  .list-group-item-action:hover{
    background-color: #c0a976;
    color:#ab885b ;
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
</style>
