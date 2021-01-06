@extends('SiteAdmin.siteAdminTemplate')

@section('content')
    <div class="jumbotron">
        <h3>Announce Or Notice Section</h3>
        <a href="#allNotice" class="btn btn-success">View All Notice </a>
        <a href="#allAnnouncement" class="btn btn-success">View All Announcement</a>
    </div>
    <br>
    <div class="jumbotron">
        <h3>Create A Post</h3>
    <form action="{{route('siteAdmin.InsertNotice')}}" method="post">
        @csrf
            <table class="table table-striped">
                <tr>
                    <td><label class="form-control"> Post Auther Name </label></td>
                    <td><input name="posted_by" type="text" class="form-control"> </td>
                </tr>
                <tr>

                    <td><label class="form-control">Select </label></td>
                    <td>
                        <select name="post_type" class="form-control">
                            <option>Notice</option>
                            <option>Announcement</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label class="form-control"> Date </label></td>
                    <td><input name="post_date" type="date" class="form-control"> </td>
                </tr>
            </table>
            <textarea id="editor" name="post_description">
            </textarea>
            <input type="submit" class="btn btn-success pull-right" value="Post">
        </form>
    </div>
    <br>
    <div class="jumbotron" id="allNotice">
        <h3>View All Notice</h3>
        <table class="table table-striped">
            <tr>
                <td>#</td>
                <td>Auther Name</td>
                <td>Post Date</td>
                <td>Description</td>
                <td>Action</td>
            </tr>
            @foreach($notices as $notice)
                <tr>
                    <td>{{$notice->id}}</td>
                    <td>{{$notice->posted_by}}</td>
                    <td>{{$notice->post_date}}</td>
                    <td><?php echo $notice->post_description?></td>
                    <td>

                        <form action="{{route('siteAdmin.deletePost',$notice->id)}}" method="post">@csrf <input type="submit" class="btn btn-danger" value="Delete"></form>
                        <a href="{{route('siteAdmin.updateAnoc',$notice->id)}}" class="btn btn-primary" >Edit</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

    <br>
    <div class="jumbotron" id="allAnnouncement">
        <h3>View All Announcement</h3>
        <table class="table table-striped">
            <tr>
                <td>#</td>
                <td>Auther Name</td>
                <td>Post Date</td>
                <td>Description</td>
                <td>Action</td>
            </tr>
            @foreach($announcement as $anoc)
                <tr>
                    <td>{{$anoc->id}}</td>
                    <td>{{$anoc->posted_by}}</td>
                    <td>{{$anoc->post_date}}</td>
                    <td><?php echo $anoc->post_description?></td>
                    <td>
                        <form action="{{route('siteAdmin.deletePost',$anoc->id)}}" method="post">@csrf <input type="submit" class="btn btn-danger" value="Delete"></form>
                        <a href="{{route('siteAdmin.updateAnoc',$anoc->id)}}" class="btn btn-primary" >Edit</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script src="http://example.com/someapp/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js'></script>


    @if(Session::has('create_notice'))
        <script>
            toastr.success("{!!Session::get('create_notice')!!}")
        </script>
    @endif


    @if(Session::has('delete_post'))
        <script>
            toastr.success("{!!Session::get('delete_post')!!}")
        </script>
    @endif





    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script src="http://example.com/someapp/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        window.onload = function(){
            CKEDITOR.replace('editor',{
                filebrowserBrowserUrl:filemanager.ckBrowseUrl
            })
        }
    </script>
@endsection
