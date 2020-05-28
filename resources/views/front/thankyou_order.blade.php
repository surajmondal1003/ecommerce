@extends('layouts.app')

@section('content')

<div class="inner-page-hd order">
    <div class="container">
      <div class="main-div">
        <div class="row">
          <div class="col-md-12 col-sm-6 col-xs-12">
            <div class="main-box-lft account-dp">
              <div class="icon-box">
                <img src="{{ asset('assets/images/tick.png') }}" alt="">
              </div>
              <div class="txt-box">
                <h2>Thank You for Your Purchase</h2>
                {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed rhoncus lobortis elit quis lacinia.</p> --}}
              <a href="{{ url('') }}">Continue Shopping</a>

              </div>
            </div>
          </div>
          
        </div>
        </div>
        
      </div> 
    </div>
@endsection