@extends('layouts.app')

@section('header')
    @include('layouts.partials.header')
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-info">
                <div class="card-header bg-info text-white">{{ __('Update Profile') }}</div>
               
                <div class="card-body mt-4">
                    <form method="POST" enctype="multipart/form-data" action="{{ route('user.edit.profile', $user->id) }}" aria-label="{{ __('Register') }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $user->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ $user->username }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        @php
                            $gender = ['Male', 'Female'];
                        @endphp
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                            <div class="col-md-6">
                                
                                <select class="form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}" name="gender">
                                    @foreach ($gender AS $data)
                                        @if ($user->gender == $data)
                                            <option value="{{ $data }}" selected="selected">
                                                {{ $data }}
                                            </option>
                                        @else
                                            <option value="{{ $data }}">
                                                {{ $data }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>

                                @if ($errors->has('gender'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="avatar" class="col-md-4 col-form-label text-md-right">{{ __('Avatar') }}</label>


                            <div class="col-md-6">
                            @if ($user->avatar)
                                <img id="img-upload" src="{{ Storage::url($user->avatar) }}" style="width: 200px;"  class="img-thumbnail rounder">
                                <input type="file" name="avatar" class="form-control{{ $errors->has('avatar') ? ' is-invalid' : '' }}" id="imgInp" accept="image/*">
                            @else
                                <img id="img-upload" src="{{ url('img/app/ava.png') }}" style="width: 200px;"  class="img-thumbnail rounder">
                                <input type="file" name="avatar" class="form-control{{ $errors->has('avatar') ? ' is-invalid' : '' }}" id="imgInp" accept="image/*">
                            @endif
                                

                                @if ($errors->has('avatar'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('avatar') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    @include('layouts.partials.script')
@endsection