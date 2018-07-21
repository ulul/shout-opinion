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
                    <img src='{{ Storage::url($user->avatar) }}' class="rounded img-thumbnail mt-3" style="width: 100px;"></img>
                @endif

            </div>
        </div>

        <div class="row mb-5">
            <div class="col-md-6 ">
                <a href="{{ route('user.edit.profile', $user->username) }}">
                    <button class="btn btn-primary ml-5">Edit Profile</button>
                </a>
            </div>
        </div>
        <hr>
        @forelse ($user_posts AS $post)
        @if ($loop->iteration % 3 == 0 || $loop->iteration == 1)
            <div class="row">
        @endif
                  
                    <div class="col-sm text-center mb-4">
                        <div class="card border-light" style="width: 18rem;">
                            <img alt="Card image cap" class="card-img-top img-thumbnail" src="{{ url('img/'.$post->thumbnail) }}">
                                <div class="card-body">
                                    <a class="text-dark" href="{{ route('post.detail', $post->slug) }}">
                                        <h4 class="card-title">
                                            {{ $post->title }}
                                        </h4>
                                    </a>
                                    <p class="card-text text-left ">
                                    @php
                                        $str = '';
                                        $pecah = explode(" ", $post->description);
                                        if(count($pecah) >= 20){
                                            $j = 20;
                                        }else{
                                            $j = count($pecah);
                                        }
                                        for ($i=0; $i < $j; $i++) { 
                                            $str.=$pecah[$i]." ";
                                        }
                                    @endphp
                                    {{ $str }}
                                </p>
                                <h6 class="blockquote-footer text-left">
                                    {{ $post->user->name }}, {{ \Carbon\Carbon::parse($post->created_at)->format('d-m-Y')}}
                                </h6>
                            
                        </div>
                  
                    </div>
         @if ($loop->iteration % 3 == 0 || $loop->iteration == 1)           
            </div>
        @endif
        {{ $user_posts->links() }}
        @empty

        <p>No post available from this user</p>

        @endforelse
        

@endsection
