@extends('layouts.app')
@section('content')

<div class="banner-sec">

          <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->


    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="{{ asset('assets/images/banner1.jpg')}}" alt="Los Angeles" style="width:100%;">
      </div>

      <div class="item">
        <img src="{{ asset('assets/images/banner1.jpg')}}" alt="Chicago" style="width:100%;">
      </div>
    
      <div class="item">
        <img src="{{ asset('assets/images/banner1.jpg')}}" alt="New york" style="width:100%;">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class=""><i class="fa fa-angle-left" aria-hidden="true"></i></span>
      <span class="sr-only"></span>

    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class=""><i class="fa fa-angle-right" aria-hidden="true"></i></span>
      <span class="sr-only"></span>

    </a>
  </div>
  
</div>
  <div class="container-fluid">
    <div class="top-sec">
    <div class="row">
      <div class="col-lg-2 col-md-3 col-sm-12 col-xs-12 rt-padd ">


      <div class="sidenav-menu">
        <ul class="nav-menu">
                <li class="sidenav-menu-head">Trending Books</li>
            <li ><a href="{{ url('engineering-books') }}">Engineering Books</a>
                  <!-- <ul>
                    <li><a href="">Computer & Internet Books</a></li>
                    <li><a href="">MAKAUT (WBUT) Books</a></li>
                    <li ><a href="javascript:void(0);">Engineering Books</a>
                      <ul>
                        <li><a href="">Bio Technology Books</a></li>
                        <li><a href="">Chemical Engineering Books</a></li>
                        <li><a href="">Civil Engineering Books</a></li>
                        <li><a href="">Electrical & Electronics Engineering Books</a></li>
                        <li><a href="">Mechanical Engineering Books</a></li>
                      </ul>
                    </li>
                    <li ><a href="javascript:void(0);">Law Books</a>
                      <ul>
                        <li><a href="">Bar Exam Books</a></li>
                        <li><a href="">Business Law Books</a></li>
                        <li><a href="">Constitutionl Law Books</a></li>
                        <li><a href="">Criminal Law Books</a></li>
                        <li><a href="">Legal Reference Books</a></li>
                        <li><a href="">Tax Law Books</a></li>
                      </ul>
                    </li>
                    <li ><a href="javascript:void(0);">Medical Books</a>
                      <ul>
                        <li><a href="">Allied Health Services Books</a></li>
                        <li><a href="">Dentistry Books</a></li>
                        <li><a href="">Nursing Books</a></li>
                        <li><a href="">Nutrition Books</a></li>
                        <li><a href="">Reference Books</a></li>
                        <li><a href="">Research Books</a></li>
                        <li><a href="">Medicine Books</a></li>
                      </ul>
                    </li>
                    <li><a href="">Commerce Book</a></li>
                    <li ><a href="javascript:void(0);">Science Books</a>
                      <ul>
                        <li><a href="">Biology Books</a></li>
                        <li><a href="">Chemistry Books</a></li>
                        <li><a href="">Earth & Environmental Books </a></li>
                        <li><a href="">Mechanics Books</a></li>
                        <li><a href="">Physivs Books</a></li>
                      </ul>
                    </li>
                  </ul> -->
                </li>
                <li ><a href="{{ url('engineering-books') }}">Exam Library</a>
                  <!-- <ul>
                    <li><a href="">Banking Exam</a></li>
                    <li><a href="">Civil Service Exam</a></li>
                    <li><a href="">Defence Service Exam</a></li>
                    <li><a href="">Engineering Exam</a></li>
                    <li><a href="">Government Exam</a></li>
                    <li><a href="">International Exam</a></li>
                    <li><a href="">Law Exam</a></li>
                    <li><a href="">Management Exam</a></li>
                    <li><a href="">Medical Exam</a></li>
                  </ul> -->
                </li>
                <li ><a href="{{ url('makaut') }}">Makaut Books</a>
                 <!--  <ul>
                    <li><a href="">Action & Adventure</a></li>
                    <li><a href="">Biographical</a></li>
                    <li><a href="">Children Books</a></li>
                    <li><a href="">Fantasy & Horror</a></li>
                    <li><a href="">Literature Collections</a></li>
                    <li><a href="">Mystery & Detective</a></li>
                    <li><a href="">Religions</a></li>
                    <li><a href="">Science Fiction</a></li>
                  </ul> -->
                </li>
                <li ><a href="{{ url('makaut-b-tech') }}">Makaut Organizer</a>
                  <!-- <ul>
                    <li><a href="">Accounting</a></li>
                    <li><a href="">Business & Economics</a></li>
                    <li><a href="">Finance</a></li>
                    <li><a href="">Management</a></li>
                  </ul> -->
                </li>
                <li ><a href="{{ url('matrix-polytechnic') }}">Matrix Organizer</a>
                  <!-- <ul>
                    <li ><a href="javascript:void(0);">MAKAUT (B.tech)</a>
                      <ul>
                        <li><a href="">First Year B.tech</a></li>
                        <li><a href="">Applied Electronics & Instrumentation Engg</a></li>
                        <li><a href="">Civil Engineering</a></li>
                        <li><a href="">Computer Science & Engg</a></li>
                        <li><a href="">Electrical Engineering</a></li>
                        <li><a href="">Electronics & Cimmunication Engg</a></li>
                        <li><a href="">Information Technology</a></li>
                        <li><a href="">Mechanical Engineering</a></li>
                      </ul>
                    </li>
                    <li ><a href="javascript:void(0);">MAKAUT (Management)</a>
                      <ul>
                        <li><a href="">BBA</a></li>
                        <li><a href="">BCA</a></li>
                        <li><a href="">MBA</a></li>
                        <li><a href="">MCA</a></li>
                      </ul>
                    </li>
                    <li ><a href="javascript:void(0);">MATRIX (Polytechnic)</a>
                      <ul>
                        <li><a href="">First Year Polytechnic</a></li>
                        <li><a href="">Civil Engineering</a></li>
                        <li><a href="">Computer Science & Technology</a></li>
                        <li><a href="">Electrical Engineering</a></li>
                        <li><a href="">Electronics & Tele Communication</a></li>
                        <li><a href="">Mechanical Engineering</a></li>
                      </ul>
                    </li>
                  </ul> -->
                </li>
                <li ><a href="{{ url('medical-books') }}">Medical Books</a>
                  <!-- <ul>
                    <li><a href="product.html">Academic School Books</a></li>
                    <li><a href="profile.html">Olympiads & Scholarship Exam</a></li>
                    <li><a href="">School Text Books</a></li>
                  </ul> -->
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
           <!--  <div class="offer-sidebar">
              <h2>Deal of the Week</h2>
              <div class="box">
                <div class="img-sec">
                    <div class="im">
                    <a href="#"><img src="http://192.168.0.5:8000/photos/1/First Sem-550x470.jpg"></a>
                    </div>
                </div>
                <div class="txt">
                    <a href="#"><h2>Civil 4th Semes...</h2></a>
                    <div class="ret">
                        <h3 class="lft-price">
                            <strike>Rs 430</strike>
                        </h3>
                        <h3 class="rgt-price">Rs 319</h3>
                        <div class="clearfix"></div>
                    </div>
                    <div class="timer">
                      <p id="demo"></p>
                    </div>
                
                </div>
            </div>
            </div> --> 

            <div class="more-box">
              <div class="img-box">
              <a href="{{ url('login') }}">
                  <img src="{{ asset('assets/images/trk.png')}}" alt="">
                </a>
              </div>
              <div class="img-box">
                <a href="#">
                  <img src="{{ asset('assets/images/ggl.png')}}" alt="">
                </a>
              </div>
            </div>

    </div>
    <div class="col-lg-10 col-md-9 col-sm-12 col-xs-12 full-width">
      <div class="row">
        
        <div class="col-md-12 col-sm-12 col-xs-12 sub-pad">
          <div class="banner-btm">

    <div>
    <div class="col-md-4 col-sm-4 col-xs-12">
      <div class="box">


        <div data-aos="fade-up" data-aos-duration="1200">
          <a href="{{ url('academics-and-professional') }}">
        <div class="in-box inbx one1">
          <div class="row">
            <div class="col-md-8 col-sm-8 col-xs-8">
              <div class="txt">
                <h2>Children & Young Adult</h2>
                <h3>UPTO 20% OFF</h3>
              <a href="{{ url('academics-and-professional') }}">Shop Now</a>
              </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4">
              <div class="img-sec">
                <a href="{{ url('academics-and-professional') }}"><img src="{{ asset('assets/images/bk2.png')}}" alt=""></a>
              </div>
            </div>
          </div>
        </div>
        </a>
      </div>


      <div data-aos="fade-up" data-aos-duration="2000">
        <a href="{{ url('school-books') }}">
        <div class="in-box inbx two2">
          <div class="row">
            <div class="col-md-8 col-sm-8 col-xs-8">
              <div class="txt">
                <h2>History & Politics Books</h2>
                <h3>UPTO 20% OFF</h3>
                <a href="{{ url('school-books') }}">Shop Now</a>
              </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4">
              <div class="img-sec">
                <a href="{{ url('school-books') }}"><img src="{{ asset('assets/images/bk5.png')}}" alt=""></a>
              </div>
            </div>
          </div>
        </div>
      </a>
      </div>
      <div data-aos="fade-up" data-aos-duration="3000">
        <a href="{{ url('business- managment') }}">
        <div class="in-box inbx three3">
          <div class="row">
            <div class="col-md-8 col-sm-8 col-xs-8">
              <div class="txt">
                <h2>Business & Managment</h2>
                <h3>UPTO 20% OFF</h3>
                <a href="{{ url('business- managment') }}">Shop Now</a>
              </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4">
              <div class="img-sec">
                <a href="{{ url('business- managment') }}"><img src="{{ asset('assets/images/bk7.png')}}" alt=""></a>
              </div>
            </div>
          </div>
        </div>
      </a>
      </div>
      </div>
    </div>
    <div class="col-md-4 col-sm-4 col-xs-12">
      <div class="box">
        <div data-aos="fade-up" data-aos-duration="1200">
          <a href="{{ url('academics-and-professional') }}">
        <div class="in-box inbx four4">
          <div class="row">
            <div class="col-md-8 col-sm-8 col-xs-8">
              <div class="txt">
                <h2>Academic & Professional Books</h2>
                <h3>UPTO 20% OFF</h3>
                <a href="{{ url('academics-and-professional') }}">Shop Now</a>
              </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4">
              <div class="img-sec">
               <a href="{{ url('academics-and-professional') }}"> <img src="{{ asset('assets/images/bk9.png')}}" alt=""></a>
              </div>
            </div>
          </div>
        </div>
      </a>
      </div>

