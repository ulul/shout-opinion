@extends('layouts.app')

@section('header')
	@include('layouts.partials.header')
@endsection


@section('content')
	
	<div class="row mt-5">
            <div class="col-md-6">
                <h2 class="ml-5">{{ $user->name }}</h2>
                <p class="ml-5">Total post : {{ count($user_posts) }}</p>
            </div>
            <div class="col-md-6 text-center">
                
                @if ($user-> avatar == '')
                    <img src='{{ url('/img/app/ava.png') }}' class="rounded img-thumbnail mt-3" style="width: 100px;"></img>
                @else 
                    <img src='{{ Storage::url($user->avatar) }}' class="rounded-circle img-thumbnail mt-3" style="width: 100px;"></img>
                @endif

            </div>
        </div>
        @if (Auth::user())
            @if (Auth::user()->id == $user->id)
            <div class="row mb-5">
                <div class="col-md-6 ">
                    <a href="{{ route('user.edit.profile', $user->username) }}">
                        <button class="btn btn-primary ml-5">Edit Profile</button>
                    </a>
                </div>
            </div>
            @endif
        @endif
        <hr>
        @if (Session::get('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
        @endif

            <div class="row">
                @forelse ($user_posts AS $post)
                  
                    <div class="col-sm text-center mb-4">
                        <div class="card border-light" style="width: 18rem;">
                            <img alt="Card image cap" class="card-img-top img-thumbnail card-thumb" src="{{ Storage::url($post->thumbnail) }}">
                                <div class="card-body">
                                @if (Auth::user())
                                    @if (Auth::user()->id == $user->id)
                                        <a class="text-dark" href="{{ route('post.edit', $post->slug) }}">
                                    @else 
                                        <a class="text-dark" href="{{ route('post.detail', $post->slug) }}">
                                        
                                    @endif
                                @else    
                                    <a class="text-dark" href="{{ route('post.detail', $post->slug) }}">

                                @endif
                                        <h4 class="card-title">
                                            {{ $post->title }}
                                        </h4>
                                    </a>
                                    <p class="card-text text-left ">
                                    {{ $post->highlight }}
                                </p>
                                <h6 class="blockquote-footer text-left">
                                    {{ $post->user->name }}, {{ $post->created_at->diffForHumans() }}
                                </h6>
                            
                        </div>
                  
                    </div>
         
        {{ $user_posts->links() }}
            </div>
        @empty

        <p>No post available from this user</p>

        @endforelse
        

@endsection
