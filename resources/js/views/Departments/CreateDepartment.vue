<template>
  <div>
    <errors :errors="errors"></errors>
    <b-form>
      <label for="form.name">Название отдела</label>
      <b-form-input type="text" id="name" aria-describedby="name-help-block" v-model="form.name"></b-form-input>
      <b-form-text id="name-help-block">
        Название должно содержать не меньше 2 букв и должно быть уникальным.
      </b-form-text>
      <b-button class="mt-3" variant="outline-primary" @click.prevent="store">
        <b-spinner small v-if="loading"></b-spinner>
        Добавить
      </b-button>
    </b-form>
  </div>
</template>

<script>
import axios from 'axios';
import Errors from '../../components/Errors'

export default {
  components: {
    Errors
  },
  data: () => ({
    form: {
      name: '',
    },
    errors: [],
    loading: false,
  }),
  methods: {
    store() {
      this.loading = true;
      axios.post('/api/departments', this.form, {
        headers: {
          'Content-type': 'application/json'
        }
      })
      .then(res => {
        if (res.data.success) {
          this.$router.push('/departments');
        } else {
          this.errors.push(res.data.errors);
          console.log(this.errors);
          this.loading = false;
        }
      })
    }
  }
}
</script>