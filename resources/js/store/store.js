import Vue from 'vue';
import Vuex from 'vuex';

import users from './modules/users/store'

Vue.use(Vuex);

//=======vuex store start===========
const store = new Vuex.Store({
    state :{
        message:'',
    },
    mutations:{
      putMessage:function(state,message){
          state.message = message;
      }
    },
    modules:{
        users,
    },
});

//=======vuex store end===========
export default store;
