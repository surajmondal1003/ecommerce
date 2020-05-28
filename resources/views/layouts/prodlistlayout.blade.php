<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


 <?php echo getCategoryMetaDetails($category_id);?>

    
    
    <title>Shopinway</title>

<!-- Bootstrap Core CSS -->
<link type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
<link rel="icon" href="{{ asset('assets/images/favicon.png')}}" type="image">

<!-- Superfish CSS -->
<!-- <link href="css/superfish.css" type="text/css" rel="Stylesheet"> -->
<link href="{{ asset('assets/css/menu.css') }}" type="text/css" rel="Stylesheet">
<!-- FontAwesome CSS -->
<link href="{{ asset('assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/aos.css') }}">
<!--Website CSS -->
<link href="{{ asset('assets/css/style.css') }}" type="text/css" rel="stylesheet">
<link href="{{ asset('assets/css/hover.css') }}" type="text/css" rel="stylesheet">
<link href="{{ asset('assets/css/owl.carousel.css') }}" type="text/css" rel="stylesheet">
<link href="{{ asset('assets/css/flexslider.css') }}" type="text/css" rel="stylesheet">
<link href="{{ asset('assets/css/demo.css') }}" type="text/css" rel="stylesheet">

    
</head>
<body>
    <div class="loading">&#8230;</div>
