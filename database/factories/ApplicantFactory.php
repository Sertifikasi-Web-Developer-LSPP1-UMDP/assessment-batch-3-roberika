<?php

namespace Database\Factories;

use App\Models\ApplicantStatus;
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
            'name' => fake()->name(),
            'gender' => fake()->randomElement(['Laki-laki', 'Perempuan']),  
            'birthplace' => fake()->city(),
            'birthdate' => fake()->dateTime('-17 years'),
            'religion' => fake()->randomElement(['Buddha', 'Kristen', 'Islam', 'Hindu', 'Konghucu', 'Katolik', '']),
            'citizenship' => fake()->country(),
            'address' => fake()->address(),
            'phone_number' => fake()->unique()->numerify('08##-####-####'),
            'guardian_phone_number' => fake()->unique()->numerify('08##-####-####'),
            'school' => fake()->company(),
            'school_path' => fake()->randomElement(['IPA', 'IPS']),
            'major' => fake()->randomElement(['Informatika', 'Sistem Informasi', 'Teknik Elektro', 'Manajemen Informatika', 'Manajemen', 'Akutansi']),
            'reason' => fake()->sentence(),
            'status_id' => fake()->randomElement(ApplicantStatus::STATUSES),
        ];
    }
}
