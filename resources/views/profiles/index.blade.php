@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Profile section starts -->
    <div class="row">
        <div class="col-3 p-5">
            <img src="/svg/aswad.jpg" class="rounded-circle" alt="">
        </div>

        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <h1>{{ $user->username }}</h1>
                
                @can('update', $user->profile)
                    <a href="/p/create">Add New Post</a>
                @endcan

            </div>

            @can('update', $user->profile)
            <a href="/profile/{{$user->id}}/edit">Edit Profile</a>
            @endcan

            <div class="d-flex">
                <div class="pe-5"><strong>{{ $user->posts->count() }}</strong> posts</div>
                <div class="pe-5"><strong>30</strong> followers</div>
                <div class="pe-5"><strong>38</strong> following</div>
            </div>

            <div class="pt-4 fw-bold">{{ $user->profile->title }}</div>
            <div>{{ $user->profile->description }}</div>
            <div><a href="">{{ $user->profile->url }}</a></div>
        </div>
    </div>
    <!-- Profile section ends -->

    <!-- Gallery section starts -->
    <div class="row pt-5">
        @foreach($user->posts as $post)
        <div class="col-4 pb-4">
            <a href="/p/{{$post->id}}">
                <img src="/storage/{{ $post->image }}" class="w-100" alt="">
            </a>
        </div>
        @endforeach
    </div>
    <!-- Gallery section ends -->
</div>
@endsection
