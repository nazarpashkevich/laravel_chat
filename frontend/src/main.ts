import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import Axios from 'axios'

import './assets/main.css'

const app = createApp(App)

app.use(router)
app.config.globalProperties.$http = Axios; // Allow axios in all components this.$http.get

app.mount('#app')
