@extends('SuperAdmin.superAdminTemplate')

@section('content')
	<div class="jumbotron">
		<h3>Admin->Employee</h3>
	</div>
	<br/>
	 <div>
	 	 <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal">Create Site Admin</button>
	 </div>
	<div class="jumbotron">
		<table class="table table-stripe">
			<tr>
				<td>#</td>
				<td>Site Admin</td>
				<td>Email</td>
				<td>Join Date</td>
				<td>Reject Date</td>
				<td>Action</td>
			</tr>
			@foreach($siteAdminInfo as $s_admin)
				<tr>
					<td>{{$s_admin->id}}</td>
					<td>{{$s_admin->name}}</td>
					<td>{{$s_admin->email}}</td>
					<td>{{$s_admin->created_at}}</td>
					<td>N/A</td>
					<td>
						<a href="" class="btn btn-success">Update</a>
						<a href="" class="btn btn-danger">Delete</a>
					</td>
				</tr>
			@endforeach
		</table>
	</div>
	<br>
	<div class="jumbotron">
		
	</div>
	
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
<div class="modal-dialog">

  <!-- Modal content-->
<form action="" method>
	@csrf
	  <div class="modal-content">
	    <div class="modal-header">
	      <button type="button" class="close" data-dismiss="modal">&times;</button>
	      <h4 class="modal-title">Modal Header</h4>
	    </div>
	    <div class="modal-body">
	     <h2>Add Site Admin</h2>
			<label class="form-control">Select User</label>
			<select class="form-control">
				@foreach($getUser as $gUser)
				<option>{{$gUser->name}}</option>
				@endforeach
			</select>
			<br>
			<button type="submit" class="btn btn-danger btn-lg ">Create</button>
	    </div>
	    <div class="modal-footer">
	      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	    </div>
	  </div>
	  
	</div>
</div>	

</form>

@endsection


