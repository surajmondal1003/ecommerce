
@extends('layouts.prodlistlayout')

@section('content')


<div class="inner-page ct">
        <div class="container-fluid">
          <div class="row">
            <form action="{{ url('product-search') }}" method="POST" id="productSearchForm">
              <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                  <div class="hi-icon-wrap hi-icon-effect wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="600ms">
                      <div class="rtbox-btm">
                          <section id="content">
                              <h2 class="up">Categories</h2>
                            <div id="accordion" class="accordion-container">
                                    
                                    {!! $accordionContent !!}
                         
      
                                
                        
                            </div>
                            <!--/#accordion-->
                        
                        </section>
                        <!--/#content-->

                        @if($result)
                        <div class="ckbox">
                            <h2 class="up">Price Range</h2>
                            
                              <input type="hidden" name="offset" value="{{$offset}}">
                                @if(!empty($search_term))
                                <input type="hidden" name="search_term" value="{{$search_term}}">
                                @else

                                <input type="hidden" name="search_term_category" value="{{$result[0]->category_url}}">

                                @endif
                              
                              @csrf
                                <div class="checkbox range">
                                    <input id="price_range1"  name="price_range[0]" type="checkbox" value="1,200"
                                    @if(in_array('0',$priceChckbox))
                                    checked
                                    @endif
                                    />
                                    <label for="price_range1">1-200</label><br>
                                    <input id="price_range2"  name="price_range[1]" type="checkbox" value="200,500"
                                    @if(in_array('1',$priceChckbox))
                                    checked
                                    @endif
                                    />
                                    <label for="price_range2">200-500</label><br>
                                    <input id="price_range3"  name="price_range[2]" type="checkbox" value="500,1000"
                                    @if(in_array('2',$priceChckbox))
                                    checked
                                    @endif
                                    />
                                    <label for="price_range3">500-1000</label><br>
                                    <input id="price_range4"  name="price_range[3]" type="checkbox" value="1000,1500"
                                    @if(in_array('3',$priceChckbox))
                                    checked
                                    @endif
                                    />
                                    <label for="price_range4">1000-1500</label><br>
                                    <input id="price_range5"  name="price_range[4]" type="checkbox" value="1500,9999"
                                    @if(in_array('4',$priceChckbox))
                                    checked
                                    @endif
                                    />
                                    <label for="price_range5">1500 & Above</label><br>
                                </div>
                                <button type="submit" class="buybtn">APPLY</button>
                              
                           
                                
                        </div>
                        
                        @endif
                        </div>
                        
      
              
                  
                </div>
                </div>
            <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12">
              <div class="lt-box">
                <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                  @if(!empty($search_term))
                  <p><b>Showing <span id="listcount">{{$count}}</span> results  for "{{$search_term}}"</b></p>
                  @endif

                  @if(!empty($search_term_category))
                  <p><b>Showing <span id="listcount">{{$count}}</span> results  for "{{$search_term_category}}"</b></p>
                  @endif
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    <select name="sortType" class="form-control rng-lw" onchange="this.form.submit()">
                      <option value="0">Relevance</option>
                      <option value="ASC" @if($sortType=='ASC') selected @endif>Low to High</option>
                      <option value="DESC" @if($sortType=='DESC') selected @endif>High to Low</option>
                    </select>
                    </div>
                  
                   
                  <div id="productListDiv">
                    @foreach($result as $row)
                  
                    <div class="col-md-3 col-sm-6 col-xs-6">
                            <div class="hi-icon-wrap hi-icon-effect wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="200ms">
                            <div class="big-box">
                              <div class="img-sec">
                                <a href="{{ url($row->category_url.'/'.$row->product_url) }}" target="_blank"><img src="{{asset($row->image_name)}}" ></a>
                              </div>
                              <div class="txt-sec">
                                <div class="box">
                                  <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                    <a href="{{ url($row->category_url.'/'.$row->product_url) }}" target="_blank"><h4>{{str_limit($row->product_name,50)}}</h4>
                                    </a>
                                    </div>
                                  
                                      <div class="icon hrt">
                                        <a href="javascript:void(0)" onclick="addToWishlist('{{$row->product_url}}')">
                                        <span><i class="fa fa-heart" aria-hidden="true"></i></span>
                                        </a>
                                      </div>
                                  
                                  </div>
                                  
                                  <div class="prc"><h3 class="lft-price"><strike>Rs {{number_format($row->regular_price)}}</strike></h3><h3 class="rgt-price">Rs {{number_format($row->discount_price)}}</h3></div>
                                
                                  @if($row->is_supreme=='1')
                                  <div class="supreme">
                                    <img src="{{asset('assets/images/sup.png')}}" alt="">
                                  </div>
                                  @endif
                                 
                                </div>
                              </div>
                            </div>
                          </div>
                          </div>
                    @endforeach
                  </div>

                 
                </div>
              </div>
              
            </div>
           
            </form>
            
        </div>
      </div>
      <div class="col-md-12">
              <a href="javascript:void(0)" class="buybtn loadMore" id="loadMoreBtn">SHOW MORE</a>
            </div>
      </div>
      
      
      
      @endsection

      @section('scriptarea')
      <script>

        $('.loader4').hide();

                $(function() {
          var Accordion = function(el, multiple) {
              this.el = el || {};
              this.multiple = multiple || false;

              var links = this.el.find('.article-title');
              links.on('click', {
                  el: this.el,
                  multiple: this.multiple
              }, this.dropdown)
          }

          Accordion.prototype.dropdown = function(e) {
              var $el = e.data.el;
              $this = $(this),
                  $next = $this.next();

              $next.slideToggle();
              $this.parent().toggleClass('open');

              if (!e.data.multiple) {
                  $el.find('.accordion-content').not($next).slideUp().parent().removeClass('open');
              };
          }
          var accordion = new Accordion($('.accordion-container'), false);
        });


          $('#loadMoreBtn').click(function() {
           
                $('.loading').show();

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    var url = baseUrl + '/load-more-products';

                    $.ajax({
                        type: 'POST',
                        url: url,
                        data: $('#productSearchForm').serialize(),
                        dataType: "json",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function (response) {
                            if (response.status === true) {
                                $('.loading').hide();
                                $('#productListDiv').append(response.productDiv);

                                
                                $('input[name="offset"]').val(response.offset);
                                
                                $('#listcount').html(response.count+parseInt($('#listcount').html().toString()));
                               
                               


                            }
                        }, error: function (xhr, error) {

                        }
                    });
              
          });


        
        </script>
      @endsection

      