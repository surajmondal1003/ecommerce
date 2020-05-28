@extends('layouts.app')

@section('content')

<div class="inner-page-hd-member">


        <div class="full-card">
          <div class="container">
          <h2 class="member-sub"> Shopinway Student Membership:</h2>
          <div class="row">
            <div class="col-md-12 col-sm-6 col-xs-12">
              <div class="box">
                <div class="row">

                @foreach($membership as $item)
                  <div class="col-md-3 col-sm-12 col-xs-12">
                    
                        <div class="card-inr">
                        <h2 class="card-heading">{{$item['membership_name']}}</h2>
                        <div class="prime-price">
                                  <table>
                                    <tr>
                                      <th>TENURE </th>
                                     
                                      <th>Price</th>
                                    </tr>
                                    
                                    @foreach($item['detail'] as $detailitem)
                                    <tr>
                                    <td>{{$detailitem->membership_plan}}</td>
                                      
                                    <td class="bg">Rs {{$detailitem->membership_price}}</td>
                                    </tr>
                                    @endforeach
                                   
          
                                  </table>
                                </div>
                                 <div class="prime-desc">
                                 <p>{{$item['description']}}</p>
                                </div>
                                
                              <a href="javascript:void(0)" class="crda" onclick="load_membershipForm('{{$item['membership_cat_code']}}')">Join Now</a>
                              {{-- <a href="{{ url('join-membership/'.$item['membership_cat_code'])}}" class="crda" >Join Now</a> --}}
                              </div>
                  
                  </div>
                  @endforeach
                
                </div>
              </div>
            </div>
            
          </div>
          <div class="clearfix"></div>
        </div>
        </div>


        <div class="main">
      <div class="container">
       <!--  <h1 class="member-head">Student Membership</h1> -->
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="lt-sec">
          
          <!-- <h2 class="member-sub">FREQUENTLY ASKED QUESTIONS</h2> -->
          <h3 class="member-sub2">What is <a href="#">Shopinway Student Membership?</a></h3>
          <p>Shopinway.com has Student Members all over the West Bengal based Engineering & Management colleges. </p>
          <p><strong>Shopinway Student Membership Enrollment:</strong> FREE fast Shipping, FREE MAKAUT Organizer, MATRIX Polytechnic Organizer and will soon be able to get benefits on upcoming products belongs to Only for Shopinway Student members. <!-- Join Shopinway Student Membership till March 31, 2019. --></p>
          </div>
          </div>
          <!-- <div class="col-md-6 col-sm-6 col-xs-12">
             <div class="rt-sec">
               <img src="{{ asset('assets/images/banner1.jpg') }}" alt="">
             </div>
          </div> -->
        </div>
        </div>
        
        </div>


        <div class="btm-sec-member">
        <div class="container">

          <div class="valid">
            <h3 class="vd"><a href="#">How long Shopinway MATRIX Annual Membership is Valid for?</a> </h3>
            <p>Shopinway MATRIX Annual Membership is valid for Polytechnic Engineering college students and for the (2) two semester from the date of the registration of the Student Membership.</p>
          </div>
          <div class="valid">
            <h3 class="vd"><a href="#">How long Shopinway MATRIX Prime Membership is Valid for?</a></h3>
            <p>Shopinway MATRIX Prime Membership is valid for Engineering college students and till the FINAL semester from the date of the registration of the Student Membership.</p>
          </div>
          <div class="valid">
            <h3 class="vd"><a href="#">How long Shopinway MAKAUT Annual Membership is Valid for?</a></h3>
            <p>Shopinway MAKAUT Annual Membership is valid for Engineering & Management college students and for the (2) two semester from the date of the registration of the Student Membership.</p>
          </div>
          <div class="valid">
            <h3 class="vd"><a href="#">How long Shopinway MAKAUT Prime Membership is Valid for?</a></h3>
            <p>Shopinway Student Prime Membership is valid for Engineering & Management college students and till the final semester from the date of the registration of the Student Membership.</p>
          </div>


          <div class="valid-mdl">
           <h2 class="member-sub">How do I register for Shopinway Student Membership?</h2>
           <p>To sign up for the Shopinway Student Membership:</p>
           <ul>
             <li>1. Scroll Up and Click <strong>JOIN</strong> on your required membership plan.</li>
             <li>2. Fill the Membership form where you must have to select your Degree and Semester for your required products. *You’ll be redirected to <strong>Login & Sign up</strong> page if you didn’t Login.</li>
             <li>3. Fill the <strong>Referral ID</strong> if you have (Member with the mentioned Referral ID will be benefitted with <strong>Refer & Earn</strong> Upto <span style="color: #059900;">Rs. 100</span> for a particular referral).</li>
             <li>4. Click <strong>Submit & Pay</strong> button and Pay the membership dues to complete the process.</li>
             <li>5. You’ll be redirected to Payment page, where you can pay using UPI, Credit/Debit cards, Wallets or Net Banking for your required membership</li>
           </ul>
           <p style="padding:0 0 30px 0; ">If you have any questions, please contact the Shopinway executive at <a href="#">support@shopinway.com.</a></p>
          </div>

           <div class="valid-mdl">
           <h2 class="member-sub">How can I check my Shopinway Student Membership details?</h2>
           <p style="padding:0 0 30px 0; ">Please Login with your Usename and password. Click on Student Membership in your profile Dashboard where you can see your all membership details.</p>

          <h2 class="member-sub">How can I check my Membership Referral Amount?</h2>
          <p style="padding:0 0 30px 0; ">Please Login with your Usename and password. Click on Your Wallet in your profile Dashboard where you can see your Referral Amount.</p>

          <h2 class="member-sub">How can I check the Status of my Membership Products?</h2>
           <p>Please <strong>Login</strong> with your User name and password. Click on Student Membership in your profile Dashboard where you can see all the product status belongs to your membership plan.</p>
           <p><span style="padding: 0 10px 0 0; color: #ed1c24;"><i class="fa fa-hand-o-right" aria-hidden="true"></i></span><strong>Not Available – </strong>This particular product do not belongs to your membership plan.</p>
           <p><span style="padding: 0 10px 0 0; color: #ed1c24;"><i class="fa fa-hand-o-right" aria-hidden="true"></i></span><strong>Pending – </strong>Latest edition of this particular product is still not launched.</p>
           <p><span style="padding: 0 10px 0 0; color: #ed1c24;"><i class="fa fa-hand-o-right" aria-hidden="true"></i></span><strong>Place Order –</strong>Click on Place Order button to place your order for the latest edition product.</p>
           <p><span style="padding: 0 10px 0 0; color: #ed1c24;"><i class="fa fa-hand-o-right" aria-hidden="true"></i></span><strong>Ordered – </strong>You already ordered that particular product.</p>
           <p style="padding:0 0 30px 0; "><span style="padding: 0 10px 0 0; color: #ed1c24;"><i class="fa fa-hand-o-right" aria-hidden="true"></i></span><strong>Delivered - </strong>This particular product is already delivered to your location.</p>
          </div>


          <div class="valid-mdl">
           <h2 class="member-sub">Can I utilise Membership benefits for purchases across all products?     </h2>
           <ul>
             <li>Currently, exclusive benefits and priority services are applicable only on MAKAUT Organizer & MATRIX Polytechnic Organizer products.</li>
           </ul>
          </div>
          <div class="valid-mdl">
           <h2 class="member-sub"> May I use different addresses to get my products?</h2>
           <ul>
             <li>Yes, you may continue to enjoy your Shopinway Student Membership benefits on orders delivered to other addresses. But not all benefits are available on all pincodes. So, we suggest you check with your locations pin-code. Members are advised to Login and modify your address same of that which mention in your membership details OR to intimate their change of address to Shopinway HQ immediately, quoting their Membership Number, old address, complete new address with pin-code through an email at <a href="">support@shopinway.com</a> . The contact no (tele as well as mobile) should also be given.</li>
           </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="ftr-sec-member">
            <div class="container">
              <h2 class="heading-tp">Terms & Conditions for Shopinway Student Membership </h2>
              <h2 class="member-sub"> Membership Service & Benefits:</h2>
              <ul>
                <li>
                  <span>
                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                  </span>ShopinwayStudent Membership is our one-time paid membership for the students who wish to get access to exclusive benefits and priority service for MAKAUT Organizer & MATRIX Polytechnic Organizer products.</li>
                <li>
                  <span>
                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                  </span>The student membership is non-transferable to any third person whatsoever.</li>
                <li>
                  <span>
                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                  </span>Each Semester Student Members will get their Free shipment of MAKAUT (B.Tech& Management) Organizer & MATRIX Polytechnic they belongs to themwhen members place their order after Login.</li>
                <li>
                  <span>
                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                  </span>Shipping of the respective product will be done at shipping address mentioned during enrollment.
                </li>
                <li>
                  <span>
                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                  </span>As a Student Member, you are eligible for the benefit of Refer & Earn for a particular referral.</li>
                <li>
                  <span>
                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                  </span>Members are not permitted to purchase products for the purpose of resale, rental, or to ship to their customers or potential customers using Membership benefits.</li>
                <li>
                  <span>
                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                  </span>From time to time, we may offer different membership terms, and the fees for such membership may vary. The Student membership fee is non-refundable except as expressly set forth in these Terms.</li>
                <li>
                  <span>
                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                  </span>The company is not entitled in making any chain hence the referral benefits will be given to the member with that mentioned Reference ID in the membership application.
                </li>
                
              </ul>
      
              <h2 class="member-sub"> Membership Termination:</h2>
              <p>Shopinway Student Members are not permitted to purchase products for the purpose of resale. In case of any misuse
                of your membership, including but not limited to such resale of products, Shopinway shall be entitled to terminate
                your membership at any time without prior notice and with no obligation to refund money.</p>
      
              <h3 class="vd">If you still have any questions?<br>
                <a href="{{ url('contact-us') }}"> Contact Us</a>
              </h3>
            </div>
          </div>


    @endsection