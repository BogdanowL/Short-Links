require('./bootstrap');
window.Vue = require('vue').default;


import App from './components/App'
import Users from './components/Users'
import Validation from './components/Validation'

Vue.component('users', Users);
Vue.component('validation', Validation);

const app = new Vue({
    el: '#app',
    render: h => h(App)
});





