import { createApp } from 'vue';
import MyVueComponent from './Pages/Message/Index.vue';
import './bootstrap';
import '../sass/app.scss';

const app = createApp({
    // ...
});

app.component('my-vue-component', MyVueComponent);

app.mount('#app');
