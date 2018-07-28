@extends('layouts.admin')

@section('sidebar')
	@include('admins.partials.sidebar')
@endsection

@section('content')
	<main class="page-content mb-5">
		@if (Session::get('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
        @endif
		<table class="table">
		  <thead class="thead-dark">
		    <tr>
		      <th scope="col">No</th>
		      <th scope="col">Name</th>
		      <th scope="col">Username</th>
		      <th scope="col">Email</th>
		      <th scope="col">Date Registered</th>
		      <th scope="col">Action</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@forelse ($users AS $index => $user )
		    <tr>
		      <th scope="row">{{ $index + $users->firstItem() }}</th>
		      <td>{{ $user->name }}</td>
		      <td>{{ $user->username }}</td>
		      <td>{{ $user->email }}</td>
		      <td>{{ $user->created_at->diffForHumans() }}</td>
		      <td>
		      	@if ($user->deleted_at)
			      	<a href="{{ route('admin.activate.user', $user->username) }}">
			      		<span class="fa fa-refresh"></span>
			      	</a>
			     @else 
			      	<a href="{{ route('admin.delete.user', $user->username) }}">
			      		<span class="fa fa-trash"></span>
			      	</a>

			     @endif
		      </td>
		    </tr>
		    @empty

		    @endforelse
		  </tbody>
		</table>
		{{ $users->links() }}

	</main>
@endsection