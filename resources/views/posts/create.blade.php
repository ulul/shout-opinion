@extends('layouts.app')

@section('header')
    @include('layouts.partials.header')
@endsection

@section('nav')
    @include('layouts.partials.nav')
@endsection

@section('content')
	
    <form method="POST" enctype="multipart/form-data" action="{{ route('post.store') }}">
        @csrf

        <div class="form-group">
            <label for="Title">{{ __('Title') }}</label>
            <input type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" required autofocus>
        </div>

        <div class="form-group">
           	<label for="Category">{{ __('Category') }}</label>
           	<select class="form-control{{ $errors->has('category') ? ' is-invalid' : '' }}" name="category">
           		@foreach ($categories AS $category)
	           		<option value="{{ $category->id }}">{{ $category->category }}</option>

	           	@endforeach
           	</select>
        </div>

        <div class="form-group">
        	<label for="Thumbnail">Thumbnail</label>
        	<div>
	        	<img id="img-upload" src="{{ url('img/app/noimage.png') }}" style="width: 200px;"  class="img-thumbnail rounder">
        	</div>
        	<input type="file" id="imgInp" name="thumbnail" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}">
        </div>

        <div class="form-group">
        	<label for="Description">{{ __('Description') }}</label>
			<textarea name="description"  class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }} my-editor" rows="" placeholder="">
			</textarea>
		</div>
		<button type="submit" class="btn btn-primary">
            {{ __('Publish') }}
        </button>
	</form>
@endsection

@section('scripts')
	@include('layouts.partials.script')
@endsection