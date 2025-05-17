<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request): RedirectResponse
    {

        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $username = $request->input('username');
        $email = $request->input('email');
        $password = $request->input('password');
        $confirmed_password = $request->input('confirmed_password');

        if($password == "" || $confirmed_password == "" || $firstname == "" || $lastname == "" || $username == "" || $email == ""){
            return redirect()->back()->with('error', 'All fields are required!');
        }

        if($password != $confirmed_password){
            return redirect()->back()->with('error', 'Passwords do not match!');
        }

        if($email || $username){
            $existingUser = User::where('email', $email)->first();

            if($existingUser){
                return redirect()->back()->with('error', 'Email already exists!');
            }
        }

        $user = new User();

        $user->username = $username;
        $user->first_name = $firstname;
        $user->last_name = $lastname;
        $user->email = $email;
        $user->phone_number = str()->random(8);
        $user->password = Hash::make($password);
        $user->role_id = 3;

        $user->save();

        return redirect()->back()->with('success', 'User registered successfully!');

    }
    public function login(Request $request): RedirectResponse
    {
        $email = $request->input('email');
        $password = $request->input('password');

        if(empty($email) || empty($password)){
            return redirect()->back()->with('error', 'All fields are required!');
        }

        if(Auth::attempt(['email' => $email, 'password' => $password])){
            $user = User::find(Auth::id());

            if ($user && Hash::needsRehash($user->password)) {
                $user->password = Hash::make($password);
                $user->save();
            }

            if ($user->role_id === 3 || $user->role->name === 'author') {
                return redirect()->back()->with('success', 'User logged in successfully!');
            }
        }

        return redirect()->back()->with('error', 'Invalid email or password!');
    }
    public function logout(): RedirectResponse{
        Auth::logout();
        return redirect('/')->with('success', 'User logged out successfully!');
    }
}
