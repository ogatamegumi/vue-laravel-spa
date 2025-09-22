import './bootstrap';
import { createRouter, createWebHistory } from 'vue-router';
import { createApp } from 'vue';

import HeaderComponent from './components/HeaderComponent.vue';
import TaskListComponent from './components/TaskListComponent.vue';
import ExampleComponent from './components/ExampleComponent.vue';
import TaskShowComponent from './components/TaskShowComponent.vue';

const routes = [
  {
    path: '/tasks',
    name: 'task.list',
    component: TaskListComponent
  },
  {
    path: '/tasks/:taskId',
    name: 'task.show',
    component: TaskShowComponent,
    props: true
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