<div class="header" id="myHeader">
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="header-top">
      <div class="container-fluid">
          <div class="row">
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="lt-hd-top  view">
              <div class="box">
                <a href="tel:033 2548 9016"><span class="space1"><i class="fa fa-phone" aria-hidden="true"></i></span>(033) 2548 9016</a>
              </div>
              <div class="box">
                <a href="mail:support@shopinway.com"><span><i class="fa fa-envelope" aria-hidden="true"></i></span>support@shopinway.com</a>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="rt-hd-top">
              <div class="box sl-list">
                <a href="{{ url('login') }}"><span><i class="fa fa-heart" aria-hidden="true"></i></span>Short List </a>
              </div>
              <div class="box">
              <a href="{{ url('studentmembership') }}"><span class="student-ic"><i class="fa fa-users" aria-hidden="true"></i></span>Student membership </a>
              </div>
              
              <div class="box ">
                <a href="#"><span><i class="fa fa-money" aria-hidden="true"></i></span>Sell on Shopinway</a>
              </div>
              <div class="logo logo-upper">
                 <a href="{{url('')}}"><img src="{{ asset('assets/images/logo.png')}}" alt=""></a>
                </div>
            </div>
            <div class="hd-btm-lt-secup">
              <div class="row">
                <div class="col-md-9 col-sm-8 col-xs-8 rs-sml">
                  <div class="lt-sign">
                    <!-- <div class="box">
                      @if(Auth::check())
                     <h2 class="hd-txt"><a href="{{ url('my-profile')}}"> {{ Auth::user()->name }}</a></h2>
                     @else
                     <h2 class="hd-txt"><a href="{{ route('login')}}"> Login</a></h2>
                     @endif
                    </div> -->
                  <!--   <div class="box drp">
                      <div class="dropdown">
                        <button class=" btn-default dropdown-toggle" type="button" data-toggle="dropdown">More
                        <span><img src="{{ asset('assets/images/aro.png')}}" alt=""></span></button>
                        
                        <ul class="dropdown-menu">
                          <li><a href="{{ route('login') }}">Your Account</a></li>
                          <li><a href="{{ route('login') }}">Your Orders</a></li>
                          <li><a href="{{ route('login') }}">Your Seller Account</a></li>
                          <li><a href="{{ route('login') }}">Your Student Membership</a></li>
                          <li><a href="{{ route('login') }}">Your Supreme Membership</a></li>
                          <li class="mdl"><a href="#">24x7 Support</a></li>
                        </ul>
                      </div>
                    </div> -->


                  </div>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-4 rs-bg">
                  <div class="cart">
                  <h2 class="hd-txt"><a href="{{ url('cart-items') }}" >
                    
                    
                      <span class="crt"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        <div class="count">
                          @if(Session::get('cart'))
                          <h2 id="cartCount" class="cartCount">{{ count(Session::get('cart'))}}</h2>
                          @else
                          <h2 id="cartCount" class="cartCount">0</h2>
                          @endif
                        </div>
                      </span><span class="crt2">Cart</span></a>
                  </h2>
                  {{-- <div id="snackbar"></div> --}}
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
      <div class="container-fluid">
        <div class="mdl">
        <div class="row">
          <div class="col-md-2 col-sm-2 col-xs-4 col-hd-top ">
            <div class="hd-btm-rt-sec">
            <div class="row">
              <!-- <div class="col-md-2 col-sm-2 col-xs-12">
                <div class="side-menu">
                  <span class="sd-mnu" style="font-size:25px; cursor:pointer; color: #fa0029; " onclick="openNav()">&#9776; </span>
                </div>
              </div> -->
              <div class="col-md-10 col-sm-10 col-xs-12 for-lgo">
                <div class="logo">
                 <a href="{{url('')}}"><img src="{{ asset('assets/images/logo.png')}}" alt=""></a>
                </div>
              </div>
            </div>
            </div>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-12 col-hd-top ">
            <div class="search">
              <div class="bx">
                <form id="searchProductForm" method="POST" action="{{ url('product-search') }}">
                  @csrf
                  <input type="text" required
                   name="search_term" id="search_term" placeholder="Search for Books, Organizer and More" 
                   class="top-src" @if(!empty($search_term)) value="{{$search_term}}" @endif>
                  <button class="top-sub" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                </form>
              </div>
          </div>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="hd-btm-lt-sec">
              <div class="row">
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <div class="lt-sign">
                    <div class="box">
                      @if(Auth::check())
                     <h2 class="hd-txt"><a href="{{ url('my-profile')}}"> {{ Auth::user()->name }}</a></h2>
                     @else
                     <h2 class="hd-txt"><a href="{{ route('login')}}"><i class="fa fa-user" style="padding: 0 10px 0 0; font-size: 14px;"  aria-hidden="true"></i>  Login & Sign Up</a></h2>
                     @endif
                    </div>
                    <div class="box">
                      <div class="dropdown">
                        <button class=" btn-default dropdown-toggle" type="button" data-toggle="dropdown">More
                        <span><img src="{{ asset('assets/images/aro.png')}}" alt=""></span></button>
                        <ul class="dropdown-menu">
                          <li><a href="{{ route('login') }}">Your Account</a></li>
                          <li><a href="{{ route('login') }}">Your Orders</a></li>
                          <li><a href="{{ route('login') }}">Your Seller Account</a></li>
                          <li><a href="{{ route('login') }}">Your Student Membership</a></li>
                          <li><a href="{{ route('login') }}">Your Supreme Membership</a></li>
                          <li class="mdl"><a href="#">24x7 Support</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12 col-new">
                  <div class="cart">
                      <h2 class="hd-txt"><a href="{{ url('cart-items') }}" >
                    
                    
                          <span class="crt"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            <div class="count">
                              @if(Session::get('cart'))
                              <h2 id="cartCount" class="cartCount">{{ count(Session::get('cart'))}}</h2>
                              @else
                              <h2 id="cartCount" class="cartCount">0</h2>
                              @endif
                            </div>
                          </span><span class="crt2">Cart</span></a>
                      </h2>
                      <div id="snackbar"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
    <div class="header-ftr">
      <div class="container-fluid">
        <div id="nav-menu-container">
              <ul class="nav-menu">
                <li class="login-name" style="text-align: center; padding:0; background: #0c416e">
                    <a href="http://shopinway.com/" style="padding-top:6px !important; padding-bottom: 6px !important;"><img style="width: 110px; text-align: center;" src="{{ asset('assets/images/logo.png')}}" alt=""></a>
                     <!--  @if(Auth::check())
                     <a href="{{ url('my-profile')}}"> {{ Auth::user()->name }}</a>
                     @else
                     <a href="{{ route('login')}}"> Login</a>
                     @endif -->
                  </li>
                <li class="login-name">
                      @if(Auth::check())
                     <a href="{{ url('my-profile')}}"> {{ Auth::user()->name }}</a>
                     @else
                     <a href="{{ route('login')}}"><i class="fa fa-user" style="padding: 0 10px 0 0; font-size: 14px;"  aria-hidden="true"></i> Login & Sign Up</a>
                     @endif
                  </li>
                  <li class="more-menu-for"><a href="http://shopinway.com/about-us" class="active"><i class="fa fa-home " style="padding: 0 10px 0 0; font-size: 15px;" aria-hidden="true"></i>About Us </a></li>
                  <li class="more-menu-for"><a href="{{ url('studentmembership') }}"><i class="fa fa-users" style="padding: 0 10px 0 0; font-size: 14px;"  aria-hidden="true"></i>Student Membership </a></li>

                  <li class="more-menu-for"> <a href="javascript:void(0);"><i class="fa fa-bookmark" style="padding: 0 10px 0 0; font-size: 14px;" aria-hidden="true"></i>Shop By Category</a></li>
                {{ display_category_menu(0) }}
                <li class="more-menu-for"><a href="{{ route('login') }}"><i class="fa fa-heart" style="padding: 0 10px 0 0; font-size: 14px;"  aria-hidden="true"></i>Short List</a></li>
                <li class="more-menu-for"><a href="#"><i style="padding: 0 10px 0 0; font-size: 14px;"  class="fa fa-money" aria-hidden="true"></i>Sell on Shopinway</a></li>
               <li class="menu-has-children more-menu-for">
                 <a href="javascript:void(0);">More</a>
                 <ul>
                    <li><a href="{{ route('login') }}">Your Account</a></li>
                    <li><a href="{{ route('login') }}">Your Orders</a></li>
                    <li><a href="{{ route('login') }}">Your Seller Account</a></li>
                    <li><a href="{{ route('login') }}">Your Student Membership</a></li>
                    <li><a href="{{ route('login') }}">Your Supreme Membership</a></li>
                    <li><a href="#">24x7 Support</a></li>
                  </ul>
               </li>
               <li class="menu-has-children more-menu-for">
                 <a href="javascript:void(0);">SUPPORT?</a>
                 <ul>
                    <li><a href="{{ url('contact-us') }}">Contact Us</a></li>
                    <li><a href="{{ route('login') }}">Returns</a></li>
                    <li><a href="{{ url('terms-and-conditions') }}">Terms & Conditions</a></li>
                    <li><a href="{{ url('shipping-and-return-policy') }}">Shipping & Return Policy</a></li>
                    <li><a href="{{ url('frequently-asked-questions') }}">FAQs</a></li>
                  </ul>
               </li>
              </ul>
            </div>
          <div class="clearfix"></div>
        </div>
    </div>
  </nav>
