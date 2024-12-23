<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserStatus;
use App\Models\ApplicantStatus;
use App\Models\AnnouncementStatus;
use Illuminate\Database\Seeder;

class InitialSeeder extends Seeder
{
    /**
     * Memasukkan data status dan satu akun admin
     */
    public function run(): void
    {
        UserStatus::factory()->create([ 'status' => 'verifying', ]);
        UserStatus::factory()->create([ 'status' => 'active', ]);
        UserStatus::factory()->create([ 'status' => 'pending', ]);
        UserStatus::factory()->create([ 'status' => 'inactive', ]);
        UserStatus::factory()->create([ 'status' => 'admin', ]);
            
        ApplicantStatus::factory()->create([ 'status' => 'verifying', ]);
        ApplicantStatus::factory()->create([ 'status' => 'administration', ]);
        ApplicantStatus::factory()->create([ 'status' => 'assessment', ]);
        ApplicantStatus::factory()->create([ 'status' => 'evaluation', ]);
        ApplicantStatus::factory()->create([ 'status' => 'rejected', ]);
        ApplicantStatus::factory()->create([ 'status' => 'accepted', ]);
        ApplicantStatus::factory()->create([ 'status' => 'inactive', ]);
            
        AnnouncementStatus::factory()->create([ 'status' => 'draft', ]);
        AnnouncementStatus::factory()->create([ 'status' => 'inactive', ]);
        AnnouncementStatus::factory()->create([ 'status' => 'active', ]);
        
        User::factory()->create([
            'username' => 'RobertAdmin',
            'password' => bcrypt('robertrobert'),
            'status_id' => UserStatus::ADMIN,
            'email' => 'robatononihon@gmail.com',
            'email_verified_at' => now(),
        ]);

        User::factory()->create([
            'username' => 'RobertUser',
            'password' => bcrypt('robertrobert'),
            'status_id' => UserStatus::ACTIVE,
            'email' => 'robert.antonius@mhs.mdp.ac.id',
            'email_verified_at' => now(),
        ]);
    }
}
