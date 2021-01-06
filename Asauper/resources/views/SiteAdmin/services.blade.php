@extends('SiteAdmin.siteAdminTemplate')

@section('content')
	<div class="jumbotron">
		<h1>Our Services</h1>
	</div>
	<br>
	<div class="jumbotron">
		<form action="{{route('siteAdmin.uploadService')}}" method="post"  enctype="multipart/form-data">
			@csrf
			<table class="table table-stripe">
			<tr>
				<td><label class="form-control">Service Name</label></td>
				<td>
                    <input type="text" class="form-control" name="service_name">
                    @error('service_name')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </td>
			</tr>
			<tr>
				<td><label class="form-control">Service Details</label></td>
				<td>
                    <input type="text" class="form-control" name="service_details">
                    @error('service_details')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </td>
			</tr>
			<tr>
				<td><label class="form-control">Contact</label></td>
				<td>
                    <input type="text" class="form-control" name="service_contact">
                    @error('service_contact')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </td>
			</tr>
			<tr>
				<td><label class="form-control">Partner / Sponser Logo :</label></td>
				<td>
                    <input name="service_image" class="form-control" type="file" name="image" >
                    @error('service_image')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </td>
			</tr>
			<tr>
				<td> </td>
				<td>
                    <input type="submit" class="btn btn-danger pull-right" value="Create Service">

                </td>
			</tr>

		</table>
		</form>
	</div>
	<br>
	<div class="jumbotron">
		<h3>Our Services List</h3>
		<table class="table table-stripe">
			<tr>
				<td>#</td>
				<td>Image</td>
				<td>Service Name</td>
				<td>Service Details</td>
				<td>Service Contact</td>
				<td>Action</td>
			</tr>
			@foreach($services as $serve)
				<tr>
					<td>{{$serve->id}}</td>
					<td><img src="{{url($serve->service_image)}}" width="100" height="100"></td>
					<td>{{$serve->service_name}}</td>
					<td>{{$serve->service_details}}</td>
					<td>{{$serve->service_contact}}</td>
					<td><form action="{{route('siteAdmin.service.Delete',$serve->id)}}" method="post">@csrf
						<input type="submit" value="Delete" class="btn btn-danger"></form></td>
				</tr>
			@endforeach
		</table>
	</div>

    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script src="http://example.com/someapp/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js'></script>


    @if(Session::has('add_new_service'))
        <script>
            toastr.success("{!!Session::get('add_new_service')!!}")
        </script>
    @endif

    @if(Session::has('delete_service'))
        <script>
            toastr.success("{!!Session::get('delete_service')!!}")
        </script>
    @endif
@endsection
