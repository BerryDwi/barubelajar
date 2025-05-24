<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function profile($id)
    {

        $user = Auth::user()->find($id);

        return view('profile', compact('user'));
    }

    public function updateImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:3048', // maksimal 2MB
            'user_id' => 'required|integer|exists:users,id',
        ]);

        $user = \App\Models\User::findOrFail($request->user_id);

        // Simpan file image ke storage (misal folder 'profile')
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('profile', 'public');

            // Update field image di user (asumsi ada kolom image)
            $user->image = $imagePath;
            $user->save();

            return response()->json([
                'message' => 'Foto berhasil diupdate',
                'newImagePath' => asset('storage/' . $imagePath)
            ]);
        }

        return response()->json(['message' => 'Gagal mengupload foto'], 400);
    }
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }


    public function updateProfile(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'nullable|string|min:8',
        ]);

        // Cari user berdasarkan id
        $user = User::findOrFail($id);

        // Update data user
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        // Update password hanya jika diisi
        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        // Simpan perubahan
        $user->save();

        // Redirect atau response sesuai kebutuhan
        return redirect()->route('profile', $user->id)->with('status', 'User updated successfully.');
        // return redirect('/')->with('status', 'User updated successfully.');
    }




    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
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
}
