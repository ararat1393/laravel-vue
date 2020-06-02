<template>
  <div id="app">
    <div v-if="!$auth.ready()" class="text-center">
      <img src="https://thumbs.gfycat.com/SimilarPlumpBarasingha-small.gif" alt="">
    </div>
    <div v-else>
      <component :is = "loadComponent"></component>
    </div>
  </div>
</template>
<script>
  import MenuComponent from "./components/dashboard/MenuComponent";

  export default {
    name: "App",
    methods: {
    },
    computed:{
      loadComponent(){
        if(!this.$auth.check() ){
          return 'MenuComponent';
        }
        if( this.$auth.check('0') ){
          return 'MenuComponent';
        }
        if( this.$auth.check('-1') ){
          return 'MenuComponent';
        }
      }
    },
    components: {
      MenuComponent
    },
  }

</script>

<style scoped>
  @import url('//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
</style>