</div>

            @yield('content')
       

 <!-- Footer Start -->
 <div class="footer"> 
  <div class="container-fluid">
    <div class="footer-top">
      <div class="row">
        <div class="col-md-4 col-sm-4 col-xs-12">
          <div class="box">
            <div class="img-box">
              <img src="{{ asset('assets/images/footer-logo.png')}}" alt="">
            </div>
            <p>Shopinway.com is an eCommerce marketplace launched in October 2015 and has been selected as a Potential Start-up under the Bihar Start-up Policy 2017 by the Bihar government.</p>
            <p>Shopinway.com welcomes one and all to its Supreme Online Mall in India.</p>
          </div>
        </div>
        <div class="col-md-8 col-sm-8 col-xs-12">
          <div class="foot-inr">
            <div class="row">
              <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="box for-fdn">
                  <h2 class="ftr">SHOPINWAY</h2>
                  <ul>
                  <li><a href="{{ url('about-us') }}" target="_blank">About us</a></li>
                  <li><a href="{{ url('privacy-policy') }}" target="_blank">Privacy Policy</a></li>
                    <li><a href="{{ url('terms-and-conditions') }}" target="_blank">Terms & Conditions</a></li>
                    <li><a href="{{ url('shipping-and-return-policy') }}" target="_blank">Shipping & Return Policy </a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="box for-fdn">
                  <h2 class="ftr">Support?</h2>
                  <ul>
                    <li> <a href="{{ url('contact-us') }}">Contact Us</a></li>
                    <li> <a href="{{ url('payment') }}" target="_blank">Payment </a></li>
                    <li> <a href="{{ url('login') }}" >Returns</a></li>
                    {{-- <li> <a href="#">Bulk Order</a></li> --}}
                    <li> <a href="{{ url('frequently-asked-questions') }}" target="_blank">FAQs</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="box for-fdn">
                  <h2 class="ftr">My Account</h2>
                  <ul>
                    <li> <a href="{{ route('login') }}"><span><i class="fa fa-user" aria-hidden="true"></i></span>Account</a></li>
                      <li><a href="{{ route('login') }}"><span class="crt"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>Order History</a></li>
                      <li><a href="{{ route('login') }}"><span><i class="fa fa-heart" aria-hidden="true"></i></span>Short List</a></li>
                      <li><a href="{{ url('studentmembership') }}"><span><i class="fa fa-users" aria-hidden="true"></i></span>Student Membership</a></li>
                  </ul>
                </div>
                <div class="box">
                  <h2 class="ftr">Keep In Touch</h2>
                  <div class="icn">
                  <div class="box">
                  <a href="https://www.facebook.com/Shopinway/" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                  </div>
                  <div class="box">
                 <a href="https://twitter.com/shopinway" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
               </div>
               <div class="box">
                  <a href="https://in.linkedin.com/company/shopinway" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                </div>
              </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-new-add">
        <div class="box">
          <a href="#">
          <div class="img-box">
            <img src="{{ asset('assets/images/footer-icon1.png')}}" alt="">
          </div>
          <div class="txt-box">
            <h2>Great Value</h2>
          </div>
          </a>
        </div>
        <div class="box">
          <a href="#">
          <div class="img-box">
            <img src="{{ asset('assets/images/footer-icon2.png')}}" alt="">
          </div>
          <div class="txt-box">
            <h2>Safe Payment</h2>
          </div>
          </a>
        </div>
        <div class="box">
          <a href="#">
          <div class="img-box">
            <img src="{{ asset('assets/images/footer-icon3.png')}}" alt="">
          </div>
          <div class="txt-box">
            <h2>24/7 Support</h2>
          </div>
        </a>
        </div>
        <div class="box">
          <a href="#">
          <div class="img-box">
            <img src="{{ asset('assets/images/footer-icon4.png')}}" alt="">
          </div>
          <div class="txt-box">
            <h2>Safe Shopping</h2>
          </div>
        </a>
        </div>
        <div class="box">
          <a href="#">
          <div class="img-box">
            <img src="{{ asset('assets/images/footer-icon5.png')}}" alt="">
          </div>
          <div class="txt-box">
            <h2> Easy Return</h2>
          </div>
        </a>
        </div>
      </div>
    </div>
    <div class="footer-btm">
      <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="ftr-lft">
            <h2>Copyright ©2015-<?php echo date('Y');?> Shopinway Ecommerce Pvt Ltd. </h2>
          </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="ftr-rgt">
            <h2>All Rights Reserved.</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  
  
  
  
  
  
  
  
