<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('profile.index', compact('user'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore(Auth::user()->id),
            ],
            'thumbnail' => 'nullable|image'
        ]);

        $user = Auth::user();
        $user->update($request->all());
        $user->generatePassword($request->get('password'));
        $user->uploadThumbnail($request->file('thumbnail'));

        return redirect()->back()->with('success', 'Профиль успешно обновлён');
    }
}
