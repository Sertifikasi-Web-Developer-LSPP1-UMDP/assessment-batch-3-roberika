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
            'image_url' => asset('img/announcements/'.fake()->randomElement([
                'Campus-Digital_UQAM_5-EN-1.jpg',
                'CaseStudies_Lyft14.jpg',
                'eerdiagram.png',
                'Hero_Campus.jpg',
                'images.jpg',
                'sg-11134201-7rd48-lx6c429xy83u4e.jpg',
            ])), 
            'released_at' => fake()->dateTimeBetween('-1 month', '+1 month'),
        ];
    }
}
