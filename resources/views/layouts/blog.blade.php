<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title></title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <link type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

<!-- Superfish CSS -->
<link href="{{ asset('assets/css/superfish.css') }}" type="text/css" rel="Stylesheet">

<!-- FontAwesome CSS -->
<link href="{{ asset('assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

<!--Website CSS -->
<link href="{{ asset('assets/css/style.css') }}" type="text/css" rel="stylesheet">
    


<link href="{{ asset('assets/css/aos.css')}}" rel="stylesheet">
<script src="{{ asset('assets/js/aos.js')}}"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>



    <!-- Owl Stylesheets -->
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css') }}">
<!-- Custom Fonts -->
<link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900,100italic,200italic,300italic,400italic,500italic,600italic,700italic,800italic,900italic," rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800,300italic,400italic,600italic,700italic,800italic" rel="stylesheet">
    <!-- Styles -->
    
</head>
<body>
<!-- Header Start -->

<div class="header" id="myHeader">
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-sm-6 col-xs-12">
                    <div class="icon-lft">
                        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    </div>
                </div>
                <div class="col-md-5 col-sm-6 col-xs-12">
                    <div class="rt-add">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <div class="box">
                                    <a href="#"><span><i class="fa fa-envelope" aria-hidden="true"></i></span>info@iplawsindia.com</a>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <div class="box">
                                    <a href="{{ url('/become-our-contributer')}}"><span><i class="fa fa-phone" aria-hidden="true"></i></span>+ 91 33 2985 9001</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="header-btm">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="logo-block">
                        <a href="{{ url('/') }}"><img src="{{ asset('assets/images/logo.png') }}" alt="IP Laws India"></a>
                    </div>
                </div>
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <div class="nav-block">
                        <div id="nav-menu-container">
                           
                               <?php  display_menu(0,1) ?>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    
</nav>
<div id="feedback">
    <div id="contact-form" style='display:none;' class="col-xs-4 col-md-4 panel panel-default">
        <form id="messageForm" method="POST" action="/feedback" class="form panel-body" role="form">
            <div class="rt-form">
                    <div class="form-block">
                        <h2> Ask Us for your <span>Query</span></h2>
                        <div class="form-group">
                            <h3>Your Name</h3>
                            <input type="text" name="inputName" class="form-control">
                        </div>
                        <div class="form-group">
                            <h3>Email</h3>
                            <input type="text" name="inputEmail" class="form-control">
                        </div>
                        <div class="form-group">
                            <h3>Message</h3>
                            <textarea class="form-control" name="inputMessage"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div id="recaptcha_error_left" class="g-recaptcha-left pad-cpcha">
                            <div class="g-recaptcha recapta_inner_sec" id="recaptcha2" data-sitekey="6LcxYGQUAAAAAPzMB8RvDpg-dPMw9rnUpc5Hip_G">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <a href="javascript:void()" id="messageBtn" class="sub">SEND<span><i class="fa fa-paper-plane" aria-hidden="true"></i></span></a>
                    </div>
            </div>
        </form>
    </div>
    <div id="contact-tab">
        <ul>
            <span><i class="fa fa-envelope" aria-hidden="true"></i></span>
            <!-- <li>L</li>
            <li>e</li>
            <li>a</li>
            <li>v</li>
            <li class="brk">e</li>
            <li class="brk">a</li> 
            <li>M</li>
            <li>e</li>
            <li>s</li>
            <li>s</li>
            <li>a</li>
            <li>g</li>
            <li>e</li>   -->
        </ul>
    </div>
</div>
</div>
  <!---banner-->
  <div class="inner-banner">
      <img src="{{ asset('assets/images/banner_sub_intellectual_02.jpg') }}" alt="">
      <div class="desc">
          <div class="container">
              <div class="text">
                  <h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum mattis quam sit amet nunc faucibus commodo vel ut odio.</h2>
                  <div class="form-block">
                      <form action="">
                          <div class="row">
                              <div class="col-md-5 col-sm-5 col-xs-12 col-box">
                                  <div class="form-group">
                                      <input type="text" placeholder="name" class="form-control">
                                  </div>
                              </div>
                              <div class="col-md-5 col-sm-5 col-xs-12 col-box">
                                    <div class="form-group">
                                        <input type="email" placeholder="Email" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-2 col-xs-12 col-box">
                                    <div class="form-group">
                                        <input type="submit" value="Subscribe" class="btn-default">
                                    </div>
                                </div>
                          </div>
                      </form>
                  </div>
                  <a href="#" class="btn-default bx">Write for Us or Become Our Contributor</a>
              </div>
          </div>
      </div>
    </div>
        
    <div class="blog-body">
    
      <div class="blog-down">
        <div class="container">
          <div class="row">
        <div class="col-sm-8">
          <div class="blog-sec">
              <div class="row">
              @yield('content')
              </div>
              </div>
              </div>
              </div>
              </div>
              </div>
              </div>
    <footer class="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="box">
                        <h2>motto, vision </h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam maximus turpis at dui consectetur, rhoncus sollicitudin nisi bibendum. Praesent enim magna, consequat blandit risus facilisis, pretium laoreet leo.</p>
                        <!-- <p>P25 C.I.T. Road, Scheme VI M(S)</p>
                        <p>First Floor, Kolkata  700054</p>
                        <p>West Bengal, India</p>
                        <p>Ph : 033 2985 9001</p>
                        <p>Email : info@iplawsindia.com</p> -->
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="box">
                        <h2>Quick Links</h2>
                        <ul>
                            <li><a href="index.html" class="active">home</a></li>
                            <li><a href="#">Team</a></li>
                            <li><a href="">IPR India</a></li>
                            <li><a href="">IP For Business</a></li>
                            <li><a href="">IP For Professional</a></li>
                            <li><a href=""> Enforcement</a></li>
                            <li><a href="blog.html"> Blog</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="box">
                        <h2>Subscribe Our Newsletter</h2>
                        <form id=subscribeForm>
                            <input type="text" name="subscription_mail" id="subscription_mail" placeholder="Email" class="form-control">
                            <span class="help-block help_sec"></span>
                            <a href="javascript:void()" id="subscribeBtn" class="sub"><i class="fa fa-paper-plane" aria-hidden="true"></i></a>
                        </form>
                    </div>
                    <div class="box lst">
                        <h2>Follow Us</h2>
                        <div class="icon-lft">
                            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-btm">
        <div class="container">
            <div class="box">
                <h2>Terms & Conditions | Privacy Policy </h2>
                <h3>© 2018 All rights reserved</h3>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</footer>
