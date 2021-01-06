@extends('SiteAdmin.siteAdminTemplate')

@section('content')
	<div class="jumbotron">
		<h3>Change Password</h3>
		<form action="{{route('siteAdmin.changePassword.insert')}}" method="post">
			@csrf
			<table class="table table-stripe">
			<tr>
				<td><label class="form-control">Old Password</label></td>
				<td>
                    <input type="password" class="form-control"  name="old_password">
                    @error('old_password')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </td>
			</tr>
			<tr>
				<td><label class="form-control">New Password</label></td>
				<td>
                    <input type="password" class="form-control" name="new_password">
                    @error('new_password')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </td>
			</tr>
			<tr>
				<td><label class="form-control">Confirm Password</label></td>
				<td>
                    <input type="password" class="form-control" name="confirm_password">
                    @error('confirm_password')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" class="btn btn-danger pull-right" value="Change Password"></td>
			</tr>
			</table>
		</form>
	</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js'></script>


    @if(Session::has('change_password'))
        <script>
            toastr.success("{!!Session::get('change_password')!!}")
        </script>
    @endif

    @if(Session::has('unchanged_password'))
        <script>
            toastr.success("{!!Session::get('unchanged_password')!!}")
        </script>
    @endif

    @if(Session::has('confirm_password_and_new_password_un_matched'))
        <script>
            toastr.success("{!!Session::get('confirm_password_and_new_password_un_matched')!!}")
        </script>
    @endif
@endsection
