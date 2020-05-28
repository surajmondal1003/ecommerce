@extends('layouts.app')

@section('content')
 <div class="inner-page-hd log">
        <div class="container">
            <div class="row">
              <div class="col-md-7 col-sm-7 col-xs-12">
                <div class="lt-fmbox">
                  <div class="row">
                    <!-- <div class="col-md-4 col-sm-4 col-xs-12">
                      <div class="img-box log">
                       
                       <div class="login-log">
                           <img src="{{asset('assets/images/logo-log.png') }}" alt="">
                       </div>
                        <h3>Get access to your orders and Shortlist</h3>
                        <h3>East & Secure Payments</h3>
                      </div>
                    </div> -->
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <div class="box">
                        <form>
                         <div id="modal" class="popupContainer">
                            <header class="popupHeader">
                                <span class="header_title"><img style=" width:180px;" src="{{asset('assets/images/logo-log.png') }}" alt=""></span>
                            </header>

                            <section class="popupBody">
                                <!-- Social Login -->
                                <div class="social_login">
                                    <div class="">
                                        <a href="#" class="social_box fb">
                                            <span class="icon"><i class="fa fa-facebook"></i></span>
                                            <span class="icon_title">Connect with Facebook</span>

                                        </a>

                                        <a href="#" class="social_box google">
                                            <span class="icon"><i class="fa fa-google-plus"></i></span>
                                            <span class="icon_title">Connect with Google</span>
                                        </a>
                                    </div>

                                    <div class="centeredText">
                                        <span>Or use your Email address</span>
                                    </div>

                                    <div class="action_btns">
                                        <div class="one_half tablinks"><a href="javascript:void();" id="login_form" class="tablinks btn" onclick="openForm(event, 'login')" id="defaultOpen">Login</a></div>
                                       
                                        <div class="one_half last tablinks "><a href="javascript:void();" id="register_form" class="tablinks btn" onclick="openForm(event, 'registration')">Sign up</a></div>
                                        
                                    </div>



                                </div>

                                <!-- Username & Password Login form -->
                                

                                <!-- Register Form -->
                                
                            </section>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-5 col-sm-5 col-xs-12">
                <div class="rt-fmbox">
                  <!-- <h2>TERMS & CONDITIONS</h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed semper urna non neque iaculis, sed pretium enim sodales. Aenean sollicitudin, augue quis consequat vestibulum, velit leo hendrerit lorem, posuere ultrices urna libero eu justo. </p>
                  <p>augue quis consequat vestibulum, velit leo hendrerit lorem, posuere ultrices urna libero eu justo. Pellentesque eleifend cursus est, non porta libero fringilla a.</p> -->
                  <div id="login" class="tabcontent">
                  <div class="user_login">
                    <h2>Login to Shopinway.com</h2>
                                    <form method="POST" action="{{ route('login') }}" id="login-form">
                                        @csrf
                                        <label>Email</label>
                                        <input type="text" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"  autofocus />
                                        <span class="help-block"></span>
                                       <br />

                                        <label>Password</label>
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"/>
                                        <span class="help-block"></span>
                                        <br />

                                        <div class="checkbox">
                                            <input type="checkbox" id="form-2-1" name="remember" {{ old('remember') ? 'checked' : '' }} />
                                            <label for="remember">Remember me on this computer</label>
                                        </div>
                                       
                                        <div id="login_error"></div>
                                        <div class="action_btns">
                                            <!-- <div class="one_half"><a href="#" class="btn back_btn"><i class="fa fa-angle-double-left"></i> Back</a></div> -->
                                            <div class="one_half last two"><input type="submit" class="btn btn_red" value="Login"></div>
                                        </div>
                                    </form>

                                    <a href="{{ route('password.request') }}" class="forgot_password">Forgot password?</a>
                                </div>
                </div>
                  <div id="registration" class="tabcontent">
                  <div class="user_register">
                     <h2>Sign Up to Shopinway.com</h2>
                                    <form method="POST" action="{{ route('register') }}" id="register-form">
                                            @csrf
                                        <label>Full Name</label>
                                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" autofocus>
                                        <span class="help-block"></span>
                                       
                                        <br />

                                        <label>Email Address</label>
                                        <input id="reg_email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}">
                                        <span class="help-block"></span>
                                       
                                        <br />

                                        <label>Mobile</label>
                                        <input id="mobile" type="text" class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}" name="mobile" >
                                        <span class="help-block"></span>
                                       
                                        <br />

                                        <label>Password</label>
                                        <input id="reg_password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" >
                                        <span class="help-block"></span>
                    
                                        <br />

                                        <div class="checkbox">
                                            <input id="send_updates"  name="send_updates"
                                            type="checkbox" />
                                            <label for="send_updates">Send me occasional email updates</label>
                                        </div>

                                        <div id="register_error"></div>

                                        <div class="action_btns">
                                            <!-- <div class="one_half"><a href="#" class="btn back_btn"><i class="fa fa-angle-double-left"></i> Back</a></div> -->
                                            <div class="one_half last two">
                                                    <button type="submit" class="btn btn_red">
                                                            {{ __('Register') }}
                                                        </button></div>
                                        </div>
                                    </form>
                                </div>
                </div>


                @if(session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                @endif

                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif

                @if(Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                @endif

                </div>
              </div>
            </div>
          </div> 
        </div>
@endsection
