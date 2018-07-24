@extends('layouts.app')

@section('header')
    @include('layouts.partials.header')
@endsection

@section('nav')
	@include('layouts.partials.nav')
@endsection

@section('content')


  
<h3>Popular Post</h3>
<hr>
<div class="row ml-4">
    @forelse ($popular_posts AS $post)
        <div class="col-sm text-center mb-4">
            <div class="card border-light" style="width: 18rem;">
                <img alt="Card image cap" class="card-img-top card-thumb" src="{{ Storage::url($post->thumbnail) }}">
                    <div class="card-body">
                        <a class="text-dark" href="{{ route('post.detail', $post->slug) }}">
                            <h4 class="card-title">
                                {{ ucfirst($post->title) }}
                            </h4>
                        </a>
                        <p class="card-text text-left">
                            {{ $post->highlight }}
                        </p>
                        <h6 class="blockquote-footer text-left">
                            {{ $post->user->name }}, {{ $post->created_at->diffForHumans() }}
                        </h6>
                    </div>
                </img>
            </div>
        </div>
    @empty
        <p>Opinion is empty</p>
    @endforelse    
    <hr>
    
    <a href="{{ route('post.index') }}">
        <h5 class="text-right">Show All Post</h5>
    </a>
    
</div>


<!-- jumbotron -->
<div class="jumbotron">
<h1 class="display-4">
    Welcome to Summer Story
</h1>
<p class="lead">
    Express yourself by writing
</p>
<hr class="my-4">
    <p>
        Write your story and share to everyone around the world.
    </p>
    <p class="lead">
        <a class="btn btn-outline-info btn-lg" href="#" role="button">
            Learn more
        </a>
    </p>
</hr>
</div>
<!-- /jumbotron -->
<div class="row mb-3">
<div class="col-sm-12 col-md-8">
    <h3>
        Latest Posts
    </h3>
    <hr>
    @forelse($posts as $post)
        <div class="row mb-2">
            <div class="col-8">
                <a class="text-dark" href="{{ route('post.detail', $post->slug) }}">
                    <h4 class="card-title">
                        {{ ucfirst($post->title) }}
                    </h4>
                </a>
                <p class="card-text text-left ">
                    {{ $post->highlight }}
                </p>
                <h6 class="blockquote-footer">
                    {{ $post->user->name }}, {{ $post->created_at->diffForHumans() }}
                </h6>
            </div>
            <div class="col-4">
              <img alt="Card image cap" class="card-img-top img-thumbnail card-thumb-small" src="{{ Storage::url($post->thumbnail) }}">
            </div>
      </div>
    @empty
        <p>Opinion is empty</p>
    @endforelse
        
    </hr>
</div>


</div>

@endsection
