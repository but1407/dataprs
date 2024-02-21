require('./bootstrap');


import { createApp } from 'vue';
import App from './components/Example.vue';

// options components
// import FilenameOption from './components/FilenameOption';
// import AutoWidthOption from './components/AutoWidthOption';
// import BookTypeOption from './components/BookTypeOption';
createApp(App).mount('#app');