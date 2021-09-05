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
    <div>
      <div class="d-flex justify-content-center" v-if="loading">
        <div class="spinner-border text-info" role="status">
          <span class="sr-only">Загрузка отделов...</span>
        </div>
      </div>
      <b-table hover :fields="fields" :items="departments.data" v-else-if="!loading" responsive="sm">
        <template #cell(index)="data">
          {{ data.index + 1 }}
        </template>
        <template #cell(actions)="data">
          <b-button variant="warning">
            <b-icon-pencil-square></b-icon-pencil-square>
          </b-button>
          <remove-btn :remove-callback="() => removeDepartment(data.item.id, data.index)"></remove-btn>
        </template>
      </b-table>
      <pagination align="center" :data="departments" @pagination-change-page="loadDepartments"></pagination>
    </div>
  </div>
</template>


<script>
import axios from "axios";
import Errors from '../../components/Errors'
import RemoveBtn from "../../components/RemoveBtn";

export default {
  components: {
    RemoveBtn,
    Errors
  },
  data() {
    return {
      fields: [
        { key: 'index', label: '#'},
        { key: 'name', label: 'Название'},
        { key: 'staff_count', label: 'К-во сотрудников', sortable: true },
        { key: 'max_salary', label: 'Max зарплата', sortable: true },
        { key: 'actions', label: 'Действия' }
      ],
      departments: {},
      errors: [],
      loading: true,
      loadingRemove: false,
    }
  },
  mounted() {
    this.loadDepartments();
  },
  methods: {
    loadDepartments(page = 1) {
      axios.get('/api/departments?page=' + page)
      .then(res => {
        this.departments = res.data;
        this.loading = false;
      })
    },
    removeDepartment(id, index) {
      return axios.delete('/api/departments/' + id)
      .then(res => {
        if (res.data.success) {
          this.departments.data.splice(index, 1);
        } else {
          this.errors.push(res.data.errors);
          console.log(this.errors);
        }
      })
    }
  }
}
</script>