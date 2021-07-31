import Vue from 'vue'
import Router from 'vue-router'
import Home from '@/components/Home'
import Product from '@/components/Product'
import Theme from '@/components/Theme'
import Category from '@/components/Category'
import ThemeCategory from '@/components/ThemeCategory'
import Login from '@/components/Login'
import Register from '@/components/Register'
import Account from '@/components/user/Account.vue'
import Collect from '@/components/user/Collect.vue'
import MyOrder from '@/components/user/MyOrder.vue'
import Setting from '@/components/user/Setting.vue'
import Store from '@/components/Store'
import Comment from '@/components/Comment.vue'

Vue.use(Router)

export default new Router({
  routes: [{
      path: '/',
      name: 'Home',
      component: Home
    },
    {
      path: '/Theme',
      name: 'Theme',
      component: Theme
    },
    {
      path: '/ThemeCategory/:id',
      name: 'ThemeCategory',
      component: ThemeCategory
    },
    {
      path: '/Category',
      name: 'Category',
      component: Category
    },
    {
      path: '/Product/:id',
      name: 'Product',
      component: Product
    },
    {
      path: '/Login',
      name: 'Login',
      component: Login
    },
    {
      path: '/Register',
      name: 'Register',
      component: Register
    },
    {
      path: '/user/Account',
      name: 'Account',
      component: Account
    },
    {
      path: '/user/Collect',
      name: 'Collect',
      component: Collect
    },
    {
      path: '/user/MyOrder',
      name: 'MyOrder',
      component: MyOrder
    },
    {
      path: '/user/Setting',
      name: 'Setting',
      component: Setting
    },
    {
      path: '/Store/:id',
      name: 'Store',
      component: Store
    },
    {
      path: '/Comment',
      name: 'Comment',
      component: Comment
    }
  ]
})
