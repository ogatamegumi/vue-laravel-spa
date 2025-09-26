import './bootstrap';
import { createRouter, createWebHistory } from 'vue-router';
import { createApp } from 'vue';

import HeaderComponent from './components/HeaderComponent.vue';
import TaskListComponent from './components/TaskListComponent.vue';
import ExampleComponent from './components/ExampleComponent.vue';
import TaskShowComponent from './components/TaskShowComponent.vue';
import TaskCreateComponent from './components/TaskCreateComponent.vue';
import TaskEditComponent from './components/TaskEditComponent.vue';
import ShopPageComponent from './components/shopping/ShopPageComponent.vue';
import ProductItemComponent from './components/shopping/ProductItemComponent.vue';
import MyCartComponent from './components/shopping/MyCartComponent.vue';

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
  {
    path: '/tasks/create',
    name: 'task.create',
    component: TaskCreateComponent
  },
  {
    path: '/tasks/:taskId/edit',
    name: 'task.edit',
    component: TaskEditComponent,
    props: true
  },
  {
    path: '/shopping',
    name: 'shopping.list',
    component: ShopPageComponent,
  },
  {
    path: '/product/:productId',
    name: 'product.show',
    component: ProductItemComponent,
    props: route => ({ productId: Number(route.params.productId) })
  },
  {
    path: '/purchase',
    name: 'cart',
    component: MyCartComponent
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
