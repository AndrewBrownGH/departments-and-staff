<template>
  <div>
    <errors :errors="errors"></errors>
    <b-form>
      <label for="name">Название отдела</label>
      <b-form-input type="text" id="name" aria-describedby="name-help-block" v-model="form.name"></b-form-input>
      <b-form-text id="name-help-block">
        Название должно содержать не меньше 2 букв и должно быть уникальным.
      </b-form-text>
      <b-button class="mt-3" variant="outline-primary" @click.prevent="store">Добавить</b-button>
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
    errors: null,
  }),
  methods: {
    store() {
      axios.post('/api/departments', this.form, {
        headers: {
          'Content-type': 'application/json'
        }
      })
      .then(res => {
        if (res.data.success) {
          this.$router.push('/departments');
        } else {
          this.errors = res.data.errors;
        }
      })
    }
  }
}
</script>