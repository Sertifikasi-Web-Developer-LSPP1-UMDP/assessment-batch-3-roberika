<?php

namespace App\Http\Controllers;

use App\Models\AnnouncementStatus;
use Illuminate\Http\Request;
use App\Models\Announcement;
use Illuminate\Support\Facades\Log;

class AnnouncementController extends Controller
{
    // Menampilkan pengumuman pada landing page
    public function welcome()
    {
        $announcements = Announcement::where('released_at', '<', now())
            ->where('status_id', '=', AnnouncementStatus::ACTIVE)
            ->paginate(30);
        return view('welcome', [
            'announcements' => $announcements,
        ]);
    }

    // Menampilkan daftar pengumuman pada dashboard admin
    public function index()
    {
        $announcements = Announcement::latest('updated_at')
            ->paginate(30);
        return view('admin.announcements.index', [
            'announcements' => $announcements,
        ]);
    }

    public function create()
    {
        return view('admin.announcements.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'summary' => 'string',
            'body' => 'required|string',
            'released_at' => 'date',
            'status_id' => 'integer',
        ]);

        Announcement::create([
            'title' => $validatedData['title'],
            'summary' => $validatedData['summary'],
            'body' => $validatedData['body'],
            'released_at' => $validatedData['released_at'],
            'status_id' => $request->status_id ?? AnnouncementStatus::DRAFT,
        ]);

        return redirect()->route('admin.announcements.index')
            ->with('message', 'Pengumuman baru berhasil disimpan');
    }

    public function edit($id)
    {
        $announcement = Announcement::find($id);

        return view('admin.announcements.edit', compact('announcement'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'summary' => 'string',
            'body' => 'required|string',
            'released_at' => 'date',
            'status_id' => 'integer',
        ]); 

        Log::debug($request->status_id);

        $announcement = Announcement::find($id);
        $announcement->update($validatedData);

        return redirect()->route('admin.announcements.index')
            ->with('message', 'Pengumuman berhasil diperbaharui');
    }


    public function destroy($id)
    {
        $announcement = Announcement::find($id);
        $announcement->status_id = AnnouncementStatus::INACTIVE;
        $announcement->save();

        return redirect()->route('admin.announcements.index')
            ->with('message', 'Pengumuman berhasil dihapus');
    }
}
