@extends('SiteAdmin.siteAdminTemplate')

@section('content')
	<div class="jumbotron">
		<h3>Dynamic Information Editor</h3>
		<a href="#change_video" class="btn btn-danger btn-lg">Update Video</a>
		<a href="#change_about_us" class="btn btn-primary btn-lg">Update About Us</a>
		<a href="#view_all_previous_video" class="btn btn-warning btn-lg">View All Videos</a>
        <a href ="#change_contact" class="btn btn-success btn-lg">Change Contact</a>
	</div>
	<br>
	<div class="jumbotron" id="change_about_us">
		<div >
			<h3>Change About Us </h3>
		</div>
		<form action="{{route('siteAdmin.saveAboutWebSiteInformation')}}" method="post">
			@csrf
			<textarea id="editor" name="about_us">

			</textarea>
            @error('about_us')
                <div class="alert alert-danger">{{$message}} </div>
            @enderror
			<br>
			<div>
				<input type="submit" class="btn btn-danger pull-right" value="Save About Us">
			</div>
		</form>

	</div>
	<br>
	<div class="jumbotron" id="change_video">
		<h3>Change Video </h3>
		<form action="{{route('siteAdmin.uploadVideoLink')}}" method="post">
			@csrf
			<table class="table table-stripe">
			<tr>
				<td><label class="form-control">Change Video (Just give the Embed source Link)</label></td>
				<td>
					<input class="form-control" type="text" name="video_link">
                    @error('video_link')
                        <div class="alert alert-danger"> {{$message}}</div>
                    @enderror
				</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" class="btn btn-danger pull-right"></td>
			</tr>
		</table>
		</form>

	</div>
    <br>
    <div class="jumbotron" id="change_contact">
        <h3>Change Contact</h3>
        <form action="{{route('siteAdmin.updateContactNumber')}}" method="post">
            @csrf
            <table class="table table-responsive table-striped">
                <tr>
                    <td><label class="form-control">Change Contuct Number</label></td>
                    <td>
                        <input class="form-control" type="text" name="contactNumber" placeholder="+8801x.....">
                        @error('contactNumber')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" class="btn btn-success pull-right" value="Update Contact Number"></td>
                </tr>
            </table>
        </form>
    </div>

	<div class="jumbotron" id="view_all_previous_video">
		<h3>All Previous Videos List</h3>
		@foreach($videoList as $vList)
			<div class="jumbotron">
				<?php echo $vList->video_link?>
				<form action="{{route('siteAdmin.deleteVideoLink',$vList->id)}}" method="post">
					@csrf
					<input type="submit" value="Delete" class="btn btn-danger">
				</form>
			</div>
			<br>
		@endforeach
	</div>

	<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
	<script src="http://example.com/someapp/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js'></script>


    @if(Session::has('change_about_us_text'))
        <script>
            toastr.success("{!!Session::get('change_about_us_text')!!}")
        </script>
    @endif

    @if(Session::has('upload_a_video'))
        <script>
            toastr.success("{!!Session::get('upload_a_video')!!}")
        </script>
    @endif


    @if(Session::has('delete_video_link'))
        <script>
            toastr.success("{!!Session::get('delete_video_link')!!}")
        </script>
    @endif

    @if(Session::has('contact_updated'))
        <script>
            toastr.success("{!!Session::get('contact_updated')!!}")
        </script>
    @endif

    <script>
		window.onload = function(){
			CKEDITOR.replace('editor',{
				filebrowserBrowserUrl:filemanager.ckBrowseUrl
			})
		}
	</script>




@endsection
