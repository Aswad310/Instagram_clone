<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Intervention\Image\Facades\Image;
use Image;

class PostsController extends Controller
{
    // this middleware used when someone trys to reach create Post page without login
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('posts/create');
    }

    public function store(): \Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        $data = \request()->validate([
            // 'other_name' => '',
            'caption' => 'required',
            'image' => ['required', 'image'],
        ]);
        // create 'uploads' is a sub-folder in already present 'public' folder
        // requested image is store in 'uploads' folder
        $imagePath = \request('image')->store('uploads', 'public');

        //  intervention/image
        $image = Image::make(public_path('storage/'.$imagePath))->fit(1200, 1200);
        $image->save();

        auth()->user()->posts()->create([ // create() is a method
            'caption' => $data['caption'],
            'image' => $imagePath,
        ]);

        return redirect('/profile/'.auth()->user()->id);

        // dd(request()->all());
    }
}
