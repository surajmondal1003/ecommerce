@extends('layouts.app')
@section('content')


<div class="inner-page">
        <div class="container">
          <div class="row">
            <div class="col-md-6 col-xs-12 subcl">
              <div class="rtcontact">
                <div class="row">
                  <div class="welcontnt-head">
                    <div class="col-md-12 col-xs-12">
                      <span class="">Ask Us for your</span>
                      <h2>Query</h2> 
                    </div>
                  </div>
                </div>
      
                <form id="contactForm">
                  <div class="row">
                    <!-- <input type="hidden" placeholder="Name" name="csrf_test_name" value="fcd4d7398e80059af9fbca6c5dfba710"/>
                    <input type="hidden" value="contact" name="sender"> -->
                        <div class="col-sm-12">
                          <div class="form-group">
                            <input class="form-control" type="text" placeholder="Name" name="inputName"/>
                          </div>
                        </div>
                       
                        <div class="col-sm-12">
                          <div class="form-group">
                            <input class="form-control" type="text" placeholder="Email" name="inputEmail"/>
                          </div>
                        </div>
                        <div class="col-sm-12">
                          <div class="form-group">
                            <input class="form-control" type="text" placeholder="Phone"  name="inputPhone"/>
                          </div>
                        </div>
                        <div class="col-sm-12">
                          <div class="form-group">
                            <textarea class="form-control" placeholder="Message" name="inputMessage"></textarea>
                          </div>
                        </div>
                        
                        {{-- <div class="col-sm-12">
                          <div class="form-group">
                           <iframe src="https://www.google.com/recaptcha/api2/anchor?ar=1&amp;k=6Le8qw0UAAAAAMzzkJ7daow6xI23IQR--WdFhUCZ&amp;co=aHR0cHM6Ly93d3cuZHVic2VvLmNvLnVrOjQ0Mw..&amp;hl=en&amp;v=v1531117903872&amp;theme=light&amp;size=normal&amp;cb=lecvo2ltt6ph" width="304" height="78" role="presentation" frameborder="0" scrolling="no" sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox"></iframe>
                           <textarea id="g-recaptcha-response" name="g-recaptcha-response" class="g-recaptcha-response" style="width: 250px; height: 40px; border: 1px solid #c1c1c1; margin: 10px 25px; padding: 0px; resize: none;  display: none; "></textarea>
                         </div>
                       </div> --}}
                        <div class="col-sm-12">
                          <div class="form-group">
                            <input type="submit" value="SUBMIT NOW" id="contactSubmit" class="submt" />
                          </div>
                        </div>
                        </div>
                    </form>
              </div>
            </div>
            <div class="col-md-6 col-xs-12">
              <div class="contactnwe">
                  <h2>Need help?</h2>
                  <h4>Call us 24/7 at <strong><a href="tel:03325489016">(033) 2548 9016</a></strong></h4>
                  <h3>or</h3>
                  <h4>Email us 24/7 at <strong><a href="#"> support@shopinway.com</a></strong></h4>
              </div>
            </div>
            <div class="col-md-12 col-xs-12">
              <div class="ltcontact2" style="margin: 20px 0 0 0; height:300px;">
                 <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14730.94339914993!2d88.3956346!3d22.6263372!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xc7f6d09640b75960!2sShopinway!5e0!3m2!1sen!2sin!4v1549017190185" width="100%" height="100%" frameborder="0" style="border:none !important;" allowfullscreen style="border: none;"></iframe>
              </div>
            </div>
            
          </div>
        </div>
      </div>




        

@endsection