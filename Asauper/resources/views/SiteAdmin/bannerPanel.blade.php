@extends('SiteAdmin.siteAdminTemplate')

@section('content')
	<div class="jumbotron">
		<h3>Banner Panel</h3>
	</div>
	<br>
	<div class="jumbotron">
		<h3>Insert New Banner</h3>
		 <form action="{{route('siteAdmin.bannerImage.upload')}}" enctype="multipart/form-data" method="post">
		 	@csrf
		       <table class="table table-stripe">
				<tr>
					<td><label class="form-control">Select Images</label></td>
					<td>
                        <input class="form-control" type="file" name="image[]" multiple accept="image/*">
                        @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </td>

				</tr>
				<tr>
					<td>
						<label class="form-control">Image Selected As</label>
					</td>
					<td>
                        <label class="form-control">Banner Image</label>
                        <input name="image_type" type="hidden" value="banner_image">
                        @error('image_type')
                            <div class="alert alert-danger"> {{$message}} </div>
                        @enderror
                    </td>
				</tr>
				<tr>
					<td></td>
					<td> <input type="submit" class="btn btn-danger pull-right" value="upload"></td>
				</tr>
				</table>
   		</form>
	</div>
	<br>
	<div class="jumbotron">
		<h2>Banner Images List</h2>
		<br>
		<div class="row">
			@foreach($images as $image)
				<div class="col-xl-4 col-lg-4 col-md-6 col-xs-12">
					<div class="jumbotron">
						<form action="{{route('siteAdmin.bannerImage.Delete',$image->id)}}" method="post">
						@csrf
							<image src="{{asset($image->image)}}" class="card-img-top" height="220">
							<input type="submit" class="btn btn-danger" value="Delete">
						</form>
					</div>
					<br>
					<hr>
				</div>
			@endforeach
		</div>
	</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js'></script>


    @if(Session::has('banner_image_insert'))
        <script>
            toastr.success("{!!Session::get('banner_image_insert')!!}")
        </script>
    @endif
    @if(Session::has('delete_banner_image'))
        <script>
            toastr.success("{!! Session::get('delete_banner_image') !!}")
        </script>
    @endif



@endsection
