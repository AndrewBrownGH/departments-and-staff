import vueRouter from 'vue-router';
import Vue from 'vue';

Vue.use(vueRouter);

import Index from './views/Index';
import Department from "./views/Departments/Department";
import CreateDepartment from "./views/Departments/CreateDepartment";
import Employee from "./views/Employees/Employee";

const routes = [
    {
        path: '/',
        component: Index
    },
    {
        path: '/departments',
        component: Department
    },
    {
        path: '/departments/create',
        component: CreateDepartment
    },
    {
        path: '/staff',
        component: Employee
    }
]

export default new vueRouter({
   mode: 'history',
   routes: routes
});