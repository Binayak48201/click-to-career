import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import App from './App.vue'


import {createApp} from 'vue'
import router from "./router";


const app = createApp(App);

app.use(router)

app.mount("#app")
