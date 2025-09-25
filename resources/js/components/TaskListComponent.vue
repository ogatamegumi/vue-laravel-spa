<template>
  <div class="container">
    <ShopPageComponent />
    <hr>
    <div class="p-3">
      <label>絞りこみ検索</label>
      <select v-model="filterStatus" @change="fetchTasks">
          <option :value="null">すべて</option>
          <option :value="false">未完了</option>
          <option :value="true">完了</option>
      </select>
    </div>
    <table class="table table-hover">
      <thead class="thead-light">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Title</th>
          <th scope="col">Completed</th>
          <th scope="col">Content</th>
          <th scope="col">Person In Change</th>
          <th scope="col">Show</th>
          <th scope="col">Edit</th>
          <th scope="col">Delete</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(task, index) in tasks" :key="index">
          <th scope="row">{{ task.id }}</th>
            <td>{{ task.title }}</td>
            <td>{{ task.is_completed ? '☑' : '☐' }}</td>
            <td>{{ task.content }}</td>
            <td>{{ task.person_in_charge }}</td>
            <td>
              <router-link v-bind:to="{name: 'task.show', params: {taskId: task.id}}">
                <button class="btn btn-primary">Show</button>
              </router-link>
            </td>
            <td>
              <router-link v-bind:to="{name: 'task.edit', params: {taskId: task.id}}">
                <button class="btn btn-danger">Edit</button>
              </router-link>
            </td>
            <td>
              <button class="btn btn-danger" v-on:click="deleteTask(task.id)">Delete</button>
            </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import ShopPageComponent from './shopping/ShopPageComponent.vue';

  export default {
    data: function() {
      return {
        tasks: [],
        filterStatus: [],
      }
    },
    methods: {
      getTasks() {
        axios.get('/api/tasks')
            .then((res) => {
              this.tasks = res.data;
            });
      },
      deleteTask(id) {
        axios.delete('/api/tasks/' + id)
            .then(() => {
              this.getTasks();
            });
      },
      fetchTasks() {
        axios.get('/api/tasks', {
            params: { is_completed: this.filterStatus }
        }).then(res => {
            this.tasks = res.data;
        });
      }
    },
    mounted() {
      this.getTasks();
      this.fetchTasks();
    }
  }
</script>