<div data-aos="fade-up" data-aos-duration="2000">
        <div class="in-box big">
          <img src="{{ asset('assets/images/aad3.png')}}" alt="">
          <!-- <div class="row">
            <div class="col-md-8 col-sm-8 col-xs-12">
              <div class="txt">
                <h2>Best Sellers Books</h2>
                <h3>UPTO 20% OFF</h3>
                <a href="#">Shop Now</a>
              </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="img-sec">
                <img src="images/bk5.png" alt="">
              </div>
            </div>
          </div> -->
        </div>
      </div>
      </div>
    </div>
    <div class="col-md-4 col-sm-4 col-xs-12">
      <div class="box">
        <div data-aos="fade-up" data-aos-duration="1200">
          <a href="{{ url('entrance-exam') }}">
        <div class="in-box inbx five5">
          <div class="row">
            <div class="col-md-8 col-sm-8 col-xs-8">
              <div class="txt">
                <h2>Entranct Exam Books</h2>
                <h3>UPTO 20% OFF</h3>
              <a href="{{ url('entrance-exam') }}">Shop Now</a>
              </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4">
              <div class="img-sec">
                <a href="{{ url('entrance-exam') }}"><img src="{{ asset('assets/images/bk16.png')}}" alt=""></a>
              </div>
            </div>
          </div>
        </div>
      </a>
      </div>
