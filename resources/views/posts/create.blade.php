@extends('layouts.app')

@section('header')
    @include('layouts.partials.header')
@endsection

@section('nav')
    @include('layouts.partials.nav')
@endsection

@section('content')
	<textarea  class="form-control my-editor" rows="" placeholder=""></textarea>
@endsection

@section('scripts')
	@include('layouts.partials.script')
@endsection