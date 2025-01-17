import axios from 'axios'
import Vue from 'vue';

axios.defaults.baseURL = 'http://localhost/api/v1/'
axios.defaults.headers.common['Content-Type'] = 'application/json'
axios.defaults.headers.common.Accept = 'application/json'

Vue.prototype.$axios = axios;