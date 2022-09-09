<?php

namespace App\Http\Controllers;

use App\Models\User; // include Models \ user.php file
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function index($user): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        // gets the username id
        $user = User::findOrFail($user); //findOrFail() if you find give value otherwise show 404 page

        return view('profiles.index',[
            'user'=> $user, // returning username id to index.blade.php
        ]);
    }

    public function edit(User $user)
    {
        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        $data = \request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => '',
        ]);

        auth()->user()->profile->update($data);

//        return redirect('/profile/{$user->id}');

        return redirect('/profile/'.$user->id);
    }
}
