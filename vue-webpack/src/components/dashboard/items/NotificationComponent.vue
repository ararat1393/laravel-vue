<template>
  <li class="notifications dropdown">
    <span class="counter bgc-red">{{count}}</span>
    <a href="" class="dropdown-toggle no-after" data-toggle="dropdown">
      <i class="ti-bell"></i>
    </a>

    <ul class="dropdown-menu">
      <li class="pX-20 pY-15 bdB">
        <i class="ti-bell pR-10"></i>
        <span class="fsz-sm fw-600 c-grey-900">Notifications</span>
      </li>
      <li>
        <ul class="ovY-a pos-r scrollable lis-n p-0 m-0 fsz-sm">
          <li
            v-for="(notification, key) in notifications"
            :key="key"
          >
            <a href="" class='peers fxw-nw td-n p-20 bdB c-grey-800 cH-blue bgcH-grey-100'>
              <div class="peer mR-15">
                <img class="w-3r bdrs-50p" src='https://randomuser.me/api/portraits/men/3.jpg' alt="">
              </div>
              <div class="peer peer-greed">
                <span>
                  <span class="fw-500">{{notification.user_id}}</span>
                  <span class="c-grey-600">Added new <span class="text-dark">contact us</span>
                  </span>
                </span>
                <p class="m-0">
                  <small class="fsz-xs">{{ notification.created_at }}</small>
                </p>
              </div>
            </a>
          </li>
        </ul>
      </li>
      <li class="pX-20 pY-15 ta-c bdT">
        <span>
          <a href="" class="c-grey-600 cH-blue fsz-sm td-n">View All Notifications <i class="ti-angle-right fsz-xs mL-10"></i></a>
        </span>
      </li>
    </ul>
  </li>
</template>

<script>
    export default {
      name: "NotificationComponent",
      props:{
          notifications:{
            type:Array,
            require:true
          }
      },
      computed: {
        count: {
          get: function () {
            return this.notifications.length;
          },
        }
      },
    }
</script>

<style scoped>

</style>
