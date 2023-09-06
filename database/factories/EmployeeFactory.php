<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'job_id' => mt_rand(1,5),
            'nik' => fake()->nik(),
            'name' => fake()->name(),
            'birth_date' => fake()->dateTimeBetween('-40 years','-18 years'),
            'gender' => fake()->randomElement(['Pria','Wanita']),
            'address' => fake()->address(),
            'phone' => fake()->phoneNumber(),
            'email' => fake()->safeEmail(),
        ];
    }
}
