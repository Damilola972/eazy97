<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's name and email only.
     */
    public function update(Request $request): RedirectResponse
    {
        $user = auth()->user();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
        ]);

        $user->update($validated);

        return redirect()->route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Upload or update the user's profile picture.
     */
    public function updatePicture(Request $request): RedirectResponse
    {
        $request->validate([
            'profile_picture' => ['required', 'image', 'max:2048'],
        ]);

        $user = auth()->user();

        // Delete old picture if it exists
        if ($user->profile_picture && Storage::disk('public')->exists($user->profile_picture)) {
            Storage::disk('public')->delete($user->profile_picture);
        }

        // Store new picture
        $path = $request->file('profile_picture')->store('profile_pictures', 'public');
        $user->profile_picture = $path;
        $user->save();

        return redirect()->route('profile.edit')->with('status', 'profile-picture-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
    public function updatePassword(Request $request): RedirectResponse
{
    $request->validateWithBag('updatePassword', [
        'current_password' => ['required', 'current_password'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
    ]);

    $user = $request->user();
    $user->password = Hash::make($request->password);
    $user->save();

    return back()->with('status', 'password-updated');
}
}