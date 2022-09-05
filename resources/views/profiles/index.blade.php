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
                <a href="#">Add New Post</a>
            </div>

            <div class="d-flex">
                <div class="pe-5"><strong>49</strong> posts</div>
                <div class="pe-5"><strong>30</strong> followers</div>
                <div class="pe-5"><strong>38</strong> following</div>
            </div>

            <div class="pt-4 fw-bold">{{ $user->profile->title }}</div>
            <div>{{ $user->profile->description }}</div>
            <div><a href="">{{ $user->profile->url }}</a></div>
        </div>
    </div>
    <!-- Profile sction ends -->

    <!-- Gallery section starts -->
    <div class="row pt-5">
        <div class="col-4">
            <img src="/images/aswad1.jpg" class="w-100" alt="">
        </div>
        <div class="col-4">
            <img src="/images/aswad2.jpg" class="w-100" alt="">
        </div>
        <div class="col-4">
            <img src="/images/aswad3.jpg" class="w-100" alt="">
        </div>
    </div>
    <!-- Gallery section ends -->
</div>
@endsection
