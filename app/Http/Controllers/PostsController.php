<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('posts/create');
    }

    public function store()
    {
        $data = \request()->validate([
//            'other_name' => '',
            'caption' => 'required',
            'image' => ['required', 'image'],
        ]);

        auth()->user()->posts()->create($data);

        dd(request()->all());
    }
}
