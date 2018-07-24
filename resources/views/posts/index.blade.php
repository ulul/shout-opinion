@extends('layouts.app')

@section('header')
    @include('layouts.partials.header')
@endsection

@section('nav')
    @include('layouts.partials.nav')
@endsection

@section('content')

	 <div class="row">
	 @forelse ($posts AS $post)
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
	       <p>Post is empty</p>
       @endforelse
    </div>
    {{ $posts->links() }}
@endsection