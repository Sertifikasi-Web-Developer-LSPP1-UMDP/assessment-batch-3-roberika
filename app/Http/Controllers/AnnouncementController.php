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
            ->oldest('released_at')
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
            'summary' => 'required|string',
            'body' => 'required|string',
            'released_at' => 'required|date',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status_id' => 'required|integer',
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path().'/img/announcements/', $imageName);

        Announcement::create([
            'title' => $validatedData['title'],
            'summary' => $validatedData['summary'],
            'body' => $validatedData['body'],
            'released_at' => $validatedData['released_at'],
            'image_url' => 'img/announcements'.$imageName,
            'status_id' => $validatedData['status_id'],
        ]);

        return redirect()->route('admin.announcements.index')
            ->with('message', 'Pengumuman baru berhasil disimpan');
    }

    public function edit($id)
    {
        $announcement = Announcement::find($id);
        if (!$announcement) {
            return redirect()->route('admin.announcements.index')
                ->with('error', 'Pengumuman tidak ditemukan');
        }

        return view('admin.announcements.edit', compact('announcement'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'summary' => 'required|string',
            'body' => 'required|string',
            'released_at' => 'required|date',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'status_id' => 'required|integer',
        ]); 

        $announcement = Announcement::find($id);
        if (!$announcement) {
            return redirect()->route('admin.announcements.index')
                ->with('error', 'Pengumuman tidak ditemukan');
        }
        
        $announcement->update([
            'title' => $validatedData['title'],
            'summary' => $validatedData['summary'],
            'body' => $validatedData['body'],
            'released_at' => $validatedData['released_at'],
            'status_id' => $validatedData['status_id'],
        ]);

        if ($request->file != ''){   
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path().'/img/announcements/', $imageName);
            
            $announcement->update([
                'image_url' => 'img/announcements'.$imageName,
            ]);
        }

        return redirect()->route('admin.announcements.index')
            ->with('message', 'Pengumuman berhasil diperbaharui');
    }


    public function destroy($id)
    {
        $announcement = Announcement::find($id);
        if (!$announcement) {
            return redirect()->route('admin.announcements.index')
                ->with('error', 'Pengumuman tidak ditemukan');
        }

        $announcement->status_id = AnnouncementStatus::INACTIVE;
        $announcement->save();

        return redirect()->route('admin.announcements.index')
            ->with('message', 'Pengumuman berhasil dihapus');
    }
}
