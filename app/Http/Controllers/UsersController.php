<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\UpdateProfileRequest;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        return view('users.index')->with('users', User::all());
    }


    public function edit()
    {
        //return only the authanticated user
        return view('users.edit')->with('user', auth()->user());
    }


    public function update(UpdateProfileRequest $request)
    {

        $user = auth()->user();

        $user->update([
            'name' => $request->name,
            'about' => $request->about
        ]);

        session()->flash('success', 'User updated Succesfully.');

        return redirect()->back();
    }

    public function makeAdmin(User $user)
    {
        $user->role = 'admin';

        $user->save();

        session()->flash('success', 'User made Admin Succesfully.');

        return redirect(route('users.index'));
    }
}
