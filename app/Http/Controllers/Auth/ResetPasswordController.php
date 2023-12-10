<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Mail\Email;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class ResetPasswordController extends Controller
{
    public function index(Request $request)
    {
        $email = $request->query('email', null);
        $resetToken = $request->query('resetToken', null);

        if(!$email || !$resetToken) abort(404);
        return view('pages.validate-password', [
            'email' => $email,
            'resetToken' => $resetToken,
        ]);
    }

    public function generateMail(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email:dns'],
        ]);

        $user = $user = User::where('email', $request->email);

        if ($user->get()->count() < 1) return redirect()->route('generate.reset-password');

        $resetToken = Str::random(30);
        $expiredResetToken = Carbon::now()->addMinute(15);

        $user->update([
            'reset_token' => $resetToken,
            'expired_token' => $expiredResetToken,
        ]);

        Mail::to('temuinklusi.id@gmail.com')->send(new Email($request->email, $resetToken));

        return redirect()->route('login');
    }

    public function validatePassword(String $email, String $resetToken)
    {
        $user = User::where(
            [
                ['email', $email],
                ['reset_token', $resetToken],
                ['expired_token', '>=', now()],
            ]
            );

        if($user->get()->count() < 1) abort(500);

        return $user;
    }

    public function resetPassword(Request $request)
    {
        $data = $request->validate([
            'password' => ['required', 'string', 'min:8'],
            'password_confirmation' => ['same:password'],
        ]);

        $user = $this->validatePassword($request->email, $request->resetToken);
        $user->update([
            'password' => Hash::make($data['password']),
            'reset_token' => null,
            'expired_token' => null,
        ]);

        return redirect()->route(('login'));
    }
}
