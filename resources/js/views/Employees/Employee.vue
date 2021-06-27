<template>
  <div>
    <b-table hover :fields="fields" :items="employees" responsive="sm">
      <template #cell(actions)="data">
        <b-button variant="warning">
          <b-icon-pencil-square></b-icon-pencil-square> Edit
        </b-button>
        <b-button variant="danger" v-on:click="removeDepartment(data.item.id)">
          <b-icon-trash></b-icon-trash> Remove
        </b-button>
      </template>
    </b-table>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      fields: [
        { key: 'first_name', label: 'Имя', sortable: true},
        { key: 'last_name', label: 'Фамилия' },
        { key: 'patronyc', label: 'Отчество' },
        { key: 'sex', label: 'Пол' },
        { key: 'salary', label: 'Зарплата', sortable: true },
        { key: 'departments', label: 'Отделы' },
        { key: 'actions', label: 'Действия' }
      ],
      employees: [],
      errors: null,
    }
  },
  mounted() {
    this.loadEmployees();
  },
  methods: {
    loadEmployees() {
      axios.get('/api/employees/')
      .then(res => {
        this.employees = res.data;
      })
    },
    removeDepartment(id) {
      axios.delete('/api/departments/' + id)
      .then(res => {
        if (res.data.success) {
          this.$router.go();
        } else {
          this.errors = res.data.errors;
        }
      })
    }
  }
}
</script>

<style scoped>

</style>