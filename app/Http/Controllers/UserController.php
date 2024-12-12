<?php

namespace App\Http\Controllers;

use App\Models\UserStatus;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('status_id', '!=', UserStatus::ADMIN)
            ->latest()
            ->orderBy('status', 'asc')
            ->paginate(30);
        return view('admin.users', [
            'users' => $users,
        ]);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        
        if (!$user) {
            return redirect()->route('admin.users.index')
                ->with('error', 'Pengguna tidak ditemukan');
        }

        $user->status_id = $request->status_id;
        $user->save();

        return redirect()->route('admin.users.index')
            ->with('message', 'Status pengguna berhasil diubah');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        
        if (!$user) {
            return redirect()->route('admin.users.index')
                ->with('error', 'Pengguna tidak ditemukan');
        }

        $user->delete();

        return redirect()->route('admin.users.index')
            ->with('message', 'Pengguna berhasil dihapus');
    }
}