<!-- Footer End -->    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js" type="text/javascript"></script>
  <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
<script src="{{ asset('assets/js/bnr.js') }}"></script>
<!-- <script src="http://www.artage.in/school/assets/js/easing.min.js"></script>
  <script src="http://www.artage.in/school/assets/js/wow.min.js"></script> -->
  <script src="{{ asset('assets/js/wow.min.js') }}"></script>
<script src="{{ asset('assets/js/easing.min.js') }}"></script>
<script src="{{ asset('assets/js/aos.js') }}"></script>
<script src="{{ asset('assets/js/superfish1.js') }}" type="text/javascript"></script>



<!-- superfish js -->
    
<!-- <script type="text/javascript">

  
        // initialise plugins
        $(document).ready(function($){
                // jQuery('ul.sf-menu').superfish();
                
                /* prepend menu icon */
                $('#nav-wrap').prepend('<div id="menu-icon"></div>');
                //alert ('test');
                /* toggle nav */
                $("#menu-icon").on("click", function(){
                        $(".sf-menu").slideToggle();
                        $(this).toggleClass("active");
                });
        });
    
    </script> 
  <script>
    $('ul.sf-menu li a').on('click', function(){
    $(this).addClass('active').parent().siblings().find('a').removeClass('active');
    });
  </script> -->

    <!-- Owl Carousel Start --> 
    <script src="{{ asset('assets/js/owl.carousel.js')}}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/custom.js')}}" type="text/javascript"></script>
    @yield('scriptarea') 
     <script>

       $('.loading').hide();
      $('.owl2').owlCarousel({
    loop:true,
    margin:10, autoplay:true,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
}),
         $('.owl3').owlCarousel({
    loop:true,
    margin:10, autoplay:true,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        300:{
            items:2
        },
        450:{
            items:2
        },
        600:{
            items:3
        },
        800:{
            items:4
        },
        1000:{
            items:5
        }
    }
}),
          $('.owl4').owlCarousel({
    loop:true,
    margin:10, autoplay:true,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        300:{
            items:2
        },
        450:{
            items:2
        },
        600:{
            items:2
        },
        1000:{
            items:3
        }
    }
}),
$('.owl5').owlCarousel({
    loop:true,
    margin:10, autoplay:true,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        300:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
})
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
     <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.9&appId=190179344811994";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<script>
function openNav() {
    document.getElementById("mySidenav").style.left = "0";
}

function closeNav() {
    document.getElementById("mySidenav").style.left = "-250px";
}
</script>
<!-- 
<script>
// Set the date we're counting down to
var countDownDate = new Date("dec 23, 2018 15:37:25").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get todays date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "+minutes + "m " + seconds + "s ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script> -->


</body>
</html>