<div data-aos="fade-up" data-aos-duration="2000">
   <a href="{{ url('makaut') }}">
        <div class="in-box inbx six6">
          <div class="row">
            <div class="col-md-8 col-sm-8 col-xs-8">
              <div class="txt">
                <h2>Makaut</h2>
                <h3>UPTO 40% OFF</h3>
              <a href="{{ url('makaut') }}">Shop Now</a>
              </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4">
              <div class="img-sec">
                 <a href="{{ url('makaut') }}"><img src="{{ asset('assets/images/MAKAUT.jpg')}}" alt=""></a>
              </div>
            </div>
          </div>
        </div>
      </a>
      </div>
<div data-aos="fade-up" data-aos-duration="3000">
  <a href="{{ url('law-books') }}">
        <div class="in-box inbx seven7">
          <div class="row">
            <div class="col-md-8 col-sm-8 col-xs-8">
              <div class="txt">
                <h2>Law Books</h2>
                <h3>UPTO 20% OFF</h3>
                <a href="{{ url('law-books') }}">Shop Now</a>
              </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4">
              <div class="img-sec">
                <a href="{{ url('law-books') }}"><img src="{{ asset('assets/images/bk20.png')}}" alt=""></a>
              </div>
            </div>
          </div>
        </div>
      </a>
      </div>
      </div>
    </div>
  </div>
