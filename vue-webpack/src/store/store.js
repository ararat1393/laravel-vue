import Vue from 'vue'
import Vuex from 'vuex'

import users from './modules/users/store'

Vue.use(Vuex)

const store = new Vuex.Store({
  state: {},
  mutations: {},
  actions: {},
  getters: {},
  modules: {
    users
  }
})

export default store
