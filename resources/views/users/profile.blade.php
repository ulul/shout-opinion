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
                <img src='{{ url('/img/app/ava.png') }}' class="rounded img-thumbnail mt-3" style="width: 100px;"></img>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-md-6 ">
                <button class="btn btn-default ml-5">Edit Profile</button>
            </div>
        </div>
        <hr>
        @forelse ($user_posts AS $post)

        <div class="row">
                    <div class="col-sm text-center mb-4">
                        <div class="card border-light" style="width: 18rem;">
                            <img alt="Card image cap" class="card-img-top" src="img/image1.jpeg">
                                <div class="card-body">
                                    <a class="text-dark" href="#">
                                        <h4 class="card-title">
                                            Post Title
                                        </h4>
                                    </a>
                                    <p class="card-text text-left">
                                        Some quick example text to build on the Post Title and make up the bulk of the card's content.
                                    </p>
                                </div>
                            </img>
                        </div>
                    </div>
                    <div class="col-sm text-center mb-1">
                        <div class="card border-light" style="width: 18rem;">
                            <img alt="Card image cap" class="card-img-top" src="img/image2.jpeg">
                                <div class="card-body">
                                    <a class="text-dark" href="#">
                                        <h4 class="card-title">
                                            Post Title
                                        </h4>
                                    </a>
                                    <p class="card-text text-left">
                                        Some quick example text to build on the Post Title and make up the bulk of the card's content.
                                    </p>
                                </div>
                            </img>
                        </div>
                    </div>
                    <div class="col-sm text-center mb-1">
                        <div class="card border-light" style="width: 18rem;">
                            <img alt="Card image cap" class="card-img-top" src="img/image3.jpeg">
                                <div class="card-body">
                                    <a class="text-dark" href="#">
                                        <h4 class="card-title">
                                            Post Title
                                        </h4>
                                    </a>
                                    <p class="card-text card-text text-left">
                                        Some quick example text to build on the Post Title and make up the bulk of the card's content.
                                    </p>
                                </div>
                            </img>
                        </div>
                    </div>
        </div>

        @empty

        <p>No post available from this user</p>

        @endforelse
        

@endsection
