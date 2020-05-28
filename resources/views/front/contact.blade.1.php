@extends('layouts.app')
@section('content')
<div class="inner-banner bg">
   <div id="particles-js"></div>
  </div>


        
<div class="upper">
    <div class="container">
        <div class="txtbk">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12 df ">
                    
                    <div class="box1 bxo">
                        <div data-aos="fade-up" data-aos-duration="3000">
                        <div class="icon">
                           <span> <i class="fa fa-phone" aria-hidden="true"></i></span>
                        </div>
                        <h2>Call Us Now</h2>
                        <p> 033 2985 9001</p>
                    </div>
                </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 df ">
                   
                    <div class="box2 bxo">
                         <div data-aos="fade-up" data-aos-duration="3000">
                        <div class="icon">
                           <span>  <i class="fa fa-envelope" aria-hidden="true"></i></span>
                        </div>
                        <h2>Send Us Message</h2>
                        <p> info@iplawsindia.com</p>
                    </div>
                </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 df ">
                    
                    <div class="box3 bxo">
                        <div data-aos="fade-up" data-aos-duration="3000">
                        <div class="icon">
                           <span>  <i class="fa fa-map-marker" aria-hidden="true"></i></span>
                        </div>
                        <h2>Visit Our Office</h2>
                        <p>P25 C.I.T. Road, Scheme VI M(S) First Floor, Kolkata  700054</p>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="mdl">
    <div class="container">
        <div class="main">
            <h2>GET IN TOUCH </h2>
        </div>
        <div class="img-bxo">
            <img src="{{ asset('assets/images/shutterstock_243122509-CRIMINAL.jpg') }}">
            <div class="pxo">
                <div data-aos="fade-left" data-aos-duration="3000">
        <div class="form-sec">
            
            <form id="contactForm" method="POST">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group hvr-underline-from-left">
                            <input type="text" name="inputName"  placeholder="Name" class="form-control  ">
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group hvr-underline-from-left">
                            <input type="Email" name="inputEmail" placeholder="Email" class="form-control ">
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group  hvr-underline-from-left">
                            <input type="tel" name="inputPhone" placeholder=" Phone" class="form-control">
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group hvr-underline-from-left">
                            <textarea class="form-control" name="inputMessage">Message</textarea>
                            <span class="help-block"></span>
                        </div>
                        
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div id="recaptcha_error_left" class="g-recaptcha-left pad-cpcha">
                            <div class="g-recaptcha recapta_inner_sec" id="recaptcha2" data-sitekey="6LcxYGQUAAAAAPzMB8RvDpg-dPMw9rnUpc5Hip_G">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group hvr-float-shadow ">
                            <input type="submit" id="contactSubmit" value="submit"  class="sub ">
                        </div>
                    </div>
                </div>
            </form>
        </div>
        </div>
    </div>
    </div>
    </div>
</div>




      
      <div class="bg-sec">
        <div class="container-fluid ssub">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 ssub2">
                    <div class="mp">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3684.1438145701813!2d88.38638221495964!3d22.573723885182154!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a027665b0f0f625%3A0x1c03ff2d55953d91!2sAdam&#39;s+Managment+Services+Private+Limited!5e0!3m2!1sen!2sin!4v1536224497776" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
                <!-- <div class="col-md-6 col-sm-6 col-xs-12 ssub2">
                    <div class="mp3">
                <img src="images/shutterstock_243122509-CRIMINAL.jpg">
            </div>
                </div> -->
            </div>
        </div>
            
            
            </div>
@endsection