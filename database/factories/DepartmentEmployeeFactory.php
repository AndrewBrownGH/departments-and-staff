<?php

namespace Database\Factories;

use App\Models\DepartmentEmployee;
use Illuminate\Database\Eloquent\Factories\Factory;

class DepartmentEmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DepartmentEmployee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'department_id' => $this->faker->numberBetween(1, 10),
            'employee_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
