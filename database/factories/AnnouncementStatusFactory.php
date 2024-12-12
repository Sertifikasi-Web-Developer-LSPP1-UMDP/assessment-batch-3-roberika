<?php

namespace Database\Factories;

use App\Models\Announcement;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AnnouncementStatus>
 */
class AnnouncementStatusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return AnnouncementStatusFactory::draft();
    }

    public static function draft(): array
    {
        return [
            'status' => 'draft',
        ];
    }
    
    public static function inactive(): array
    {
        return [
            'status' => 'inactive',
        ];
    }
    
    public static function active(): array
    {
        return [
            'status' => 'active',
        ];
    }
}
