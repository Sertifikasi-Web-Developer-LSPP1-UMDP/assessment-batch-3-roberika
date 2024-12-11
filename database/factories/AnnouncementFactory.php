<?php

namespace Database\Factories;

use App\Models\AnnouncementStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Announcement>
 */
class AnnouncementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'summary' => fake()->paragraph(),
            'body' => fake()->paragraphs(3, true),
            'status' => AnnouncementStatus::where('status', fake()->randomElement(['draft', 'inactive', 'active']))->first()->id,,
            'released_at' => now(),
        ];
    }
}
