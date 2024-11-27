<template>
  <div class="flex justify-between items-center">
    <!-- Left Section -->
    <div class="flex items-center space-x-1">
      <!-- Show or Close Sidebar -->
      <a id="close-sidebar"
         class="w-8 h-8 inline-flex items-center justify-center text-[20px] bg-gray-50 dark:bg-slate-800 hover:bg-gray-100 dark:hover:bg-slate-700 border border-gray-100 dark:border-gray-800 text-slate-900 dark:text-white rounded-md"
         href="#">
        <FeatherIcon name="menu" size="18" />
      </a>

      <!-- Searchbar -->
      <div class="pl-2">
        <div class="relative sm:block hidden">
          <i class="mdi mdi-magnify absolute top-1/2 left-3 -translate-y-1/2 text-gray-400 dark:text-gray-500"></i>
          <input
              type="text"
              class="form-input w-56 pl-9 py-2 h-8 bg-white dark:bg-slate-900 dark:text-slate-200 rounded-md border border-gray-100 dark:border-gray-800 focus:ring-0 focus:border-green-500 outline-none"
              name="s"
              id="searchItem"
              placeholder="Search..." />
        </div>
      </div>
    </div>

    <!-- Right Section -->
    <ul class="list-none mb-0 flex items-center space-x-2">
      <!-- User/Profile Dropdown -->
      <li class="relative">
        <button
            data-dropdown-toggle="dropdown"
            class="w-8 h-8 flex items-center justify-center text-[20px] text-slate-900 dark:text-white rounded-md"
            type="button">
          <FeatherIcon name="edit" size="18" />
        </button>
        <!-- Dropdown menu -->
        <div
            class="absolute right-0 mt-2 w-44 bg-white dark:bg-slate-900 shadow-lg rounded-md z-50 hidden group-hover:block">
          <ul class="py-2">
            <li>
              <a href="#"
                 class="block py-2 px-4 text-slate-700 dark:text-white hover:text-green-600 dark:hover:text-green-500">
                <i class="mdi mdi-account-outline mr-2"></i>Profile</a>
            </li>
            <li>
              <a href="#"
                 class="block py-2 px-4 text-slate-700 dark:text-white hover:text-green-600 dark:hover:text-green-500">
                <i class="mdi mdi-chat-outline mr-2"></i>Chat</a>
            </li>
            <li>
              <a href="#"
                 class="block py-2 px-4 text-slate-700 dark:text-white hover:text-green-600 dark:hover:text-green-500">
                <i class="mdi mdi-cog-outline mr-2"></i>Settings</a>
            </li>
            <li class="border-t border-gray-200 dark:border-gray-700 my-2"></li>
            <li>
              <a href="#"
                 class="block py-2 px-4 text-slate-700 dark:text-white hover:text-green-600 dark:hover:text-green-500">
                <i class="mdi mdi-lock-outline mr-2"></i>Lockscreen</a>
            </li>
            <li>
              <a href="#"
                 class="block py-2 px-4 text-slate-700 dark:text-white hover:text-green-600 dark:hover:text-green-500">
                <i class="mdi mdi-logout mr-2"></i>Logout</a>
            </li>
          </ul>
        </div>
      </li>
    </ul>
  </div>
</template>

<script setup>

import FeatherIcon from "./FeatherIcon.vue";
</script>

<style scoped>

</style>