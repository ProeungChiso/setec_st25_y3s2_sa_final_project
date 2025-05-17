<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function updateUserInfo(Request $request): RedirectResponse{

        $user = Auth::user();

        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,'.$user->id,
            'phone_number' => 'nullable|string|max:20',
            'position' => 'nullable|string|max:255',
            'quote' => 'nullable|string',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user->first_name = $validated['first_name'];
        $user->last_name = $validated['last_name'];
        $user->username = $validated['username'];
        $user->phone_number = $validated['phone_number'];
        $user->position = $validated['position'];
        $user->quote = $validated['quote'];

        $user->save();

        return redirect()->back()->with('success', 'User info updated successfully!');
    }
    public function updatePassword(Request $request): RedirectResponse{

        // Validate the request data
        $validated = $request->validate([
            'current_password' => ['required', 'current_password'],
            'new_password' => ['required','confirmed'],
            'new_password_confirmation' => 'required|same:new_password',
        ],[
            'new_password.confirmed' => 'The confirmation password does not match.',
            ]
        );

        $user = Auth::user();
        $user->password = Hash::make($validated['new_password']);
        $user->save();

        return redirect()->back()->with('success', 'Password updated successfully!');
    }
    public function updateAvatar(Request $request): RedirectResponse{
        $validated = $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('public/avatars', $fileName);

            // Save to user
            $user = Auth::user();
            $user->avatar = Storage::url($filePath);
            $user->save();
        }

        return redirect()->back()->with('success', 'Avatar updated successfully.');
    }
}
