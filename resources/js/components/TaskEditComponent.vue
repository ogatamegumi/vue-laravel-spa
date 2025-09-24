<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-sm-6">
        <form @submit.prevent="submit">
          <div class="form-gropu row">
            <label for="id" class="col-sm-3 col-form-label">ID</label>
            <input type="text" class="col-sm-9 form-control-plaintext" readonly id="id" v-model="task.id">
          </div>
          <div class="form-gropu row">
            <label for="title" class="col-sm-3 col-form-label">Title<span class="text-danger">*</span></label>
            <input type="text" class="col-sm-9 form-control" id="title" v-model="task.title">
            <span v-if="errors.title" class="text-danger">{{ errors.title[0] }}</span>
          </div>
          <div class="form-gropu row">
            <label for="content" class="col-sm-3 col-form-label">Content</label>
            <input type="text" class="col-sm-9 form-control" id="content" v-model="task.content">
          </div>
          <div class="form-gropu row">
            <label for="person-in-charge" class="col-sm-3 col-form-label">Person In Charge</label>
            <input type="text" class="col-sm-9 form-control" id="person-in-charge" v-model="task.person_in_charge">
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    taskId: String
  },
  data: function() {
    return {
      task: {},
      errors: {},
    }
  },
  methods: {
    getTask() {
      axios.get('/api/tasks/' + this.taskId)
          .then((res) => {
            this.task = res.data;
          });
    },
    submit() {
this.errors = {};
      axios.put('/api/tasks/' + this.taskId, this.task)
          .then(() => {
            this.$router.push({name: 'task.list'});
          })
          .catch(error => {
            if (error.response.status === 422) {
                this.errors = error.response.data.errors;
            }
          });
    }
  },
  mounted() {
    this.getTask();
  }
}
</script>
