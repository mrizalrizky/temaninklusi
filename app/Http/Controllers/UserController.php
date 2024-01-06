<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Catch_;

class UserController extends Controller
{
    // public function index() {
    //     return view('pages.profile.profile');
    // }

    // public function update() {
    //     $user->update(request()->all());
    // }

    public function bannedUser($id)
    {
        try {
            User::where([
                ['id', $id],
            ])->first()->update([
                'is_banned' => true
            ]);
            return redirect()->route('admin.manage-user')->with('action-success', 'User berhasil di banned!');
        } catch (\Throwable $th) {
            return redirect()->route('admin.manage-user')->with('action-failed', 'User gagal dibanned, silahkan coba lagi!');
        };
    }

    public function unbannedUser($id)
    {
        try {
            User::where([
                ['id', $id],
            ])->first()->update([
                'is_banned' => false
            ]);
            return redirect()->route('admin.manage-user')->with('action-success', 'User berhasil di unbanned!');
        } catch (\Throwable $th) {
            return redirect()->route('admin.manage-user')->with('action-failed', 'User gagal diunbanned, silahkan coba lagi!');
        };
    }
}
