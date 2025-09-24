<template>
  <div class="container">
    <div class="row justifyf-content-center">
      <div class="col-sm-6">
        <form @submit.prevent="submit">
          <div class="form-group row">
            <label for="title" class="col-sm-3 col-form-label">Title<span class="text-danger">*</span></label>
            <input type="text" class="col-sm-9 form-control" id="title" v-model="task.title">
            <span v-if="errors.title" class="text-danger">{{ errors.title[0] }}</span>
          </div>
          <div class="form-group row">
            <label for="content" class="col-sm-3 col-form-label">Content</label>
            <input type="text" class="col-sm-9 form-control" id="content" v-model="task.content">
          </div>
          <div class="form-group row">
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
    data: function () {
      return {
        task: {},
        errors: {},
        requiredFields: {
            title: true
        },
      }
    },
    methods: {
      submit() {
        this.errors = {};

        if (this.requiredFields.title && !this.task.title) {
            this.errors.title = ['タイトルは必須です。'];
            return;
        }
        axios.post('/api/tasks', this.task)
            .then(() => {
              this.$router.push({name: 'task.list'});
            })
            .catch(error => {
                if (error.response.status === 422) {
                    this.errors = error.response.data.errors;
                }
            });
      }
    }
  }
</script>
