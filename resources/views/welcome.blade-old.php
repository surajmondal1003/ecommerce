@extends('layouts.app')
@section('content')
<div class="banner-sec">
    <div class="container-fluid">
      <div class="top-sec">
      <div class="row">
        <div class="col-md-2 col-sm-2 col-xs-12 ">
          <div class="big">
           <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
          <li data-target="#myCarousel" data-slide-to="3"></li>
          <li data-target="#myCarousel" data-slide-to="4"></li>
        </ol>
        <div class="carousel-inner">
  
          <div class="item active">
            <div class="box">
            <div class="img-sec">
              <div class="im">
                <img src="{{ asset('assets/images/bk1.png')}}">
              </div>
            </div>
            <div class="txt">
              <h3>Engineering Books</h3>
              <!-- <div class="ret">
                <h3 class="lft-price"><strike>Rs-550/-</strike></h3><h3 class="rgt-price">Rs-390/-</h3>
                <div class="clearfix"></div>
              </div>
              <div class="icn">
                <a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                 <a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a>
              </div> -->
            </div>
            </div>
            </div>
         
  
          <div class="item">
            <div class="box">
            <div class="img-sec">
              <div class="im">
                <img src="{{ asset('assets/images/bk2.png')}}">
              </div>
            </div>
            <div class="txt">
              <h3>MAKAUT(WBUT) Books</h3>
              <!-- <div class="ret">
                <h3 class="lft-price"><strike>Rs-550/-</strike></h3><h3 class="rgt-price">Rs-390/-</h3>
                <div class="clearfix"></div>
              </div>
              <div class="icn">
                <a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                 <a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a>
              </div> -->
            </div>
            </div>
            </div>
  
            <div class="item">
            <div class="box">
            <div class="img-sec">
              <div class="im">
                <img src="{{ asset('assets/images/bk3.png')}}">
              </div>
            </div>
            <div class="txt">
              <h3>MAKAUT Organizer</h3>
              <!-- <div class="ret">
                <h3 class="lft-price"><strike>Rs-550/-</strike></h3><h3 class="rgt-price">Rs-390/-</h3>
                <div class="clearfix"></div>
              </div>
              <div class="icn">
                <a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                 <a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a>
              </div> -->
            </div>
            </div>
            </div>
  
            <div class="item">
            <div class="box">
            <div class="img-sec">
              <div class="im">
                <img src="{{ asset('assets/images/bk4.png')}}">
              </div>
            </div>
            <div class="txt">
              <h3>Exam Library</h3>
              <!-- <div class="ret">
                <h3 class="lft-price"><strike>Rs-550/-</strike></h3><h3 class="rgt-price">Rs-390/-</h3>
                <div class="clearfix"></div>
              </div>
              <div class="icn">
                <a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                 <a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a>
              </div> -->
            </div>
            </div>
            </div>
  
            <div class="item">
            <div class="box">
            <div class="img-sec">
              <div class="im">
                <img src="{{ asset('assets/images/bk5.png')}}">
              </div>
            </div>
            <div class="txt">
              <h3>Medical Books</h3>
              <!-- <div class="ret">
                <h3 class="lft-price"><strike>Rs-550/-</strike></h3><h3 class="rgt-price">Rs-390/-</h3>
                <div class="clearfix"></div>
              </div>
              <div class="icn">
                <a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                 <a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a>
              </div> -->
            </div>
            </div>
            </div>
              </div>
            </div>
        </div>
      </div>
        <div class="col-md-7 col-sm-7 col-xs-12 sub-pad">
          <div id="slidy-container">
            <figure id="slidy">
              <img src="{{ asset('assets/images/banner1.jpg')}}" alt="">
              <img src="{{ asset('assets/images/banner1.jpg')}}" alt="">
              <img src="{{ asset('assets/images/banner1.jpg')}}" alt="">
              <img src="{{ asset('assets/images/banner1.jpg')}}" alt="">
            </figure>
          </div>
          <!-- <div class="main-banner">
            <img src="images/banner1.JPG" alt="">
          </div> -->
        </div>
        <div class="col-md-3 col-sm-3 col-xs-12 ">
          <div class="big-block">
            <div class="det"><a href="">DETAILS</a></div>
           <div class="welcmscroll">
  <!--           <div class="owl-next">Next</div> -->
          <div id="carousel" class="owl-carousel owl5 owl-theme">
  
            <div class="item">
            <div class="box ">
            <div class="img-sec">
              <div class="im">
                <img src="{{ asset('assets/images/bag3.png')}}">
              </div>
            </div>
            <div class="txt">
              <h3><a href="login.html">LOGIN SECTION</a></h3>
              <!-- <div class="ret">
                <h3 class="lft-price"><strike>Rs-550/-</strike></h3><h3 class="rgt-price">Rs-390/-</h3>
                <div class="clearfix"></div>
              </div> -->
              <!-- <div class="icn">
                <a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                 <a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a>
              </div> -->
            </div>
            </div>
            </div>
  
            <div class="item">
            <div class="box">
            <div class="img-sec">
              <div class="im">
                <img src="{{ asset('assets/images/bk20.png')}}">
              </div>
            </div>
            <div class="txt">
              <h3><a href="#">SELLER SECTION</a></h3>
              <!-- <div class="ret">
                <h3 class="lft-price"><strike>Rs-550/-</strike></h3><h3 class="rgt-price">Rs-390/-</h3>
                <div class="clearfix"></div>
              </div> -->
              <!-- <div class="icn">
                <a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                 <a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a>
              </div> -->
            </div>
            </div>
            </div>
                    
            <div class="item">
            <div class="box">
            <div class="img-sec">
              <div class="im">
                <img src="{{ asset('assets/images/bk19.png')}}">
              </div>
            </div>
            <div class="txt">
              <h3><a href="#">MEMBERSHIP</a></h3>
              <!-- <div class="ret">
                <h3 class="lft-price"><strike>Rs-550/-</strike></h3><h3 class="rgt-price">Rs-390/-</h3>
                <div class="clearfix"></div>
              </div> -->
              <!-- <div class="icn">
                <a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                 <a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a>
              </div> -->
            </div>
            </div>
            </div>
  
            <div class="item">
            <div class="box">
            <div class="img-sec">
              <div class="im">
                <img src="{{ asset('assets/images/bk1.png')}} ">
              </div>
            </div>
            <div class="txt">
              <h3><a href="#">UPCOMING PRODUCTS</a></h3>
              <!-- <div class="ret">
                <h3 class="lft-price"><strike>Rs-550/-</strike></h3><h3 class="rgt-price">Rs-390/-</h3>
                <div class="clearfix"></div>
              </div> -->
              <!-- <div class="icn">
                <a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                 <a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a>
              </div> -->
            </div>
            </div>
            </div>
  
            
  
          </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </div>
  </div>


