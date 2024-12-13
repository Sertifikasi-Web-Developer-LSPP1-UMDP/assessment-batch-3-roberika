<?php

namespace Database\Seeders;

use App\Models\Announcement;
use App\Models\AnnouncementStatus;
use App\Models\Applicant;
use App\Models\User;
use Illuminate\Database\Seeder;

class DummySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(40)->create();
        User::factory(40)
            ->has(Applicant::factory()->count(1), 'applicant')
            ->create();
        Announcement::factory(30)->create();
        Announcement::factory(30)->create([
            'released_at' => now(),
            'status_id' => AnnouncementStatus::ACTIVE,
        ]);
    }
}
