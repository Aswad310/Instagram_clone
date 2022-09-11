@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <img src="/storage/{{ $post->image }}" alt="" class="w-100">
        </div>
        <div class="col-4">
            <div>
                <div class="d-flex align-items-center">
                {{--Profile Image--}}
                    <div class="pe-3">
                        <img src="/storage/{{ $post->user->profile->image }}" class="rounded-circle w-100" style="max-width: 40px;">
                    </div>

                {{--Profile Name--}}
                    <div>
                        <div class="fw-bold">
                            <a href="/profile/{{ $post->user->id }}" class="text-decoration-none">
                                <span class="text-dark ">{{ $post->user->username }}</span>
                            </a>
                        {{--Profile Follow--}}
                            <a href="#" class="ps-3 text-decoration-none">Follow</a>
                        </div>
                    </div>
                </div>

                <hr>

                <p>
                    {{--Description Profile Name--}}
                    <span class="fw-bold">
                        <a href="/profile/{{ $post->user->id }}" class="text-decoration-none">
                            <span class="text-dark">{{ $post->user->username }}</span>
                        </a>
                    </span>
                    {{--Description Caption--}}
                    {{ $post->caption }}
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