<div class="banner-btm">
    <div class="container-fluid">
        <div class="heading">
            <!--  <h2 class="on"><i>BEST BUY BOOKS</i></h2> -->
        </div>
        <div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="box">
                    <div data-aos="fade-up" data-aos-duration="1200">
                        <div class="in-box one1">
                            <div class="row">
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <div class="txt">
                                        <h2>Best Sellers Books</h2>
                                        <h3>UPTO 20% OFF</h3>
                                        <a href="#">Shop Now</a>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <div class="img-sec">
                                        <img src="{{ asset('assets/images/bk5.png') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div data-aos="fade-up" data-aos-duration="2000">
                        <div class="in-box two2">
                            <div class="row">
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <div class="txt">
                                        <h2>History & Politics Books</h2>
                                        <h3>UPTO 20% OFF</h3>
                                        <a href="#">Shop Now</a>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <div class="img-sec">
                                        <img src="{{ asset('assets/images/bk8.png') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div data-aos="fade-up" data-aos-duration="3000">
                        <div class="in-box three3">
                            <div class="row">
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <div class="txt">
                                        <h2>International Best Sellers </h2>
                                        <h3>UPTO 20% OFF</h3>
                                        <a href="#">Shop Now</a>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <div class="img-sec">
                                        <img src="{{ asset('assets/images/bk12.png') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="box">
                    <div data-aos="fade-up" data-aos-duration="1200">
                        <div class="in-box four4">
                            <div class="row">
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <div class="txt">
                                        <h2>Academic & Professional Books</h2>
                                        <h3>UPTO 20% OFF</h3>
                                        <a href="#">Shop Now</a>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <div class="img-sec">
                                        <img src="{{ asset('assets/images/bk13.png') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div data-aos="fade-up" data-aos-duration="2000">
                        <div class="in-box big">
                            <img src="{{ asset('assets/images/aad3.jpg') }}" alt="">
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
                <img src="{{ asset('assets/images/bk5.png') }}" alt="">
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
                        <div class="in-box five5">
                            <div class="row">
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <div class="txt">
                                        <h2>Entranct Exam Books</h2>
                                        <h3>UPTO 20% OFF</h3>
                                        <a href="#">Shop Now</a>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <div class="img-sec">
                                        <img src="{{ asset('assets/images/bk15.png') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div data-aos="fade-up" data-aos-duration="2000">
                        <div class="in-box six6">
                            <div class="row">
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <div class="txt">
                                        <h2>Business & Management Books</h2>
                                        <h3>UPTO 20% OFF</h3>
                                        <a href="#">Shop Now</a>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <div class="img-sec">
                                        <img src="{{ asset('assets/images/bk21.png') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div data-aos="fade-up" data-aos-duration="3000">
                        <div class="in-box seven7">
                            <div class="row">
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <div class="txt">
                                        <h2>Best Sellers Books</h2>
                                        <h3>UPTO 20% OFF</h3>
                                        <a href="#">Shop Now</a>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <div class="img-sec">
                                        <img src="{{ asset('assets/images/bk2.png') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="latest-arrival">
    <div class="container-fluid">
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
</div>


