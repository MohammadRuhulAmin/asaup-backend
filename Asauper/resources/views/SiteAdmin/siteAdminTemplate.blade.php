<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Free Bootstrap Admin Template : Binary Admin</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="{{asset('/backend/assets/css/bootstrap.css')}}" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="{{asset('/backend/assets/css/font-awesome.css')}}" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="{{asset('/backend/assets/js/morris/morris-0.4.3.min.css')}}" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="{{asset('/backend/assets/css/custom.css')}}" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel='stylesheet'  href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" />

   @FilemanagerScript
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Binary admin</a>
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> Last access : 30 May 2014 &nbsp;
 <a class="btn btn-danger"  href="{{ route('logout') }}"onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">{{ __('Logout') }}
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>

</div>
        </nav>
           <!-- /. NAV TOP  -->
            <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <br>

                <li class="text-center">
                    @if(empty(auth()->user()->profile_image))
                        <h3 class="alert text-danger">Add A Profile Picture</h3>
                    @else
                        <img src="{{url(auth()->user()->profile_image)}}" class="user-image img-responsive"/>
                    @endif

                        <a href="#">Navigation Panel<span class=""></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">My Navigation Panel List</a>
                            </li>
                            <li>
                                <a href="{{route('siteAdmin.create.nav')}}">Create navigation Panel</a>
                            </li>
                        </ul>
                      </li>


                      <li class="text-center">


                        <a href="#"><i class=""></i>Dynamic Image Galary<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('siteAdmin.bannerPanel')}}">Banner </a>
                            </li>
                            <li>
                                <a href="{{route('siteAdmin.bodyImagePanel')}}">Body Image Gallary</a>
                            </li>
                            <li>
                                <a href="#">Footer Image<span class="fa arrow"></span></a>

                            </li>
                        </ul>
                      </li>
                       <li>
                            <a class=""  href="{{route('siteAdmin.dynamicTextEditInfo')}}"><i class="fa  fa-3x"></i> Dynamic Text</a>
                        </li>
                         <li>
                            <a class=""  href="{{route('siteAdmin.viewCommitteeSection')}}"><i class="fa  fa-3x"></i>ASAUPER Committee</a>
                        </li>
                         <li>
                            <a class=""  href="{{route('siteAdmin.partnersView')}}"><i class="fa  fa-3x"></i>Our Partners</a>
                        </li>
                         <li>
                            <a class=""  href="{{route('siteAdmin.services')}}"><i class="fa  fa-3x"></i>Our Services</a>
                        </li>
                    <li>
                        <a class=""  href="{{route('siteAdmin.createNotice')}}"><i class="fa  fa-3x"></i>Create Notice</a>
                    </li>
                    <li class="text-center">


                        <a href="#">Settings<span class=""></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('siteAdmin.changeImageForSiteAdmin')}}">Profile</a>
                            </li>
                            <li>
                                <a href="{{route('siteAdmin.changePassword.view')}}">Change Password</a>
                            </li>

                        </ul>
                    </li>


                </ul>


            </div>




        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            @yield('content')

        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="{{asset('/backend/assets/js/jquery-1.10.2.js')}}"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="{{asset('/backend/assets/js/bootstrap.min.js')}}"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="{{asset('/backend/assets/js/jquery.metisMenu.js')}}"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="{{asset('/backend/assets/js/morris/raphael-2.1.0.min.js')}}"></script>
    <script src="{{asset('/backend/assets/js/morris/morris.js')}}"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="{{asset('/backend/assets/js/custom.js')}}"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js'></script>



</body>
</html>


