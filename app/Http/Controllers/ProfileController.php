<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class ProfileController extends Controller
{
    public function index()
    {
        return view('pages.profile.profile');
    }

    protected function validator(Request $request)
    {
        if ($request->email != Auth::user()->email) {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'username' => ['required', 'min: 5', 'max:20', 'unique:users'],
                // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users', 'email:dns'],
            ]);
        } else {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'username' => ['required', 'min: 5', 'max:20'],
                // 'email' => ['required', 'string', 'email', 'max:255', 'email:dns'],
            ]);
        }


        if ($request->password) {
            $request->validate([
                'oldPassword' => ['required'],
                'password' => ['required', 'string', 'min:8'],
                'password_confirmation' => ['same:password'],
            ]);
        }
    }

    public function update(Request $request)
    {
        $this->validator($request);

        if (Hash::check($request['oldPassword'], Auth::user()->password)) {
            User::where('id', Auth::user()->id)->update([
                'name' => $request->name,
                'username' => $request->username,
                // 'email' => $request->email,
                'password' => Hash::make($request['newPassword']),
            ]);
        } else {
            throw ValidationException::withMessages([
                'action-failed' => 'Failed to Change Password!'
            ]);
        }

        return redirect()->route('profile.update');
    }
}
