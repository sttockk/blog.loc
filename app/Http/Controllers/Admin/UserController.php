<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(5);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'thumbnail' => 'image|nullable',
        ]);

        $user = User::add($request->all());
        $user->generatePassword($request->get('password'));
        $user->uploadThumbnail($request->file('thumbnail'));

        return redirect()->route('users.index')->with('success', 'Пользователь был успешно добавлен');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $request->validate([
            'name' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id),
            ],
            'thumbnail' => 'nullable|image',
        ]);

        $user->update($request->all());
        $user->generatePassword($request->get('password'));
        $user->uploadThumbnail($request->file('thumbnail'));

        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        User::find($id)->remove();
        return redirect()->route('users.index');
    }

    public function toggleAdmin($id)
    {
        $user = User::find($id);
        $user->toggleAdmin();

        return redirect()->back();
    }

    public function toggleBan($id)
    {
        $user = User::find($id);
        $user->toggleBan();

        return redirect()->back();
    }
}
