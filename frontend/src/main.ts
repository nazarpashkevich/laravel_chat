import { createApp } from 'vue'
import router from './router'
import Axios from 'axios'

import './assets/main.css'

import App from './App.vue'
const user = localStorage.usersad;
const app = createApp(App)
app.config.globalProperties.user = user; // Allow axios in all components this.$http.get

app.use(router)
app.config.globalProperties.$http = Axios; // Allow axios in all components this.$http.get

app.mount('#app')