<!-- JQuery Start -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js" type="text/javascript"></script>
	<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

<!-- superfish js -->
    <script src="{{ asset('assets/js/superfish.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

<script src="{{ asset('assets/js/easing.min.js') }}"></script>
  <script src="{{ asset('assets/js/wow.min.js') }}"></script>
  <script src="{{ asset('assets/js/customscript.js') }}"></script>
    
    <script type="text/javascript">
        // initialise plugins
        jQuery(document).ready(function($){
                jQuery('ul.sf-menu').superfish();
        
                /* prepend menu icon */
                jQuery('#nav-wrap').prepend('<div id="menu-icon"></div>');
                //alert ('test');
                /* toggle nav */
                $("#menu-icon").on("click", function(){
                        jQuery(".sf-menu").slideToggle();
                        jQuery(this).toggleClass("active");
                });
        });
    
    </script> 
	

    <!-- Owl Carousel Start --> 
    <script src="js/owl.carousel.js" type="text/javascript"></script>
    <!-- <script type="text/javascript">
        var owl = $('.owl-carousel');
        $("#blog-demo").owlCarousel( {
            loop:true,
            autoplay:true,
            center: true,
            autoplayTimeout:5000,
            responsiveClass:true,
            responsive:{
                0:{
                    items:1,
                    nav:true
                },
                550:{
                    items:2,
                    nav:true
                },
                768:{
                    items:3,
                    nav:true,
                    loop:true
                }
            }
        });
    </script> -->
    <script>
            $(document).ready(function() {
              var owl = $('.owl-carousel');
              owl.owlCarousel({
                items: 4,
                loop: true,
                margin: 10,
                autoplay: true,
                autoplayTimeout: 3000,
                autoplayHoverPause: true,
                responsive:{
                0:{
                    items:1,
                    nav:true
                },
                500:{
                    items:2,
                    nav:true
                },
                768:{
                    items:3,
                    nav:true,
                },
                1000:{
                    items:4,
                    nav:true,
                },
                1400:{
                    items:5,
                    nav:true,
                },
                1800:{
                    items:6,
                    nav:true,
                    loop:true
                }
            }
              });
            })
          </script>


          <script>
            $(document).ready(function() {
              var owl = $('.owl-carousel2');
              owl.owlCarousel({
                items: 2,
                loop: true,
                margin: 10,
                autoplay: true,
                autoplayTimeout: 3000,
                autoplayHoverPause: true,
                responsive:{
                0:{
                    items:1,
                    nav:true
                },
               900:{
                    items:2,
                    nav:true
                },
                1800:{
                    items:3,
                    nav:true
                }

            }
              });
            })
          </script>

           <script>
          $("#contact-tab").click(function() {
        $("#contact-form").toggle("slide");
        });
          </script>
          <script>
            
            $(document).ready(function(){
           var shrinkHeader = 30;
            $(window).scroll(function() {
              var scroll = getCurrentScroll();
              //alert(scroll);
                if ( scroll >= shrinkHeader ) {
          
                     $('#myHeader').addClass('sticky');
                    $('.btm-logo').css("display","block");
                  }
                  else {
                      $('#myHeader').removeClass('sticky');
                      $('.btm-logo').css("display","none");
                  }
            });
          function getCurrentScroll() {
              return window.pageYOffset || document.documentElement.scrollTop;
              }
          });
          </script>

<script>
        AOS.init();
      </script>
       <script type="text/javascript">
                    $(function() {
                        //----- OPEN
                        $('[data-popup-open]').on('click', function(e) {
                            e.preventDefault();
                            var targeted_popup_class = jQuery(this).attr('data-popup-open');
                            $('[data-popup="' + targeted_popup_class + '"]').fadeIn(350);

                           
                        });

                        //----- CLOSE
                        $('[data-popup-close]').on('click', function(e) {
                            e.preventDefault();
                            var targeted_popup_class = jQuery(this).attr('data-popup-close');
                            $('[data-popup="' + targeted_popup_class + '"]').fadeOut(350);

                            
                        });
                    });
                </script>
      
</body>
</html>
