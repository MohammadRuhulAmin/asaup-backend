@extends('SiteAdmin.siteAdminTemplate')

@section('content')
    <div class="jumbotron">
        <h3>Edit Notice Information</h3>
    </div>
    <br>
    <div class="jumbotron">
       <form action="{{route('siteAdmin.updatePost',$post->id)}}" method="post">
           @csrf
           <table class="table table-striped table-responsive">
               <tr>
                   <td><label class="form-control">Auther Name</label></td>
                   <td><input type="text" name="posted_by" class="form-control" value="{{$post->posted_by}}"> </td>
               </tr>
               <tr>
                   <td><label class="form-control">Date</label></td>
                   <td><input type="date" name="post_date" value="{{$post->post_date}}" class="form-control"> </td>
               </tr>
               <tr>
                   <td><label class="form-control">Post Type</label></td>
                   <td><input type="text" name="post_type" value="{{$post->post_type}}" class="form-control"> </td>
               </tr>

           </table>
           <textarea id="editor" name="post_description">{{$post->post_description}}</textarea>
           <input type="submit" class="btn btn-danger pull-right" value="update Post">
       </form>
    </div>

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
