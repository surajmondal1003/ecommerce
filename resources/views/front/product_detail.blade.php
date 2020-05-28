@extends('layouts.prodDetaillayout')

@section('content')


<div class="inner-page">
  <div class="container">
    <div class="big">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="lt-block">
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div id="container" class="cf">
                  <div id="main" role="main">
                    <section class="slider">
                      <div id="slider" class="flexslider">
                        <ul class="slides">
                          @foreach($imagesArr as $item)
                          <li class="to"><img class="fx-pad" src="{{asset($item->image_name)}}" /></li>
                         
                          @endforeach
                          <!-- <li class="to"><img src="images/bag3.png" /></li>
                          <li class="to"><img src="images/bag3.png" /></li>
                          <li class="to"><img src="images/bag3.png" /></li>
                          <li class="to"><img src="images/bag3.png" /></li>
                          <li class="to"><img src="images/bag3.png" /></li>
                          <li class="to"><img src="images/bag3.png" /></li>
                          <li class="to"><img src="images/bag3.png" /></li>
                          <li class="to"><img src="images/bag3.png" /></li>
                          <li class="to"><img src="images/bag3.png" /></li> -->
                        </ul>
                      </div>
                      <div id="carousel" class="flexslider btm-slid">
                        <ul class="slides">
                            @foreach($imagesArr as $item)
                            <li class="on"><img src="{{asset($item->image_name)}}" /></li>
                           
                            @endforeach
                         
                          <!-- <li class="on"><img src="images/bag3.png" /></li>
                          <li class="on"><img src="images/bag3.png" /></li>
                          <li class="on"><img src="images/bag3.png" /></li>
                          <li class="on"><img src="images/bag3.png" /></li>
                          <li class="on"><img src="images/bag3.png" /></li>
                          <li class="on"><img src="images/bag3.png" /></li>
                          <li class="on"><img src="images/bag3.png" /></li>
                          <li class="on"><img src="images/bag3.png" /></li>
                          <li class="on"><img src="images/bag3.png" /></li> -->
                        </ul>
                      </div>
                    </section>
                  </div>
                </div>

              </div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="rt-sec">
                  <h1>{{$prodDetails[0]->product_name}}</h1>
                  <div class="offerprice">
                      <h6>{{number_format($discount_percent)}} % Off</h6>
                    </div>
                 <div class="ret2">
                    
                  <h3 class="lft-price"><strike>Rs {{number_format($prodDetails[0]->regular_price)}}</strike></h3><h3 class="rgt-price">Rs {{number_format($prodDetails[0]->discount_price)}}</h3>
                  

                  @if($prodDetails[0]->is_supreme=='1')
                  <div class="supreme">
                    <img src="{{asset('assets/images/sup.png')}}" alt="">
                  </div>
                  @endif

                  <div class="clearfix"></div>
                </div>
                {{-- <div class="rng">
                <span class="plus button">
                  +
                  </span>
                  <input type="text" name="cartqty" id="cartqty" maxlength="12" value="1" class="qty" />
                  <span class="min button">
                  -
                  </span>
                  </div> --}}
                  <div class="btncrt">
                      @if($in_stock=='1')
                      <div class="col-md-6 col-sm-6 col-xs-12 pad-less">
                        <div id="goToCartDiv">
                        @if($is_addedTocart=='0')
                          <a href="javascript:void(0)" class="buybtn hvr" onclick="addtoCart('{{ $prodDetails[0]->product_url }}')"> <span class="flsh"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
                            ADD TO CART
                          <div class="loader4" id="loader_{{$prodDetails[0]->product_url}}"></div>
                          </a>
                        @else
                        
                        <a href="{{ url('cart-items') }}" class="buybtn hvr"> <span class="flsh"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
                            GO TO CART
                      
                          </a>
                        
                        @endif
                      </div>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12 pad-less">
                          <a href="javascript:void(0)" class="buybtn" onclick="buynow('{{ $prodDetails[0]->product_url }}')"> <span class="flsh"><i class="fa fa-bolt" aria-hidden="true"></i></span> BUY NOW</a>
                      </div>
                      @else
                      <div class="col-md-6 col-sm-6 col-xs-12 pad-less">
                          <a href="javascript:void(0)" class="buybtn" id="stocknoneBtn" <span class="flsh"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
                            OUT OF STOCK
                          <div class="loader4" id="loader_{{$prodDetails[0]->product_url}}"></div>
                          </a>
                         
                          
                          
                        </div>
                      {{-- <div class="col-md-6 col-sm-6 col-xs-12 pad-less">
                          <a href="#" class="buybtn"> <span class="flsh"><i class="fa fa-bolt" aria-hidden="true"></i></span> BUY NOW</a>
                      </div> --}}
                      @endif
                      
                   <div class="clearfix"></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-5 col-md-6 col-sm-7 col-xs-9">
                  <div class="check">
                    <h3> Delivery : </h3>
                    <form id="pincodeForm">
                      <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                         <div class="form-group">
                           <input type="hidden" name="inputProduct" value="{{$prodDetails[0]->product_id}}">
                           <input type="hidden" name="inputProductPrice" value="{{$prodDetails[0]->discount_price}}">
                           <input type="text" name="inputPin" placeholder="Enter Pincode" class="form-control checkbox">
                           <span class="help-block"></span>
                           <div id="checkAvailPinDiv">
                            <button class="buybtn" id="inputCheckPincodebtn"> Check</button>
                           </div>
                          </div>
                        </div>
                        
                           
                        
                      </div>
                    </form>
                    <div id="pincodeStatusMsg"></div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-3">
                  <div class="wsh">
                    <a href="javascript:void(0)" class="buybtn" onclick="addToWishlist('{{$prodDetails[0]->product_url}}')"><span class="wsh-lst"><i class="fa fa-heart" aria-hidden="true"></i></span> </a>
                  </div>
                </div>
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
          <!-- <div class="btm-block">
              <form>
                <div class="row">
                  <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="form-group">
                      <input type="text" class="form-control" name="" placeholder=" Name">
                    </div>
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="form-group">
                      <input type="text" class="form-control" name="" placeholder="Enaail">
                    </div>
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="form-group">
                      <input type="text" class="form-control" name="" placeholder="Phone">
                    </div>
                  </div>
                  <div class="col-md-7 col-sm-7 col-xs-12">
                    <div class="form-group">
                      <textarea class="form-control">Message</textarea>
                    </div>
                  </div>
                  <div class="col-md-5 col-sm-5 col-xs-12">
                    <div class="form-group">
                      <iframe src="https://www.google.com/recaptcha/api2/anchor?ar=1&amp;k=6Le8qw0UAAAAAMzzkJ7daow6xI23IQR--WdFhUCZ&amp;co=aHR0cHM6Ly93d3cuZHVic2VvLmNvLnVrOjQ0Mw..&amp;hl=en&amp;v=v1531117903872&amp;theme=light&amp;size=normal&amp;cb=lecvo2ltt6ph" width="304" height="78" role="presentation" frameborder="0" scrolling="no" sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox"></iframe>
                     <textarea id="g-recaptcha-response" name="g-recaptcha-response" class="g-recaptcha-response" style="width: 250px; height: 40px; border: 1px solid #c1c1c1; margin: 10px 25px; padding: 0px; resize: none;  display: none; "></textarea>
                    </div>
                  </div>
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                     <input type="submit" value="SET QUERY" id="to" />
                    </div>
                  </div>
                </div>
              </form>
          </div> -->
        </div>
        <!-- <div class="col-md-3 col-sm-3 col-xs-12 ">
            <div class="big2">
             <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
          </ol>
          <div class="carousel-inner">
    
            <div class="item active">
              <div class="box">
              <div class="img-sec">
                <div class="im">
                  <img src="images/bk15.png">
                </div>
              </div>
              <div class="txt">
                <h2>Gate</h2>
                <div class="ret">
                  <h3 class="lft-price"><strike>Rs-550/-</strike></h3><h3 class="rgt-price">Rs-390/-</h3>
                  <div class="clearfix"></div>
                </div>
                <div class="icn">
                  <a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                   <a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a>
                </div>
              </div>
              </div>
              </div>
           
    
            <div class="item">
              <div class="box">
              <div class="img-sec">
                <div class="im">
                  <img src="images/bk18.png">
                </div>
              </div>
              <div class="txt">
                <h2>Gate</h2>
                <div class="ret">
                  <h3 class="lft-price"><strike>Rs-550/-</strike></h3><h3 class="rgt-price">Rs-390/-</h3>
                  <div class="clearfix"></div>
                </div>
                <div class="icn">
                  <a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                   <a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a>
                </div>
              </div>
              </div>
              </div>

              <div class="item">
              <div class="box">
              <div class="img-sec">
                <div class="im">
                  <img src="images/bk16.png">
                </div>
              </div>
              <div class="txt">
                <h2>Gate</h2>
                <div class="ret">
                  <h3 class="lft-price"><strike>Rs-550/-</strike></h3><h3 class="rgt-price">Rs-390/-</h3>
                  <div class="clearfix"></div>
                </div>
                <div class="icn">
                  <a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                   <a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a>
                </div>
              </div>
              </div>
              </div>

              <div class="item">
              <div class="box">
              <div class="img-sec">
                <div class="im">
                  <img src="images/bk11.png">
                </div>
              </div>
              <div class="txt">
                <h2>Gate</h2>
                <div class="ret">
                  <h3 class="lft-price"><strike>Rs-550/-</strike></h3><h3 class="rgt-price">Rs-390/-</h3>
                  <div class="clearfix"></div>
                </div>
                <div class="icn">
                  <a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                   <a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a>
                </div>
              </div>
              </div>
              </div>
              
                </div>
              </div>
          </div>
        </div> -->
    </div>
  </div>
