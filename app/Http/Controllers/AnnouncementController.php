<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;

class AnnouncementController extends Controller
{
    public function index()
    {
        $announcements = Announcement::paginate(30);
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
            //
        ]);

        Announcement::create($validatedData);

        return redirect()->route('admin.announcements.index')
            ->with('message', 'Pengumuman baru berhasil disimpan');
    }

    public function show(Announcement $announcement)
    {
        return view('admin.announcements.show', compact('announcement'));
    }

    public function edit(Announcement $announcement)
    {
        return view('admin.announcements.edit', compact('announcement'));
    }

    public function update(Request $request, Announcement $announcement)
    {
        $validatedData = $request->validate([
            //
        ]);

        $announcement->update($validatedData);

        return redirect()->route('admin.announcements.index')
            ->with('message', 'Pengumuman berhasil diubah');
    }

    public function destroy(Announcement $announcement)
    {
        $announcement->delete();

        return redirect()->route('admin.announcements.index')
            ->with('message', 'Pengumuman berhasil dihapus');
    }
}
