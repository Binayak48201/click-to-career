import axios from 'axios';

window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import App from './App.vue'

import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

import {createApp} from 'vue'
import router from "./router";


const app = createApp(App);

app.use(router).use(VueSweetalert2)

app.mount("#app")
