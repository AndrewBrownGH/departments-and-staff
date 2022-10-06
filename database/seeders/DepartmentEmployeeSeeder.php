<?php

namespace Database\Seeders;

use App\Models\DepartmentEmployee;
use Illuminate\Database\Seeder;

class DepartmentEmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DepartmentEmployee::factory(40)->create();
    }
}
