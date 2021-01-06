@extends('SiteAdmin.siteAdminTemplate')

@section('content')
    <div class="jumbotron">
        <h3>Site Admin :Profile</h3>
        <table class="table table-striped">
            <tr>
                <td><label class="form-control">Name:</label></td>
                <td><label class="form-control">{{auth()->user()->name}}</label></td>
            </tr>
            <tr>
                <td><label class="form-control">Email</label></td>
                <td><label class="form-control">{{auth()->user()->email}}</label></td>
            </tr>
            <tr>
                <td><label class="form-control">Position</label></td>
                <td><label class="form-control">{{auth()->user()->user_type}}</label></td>
            </tr>
            <tr>
                <td><label class="form-control">Joined</label></td>
                <td><label class="form-control">{{auth()->user()->created_at}}</label></td>
            </tr>
            <form action="{{route('siteAdmin.updateProfilePhoto_view')}}" method="post" enctype="multipart/form-data">
                @csrf
                <tr>
                    <td><label class="form-control">Change Profile Photo:</label></td>
                    <td>
                        <input  class="form-control" type="file" name="image" >
                        @error('image')
                            <div class="alert alert-danger">{{$message}} </div>
                        @enderror
                    </td>
                </tr>
               <tr>
                   <td></td>
                   <td> <input type="submit" class="btn btn-success pull-right" value="Change Profile Image"></td>
               </tr>
            </form>
        </table>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js'></script>


    @if(Session::has('profile_image_updated'))

        <script>
            toastr.success("{!!Session::get('profile_image_updated')!!}")
        </script>
    @endif

@endsection
