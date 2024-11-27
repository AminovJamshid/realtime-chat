import './bootstrap';

import './hously/easy_background.js';
import './hously/plugins.init.js';
import './hously/jsvectormap.init.js'
import './hously/app.js';


import App from "./App.vue";
import { createApp } from 'vue';

const app = createApp({});
app.component('app', App).mount('#app');
