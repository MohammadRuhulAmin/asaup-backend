@extends('SiteAdmin.siteAdminTemplate')

@section('content')
	<div class ="jumbotron">
		<h3> Partners Information  </h3>
		<a class="btn btn-danger btn-lg" href="#partner_creation">Create Partner</a>
		<a href="#viewPartner" class="btn btn-success btn-lg">View Partner Information</a>

	</div>
	<br>
	<div class="jumbotron" id="partner_creation">
		<h3>Create Partner</h3>
		<form action="{{route('siteAdmin.partner.save')}}" method="post" enctype="multipart/form-data">
			@csrf
			<table class="table table-stripe">
			<tr>
				<td><label class="form-control">Partner / Sponser Company :</label></td>
				<td>
                    <input name="partner_company_name" type="text" class="form-control">
                    @error('partner_company_name')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </td>
			</tr>
			<tr>
				<td><label class="form-control">Address :</label></td>
				<td>
                    <input name="partner_company_address" type="text" class="form-control">
                    @error('partner_company_address')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </td>
			</tr>
			<tr>
				<td><label class="form-control">Contact Number :</label></td>
				<td>
                    <input name="partner_company_contact" type="text" class="form-control">
                    @error('partner_company_contact')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </td>
			</tr>
			<tr>
				<td><label class="form-control">Partner / Sponser Logo :</label></td>
				<td>
                    <input name="partner_company_logo" class="form-control" type="file" name="image" >
                    @error('partner_company_logo')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </td>
			</tr>
			<tr>
				<td></td>
				<td><input  class="btn btn-danger pull-right" type="submit" value="Create Partner" ></td>
			</tr>
		</table>
		</form>
	</div>
	<br>
	<div class="jumbotron" id="viewPartner">
		<h3>Partner  / Sponser Information</h3>
		<table class="table table-stripe">
			<tr>
				<td>#</td>
				<td>Logo</td>
				<td> Name</td>
				<td> Address</td>
				<td> Contact</td>
				<td>Action</td>



			</tr>
				@foreach($partnerInfo as $pInfo)
					<tr>
						<td>{{$pInfo->id}}</td>
						<td><img src="{{url($pInfo->partner_company_logo)}}" width="100" height="100"></td>
						<td>{{$pInfo->partner_company_name}}</td>
						<td>{{$pInfo->partner_company_address}}</td>
						<td>{{$pInfo->partner_company_contact}}</td>
						<td><form action="{{route('siteAdmin.deletePartner',$pInfo->id)}}" method="post">@csrf <input type="submit" class="btn btn-danger" value="Delete"></form></td>

					</tr>
				@endforeach
		</table>
	</div>
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script src="http://example.com/someapp/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js'></script>


    @if(Session::has('add_new_partner'))
        <script>
            toastr.success("{!!Session::get('add_new_partner')!!}")
        </script>
    @endif

    @if(Session::has('delete_partner'))
        <script>
            toastr.success("{!!Session::get('delete_partner')!!}")
        </script>
    @endif
@endsection
