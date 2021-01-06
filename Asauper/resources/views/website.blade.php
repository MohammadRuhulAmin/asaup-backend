<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Multi Bootstrap Template - Index</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('/frontview/assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('/frontview/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('/frontview/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('/frontview/assets/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
  <link href="{{asset('/frontview/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('/frontview/assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
  <link href="{{asset('/frontview/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('/frontview/assets/vendor/venobox/venobox.css')}}" rel="stylesheet">
  <link href="{{asset('/frontview/assets/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
  <link href="{{asset('/frontview/assets/vendor/aos/aos.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('/frontview/assets/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Multi - v2.1.0
  * Template URL: https://bootstrapmade.com/multi-responsive-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
      <h1 class="logo mr-auto"><a href="">ASAUP</a></h1>
      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="{{route('register')}}">Register</a></li>
          <li><a href="{{route('login')}}">Log In</a></li>
            <li><a href="{{route('guest.viewNotice')}}">Notice</a></li>
          @foreach(json_decode($MenuItems) as $mItems)
            <li class="active drop-down">
              <a href="{{$mItems->rootMenuLink}}">{{$mItems->rootMenuName}}</a>
              <ul>
                  @foreach(json_decode($mItems->subRootListName) as $subMenu)
                    <a  href="{{$subMenu->navbar_link}}">{{$subMenu->navbar_name}}</a>
                  @endforeach
              </ul>
            </li>
          @endforeach
        </ul>
      </nav><!-- .nav-menu -->

      <a href="#about" class="get-started-btn">Get Started</a>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    </ol>
    <div class="carousel-inner">
        @foreach($image as $key => $img)
        <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
            <img src="{{url($img->image)}}" class="d-block w-100"  alt="...">
        </div>
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button"  data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true">     </span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

  <!----------- -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>About</h2>
          <p>About Us</p>
        </div>

        <div class="row content">
           <div class="col-lg-6 pt-4 pt-lg-0">
                 <?php echo $AboutUs->about_us ;?>
              <a href="#" class="btn-learn-more">Learn More</a>
            </div>
          <div class="col-lg-6">
            <!-- {{$AboutUs->about_us}} -->


            <ul>
              <li><i class="ri-check-double-line"></i></li>
              <li><i class="ri-check-double-line"></i> </li>
              <li><i class="ri-check-double-line"></i> </li>
            </ul>
          </div>

        </div>

      </div>
    </section><!-- End About Section -->



    <!-- ======= Counts Section ======= -->


    <!-- ======= Why Us Section video link ======= -->
{{--    <section id="why-us" class="why-us section-bg">--}}
{{--      <div class="container-fluid" data-aos="fade-up">--}}
{{--          <div >--}}
{{--            <?php echo $videoLink->video_link?>--}}
{{--          </div>--}}
{{--          <br>--}}
{{--          <div>--}}
{{--            <h3><a href="{{route('guest.allvideoLink')}}" class="btn btn-link">View More Social Activities</a></h3>--}}
{{--          </div>--}}
{{--      </div>--}}
{{--    </section><!-- End Why Us Section -->--}}
{{--    mycode--}}
      <section id="testimonials" class="testimonials section-bg">
          <div class="container" data-aos="fade-up">

              <div class="section-title">
                  <h2>All Activities</h2>
                  <p>Recent Activities:</p>
              </div>

              <div class="owl-carousel testimonials-carousel">
                  @foreach($service as $serve)
                      <div class="testimonial-wrap">
                          <div class="testimonial-item">
                              <img src="{{url($serve->service_image)}}" class="testimonial-img" alt="">
                              <h3>{{$serve->service_name}}</h3>
                              <h4></h4>
                              <p>
                                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                  {{$serve->service_details}}
                                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                              </p>
                          </div>
                      </div>
                  @endforeach
              </div>

          </div>
      </section><!-- End Testimonials Section -->

  {{--      end--}}
    <!-- ======= Services Section ======= -->
 <!-- mycode -->
    <section id="portfolio" class="portfolio">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Our Achevements & awards</h2>
          <p>Our Awards!</p>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
           @foreach($service as $serve)
          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <img src="{{url($serve->service_image)}}" width="500" height="500" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>{{$serve->service_name}}</h4>
              <p>{{$serve->service_details}}</p>
              <a href="{{asset('/frontview/assets/img/portfolio/portfolio-1.jpg')}}" data-gall="portfolioGallery" class="venobox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
              <p></p>
            </div>
          </div>
          @endforeach





        </div>

      </div>
    </section>

 <!-- end service-->

    <!-- ======= Committee Section ======= -->
    <section id="testimonials" class="testimonials section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>ASAUPER Committee</h2>
          <p>Members talking :</p>
        </div>

        <div class="owl-carousel testimonials-carousel">
          @foreach($committee as $cmt)
            <div class="testimonial-wrap">
              <div class="testimonial-item">
                <img src="{{url($cmt->image)}}" class="testimonial-img" alt="">
                <h3>{{$cmt->name}}</h3>
                <h4>{{$cmt->position}}</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    {{$cmt->description}}
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div>
          @endforeach
        </div>

      </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container" data-aos="zoom-in">

        <div class="text-center">
          <h1 class="text-white">Contact with ASAUPER</h1>
          <br>
            @if(empty($contactNumber->contactNumber))
                <h3 class="alert alert-danger">Add a Contuct Number</h3>
            @else <h1 class="text-white">+{{$contactNumber->contactNumber}}</h1>

            @endif

        </div>

      </div>
    </section><!-- End Cta Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Our Friends</h2>
          <p>Partners / Sponsers</p>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
           @foreach($partner as $pnar)
          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <img src="{{url($pnar->partner_company_logo)}}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>{{$pnar->partner_company_name}}</h4>
              <p>{{$pnar->partner_company_contact}}</p>
              <a href="{{asset('/frontview/assets/img/portfolio/portfolio-1.jpg')}}" data-gall="portfolioGallery" class="venobox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
              <p></p>
            </div>
          </div>
          @endforeach





        </div>

      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Team Section ======= -->



    <!-- ======= Pricing Section ======= -->


    <!-- ======= Frequently Asked Questions Section ======= -->

    <!-- ======= Contact Section ======= -->

  </main><!-- End #main -->

    <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>ASAUPER<span>.</span></h3>
              <p>
                A108 Adam Street <br>
                NY 535022, USA<br><br>
                <strong>Phone:</strong> +1 5589 55488 55<br>
                <strong>Email:</strong> info@example.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>--------</h4>
            <p>------------------------------------------</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>ASAUPE</span></strong>. All Rights Reserved
      </div>
      <div class="credits">

        Designed by <a href="https://bootstrapmade.com/">________</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('/frontview/assets/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('/frontview/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('/frontview/assets/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset('/frontview/assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('/frontview/assets/vendor/waypoints/jquery.waypoints.min.js')}}"></script>
  <script src="{{asset('/frontview/assets/vendor/counterup/counterup.min.js')}}"></script>
  <script src="{{asset('/frontview/assets/vendor/venobox/venobox.min.js')}}"></script>
  <script src="{{asset('/frontview/assets/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
  <script src="{{asset('/frontview/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('/frontview/assets/vendor/aos/aos.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('/frontview/assets/js/main.js')}}"></script>

</body>

</html>
