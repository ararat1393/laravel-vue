<template>
    <div class="container-view">
        <h1>{{usersCount}}</h1>
        <div class="row flex-lg-nowrap">
            <div class="col">
                <div class="row">
                    <div class="col mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="e-profile">
                                    <div class="row">
                                        <div class="col-12 col-sm-auto mb-3">
                                            <div class="mx-auto" style="width: 140px;">
                                                <div  class="d-flex justify-content-center align-items-center rounded" style="height: 140px; background-color: rgb(233, 236, 239);">
                                                    <span v-show="photoHide" class="text-center" style="color: rgb(166, 168, 170); font: bold 8pt Arial;">140x140</span>
                                                    <img id="uploadPreview" v-show="!photoHide" src="" alt="" style="width: 100%;height: 100%;object-fit: fill">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                            <div class="text-center text-sm-left mb-2 mb-sm-0">
                                                <div class="mt-2">
                                                    <input @change="previewImage" ref="file" type="file" v-show="false" accept="image/*">
                                                    <button @click="$refs.file.click()" :class="['btn ', { 'btn-danger': error && errors.cover_photo, 'btn-success':!errors.cover_photo }]" type="button">
                                                        <i class="fa fa-fw fa-camera"></i>
                                                        <span>Choose Photo</span>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="text-center text-sm-right">
                                                <span class="badge badge-secondary">administrator</span>
                                                <div class="text-muted"><small>Joined 09 Dec 2017</small></div>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item"><a href="" class="active nav-link">Settings</a></li>
                                    </ul>
                                    <div class="tab-content pt-3">
                                        <div class="tab-pane active">
                                            <form class="form" method="POST" autocomplete="off" @submit.prevent="submit">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>Name</label>
                                                                    <input id="name" type="text" :class="['form-control', { 'is-invalid': error && errors.name }]" v-model="model.name" autocomplete="name">
                                                                    <span class="invalid-feedback" role="alert" v-if="error && errors.name"><strong>{{ errors.name }}</strong></span>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>Surname</label>
                                                                    <input id="surname" type="text" :class="['form-control', { 'is-invalid': error && errors.surname }]" v-model="model.surname" autocomplete="surname">
                                                                    <span class="invalid-feedback" role="alert" v-if="error && errors.surname"><strong>{{ errors.surname }}</strong></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>Email</label>
                                                                    <input id="email" type="text" :class="['form-control', { 'is-invalid': error && errors.email }]" v-model="model.email" autocomplete="email">
                                                                    <span class="invalid-feedback" role="alert" v-if="error && errors.email"><strong>{{ errors.email }}</strong></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>Phone</label>
                                                                    <input id="phone" type="text" :class="['form-control', { 'is-invalid': error && errors.phone }]" v-model="model.phone" autocomplete="phone">
                                                                    <span class="invalid-feedback" role="alert" v-if="error && errors.phone"><strong>{{ errors.phone }}</strong></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 col-sm-6 mb-3">
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>Password</label>
                                                                    <input id="password" type="text" :class="['form-control', { 'is-invalid': error && errors.password }]" v-model="model.password" autocomplete="password">
                                                                    <span class="invalid-feedback" role="alert" v-if="error && errors.password"><strong>{{ errors.password }}</strong></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-5 offset-sm-1 mb-3">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <label>Status</label>
                                                                <div class="custom-controls-stacked px-2">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="radio" :checked="!model.status || model.status == 1 ? true : false" class="custom-control-input" id="user-status-approved" value="1" name="status" @input="model.status = $event.target.value">
                                                                        <label class="custom-control-label" for="user-status-approved">Approved</label>
                                                                    </div>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="radio" :checked="model.status == 0 ? true : false" class="custom-control-input" id="user-status-pending" value="0" name="status" @input="model.status = $event.target.value">
                                                                        <label class="custom-control-label" for="user-status-pending">Pending</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <label>Gender</label>
                                                                <div class="custom-controls-stacked px-2">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="radio" :checked="!model.gender || model.gender == 1 ? true : false" class="custom-control-input" id="user-gender-male" value="1" name="gender" @input="model.gender = $event.target.value">
                                                                        <label class="custom-control-label" for="user-gender-male">Male</label>
                                                                    </div>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="radio" :checked="model.gender == 0 ? true : false" class="custom-control-input" id="user-gender-female" value="0" name="gender" @input="model.gender = $event.target.value">
                                                                        <label class="custom-control-label" for="user-gender-female">Female</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col d-flex justify-content-end">
                                                        <button class="btn btn-primary" type="submit">Create</button>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
    import { mapGetters , mapActions , mapMutations } from 'vuex';
    export default {
        data(){
            return{
                model:{
                    name:'',
                    surname:'',
                    email:'',
                    phone:'',
                    password:'',
                    cover_photo:'',
                    status:0,
                    gender:0,
                },
                errors:{},
                error:false,
                success:false,
                photoHide:true
            }
        },
        computed:{
          ...mapGetters(['usersCount']),
        },
        methods:{
            ...mapActions(['fetchUsers']),
            ...mapMutations(['createUser']),

            submit(event) {
                let self = this;
                this.axios.post('/users',this.model)
                    .then(response => {
                        self.createUser(response.data.user)
                        self.$router.push({name: 'Users'})
                    })
                    .catch(error => {
                        self.error = true
                        self.errors = error.response.data.errors || {}
                    });
            },
            previewImage( event ) {
                var oFReader = new FileReader();
                oFReader.readAsDataURL(event.target.files[0]);
                this.photoHide = false;
                var currentObj = this;
                oFReader.onload = function (oFREvent) {
                    currentObj.model.cover_photo = oFREvent.target.result;
                    document.getElementById("uploadPreview").src = oFREvent.target.result;
                };
            }
        },
        async mounted(){
            this.fetchUsers;
        },
    }
</script>

<style scoped>

</style>
