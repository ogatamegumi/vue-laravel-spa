import './bootstrap';
import { createRouter, createWebHistory } from 'vue-router';
import { createApp } from 'vue';

import HeaderComponent from './components/HeaderComponent.vue';
import TaskListComponent from './components/TaskListComponent.vue';
import ExampleComponent from './components/ExampleComponent.vue';

const routes = [
  {
    path: '/tasks',
    name: 'task.list',
    component: TaskListComponent
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

const app = createApp({});

app.component('example-component', ExampleComponent);
app.component('header-component', HeaderComponent)

app.use(router)

app.mount('#app', router);
