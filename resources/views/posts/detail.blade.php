@extends('layouts.app')

@section('header')
    @include('layouts.partials.header')
@endsection

@section('nav')
    @include('layouts.partials.nav')
@endsection

@section('content')
<div class="row">
    <div class="col-sm-6 ">
        <div style="margin-bottom: 12rem"></div>
        <!--special mark for article-->
        <h6 class="mr-auto">{{ $post->category->category }}</h6>
        <!--Main title of article-->
        <h1 class="font-weight-bold mr-auto">{{ $post->title }}</h1>
        <!--Short synopsis-->
      
        
    </div>
    <div class="col-sm-6 mb-5">
        <div style="margin-bottom: 5rem"></div>
        <img src="{{ Storage::url($post->thumbnail) }}" alt="{{ $post->title }}" class="card-thumb float-right">
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-10">
        {!! $post->description !!}
    </div>
</div>
<div class="row justify-content-center mt-4 ">
    <div class="col-10">
     <a href="{{ route('user.profile', $post->user->username) }}" class="text-dark">
    @if ($post->user->avatar)
        <img src="{{ Storage::url($post->user->avatar) }}" class="rounded-circle" style="width: 30px;">
    @else
        <img src="{{ url('/img/app/ava.png') }}" class="rounded-circle" style="width: 30px;">
    @endif
    {{ $post->user->name }}
    </a>
    </div>
</div>

<h3 class="mt-4">Related Post</h3>
<hr>
<div class="row mt-3">
    @forelse ($related_post AS $post)
    <div class="col-md-4">
        <a href="{{ route('post.detail', $post->slug) }}" class="text-dark">
            <img src="{{ Storage::url($post->thumbnail) }}" class="card-img-top card-thumb">
            <h3 class="caption">
                <p>{{ ucfirst($post->title) }}</p>
            </h3>
        </a>
    </div>
    @empty 

    @endforelse
</div>
<div class="container p-5">
    <h3>Comments</h3>
    <hr>
    @if (Auth::user())
        @if (Auth::user()->avatar)
            <img src="{{ Storage::url(Auth::user()->avatar) }}" class="rounded-circle" style="width: 30px;">
        @else
            <img src="{{ url('/img/app/ava.png') }}" class="rounded-circle" style="width: 30px;">
        @endif
        {{ Auth::user()->name }}
        <form class="mt-2" method="POST" action="{{ route('comment.store', $post->id) }}">
            @csrf
            <textarea name="comment" class="form-control" style="resize: none;"></textarea>
            <button type="submit" class="btn btn-primary mt-2">Publish</button>
        </form>
    @else
        <div class="col">
            <a href="{{ route('login') }}">
            <button  class="btn btn-outline-info mt-2  mr-3" type="button">
                Sign In
            </button>
            </a>
            <span class="mt-5 mr-3">or</span> 
            <a href="{{ route('register') }}">
            <button  class="btn btn-outline-info mt-2  mr-3" type="button">
                Register
            </button>
            </a> to comment
        </div>
    @endif
    <div class="container-fluid mt-5">
    @foreach ($comments AS $comment)
        <div class="alert alert-light border-primary" role="alert">
            <p>
            @if ($comment->user->avatar)
                <img src="{{ Storage::url($comment->user->avatar) }}" class="rounded-circle" style="width: 30px;"> 
            @else
                <img src="{{ url('/img/app/ava.png') }}" style="width: 30px;">
            @endif
            {{ $comment->user->name }}</p>
            {{ $comment->comment }}
        </div>
    @endforeach
    </div>
</div>
        
@endsection