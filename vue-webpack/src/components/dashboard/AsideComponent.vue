<template>
  <div class="sidebar">
    <div class="sidebar-inner">
      <!-- ### $Sidebar Header ### -->
      <div class="sidebar-logo">
        <div class="peers ai-c fxw-nw">
          <div class="peer peer-greed">
            <a class="sidebar-link td-n" href="index.html">
              <div class="peers ai-c fxw-nw">
                <div class="peer">
                  <div class="logo">
                    <img src="../../assets/theam/static/images/logo.png" alt="">
                  </div>
                </div>
                <div class="peer peer-greed">
                  <h5 class="lh-1 mB-0 logo-text">Adminator</h5>
                </div>
              </div>
            </a>
          </div>
          <div class="peer">
            <div class="mobile-toggle sidebar-toggle">
              <a href="" class="td-n">
                <i class="ti-arrow-circle-left"></i>
              </a>
            </div>
          </div>
        </div>
      </div>

      <!-- ### $Sidebar Menu ### -->
        <NavItemComponent :items="routes"></NavItemComponent>
    </div>
  </div>
</template>

<script>
    import NavItemComponent from "./items/NavItemComponent";
    export default {
      name: "AsideComponent",
      components: {NavItemComponent},
      data(){
          return {
            routes:[
              { name:'Users' , path:'/dashboard/users' , role:'users' , icon:'c-blue-500 ti-home' },
            ],
          }
      },
    }
</script>

<style scoped>

</style>
