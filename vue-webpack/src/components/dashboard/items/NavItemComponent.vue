<template>
  <ul class="sidebar-menu scrollable pos-r">
    <li class="nav-item mT-30 actived" v-for="(route, key) in items" v-bind:key="key" :rule='route.role'>
      <router-link
        :to="{ name : route.name }"
        :key="key"
        class="sidebar-link">
        <span class="icon-holder">
          <i :class="route.icon"></i>
        </span>
        <span class="title">{{route.name}}</span>
      </router-link>
    </li>
  </ul>
</template>

<script>
    export default {
        name: "NavItemComponent",
        props:{
          items:{
            type:Array,
            required:true
          }
        },
        data:function () {
          return {

          }
      },
    }
</script>

<style scoped>

</style>
