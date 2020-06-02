<template>
  <div>
    <div id='loader'>
      <div class="spinner"></div>
    </div>
    <AsideComponent></AsideComponent>
    <div class="page-container">
      <HeaderComponent></HeaderComponent>
      <MainComponent></MainComponent>
      <FooterComponent></FooterComponent>
    </div>
  </div>
</template>

<script>

  import AsideComponent from "./AsideComponent";
  import HeaderComponent from "./HeaderComponent";
  import MainComponent from "./MainComponent";
  import FooterComponent from "./FooterComponent";

  export default {
    name: "MenuComponent",
    components: {FooterComponent, MainComponent, HeaderComponent, AsideComponent},
  }
  window.addEventListener('load', function load() {
    const loader = document.getElementById('loader');
    setTimeout(function() {
      loader.classList.add('fadeOut');
    }, 300);
  });
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
