<?php

namespace App\Http\Controllers;

use App\Models\User; // include Models \ user.php file
use Illuminate\Http\Request;
use Image;

class ProfilesController extends Controller
{
    public function index($user): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        // gets the username id
        $user = User::findOrFail($user); //findOrFail() if you find give value otherwise show 404 page
        return view('profiles.index', compact('user'));
    }

    public function edit(User $user): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $this->authorize('update', $user->profile);
        return view('profiles.edit', compact('user'));
    }

    public function update(User $user): \Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        $this->authorize('update', $user->profile);
        $data = \request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => 'image',
        ]);

        if(\request('image'))
        {
            // REMOVE Previous Image
            @unlink(public_path('/storage/'.$user->profile->image));

            $imagePath = \request('image')->store('profiles', 'public');
            //  intervention/image
            $image = Image::make(public_path('storage/'.$imagePath))->fit(1000, 1000);
            $image->save();
        }

        auth()->user()->profile->update(
            array_merge(
            $data,['image' => $imagePath]
            ));

        return redirect('/profile/'.$user->id);
    }
}
