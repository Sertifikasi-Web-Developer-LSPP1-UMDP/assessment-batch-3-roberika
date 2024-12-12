<?php

namespace Database\Seeders;

use App\Models\Announcement;
use App\Models\Applicant;
use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->count(40)->create();
        User::factory()->count(40)
            ->has(Applicant::factory()->count(1), 'applicant')
            ->create();
        Announcement::factory(40)->create();
    }
}
