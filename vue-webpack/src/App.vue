<template>
  <div id="app">
    <div v-if="!$auth.ready()" class="text-center">
      <img src="https://thumbs.gfycat.com/SimilarPlumpBarasingha-small.gif" alt="">
    </div>
    <div v-else>
      <component :is = "loadComponent"></component>
    </div>
    <section class="project-wrapper">
      <div class="content-main">
        <router-view></router-view>
      </div>
    </section>
  </div>
</template>
<script>
  import Dashboard from './components/dashboard/Menu';
  import Profile from './components/profile/Menu';
  import Unauthorized from './components/unauthorized/HeaderComponent';

  export default {
    name: "App",
    methods: {
    },
    computed:{
      loadComponent(){
        if(!this.$auth.check() ){
          return 'Unauthorized';
        }
        if( this.$auth.check('0') ){
          return 'Profile';
        }
        if( this.$auth.check('-1') ){
          return 'Dashboard';
        }
      }
    },
    components: {
      Dashboard,
      Profile,
      Unauthorized
    },
  }

</script>

<style scoped>
  @import url('//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
</style>
