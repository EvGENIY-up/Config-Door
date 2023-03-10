import './bootstrap';
import { createApp } from 'vue';

const app = createApp({});

import HomeComponent from './components/HomeComponent.vue';
app.component('home-component', HomeComponent);

import HeaderComponent from './components/layouts/HeaderComponent.vue';
app.component('header-component', HeaderComponent);

import FooterComponent from './components/layouts/FooterComponent.vue';
app.component('footer-component', FooterComponent);

app.mount('#app');
