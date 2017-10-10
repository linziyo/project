import Vue from 'vue'
import Router from 'vue-router'

import Vum from 'vum'

import routes from './routes'

Vue.use(Router)
Vue.use(Vum)

let App = Vue.extend()

let router = new Router()

router.map(routes)

router.start(App, '#app')

Vum.router(router)