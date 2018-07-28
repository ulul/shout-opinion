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
                <img alt="Card imagep cap" class="card-img-top card-thumb" src="{{ Storage::url($post->thumbnail) }}">
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
    Welcome to shoutopinion.com
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

<div class="col-md-4">
    <h3>
        Popular User
    </h3>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover">
            @foreach ($top_users AS $user)
                <tr>
                    
                    <td width="50">
                        @if ($user->avatar)
                            <img src="{{ Storage::url($user->avatar) }}" class="rounded-circle" width="60">
                        @else
                            <img src="{{ url('/img/app/ava.png') }}" class="rounded-circle" width="60">
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('user.profile', $user->username) }}" class="text-dark">
                            <p class="mt-2">{{ $user->name }}</p>
                        </a>
                        <p class="mt-2">{{ $user->posts_count }} Post</p>
                    </td>
                </tr>
            @endforeach
            
            </table>
        </div>
    </div>
</div>


</div>

@endsection
