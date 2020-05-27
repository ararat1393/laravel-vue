<template>
    <div class="container-view">
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
                                                <div class="d-flex justify-content-center align-items-center rounded" style="height: 140px; background-color: rgb(233, 236, 239);">
                                                    <span style="color: rgb(166, 168, 170); font: bold 8pt Arial;">140x140</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                            <div class="text-center text-sm-left mb-2 mb-sm-0">
                                                <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">John Smith</h4>
                                                <p class="mb-0">@johnny.s</p>
                                                <div class="text-muted"><small>Last seen 2 hours ago</small></div>
                                                <div class="mt-2">
                                                    <button class="btn btn-primary" type="button">
                                                        <i class="fa fa-fw fa-camera"></i>
                                                        <span>Change Photo</span>
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
                                            <form class="form" method="POST" autocomplete="off" @submit.prevent="createUser">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>Name</label>
                                                                    <input v-model="user.name" value="user.name" class="form-control" type="text" name="name">
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>Surname</label>
                                                                    <input v-model="user.surname" value="user.surname" class="form-control" type="text" name="surname">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>Email</label>
                                                                    <input v-model="user.email" value="user.email" class="form-control" type="text" name="email" placeholder="user@example.com">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>Phone</label>
                                                                    <input v-model="user.phone" value="user.phone" class="form-control" type="text" placeholder="phone" name="phone">
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
                                                                    <label>New Password</label>
                                                                    <input v-model="user.password" class="form-control" type="password" placeholder="">
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
                                                                        <input type="radio" class="custom-control-input" id="user-status-approved" value="1" name="status">
                                                                        <label class="custom-control-label" for="user-status-approved">Approved</label>
                                                                    </div>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="radio" class="custom-control-input" id="user-status-pending" value="0" name="status">
                                                                        <label class="custom-control-label" for="user-status-pending">Pending</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <label>Gender</label>
                                                                <div class="custom-controls-stacked px-2">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="radio" class="custom-control-input" id="user-gender-male" value="male" name="gender">
                                                                        <label class="custom-control-label" for="user-gender-male">Approved</label>
                                                                    </div>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="radio" class="custom-control-input" id="user-gender-female" value="female" name="gender">
                                                                        <label class="custom-control-label" for="user-gender-female">Pending</label>
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
    export default {
        name: "EditUser"
    }
</script>

<style scoped>

</style>
