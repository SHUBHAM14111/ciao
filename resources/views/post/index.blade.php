@extends('layouts.app')

@section('content')
<div class="container">
    @foreach($posts as $post)
    <div class="border pb-4 col-8 card">
        <div class="row card-title pt-2">
            <div class="col-4">
                    <div class="d-flex align-items-center">
                        <div class="pr-3">
                            <img src="{{$post->user->profile->profileImage()}}" class="rounded-circle w-100" style="max-width:40px" alt="">
                        </div>
                    <div class="pr-3"><strong><a href="/profile/{{$post->user->id}}"><span class="text-dark">{{$post->user->username}}</span></a></strong></div>
                    </div>
            </div>
        </div>
        <div class="row border-top card-body">
            <div class="col-10 offset-1">
                <br>
                <img src="/storage/{{$post->image}}" alt="" class="w-100">
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <p><strong><a href="/profile/{{$post->user->id}}"><span class="text-dark">{{$post->user->username}}</span></a></strong>{{$post->caption}}</p>
            </div>
        </div>
    </div>
    <br>
    @endforeach
</div>
@endsection
