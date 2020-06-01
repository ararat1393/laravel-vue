<template>
    <div>
        <AdminHeader></AdminHeader>
        <LeftSideBar :routes="routes"></LeftSideBar>
        <Section></Section>
        <Footer></Footer>
    </div>
</template>

<script>
    import AdminHeader from './Header.vue';
    import Footer from "./Footer";
    import LeftSideBar from "./LeftSideBar";
    export default {
        name: "Menu",
        data(){
            return {
                scripts:[
                    "assets/app-assets/js/vendors.min.js",
                    "assets/app-assets/vendors/chartjs/chart.min.js",
                    "assets/app-assets/js/plugins.js",
                    "assets/app-assets/js/custom/custom-script.js",
                    "assets/app-assets/js/scripts/dashboard-ecommerce.js",
                ],
                routes:[
                    { name:'Users' , path:'/dashboard/users' , role:'users' , icon:'fa-user' },
                ],
            }
        },
        components:{
            AdminHeader,Footer,LeftSideBar
        },
        mounted() {
            this.scripts.forEach((src,index)=>{
                let recaptchaScript = document.createElement('script')
                recaptchaScript.setAttribute('src',src)
                document.body.appendChild(recaptchaScript)
            })
        }
    }
</script>

<style scoped>

</style>
