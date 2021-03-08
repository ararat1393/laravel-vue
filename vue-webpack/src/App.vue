<template>
  <div id="app">
    <div v-if="false" id='loader'>
      <div class="spinner"></div>
    </div>
    <div v-else>
      <component :is = "loadComponent"></component>
    </div>
  </div>
</template>
<script>
  import MenuComponent from "./components/dashboard/MenuComponent";
  import Unauthorized from "./components/unauthorized/MenuComponent"
  import {mapGetters} from "vuex";
  import axios from "axios";
  export default {
    name: "App",
    methods: {
    },
    computed:{
      loadComponent(){
        if(!this.isLogged ){
          return 'Unauthorized';
        }else{
          return 'MenuComponent';
        }
      },
      ...mapGetters['isLogged']
    },
    components: {
      MenuComponent,
      Unauthorized
    },
    created () {
      const token = localStorage.getItem('access-token')
      if (token) {
        this.$store.dispatch('fetchUser');
      }
    },

  }

</script>

<style scoped>

  #loader {
    transition: all 0.3s ease-in-out;
    opacity: 1;
    visibility: visible;
    position: fixed;
    height: 100vh;
    width: 100%;
    background: #fff;
    z-index: 90000;
  }
  #loader.fadeOut {
    opacity: 0;
    visibility: hidden;
  }

  .spinner {
    width: 40px;
    height: 40px;
    position: absolute;
    top: calc(50% - 20px);
    left: calc(50% - 20px);
    background-color: #333;
    border-radius: 100%;
    -webkit-animation: sk-scaleout 1.0s infinite ease-in-out;
    animation: sk-scaleout 1.0s infinite ease-in-out;
  }

  @-webkit-keyframes sk-scaleout {
    0% { -webkit-transform: scale(0) }
    100% {
      -webkit-transform: scale(1.0);
      opacity: 0;
    }
  }

  @keyframes sk-scaleout {
    0% {
      -webkit-transform: scale(0);
      transform: scale(0);
    } 100% {
        -webkit-transform: scale(1.0);
        transform: scale(1.0);
        opacity: 0;
      }
  }
</style>
