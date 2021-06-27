<template>
  <div>
    <errors :errors="errors"></errors>
    <div class="mb-3">
      <b-button variant="outline-primary">
        <router-link to="/departments/create" custom v-slot="{ href, route, navigate, isActive, isExactActive }">
          <NavLink :href="href" @click="navigate">
            Добавить отдел
          </NavLink>
        </router-link>
      </b-button>
    </div>

    <b-table hover :fields="fields" :items="departments" responsive="sm">
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
import Errors from '../../components/Errors'

export default {
  components: {
    Errors
  },
  data() {
    return {
      fields: [
        { key: 'name', label: 'Название'},
        { key: 'staff_count', label: 'К-во сотрудников', sortable: true },
        { key: 'max_salary', label: 'Max зарплата', sortable: true },
        { key: 'actions', label: 'Действия' }
      ],
      departments: [],
      errors: null,
    }
  },
  mounted() {
    this.loadDepartments();
  },
  methods: {
    loadDepartments() {
      axios.get('/api/departments/')
      .then(res => {
        this.departments = res.data;
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