<div class="offer-sec">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5 col-sm-5 col-xs-12">
                <div class="img-box">
                    <img src="{{ asset('assets/images/add1.jpg') }}" alt="">
                </div>
            </div>
            <div class="col-md-7 col-sm-7 col-xs-12">
                <div class="full-box">
                    <h2 class="up">STUDENT'S CHOICE</h2>
                    <div class="btm-box">
                        <div class="welcmscroll">
                            <div id="carousel" class="owl-carousel owl4 owl-theme">
                                <div class="item">
                                    <div class="box hvr-grow-shadow">
                                        <div class="img-sec">
                                            <div class="im">
                                                <img src="{{ asset('assets/images/bk8.png') }}">
                                            </div>
                                        </div>
                                        <div class="txt">
                                            <h2>Gate</h2>
                                            <div class="ret">
                                                <h3 class="lft-price">
                                                    <strike>Rs 550</strike>
                                                </h3>
                                                <h3 class="rgt-price">Rs 390</h3>
                                                <div class="clearfix"></div>
                                            </div>
                                            <!-- <div class="icn">
                                                <a href="#">
                                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                                </a>
                                                <a href="#">
                                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                                </a>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>

                                <div class="item">
                                    <div class="box hvr-grow-shadow">
                                        <div class="img-sec">
                                            <div class="im">
                                                <img src="{{ asset('assets/images/bk9.png') }}">
                                            </div>
                                        </div>
                                        <div class="txt">
                                            <h2>Gate</h2>
                                            <div class="ret">
                                                <h3 class="lft-price">
                                                    <strike>Rs 550</strike>
                                                </h3>
                                                <h3 class="rgt-price">Rs 390</h3>
                                                <div class="clearfix"></div>
                                            </div>
                                            <!-- <div class="icn">
                                                <a href="#">
                                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                                </a>
                                                <a href="#">
                                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                                </a>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>

                                <div class="item">
                                    <div class="box hvr-grow-shadow">
                                        <div class="img-sec">
                                            <div class="im">
                                                <img src="{{ asset('assets/images/bk10.png') }}">
                                            </div>
                                        </div>
                                        <div class="txt">
                                            <h2>Gate</h2>
                                            <div class="ret">
                                                <h3 class="lft-price">
                                                    <strike>Rs 550</strike>
                                                </h3>
                                                <h3 class="rgt-price">Rs 390</h3>
                                                <div class="clearfix"></div>
                                            </div>
                                            <!-- <div class="icn">
                                                <a href="#">
                                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                                </a>
                                                <a href="#">
                                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                                </a>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>

                                <div class="item">
                                    <div class="box hvr-grow-shadow">
                                        <div class="img-sec">
                                            <div class="im">
                                                <img src="{{ asset('assets/images/bk11.png') }}">
                                            </div>
                                        </div>
                                        <div class="txt">
                                            <h2>Gate</h2>
                                            <div class="ret">
                                                <h3 class="lft-price">
                                                    <strike>Rs 550</strike>
                                                </h3>
                                                <h3 class="rgt-price">Rs 390</h3>
                                                <div class="clearfix"></div>
                                            </div>
                                            <!-- <div class="icn">
                                                <a href="#">
                                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                                </a>
                                                <a href="#">
                                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                                </a>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>

                                <div class="item">
                                    <div class="box hvr-grow-shadow">
                                        <div class="img-sec">
                                            <div class="im">
                                                <img src="{{ asset('assets/images/bk12.png') }}">
                                            </div>
                                        </div>
                                        <div class="txt">
                                            <h2>Gate</h2>
                                            <div class="ret">
                                                <h3 class="lft-price">
                                                    <strike>Rs 550</strike>
                                                </h3>
                                                <h3 class="rgt-price">Rs 390</h3>
                                                <div class="clearfix"></div>
                                            </div>
                                            <!-- <div class="icn">
                                                <a href="#">
                                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                                </a>
                                                <a href="#">
                                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                                </a>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>

                                <div class="item">
                                    <div class="box hvr-grow-shadow">
                                        <div class="img-sec">
                                            <div class="im">
                                                <img src="{{ asset('assets/images/bk13.png') }}">
                                            </div>
                                        </div>
                                        <div class="txt">
                                            <h2>Gate</h2>
                                            <div class="ret">
                                                <h3 class="lft-price">
                                                    <strike>Rs 550</strike>
                                                </h3>
                                                <h3 class="rgt-price">Rs 390</h3>
                                                <div class="clearfix"></div>
                                            </div>
                                            <!-- <div class="icn">
                                                <a href="#">
                                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                                </a>
                                                <a href="#">
                                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                                </a>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>

                                <div class="item">
                                    <div class="box hvr-grow-shadow">
                                        <div class="img-sec">
                                            <div class="im">
                                                <img src="{{ asset('assets/images/bk14.png') }}">
                                            </div>
                                        </div>
                                        <div class="txt">
                                            <h2>Gate</h2>
                                            <div class="ret">
                                                <h3 class="lft-price">
                                                    <strike>Rs 550</strike>
                                                </h3>
                                                <h3 class="rgt-price">Rs 390</h3>
                                                <div class="clearfix"></div>
                                            </div>
                                            <!-- <div class="icn">
                                                <a href="#">
                                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                                </a>
                                                <a href="#">
                                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                                </a>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>

                                <div class="item">
                                    <div class="box hvr-grow-shadow">
                                        <div class="img-sec">
                                            <div class="im">
                                                <img src="{{ asset('assets/images/bk15.png') }}">
                                            </div>
                                        </div>
                                        <div class="txt">
                                            <h2>Gate</h2>
                                            <div class="ret">
                                                <h3 class="lft-price">
                                                    <strike>Rs 550</strike>
                                                </h3>
                                                <h3 class="rgt-price">Rs 390</h3>
                                                <div class="clearfix"></div>
                                            </div>
                                            <!-- <div class="icn">
                                                <a href="#">
                                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                                </a>
                                                <a href="#">
                                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                                </a>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>

                                <div class="item">
                                    <div class="box hvr-grow-shadow">
                                        <div class="img-sec">
                                            <div class="im">
                                                <img src="{{ asset('assets/images/bk16.png') }}">
                                            </div>
                                        </div>
                                        <div class="txt">
                                            <h2>Gate</h2>
                                            <div class="ret">
                                                <h3 class="lft-price">
                                                    <strike>Rs 550</strike>
                                                </h3>
                                                <h3 class="rgt-price">Rs 390</h3>
                                                <div class="clearfix"></div>
                                            </div>
                                            <!-- <div class="icn">
                                                <a href="#">
                                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                                </a>
                                                <a href="#">
                                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                                </a>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>

                                <div class="item">
                                    <div class="box hvr-grow-shadow">
                                        <div class="img-sec">
                                            <div class="im">
                                                <img src="{{ asset('assets/images/bk17.png') }}">
                                            </div>
                                        </div>
                                        <div class="txt">
                                            <h2>Gate</h2>
                                            <div class="ret">
                                                <h3 class="lft-price">
                                                    <strike>Rs 550</strike>
                                                </h3>
                                                <h3 class="rgt-price">Rs 390</h3>
                                                <div class="clearfix"></div>
                                            </div>
                                            <!-- <div class="icn">
                                                <a href="#">
                                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                                </a>
                                                <a href="#">
                                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                                </a>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <a href="#" class="view">View All</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection