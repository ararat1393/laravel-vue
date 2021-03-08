import {loginUser, logoutUser, getAuthUser, registerUser} from "../../services/authService";
import axios from "axios";

export const LOGIN = 'login';
export const REGISTER = 'register';
export const FETCH_USER = 'fetchUser';
export const LOGOUT = 'logout';

const state = {
  userInfo:null,
  isUserInfoLoading:false
};

const mutations = {
  SET_AUTH_USER_INFO: function (state,response){
    state.userInfo = response.user;
    console.log(response)
    localStorage.setItem('access-token', response.access_token)
    axios.defaults.headers.common.Authorization = `Bearer ${response.access_token}`
  },
  SET_USER_INFO_LOADING: function (state, loading) {
    state.isUserInfoLoading = loading;
  },
  SET_AUTH_LOGOUT: function (state) {
    state.userInfo = null;
    localStorage.removeItem('access-token')
  }
};

const actions = {
  login:function ({commit,state},payload){
    commit('SET_USER_INFO_LOADING',true);
    return new Promise((resolve, reject) => {
      loginUser(payload).then((response)=>{
          commit('SET_AUTH_USER_INFO',response.data);
          commit('SET_USER_INFO_LOADING',false);
          return resolve(response.data);
        }).catch((error)=>{
        console.log(error)
          return reject(error.response.data);
        })
    });
  },
  register: function ({commit,state},payload){
    return new Promise((resolve, reject) => {
      registerUser(payload)
        .then((response)=>{
          return resolve(response.data);
        })
        .catch((error)=>{
          return reject(error.response.data);
        })
    });
  },
  logout: function ({commit, state}) {
    return new Promise((resolve, reject) => {
      logoutUser()
        .then((response)=>{
          commit('SET_AUTH_LOGOUT')
          return resolve(response.data);
        })
        .catch((error)=>{
          return reject(error.response.data)
        })
    })
  },
  fetchUser: function ({commit, state}){
    return new Promise((resolve, reject) => {
      getAuthUser()
        .then((response)=>{
          commit('SET_AUTH_USER_INFO',response.data);
          return resolve(response.data);
        })
        .catch((error)=>{
          commit('SET_AUTH_USER_INFO',null);
          return reject(error.response.data);
        })
    })
  }
};

const getters = {
  isLogged: function (state){
    return Boolean(state.userInfo);
  }
}

export default {state,getters,mutations,actions}
