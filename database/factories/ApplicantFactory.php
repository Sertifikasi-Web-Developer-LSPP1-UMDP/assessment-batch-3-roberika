<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Applicant>
 */
class ApplicantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_number' => fake()->unique()->numerify('2125######'),
            'name' => fake()->name(),
            'phone_number' => fake()->unique()->numerify('08##-####-####'),
            'gender' => fake()->randomElement(['male', 'female']),  
            'birthday' => fake()->date(),
            'religion' => fake()->randomElement(['buddhism', 'christianity', 'islam', 'hinduism', 'confucianism', 'others']),
            'address' => fake()->address(),
            'guardian_phone_number' => fake()->unique()->numerify('08##-####-####'),
            'status_id' => ApplicantStatusFactory::verifying(),
        ];
    }
}