<div class="clearfix"></div>

</div>
        </div>
      </div>


<div class="latest-arrival">

        <h2>LATEST ARRIVALS</h2>
        <div class="welcmscroll">
            <div id="carousel" class="owl-carousel owl3 owl-theme">

                    {{ displayLatestArrivals() }}
                {{-- <div class="item">
                    <div class="box hvr-float-shadow ">
                        <div class="img-sec">
                            <div class="im">
                                <img src="{{ asset('assets/images/bag3.png') }}">
                            </div>
                        </div>
                        <div class="txt">
                            <h2>Gate</h2>
                            <div class="ret">
                                <h3 class="lft-price">
                                    <strike>Rs-550/-</strike>
                                </h3>
                                <h3 class="rgt-price">Rs-390/-</h3>
                                <div class="clearfix"></div>
                            </div>
                            <div class="icn">
                                <a href="#">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item">
                    <div class="box hvr-float-shadow">
                        <div class="img-sec">
                            <div class="im">
                                <img src="{{ asset('assets/images/bk20.png') }}">
                            </div>
                        </div>
                        <div class="txt">
                            <h2>Gate</h2>
                            <div class="ret">
                                <h3 class="lft-price">
                                    <strike>Rs-550/-</strike>
                                </h3>
                                <h3 class="rgt-price">Rs-390/-</h3>
                                <div class="clearfix"></div>
                            </div>
                            <div class="icn">
                                <a href="#">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item">
                    <div class="box hvr-float-shadow">
                        <div class="img-sec">
                            <div class="im">
                                <img src="{{ asset('assets/images/bk19.png') }}">
                            </div>
                        </div>
                        <div class="txt">
                            <h2>Gate</h2>
                            <div class="ret">
                                <h3 class="lft-price">
                                    <strike>Rs-550/-</strike>
                                </h3>
                                <h3 class="rgt-price">Rs-390/-</h3>
                                <div class="clearfix"></div>
                            </div>
                            <div class="icn">
                                <a href="#">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item">
                    <div class="box hvr-float-shadow">
                        <div class="img-sec">
                            <div class="im">
                                <img src="{{ asset('assets/images/bk1.png') }}">
                            </div>
                        </div>
                        <div class="txt">
                            <h2>Gate</h2>
                            <div class="ret">
                                <h3 class="lft-price">
                                    <strike>Rs-550/-</strike>
                                </h3>
                                <h3 class="rgt-price">Rs-390/-</h3>
                                <div class="clearfix"></div>
                            </div>
                            <div class="icn">
                                <a href="#">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item">
                    <div class="box hvr-float-shadow">
                        <div class="img-sec">
                            <div class="im">
                                <img src="{{ asset('assets/images/bk2.png') }}">
                            </div>
                        </div>
                        <div class="txt">
                            <h2>Gate</h2>
                            <div class="ret">
                                <h3 class="lft-price">
                                    <strike>Rs-550/-</strike>
                                </h3>
                                <h3 class="rgt-price">Rs-390/-</h3>
                                <div class="clearfix"></div>
                            </div>
                            <div class="icn">
                                <a href="#">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item">
                    <div class="box hvr-float-shadow">
                        <div class="img-sec">
                            <div class="im">
                                <img src="{{ asset('assets/images/bk3.png') }}">
                            </div>
                        </div>
                        <div class="txt">
                            <h2>Gate</h2>
                            <div class="ret">
                                <h3 class="lft-price">
                                    <strike>Rs-550/-</strike>
                                </h3>
                                <h3 class="rgt-price">Rs-390/-</h3>
                                <div class="clearfix"></div>
                            </div>
                            <div class="icn">
                                <a href="#">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item">
                    <div class="box hvr-float-shadow">
                        <div class="img-sec">
                            <div class="im">
                                <img src="{{ asset('assets/images/bk4.png') }}">
                            </div>
                        </div>
                        <div class="txt">
                            <h2>Gate</h2>
                            <div class="ret">
                                <h3 class="lft-price">
                                    <strike>Rs-550/-</strike>
                                </h3>
                                <h3 class="rgt-price">Rs-390/-</h3>
                                <div class="clearfix"></div>
                            </div>
                            <div class="icn">
                                <a href="#">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item">
                    <div class="box hvr-float-shadow">
                        <div class="img-sec">
                            <div class="im">
                                <img src="{{ asset('assets/images/bk5.png') }}">
                            </div>
                        </div>
                        <div class="txt">
                            <h2>Gate</h2>
                            <div class="ret">
                                <h3 class="lft-price">
                                    <strike>Rs-550/-</strike>
                                </h3>
                                <h3 class="rgt-price">Rs-390/-</h3>
                                <div class="clearfix"></div>
                            </div>
                            <div class="icn">
                                <a href="#">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item">
                    <div class="box hvr-float-shadow">
                        <div class="img-sec">
                            <div class="im">
                                <img src="{{ asset('assets/images/bk6.png') }}">
                            </div>
                        </div>
                        <div class="txt">
                            <h2>Gate</h2>
                            <div class="ret">
                                <h3 class="lft-price">
                                    <strike>Rs-550/-</strike>
                                </h3>
                                <h3 class="rgt-price">Rs-390/-</h3>
                                <div class="clearfix"></div>
                            </div>
                            <div class="icn">
                                <a href="#">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item">
                    <div class="box hvr-float-shadow">
                        <div class="img-sec">
                            <div class="im">
                                <img src="{{ asset('assets/images/bk7.png') }}">
                            </div>
                        </div>
                        <div class="txt">
                            <h2>Gate</h2>
                            <div class="ret">
                                <h3 class="lft-price">
                                    <strike>Rs-550/-</strike>
                                </h3>
                                <h3 class="rgt-price">Rs-390/-</h3>
                                <div class="clearfix"></div>
                            </div>
                            <div class="icn">
                                <a href="#">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div> --}}

            </div>
        </div>

</div>


<div class="offer-sec">

        <div class="row">
            
            <div class="col-md-7 col-sm-7 col-xs-12">
                <div class="full-box">
                    <h2 class="up">STUDENT'S CHOICE</h2>
                    <div class="btm-box">
                        <div class="welcmscroll">
                            <div id="carousel" class="owl-carousel owl4 owl-theme">

                            {{ displayMostViewedProducts() }}

                            </div>
                        </div>
                    </div>
                    <!-- <a href="#" class="view">View All</a> -->
                </div>
            </div>
            <div class="col-md-5 col-sm-5 col-xs-12">
                <div class="img-box">
                    <img src="{{ asset('assets/images/add1.jpg') }}" alt="">
                </div>
            </div>
        </div>

</div>
</div>
</div>
</div>
</div>
  
@endsection