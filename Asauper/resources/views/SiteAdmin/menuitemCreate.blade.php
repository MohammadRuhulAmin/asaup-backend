@extends('SiteAdmin.siteAdminTemplate')

@section('content')
	<div class="jumbotron">

	</div>
	<br>
	<form action="{{route('siteAdmin.navmenu.store')}}" method="post">
		@csrf
		<div class="jumbotron">
				<h4>Create Root Menu for webSite</h4>
			<table class="table table-stripe">
				<tr>
					<td><label class="form-control">Root Menu Name:</label></td>
					<td><input name="navbar_name" value="{{old('navbar_name')}}" type="text" class="form-control" placeholder="Root Menu"></td>
                    <td>@error('navbar_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </td>
				</tr>
				<tr>
					<td><label class="form-control">Provide Link:</label></td>
					<td><input name="navbar_link" type="text" value="{{old('navbar_link')}}" class="form-control" placeholder="Give A link:"></td>
                    <td>@error('navbar_link')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </td>
                </tr>
				<tr>
					<td><label class="form-control">Status Enable</label></td>
					<td><input name="status" type="checkbox" class="form-control" value="Enable"></td>
                    <td>@error('status')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </td>
				</tr>
				<tr>
					<td><label class="form-control">Status Disable</label></td>
					<td>
						<input name="status" type="checkbox" class="form-control" value="Disable">
                    </td>
                    <td>@error('status')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" class="btn btn-success pull-right" value="Create Root Menu"></td>
				</tr>
			</table>
		</div>
	</form>

	<div class="jumbotron">
		<form action="{{route('siteAdmin.navmenu.subment.store')}}" method="post">
			@csrf
			<h3>Create Sub Menu Under Root Menu</h3>
			<table class="table table-stripe">
				<tr>
					<td>Select Root Menu Name</td>
					<td>Create New Sub Menu</td>
				</tr>
				<tr>
					<td>
						<select name="navbar_name" class="form-control">
							@foreach(json_decode($allRootMenu) as $allMenu)
								<option>{{$allMenu->rootMenuName}}</option>
							@endforeach
						</select>
					</td>
					<td>
						<input type="text" name="navbar_sub_name" placeholder="give an unique Name" class="form-control">
                        @error('navbar_sub_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </td>
				</tr>
				<tr>
					<td><label class="form-control">Sub Menu Link</label></td>
					<td>
                        <input name="navbar_link_add" type="text" class="form-control" placeholder="xyz.com">
                        @error('navbar_link_add')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" class="btn btn-success pull-right" value="Create Sub Root"></td>
				</tr>

			</table>
		</form>
	</div>


	<div class="jumbotron">
		<h3>Root Menu Item List</h3>
		<table class="table table-stripe">
			<tr>
				<td>Root Menu Name</td>
				<td>Root Link</td>
				<td>Status</td>
				<td>Chield Root Menu</td>
				<td>Action</td>
			</tr>
			@foreach(json_decode($allRootMenu) as $allMenu)
			<tr>
				<td>{{$allMenu->rootMenuName}}</td>
				<td><a class="btn btn-danger" href="">Visit</a></td>
				<td></td>
				<td>
					<select class="form-control">
						@foreach(json_decode($allMenu->subRootListName) as $childRootInfo)
						<option>{{$childRootInfo->navbar_name}}</option>
						@endforeach
					</select>

				</td>
				<td>
					<!-- <a href="" class="btn btn-success">Update</a> -->
					<form action="{{route('siteAdmin.deleteMainMenu',$allMenu->rootMenuId)}}" method="post">
						@csrf
						<input type="submit" class="btn btn-danger" value="Delete">
					</form>

				</td>
			</tr>
			@endforeach

		</table>

	</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js'></script>


    @if(Session::has('root_menu_created'))
        <script>
            toastr.success("{!!Session::get('root_menu_created')!!}")
        </script>
    @endif

    @if(Session::has('delete_main_menu'))
        <script>
            toastr.success("{!!Session::get('delete_main_menu')!!}")
        </script>
    @endif
@endsection
