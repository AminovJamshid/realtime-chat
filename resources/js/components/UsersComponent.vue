<template>
  <div class="rounded-md shadow dark:shadow-gray-700 bg-white dark:bg-slate-900">
    <div class="text-center p-4 border-b border-gray-100 dark:border-gray-800">
      <img :src="fileLink('07.jpg')" class="size-20 rounded-full shadow dark:shadow-gray-700 mx-auto" alt="">
      <a href="/">
        <h5 class="mt-3 font-medium text-xl mb-0">{{ auth.first_name }} {{ auth.last_name }}</h5>
        <p class="text-slate-400 mb-0">@{{ auth.username }}</p>
      </a>
    </div>

    <div class="p-2 min-h-[472px] max-h-[472px]" data-simplebar>
      <div v-for="user in users" v-bind:key="user.id">
        <a href="#" class="flex items-center p-2 rounded-md relative hover:bg-gray-50 dark:hover:bg-slate-800 mt-1.5"
           @click.prevent="selectUser(user)">
        <div class="relative">
          <img :src="fileLink('04.jpg')" class="size-11 rounded-full shadow dark:shadow-gray-700" alt="">
          <span class="absolute top-0.5 start-0.5 flex items-center justify-center bg-green-600 text-white text-[10px] font-bold rounded-full size-2 after:content-[''] after:absolute after:h-2 after:w-2 after:bg-green-600 after:top-0 after:end-0 after:rounded-full after:animate-ping"></span>
        </div>
        <div class="overflow-hidden flex-1 ms-2">
          <div class="flex justify-between">
            <h6 class="font-semibold">{{ user.first_name }} {{ user.last_name }}</h6>
            <small class="text-slate-400">10 Min</small>
          </div>
          <div class="text-slate-400 truncate">Hello</div>
        </div>
      </a>
      </div>
    </div>
  </div>

</template>

<script setup>

  import {onMounted, ref} from "vue";
  import axios from "axios";

  const props = defineProps({
    auth: {
      type: Object,
      required: true
    }
  })
  const users = ref([]);

  const fileLink = (file) => `/assets/images/client/${file}`;

  const emit = defineEmits(["select-user"]);
  const selectUser = (user) => {
    emit("select-user", user);
  };

  onMounted(() => {
    axios.get("/api/users/")
        .then((response) => {
          console.log(response.data);
          users.value = response.data.users;
        })
  })

</script>

<style scoped>

</style>