import Vue from 'vue'
import App from './App.vue'
import store from './store'
import axios from 'axios'

import router from './router.js'

// import '../css/app.css'


import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

// import Vue from 'vue'
import {BootstrapVue, IconsPlugin} from 'bootstrap-vue'
import moment from 'moment';

Vue.use(BootstrapVue)
Vue.use(IconsPlugin)

//mixins
import user from './isAuthenticatedUser';

Vue.mixin(user);

Vue.filter('customDateFormat', function(value) {
  if (value) {
      return moment(String(value)).format('MMM DD')
  }
});

Vue.filter('defaultDateFormat', function(value) {
  if (value) {
      return moment(String(value)).format('DD MMM Y hh:mm a')    }
});


require('@/store/subscriber');

axios.defaults.baseURL = 'http://127.0.0.1:8000/'

Vue.config.productionTip = false

store.dispatch('attempt', localStorage.getItem('token')).then(() => {
  new Vue({
    router,
    store,
    render: h => h(App)
  }).$mount('#app')
})




