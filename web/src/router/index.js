import Vue from 'vue'
import Router from 'vue-router'
import Home from '../views/Home/Home'
import Detail from '../views/Detail/Detail'

Vue.use(Router)

export default new Router({
  mode: 'history',
  routes: [
    {
      path: '/',
      name: 'Home',
      component: Home
    },
    {
      path: '/boat/:id',
      name: 'detail',
      component: Detail
    }
  ]
})
