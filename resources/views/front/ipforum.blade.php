@extends('layouts.app')
@section('content')

 <div class="blog-body">
      <div class="blog-down">
        <div class="container">
               
          <div class="row">
        <div class="col-sm-8">
                <h1>Query for IP Forum</h1>
          <div class="blog-sec">
            <div class="rt-form">
                <form >
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group hvr-underline-from-left">
                                <h4></h4>
                                <input type="text" class="form-control" placeholder=" Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                                <div class="form-group hvr-underline-from-left">
                                    <h4></h4>
                                        <input type="tel" class="form-control" placeholder="phone">
                                    </div>
                        </div>
                        <div class="col-md-6">
                                <div class="form-group hvr-underline-from-left">
                                        <h4></h4>
                                        <input type="email" class="form-control" placeholder="email">
                                    </div>
                        </div>
                        
                            <div class="col-md-6">
                                <div class="form-group  hvr-underline-from-left">
                                	 <h4></h4>
                                    <div class="custom-file-input">
                                        <input type="file">
                                        <input type="text" placeholder="Upload Your CV" class="form-control">
                                        <input type="button" value="Attach" class="at">
                                    </div>
                                </div>
                                <h5>we accept pdf file only</h5>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group hvr-underline-from-left">
                                	<h4></h4>
                                        <textarea class="form-control" >Message</textarea>
                                    </div>
                        </div>
                        
                        <!-- <div class="col-md-6">
                                <div class="form-group">
                                    <h4>Message</h4>
                                        <textarea name="" class="form-control"></textarea>
                                    </div>
                        </div> -->
                        <div class="col-md-6">
                               <input type="submit" value="SUBMIT" class="btn-default">
                            </div>
                    </div>
                </form>
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