<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\DepartmentEmployee;
use App\Models\Employee;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Employee::factory(20)->create();
        Department::factory(10)->create();
        DepartmentEmployee::factory(40)->create();
    }
}
