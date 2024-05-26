<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('backend.general.profile');
    }

    public function update(Request $request)
    {
        /** @var \App\Models\User $user **/

        $user = Auth::user();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'old_password' => ['nullable', 'string', 'min:8', new MatchOldPassword],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);        

        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }
        
        $user->save();

        $this->flashMessage('success', 'Credentials has been updated.');
        return redirect()->route('dashboard');
    }
}
