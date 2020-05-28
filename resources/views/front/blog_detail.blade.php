@extends('layouts.blog')
@section('content')



 <div class="blog-body">

<div class="blog-down">
  <div class="container">
    <div class="row">
<div class="col-sm-8">
          <div class="blog-sec">
              <div class="row">
             <div class="blog-sec">
              <div class="blog-details">
                  
                    <img src="{{ asset($blogDetails->blog_small_image) }}" alt=" " class="img-responsive"/>
                    <h1 class="blog-detail-heading">{{$blogDetails->blog_title}}</h1>
                    
                    <div class="blog-all-text">
                      {!! $blogDetails->blog_content !!}
                      
                        
                       
                    </div>
                    
                      
                     <div class="blog-date pull-left"> <span>23</span> aug, 2018</div>
                        <div class="blog-social pull-right">
                          <!--<a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
                            
                            <a href="#"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a>-->
              <script src="https://apis.google.com/js/platform.js" async defer></script>
              <div class="fb-share-button" data-href="http://dubseo.com/social-media/how-to-increase-your-facebook-organic-reach" data-layout="button_count" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=;src=sdkpreparse">Share</a></div>
              <a href="https://twitter.com/share" class="twitter-share-button" data-show-count="true" data-url="http://dubseo.com/social-media/how-to-increase-your-facebook-organic-reach" data-hashtags="dubseo" data-via="dubseo.com"  data-related="twitterapi,twitter">Tweet</a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
              <div class="g-plus" data-action="share" data-href="http://dubseo.com/social-media/how-to-increase-your-facebook-organic-reach" data-height="24" data-annotation="bubble"></div>
                     
                        </div>
             <div class="blog_tag">
      
    <p class="similr-head">Category : <a href="#">SOCIAL MEDIA</a></p>
  
    </div>
            
                                    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.8";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

                     <div class="next-prev">
                    
                     
                     </div>

                </div>
                <h2 class="similr-head padd-none"> Comment Here</h2>
                <div class="fb-comments" data-href="#" data-width="800px" data-numposts="5"></div>
                
            </div>                  
                </div>
            </div>
        </div>


<div class="col-md-4 col-sm-4 col-xs-12">
                     <div class="promo-blog">
                        
                        <a class=" sub3" href="javascript:void();"><img src=" {{asset('assets/images/ketty.jpg')}}" alt="" class="img-responsive"/></a>
                    </div>

                    <div class="btnsec">
                            <div class="row">
                                    <div class="col-md-5  sb0">
                                        <a class="btn" href="Write-for-Us.html">Write for Us</a>
                                    </div>
                                    <div class="col-md-7  sb0">
                                            <a class="btn2" href="contributor.html">Become Our Contributor</a>
                                        </div>
                            </div>
                          </div>
                    <div class="more-blogs"> 
          <h2>Recent Blogs</h2>
            <?php displayRecentBlogs(); ?>
 </div>
            

             </div>



            </div>                  
                </div>
            </div>
        </div>





@endsection