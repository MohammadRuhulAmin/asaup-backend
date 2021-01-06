@extends('SiteAdmin.siteAdminTemplate')

@section('content')
    <div class="jumbotron">
        <h3>Site Admin panel!</h3>
    </div>
    <br>
    <div class="jumbotron">
        <h3>Activity Log!</h3>
        <table class="table table-striped ">
            <tr >
                <td>#</td>
                <td>Date</td>
                <td>Login</td>
                <td>Logout</td>
                <td>Total Work Hour</td>
            </tr>
            @if(empty($activityLog))
                <h3>Welcome {{auth()->user()->name}}</h3>
            @else
                @foreach($activityLog as $active)
                    <tr>
                        <td>{{$active->id}}</td>
                        <td>{{$active->date}}</td>
                        <td>{{$active->login_time}}</td>
                        <td>{{$active->logout_time}}</td>
                        <td>--</td>
                    </tr>
                @endforeach
            @endif
        </table>
    </div>
@endsection
