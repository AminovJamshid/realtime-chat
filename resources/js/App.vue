<template>
  <!-- Start Page Content -->
  <main class="page-content bg-gray-50 dark:bg-slate-800 min-h-screen flex flex-col">
    <!-- Top Header -->
    <div class="bg-white dark:bg-slate-900 shadow fixed top-0 left-0 right-0 z-50 px-9 py-4">
      <TopHeaderComponent />
    </div>
    <!-- Top Header -->

    <div class="container-fluid relative pt-14 px-8">
      <div class="layout-specing">
        <!-- Start Content -->
        <div class="grid md:grid-cols-12 grid-cols-1 mt-6 gap-2">
          <div class="xl:col-span-3 lg:col-span-5 md:col-span-5">
            <UsersComponent :auth="props.auth" @select-user="openChat"/>
          </div>

          <div class="xl:col-span-9 lg:col-span-7 md:col-span-7">
            <ChatComponent :user="selectedUser" :auth="auth" v-if="selectedUser"/>
          </div>
        </div>
      </div>
      <!-- End Content -->
    </div><!--end container-->
  </main>
  <!--End page-content" -->

</template>

<script setup>
import {ref} from "vue";

import UsersComponent from "./components/UsersComponent.vue";
import ChatComponent from "./components/ChatComponent.vue";
import FeatherIcon from "./components/FeatherIcon.vue";
import TopHeaderComponent from "./components/TopHeaderComponent.vue";

const props = defineProps({
  auth: {
    type: Object,
    required: true
  }
});

const selectedUser = ref(null);

const openChat = (user) => {
  selectedUser.value = user;
};

</script>

<style scoped>

</style>
