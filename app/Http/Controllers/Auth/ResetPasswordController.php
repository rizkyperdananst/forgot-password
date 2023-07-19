<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
// use Illuminate\Validation\Rules\Password;

class ResetPasswordController extends Controller
{
    public function passwordReset($token)
    {
        return view('auth.reset-password', ['token' => $token]);
        // return 'Berhasil kirim email notifikasi reset password';
    }

    public function passwordUpdate(Request $request)
    {
        // return 'Ini reset password';
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
        ])->setRememberToken(Str::random(60));
 
        $user->save();
            event(new PasswordReset($user));
        }
    );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('/')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
}
