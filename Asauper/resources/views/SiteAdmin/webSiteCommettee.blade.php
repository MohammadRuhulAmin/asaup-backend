@extends('SiteAdmin.siteAdminTemplate')

@section('content')
	<div class="jumbotron">
		<h3>ASAUPER Committee</h3>
		<a href="#createMember" class="btn btn-danger">Create A Member</a>
	</div>
	<br>
	<div class="jumbotron">
		<div><h3>All Members List</h3></div>
		<table class="table table-stripe">
			<tr>
				<td>#</td>
				<td>Image</td>
				<td>Name</td>
				<td>Position</td>
				<td>Decription</td>
				<td>Action</td>

			</tr>
			@foreach($committee as $com )
				<tr>
					<td>{{$com->id}}</td>

					<td><img src="{{url($com->image)}}" width="100" height="100"  alt="..."> </td>
					<td>{{$com->name}}</td>
					<td>{{$com->position}}</td>
					<td>{{$com->description}}</td>
					<td><form action="{{route('siteAdmin.deleteCommittee',$com->id)}}" method="post">@csrf <input type="submit" class="btn btn-danger" value="Delete"></form></td>
				</tr>
			@endforeach
		</table>
	</div>
	<br>
	<div class="jumbotron" id="createMember">
		<h3>Member Creation</h3>
		<form action="{{route('siteAdmin.saveCommitteeMember')}}" method="post" enctype="multipart/form-data">
			@csrf
			<table class="table table-stripe">
				<tr>
					<td><label class="form-control">Member Name</label></td>
					<td>
                        <input name="name" type="text" class="form-control">
                        @error('name')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </td>
				</tr>
				<tr>
					<td><label class="form-control">Member Position</label></td>
					<td>
                        <input name="position" type="text" class="form-control">
                        @error('position')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </td>
				</tr>
				<tr>
					<td><label class="form-control">Description</label></td>
					<td>
                        <textarea name="description" class="form-control"></textarea>
                        @error('description')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </td>
				</tr>
				<tr>
					<td><label class="form-control">Select Images</label></td>
					<td>
                        <input class="form-control" type="file" name="image" >
                        @error('image')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </td>

				</tr>
				<tr>
					<td></td>
					<td><input type="submit" class="btn btn-danger pull-right" value="Create Member"></td>
				</tr>
			</table>

		</form>
	</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js'></script>


    @if(Session::has('create_asaupe_member'))
        <script>
            toastr.success("{!!Session::get('create_asaupe_member')!!}")
        </script>
    @endif
    @if(Session::has('delete_asaupe_member'))
        <script>
            toastr.success("{!!Session::get('delete_asaupe_member')!!}")
        </script>
    @endif


@endsection
