@extends('SuperAdmin.superAdminTemplate')

@section('content')
	<div class="jumbotron">
		<h1>User Information </h1>
	</div>
	<br>
	<table class="table table-stripe">
		<tr>
			<td>#</td>
			<td>User Name</td>
			<td>Register As</td>
			<td>User Email</td>
			<td>Change Status</td>
			<td>Action</td>
		</tr>
		@foreach($userInfo as $uInfo)
			<tr>
				<td>{{$uInfo->id}}</td>
				<td>{{$uInfo->name}}</td>
				<td>{{$uInfo->email}}</td>
				<td>{{$uInfo->user_type}}</td>
				<td>
					<a href="{{route('superAdmin.change.toRegularUser',$uInfo->id)}}" class="btn btn-danger">To Regular user</a>
					<a href="{{route('superAdmin.change.toSiteAdmin',$uInfo->id)}}" class="btn btn-primary">To Site Admin</a>
					<a href="{{route('superAdmin.change.toGuestUser',$uInfo->id)}}" class="btn btn-success">To Guest User</a>
				</td>
				<td><a href="" class="btn btn-warning">Take Action</a></td>
			</tr>
		@endforeach
	</table>
@endsection