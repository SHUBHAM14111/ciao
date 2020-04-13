@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    <div class="col-3"><img src="{{$user->profile->profileImage()}}" class="rounded-circle" height="200px" alt=""></div>
        <div class="col-9">
        <div class="d-flex justify-content-between align-items-baseline">
        <div class="d-flex align-items-center pb-3">
            <div class="h4">{{$user->username}}</div>
            @can('follow',$user->profile)
            <follow-button user-id = "{{$user->id}}" follows="{{$follows}}"></follow-button>
            @endcan
        </div>
            @can('update',$user->profile);
            <a href="/posts/create" class="btn btn-primary">Add New Post</a>        
            @endcan
        </div>
        @can('update',$user->profile)
        <a href="/profile/{{$user->id}}/edit">Edit Profile</a>        
        @endcan
    
            <div class="d-flex">
                <div class="pr-4"><strong>{{$user->posts->count()}}</strong> posts</div>
            <div class="pr-4"><strong>{{$user->profile->followers->count()}}</strong> followers</div>
            <div class="pr-4"><strong>{{$user->following->count()}}</strong> following</div>
            </div>
        <div class="font-weight-bold">{{$user->profile->title}}</div>
        <div>{{$user->profile->description}}</div>
        <div>{{$user->profile->url}}</div>
        </div>
    </div>
    @if(!$user->posts->count())
<div class="text-center"><h1>Wow,so empty</h1></div>
@endif
<div class="row pt-5">
    @foreach ($user->posts as $post)
<div class="col-4 pb-4" >
<a href="/posts/{{$post->id}}"><img src="/storage/{{$post->image}}" alt="" class="w-100"></a>    
</div>
    @endforeach
</div>    
</div>

@endsection
