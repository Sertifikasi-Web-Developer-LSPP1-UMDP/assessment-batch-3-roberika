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
        $status_id = fake()->randomElement(AnnouncementStatus::STATUSES);
        return [
            'title' => fake()->sentence(),
            'summary' => fake()->paragraph(2),
            'body' => fake()->paragraphs(3, true),
            'status_id' => $status_id,
            'released_at' => $status_id == AnnouncementStatus::DRAFT ? null : fake()->dateTimeBetween('-1 month', '+1 month'),
        ];
    }
}
