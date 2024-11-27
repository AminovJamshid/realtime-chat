<template>
  <div class="rounded-md shadow dark:shadow-gray-700 bg-white dark:bg-slate-900">
    <div class="flex justify-between items-center border-b border-gray-100 dark:border-gray-800 p-4">
      <div class="flex">
        <img
            :src="fileLink('07.jpg')"
            class="size-11 rounded-full shadow dark:shadow-gray-700"
            alt="">
        <div class="overflow-hidden ms-3">
          <a href="#" class="block font-semibold text-truncate">{{ user.first_name }} {{ user.last_name }}</a>
          <span class="text-slate-400 flex items-center text-sm"><span class="bg-green-600 text-white text-[10px] font-bold rounded-full size-2 me-1"></span> Online</span>
        </div>
      </div>

      <div class="dropdown relative">
        <button data-dropdown-toggle="dropdown" class="dropdown-toggle items-center" type="button">
          <span class="size-8 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-[20px] text-center bg-green-600/5 hover:bg-green-600 border-green-600/10 hover:border-green-600 text-green-600 hover:text-white rounded-md"><i class="mdi mdi-dots-vertical"></i></span>
        </button>
        <!-- Dropdown menu -->
        <div class="dropdown-menu absolute end-0 m-0 mt-4 z-10 w-44 rounded-md overflow-hidden bg-white dark:bg-slate-900 shadow dark:shadow-gray-700 hidden" onclick="event.stopPropagation();">
          <ul class="py-2 text-start">
            <li>
              <a href="" class="block py-1.5 px-4 hover:text-green-600"><i class="mdi mdi-account-outline"></i> Profile</a>
            </li>
            <li>
              <a href="" class="block py-1.5 px-4 hover:text-green-600"><i class="mdi mdi-cog-outline"></i> Profile Settings</a>
            </li>
            <li>
              <a href="" class="block py-1.5 px-4 hover:text-green-600"><i class="mdi mdi-trash-can-outline"></i> Delete</a>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <div ref="messagesContainer" class="p-4 overflow-y-auto mb-0 min-h-[523px] max-h-[523px]" >
      <ul v-for="message in messages" v-bind:key="message.id">
        <li v-if="message.sender_id === auth.id" class="text-end">
          <div class="inline-block">
            <div class="flex mb-3">
              <div class="relative order-2">
                <img :src="fileLink('07.jpg')" class="size-9 min-w-[36px] rounded-full shadow dark:shadow-gray-700" alt="">
                <span class="absolute top-0.5 end-0.5 flex items-center justify-center bg-green-600 text-white text-[10px] font-bold rounded-full size-2 after:content-[''] after:absolute after:h-2 after:w-2 after:bg-green-600 after:top-0 after:end-0 after:rounded-full after:animate-ping"></span>
              </div>

              <div class="me-2 max-w-lg">
                <p class="bg-white dark:bg-slate-900 text-gray-700 text-[16px] shadow dark:shadow-gray-700 dark:text-gray-200 px-3 py-2 rounded mb-1">
                  {{ message.message }}</p>
                <span class="text-slate-400 text-sm"><i class="mdi mdi-clock-outline me-1"></i>45 min ago</span>
              </div>
            </div>
          </div>
        </li>

        <li v-else>
          <div class="inline-block">
            <div class="flex mb-3">
              <div class="relative">
                <img :src="fileLink('01.jpg')" class="size-9 min-w-[36px] rounded-full shadow dark:shadow-gray-700" alt="">
                <span class="absolute top-0.5 start-0.5 flex items-center justify-center bg-green-600 text-white text-[10px] font-bold rounded-full size-2 after:content-[''] after:absolute after:h-2 after:w-2 after:bg-green-600 after:top-0 after:end-0 after:rounded-full after:animate-ping"></span>
              </div>

              <div class="ms-2 max-w-lg">
                <p class="bg-white dark:bg-slate-900 text-gray-700 text-[16px] shadow dark:shadow-gray-700 dark:text-gray-200 px-3 py-2 rounded mb-1">
                  {{ message.message }}</p>
                <span class="text-slate-400 text-sm"><i class="mdi mdi-clock-outline me-1"></i>59 min ago</span>
              </div>
            </div>
          </div>
        </li>
      </ul>
    </div>

    <div class="p-2 border-t border-gray-100 dark:border-gray-800">
      <div class="flex">
        <input
            type="text"
            v-model="newMessage"
            @keyup.enter="sendMessage"
            class="form-input w-full py-2 px-3 h-9 mx-1 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 dark:border-gray-800 focus:ring-0"
            placeholder="Enter Message..." required>

        <div class="min-w-[125px] text-end">
          <button @click="sendMessage" class="size-9 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-[16px] text-center bg-green-600 hover:bg-green-700 border-green-600 hover:border-green-700 text-white rounded-md mr-1"><i class="mdi mdi-send"></i></button>
          <a href="" class="size-9 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-[16px] text-center bg-green-600 hover:bg-green-700 border-green-600 hover:border-green-700 text-white rounded-md mr-1"><i class="mdi mdi-emoticon-happy-outline"></i></a>
          <a href="" class="size-9 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-[16px] text-center bg-green-600 hover:bg-green-700 border-green-600 hover:border-green-700 text-white rounded-md mr-1"><i class="mdi mdi-paperclip"></i></a>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>

import {nextTick, onMounted, ref, watch} from "vue";
import axios from "axios";

  const props = defineProps({
    user: {
      type: Object,
      required: true
    },
    auth: {
      type: Object,
      required: true
    }
  });

  const messages = ref([]);
  const newMessage = ref("");
  const messagesContainer = ref(null);

  const fileLink = (file) => `/assets/images/client/${file}`;

  const scrollToBottom = () => {
    nextTick(() => {
      if (messagesContainer.value) {
        messagesContainer.value.scrollTo({
          top: messagesContainer.value.scrollHeight,
          behavior: "smooth",
        });
      }
    });
  };

  const fetchMessages = () => {
    axios
        .get(`/api/messages/${props.user.id}/`)
        .then((response) => {
          messages.value = response.data;
        })
        .catch((error) => {
          console.error("Error fetching messages:", error);
        });
  };

  const sendMessage = () => {
    if (newMessage.value.trim() !== "") {
      axios
          .post('/api/messages/', {
            sender: props.auth.id,
            receiver: props.user.id,
            text: newMessage.value,
          })
          .then((response) => {
            messages.value.push(response.data);
            newMessage.value = "";
          })
          .catch((error) => {
            console.error("Error sending message:", error);
          });
    }
  };

  watch(
      () => props.user.id,
      () => {
        fetchMessages();
      },
      {deep: true}
  );

  watch(
      messages,
      () => {
        scrollToBottom();
      },
      { deep: true }
  );

  onMounted(() => {
    fetchMessages();
    window.Echo.private(`channel.chat.${props.auth.id}`)
        .listen('GotMessage', (response) => {
          messages.value.push(response.message)
        })
  })
</script>
