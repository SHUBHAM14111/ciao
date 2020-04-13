@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row white">
        <div class="col-8">
            <img src="/storage/{{$post->image}}" alt="" class="w-100">
        </div>
        <div class="col-4">
            <div>
                <div class="d-flex align-items-center">
                    <div class="pr-3">
                        <img src="{{$post->user->profile->profileImage()}}" class="rounded-circle w-100" style="max-width:40px" alt="">
                    </div>
                <div class="pr-3"><strong><a href="/profile/{{$post->user->id}}"><span class="text-dark">{{$post->user->username}}</span></a></strong></div>
                {{-- <a href="#" class="btn btn-primary">Follow</a> --}}
            </div>
            <hr>
            <p><strong><a href="/profile/{{$post->user->id}}"><span class="text-dark">{{$post->user->username}}</span></a></strong>{{$post->caption}}</p>
            </div>
        </div>
    </div>
</div>
@endsection
