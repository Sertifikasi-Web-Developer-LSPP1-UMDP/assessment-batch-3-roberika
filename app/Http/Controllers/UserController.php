<?php

namespace App\Http\Controllers;

use App\Models\UserStatus;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::select(['id', 'username', 'email', 'status_id', 'updated_at', 'email_verified_at'])
            ->where('status_id', '!=', UserStatus::ADMIN)
            ->orderBy('status_id', 'asc')
            ->latest('updated_at');
        return view('admin.users', [
            'users' => $users->paginate(30),
        ]);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('admin.users.index')
                ->with('error', 'Akun pengguna tidak ditemukan');
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
                ->with('error', 'Akun pengguna tidak ditemukan');
        }

        $user->status_id = UserStatus::INACTIVE;
        $user->save();

        return redirect()->route('admin.users.index')
            ->with('message', 'Akun pengguna berhasil dihapus');
    }
}
