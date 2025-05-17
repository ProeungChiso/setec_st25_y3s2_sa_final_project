<?php

namespace App\Http\Controllers;

use App\Mail\SendNewPassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;

class ResetPasswordController extends Controller
{

    public function resetPasswordView(Request $request){
        return view('auth.reset-password');
    }
    public function resetPassword(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->email)->first();

        $newPassword = str()->random(10);
        $username = $user->username;

        $user->password = Hash::make($newPassword);
        $user->save();

        Mail::to($user->email)->send(new SendNewPassword($username, $newPassword));

        return redirect('/login')->with('success', 'Password reset successfully!');
    }
}
