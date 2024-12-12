<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\AnnouncementStatus;
use App\Models\Applicant;
use App\Models\ApplicantStatus;
use App\Models\User;
use App\Models\UserStatus;

class DashboardController extends Controller
{
    public function nonadmin()
    {
        return view('dashboard');
    }

    public function admin()
    {
        $users = User::latest()->take(5)->get();
        $user_count = User::count();
        $pending_user_count = User::where('email_verified_at', '=', null)->count();
        $unverified_user_count = User::where('status_id', '=', UserStatus::VERIFYING)->count();

        $announcements = Announcement::latest()->take(5)->get();
        $announcement_count = Announcement::count();
        $unfinished_announcement_count = Announcement::where('status_id', '=', AnnouncementStatus::DRAFT)->count();
        $scheduled_announcement_count = Announcement::where('released_at', '>', now())->count();

        $applicants = Applicant::latest()->take(5)->get();
        $applicant_count = Applicant::count();
        $unprocessed_applicant_count = Applicant::where('status_id', '=', ApplicantStatus::VERIFYING)
            ->orWhere('status_id', '=', ApplicantStatus::ADMINISTRATION)
            ->orWhere('status_id', '=', ApplicantStatus::ASSESSMENT)
            ->orWhere('status_id', '=', ApplicantStatus::EVALUATION)
            ->count();

        return view('admin.dashboard', [
            'users' => $users,
            'user_count' => $user_count,
            'pending_user_count' => $pending_user_count,
            'unverified_user_count' => $unverified_user_count,
            'announcements' => $announcements,
            'announcement_count' => $announcement_count,
            'unfinished_announcement_count' => $unfinished_announcement_count,
            'scheduled_announcement_count' => $scheduled_announcement_count,
            'applicants' => $applicants,
            'applicant_count' => $applicant_count,
            'unprocessed_applicant_count' => $unprocessed_applicant_count,
        ]);
    }
}
