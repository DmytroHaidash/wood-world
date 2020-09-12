require('./bootstrap');
require('simplebar');
import 'simplebar/dist/simplebar.css';

import Editor from './components/Editor';
import Accountings from './components/Accountings';
import PasswordChange from "./components/PasswordChange";

new Vue({
  el: '#app',
  components: {
    ...Editor,
    Accountings,
    PasswordChange,
  },
  mounted() {
    require('./modules/notifications');
    require('./modules/phone-mask');
  }
});