<div class="pro-inr">
  <main>

  <input id="tab1" type="radio" name="tabs" checked>
  <label for="tab1"> Description</label>

  <input id="tab2" type="radio" name="tabs">
  <label for="tab2">Specification</label>

  <input id="tab3" type="radio" name="tabs">
  <label for="tab3">Reviews</label>



  <section id="content1">
    <p>
        {{$prodDetails[0]->description}}
    </p>
  </section>

  <section id="content2">
    <table>
      @foreach($attributeArr as $attribute)
      <tr>
      <td>{{$attribute->attr_name}}</td><td>{{$attribute->attr_value}}</td>
      </tr>
      @endforeach
    </table>
  </section>

  <section id="content3">
    
  </section>


</main>
</div>

  <div class="row">
      <h2 class="up">Similar Products</h2>

      {{ displaySimilarProducts($caturl) }}
  
    

  </div>
</div>
</div>
    

@endsection

@section('scriptarea')
<script src="{{ asset('assets/js/jquery.flexslider.js') }}"></script>
<script>

   $('.loader4').hide();

   $(function(){
        SyntaxHighlighter.all();
      });
      $(window).load(function(){
        $('#carousel').flexslider({
          animation: "slide",
          controlNav: false,
          animationLoop: false,
          slideshow: false,
          itemWidth: 50,
          itemMargin: 5,
          asNavFor: '#slider'
        });

        $('#slider').flexslider({
          animation: "slide",
          controlNav: false,
          animationLoop: false,
          slideshow: false,
          sync: "#carousel",
          start: function(slider){
            $('body').removeClass('loading');
          }
        });
      });
  </script>
@endsection