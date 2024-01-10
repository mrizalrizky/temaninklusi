<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    // public function showUserList () {
    //     $users = User::where([
    //         ['active_flag', true],
    //         ['email', '<>', Auth::user()->email]]
    //     )->get();

    //     return view('pages.admin.manageUser', compact('users'));
    // }

    public function index() {
        $user = Auth::user();

        return view('pages.profile.profile', compact('user'));
    }

    protected function validateData(Request $request) {
        $rules = [
            'name' => 'required|string|max:128',
            // 'username' => 'required|min:5|max:32'
        ];
        if ($request->name != Auth::user()->name) {
            $rules['username'] = 'required|min:5|max:32|unique:users';
            // $request->validate([
            //     'name' => ['required', 'string', 'max:255'],
            //     'username' => ['required', 'min: 5', 'max:20', 'unique:users'],
            //     // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users', 'email:dns'],
            // ]);
        } else {
            $rules['username'] = 'required|min:5|max:32';
            // $request->validate([
            //     'name' => ['required', 'string', 'max:255'],
            //     'username' => ['required', 'min: 5', 'max:20'],
            //     // 'email' => ['required', 'string', 'email', 'max:255', 'email:dns'],
            // ]);
        }

        if ($request->password) {
            $rules['oldPassword'] = 'required';
            $rules['password'] = 'required|string|min:8';
            $rules['password_confirmation'] = 'same:password';
            // $request->validate([
            //     'oldPassword' => ['required'],
            //     'password' => ['required', 'string', 'min:8'],
            //     'password_confirmation' => ['same:password'],
            // ]);
        }

        $request->validate($rules);

        $data = $request->all();

        return redirect()->back()->with('profileModal', $data);
    }

    public function update(Request $request) {
        if (Hash::check($request['oldPassword'], Auth::user()->password)) {
            User::where('id', Auth::user()->id)->update([
                'name' => $request->name,
                'username' => $request->username,
                // 'email' => $request->email,
                'password' => Hash::make($request['newPassword']),
            ]);

            return redirect()->back()->with('action-success', 'Data anda berhasil diganti!');
        } else {
            return redirect()->back()->with('action-failed', 'Password yang anda masukkan salah! Silahkan coba lagi');
        }

        // return redirect()->route('profile.update');
    }

    public function banUser($id) {
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

    public function unbanUser($id) {
        try {
            $user = User::findOrFail($id);
            $user->update([
                'ban_flag' => false
            ]);

            return redirect()->route('admin.manage-user')->with('action-success', 'User berhasil diunban!');
        } catch (\Throwable $th) {
            return redirect()->route('admin.manage-user')->with('action-failed', 'User gagal diunban. Silahkan coba lagi!');
        };
    }
}
