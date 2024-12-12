<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function update(Request $request, $id)
    {
        // TODO: Update hanya untuk ubah status
        $validatedData = $request->validate([
        ]);

        $user = User::findOrFail($id);
        $user->update($validatedData);

        return redirect()->route('admin.users.index');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index');
    }
}
