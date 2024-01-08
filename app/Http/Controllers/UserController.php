<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    // public function index() {
    //     return view('pages.profile.profile');
    // }

    // public function update() {
    //     $user->update(request()->all());
    // }

    public function banUser($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->update([
                'ban_flag' => true
            ]);

            return redirect()->route('admin.manage-user')->with('action-success', 'User berhasil diban!');
        } catch (\Throwable $th) {
            return redirect()->route('admin.manage-user')->with('action-failed', 'User gagal diban. Silahkan coba lagi!');
        };
    }

    public function unbanUser($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->update([
                'ban_flag' => false
            ]);
            // User::where([
            //     ['id', $id],
            // ])->first()->update([
            //     'ban_flag' => false
            // ]);
            return redirect()->route('admin.manage-user')->with('action-success', 'User berhasil diunban!');
        } catch (\Throwable $th) {
            return redirect()->route('admin.manage-user')->with('action-failed', 'User gagal diunban. Silahkan coba lagi!');
        };
    }
}
