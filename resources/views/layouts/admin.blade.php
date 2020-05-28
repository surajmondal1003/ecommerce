<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no">
    <title>Admin Panel</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/logo/favicon.png">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

         <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

<!-- Fonts -->
<link rel="dns-prefetch" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

<!-- Styles -->
<link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.css') }}" >
<link rel="stylesheet" href="{{ asset('bower_components/PACE/themes/blue/pace-theme-minimal.css') }}" >
<link rel="stylesheet" href="{{ asset('bower_components/perfect-scrollbar/css/perfect-scrollbar.min.css') }}" >
<link href="{{ asset('assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
   <!-- page plugins css -->
   <link rel="stylesheet" href="{{ asset('bower_components/datatables/media/css/jquery.dataTables.css') }}" />
    

<!-- core css -->
<link href="{{ asset('css/ei-icon.css') }}" rel="stylesheet">
<link href="{{ asset('css/themify-icons.css') }}" rel="stylesheet">
<link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/animate.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

</head>

<body>
    <div class="app">
        <div class="layout">
            <!-- Side Nav START -->
            @guest
                           
                           @else
            <div class="side-nav">
                <div class="side-nav-inner">
                    <div class="side-nav-logo">
                    <a class="navbar-brand" href="{{ url('/') }}">
                   <img class="logo" src="{{ asset('images/logo.png') }}" alt="">
                </a>
                        <!-- <a href="index.html">
                            <div class="logo logo-dark" style="background-image: url('assets/images/logo/logo.png')"></div>
                            <div class="logo logo-white" style="background-image: url('assets/images/logo/logo-white.png')"></div>
                        </a> -->
                        <div class="mobile-toggle side-nav-toggle">
                            <a href="#">
                                <i class="ti-arrow-circle-left"></i>
                            </a>
                        </div>
                    </div>
                    <ul class="side-nav-menu scrollable">
                        <li class="nav-item active">
                            <a class="mrg-top-30" href="{{ url('/admin/dashboard') }}">
                                <span class="icon-holder">
										<i class="ti-home"></i>
									</span>
                                <span class="title">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
										<i class="ti-file"></i>
									</span>
                                <span class="title">Pages</span>
                                <span class="arrow">
										<i class="ti-angle-right"></i>
									</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{url('admin/page-list')}}">Page List</a>
                                </li>
                                <li>
                                    <a href="{{ url('admin/add-new-page') }}">New Page</a>
                                </li>
                            </ul>
                        </li>
                      

                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
										<!-- <i class="ei ei-blogger"></i> --><i class="fa fa-product-hunt" aria-hidden="true"></i>
									</span>
                                <span class="title">Product</span>
                                <span class="arrow">
										<i class="ti-angle-right"></i>
									</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ url('admin/get-product-categories') }}">Product Categories</a>
                                </li>
                                <li>
                                    <a href="{{ url('admin/get-products') }}">Product</a>
                                </li>
                                <li>
                                    <a href="{{ url('admin/get-discount') }}">Discounts</a>
                                </li>
                                <li>
                                    <a href="{{ url('admin/get-attribute') }}">Attributes</a>
                                </li>
                            
                                
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                                <a class="dropdown-toggle" href="javascript:void(0);">
                                    <span class="icon-holder">
                                            <!-- <i class="ei ei-blogger"></i> --><i class="fa fa-truck" aria-hidden="true"></i>
                                        </span>
                                    <span class="title">Shipping</span>
                                    <span class="arrow">
                                            <i class="ti-angle-right"></i>
                                        </span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ url('admin/get-shipping') }}">Shipping Zones</a>
                                    </li>
                                   
                                
                                    
                                </ul>
                        </li>


                        <li class="nav-item dropdown">
                                <a class="dropdown-toggle" href="javascript:void(0);">
                                    <span class="icon-holder">
                                            <!-- <i class="ei ei-blogger"></i> --><i class="fa fa-user" aria-hidden="true"></i>
                                        </span>
                                    <span class="title">Student Membership</span>
                                    <span class="arrow">
                                            <i class="ti-angle-right"></i>
                                        </span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ url('admin/student-membership') }}">Student membership Plans</a>
                                    </li>
                                   
                                
                                    
                                </ul>

                                <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{ url('admin/active-student-members-page') }}">Student Members</a>
                                        </li>
                                       
                                        
                                    </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
                                        <!-- <i class="ei ei-blogger"></i> --><i class="fa fa-money" aria-hidden="true"></i>
                                    </span>
                                <span class="title">Orders</span>
                                <span class="arrow">
                                        <i class="ti-angle-right"></i>
                                    </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ url('admin/orders') }}">All Orders</a>
                                </li>
                               
                            
                                
                            </ul>
                        </li>

                        
                        <li>
                                <a class="" href="{{ url('admin/get-stock') }}">
                                        <span class="icon-holder">
                                                <!-- <i class="ei ei-blogger"></i> --><i class="fa fa-hdd-o" aria-hidden="true"></i>
                                            </span>
                                        <span class="title">Stock</span>
                                    </a>
                               
                        </li>
                               
                        <li>
                            <a class="" href="{{ url('admin/active-users') }}">
                                    <span class="icon-holder">
                                            <!-- <i class="ei ei-blogger"></i> --><i class="fa fa-users" aria-hidden="true"></i>
                                        </span>
                                    <span class="title">Customers</span>
                                </a>
                           
                        </li>
                        <li>
                            <a class="" href="{{ url('admin/active-admin-users') }}">
                                    <span class="icon-holder">
                                            <!-- <i class="ei ei-blogger"></i> --><i class="fa fa-users" aria-hidden="true"></i>
                                        </span>
                                    <span class="title">Admin Users</span>
                                </a>
                           
                        </li>
                        <?php $admin=Auth::user();
                            if($admin->is_superadmin=='1'){
                        ?>
                        <li>
                            <a class="" href="{{ url('admin/add-admin-permission') }}">
                                    <span class="icon-holder">
                                            <!-- <i class="ei ei-blogger"></i> --><i class="fa fa-users" aria-hidden="true"></i>
                                        </span>
                                    <span class="title">Admin Users Permissions</span>
                                </a>
                           
                        </li>
                        <?php
                            } 
                        ?>

                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
                                        <!-- <i class="ei ei-blogger"></i> --><i class="fa fa-truck" aria-hidden="true"></i>
                                    </span>
                                <span class="title">Reports</span>
                                <span class="arrow">
                                        <i class="ti-angle-right"></i>
                                    </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ url('admin/order-report-page') }}">Order Reports</a>
                                </li>
                            </ul>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ url('admin/view-count-products') }}">Product Views</a>
                                </li>
                            </ul>
                        </li>
                     
                    </ul>
                </div>
            </div>
            <!-- Side Nav END -->

            <!-- Page Container START -->
            <div class="page-container">
                <!-- Header START -->
               
                <div class="header navbar">
                    <div class="header-container">
                        <!-- <ul class="nav-left">
                            <li>
                                <a class="side-nav-toggle" href="javascript:void(0);">
                                    <i class="ti-view-grid"></i>
                                </a>
                            </li>
                            
                        </ul> -->
                      
                        <ul class="nav-right">
                            <li class="user-profile dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img class="profile-img img-fluid" src="assets/images/user.jpg" alt="">
                                    <div class="user-info">
                                        <span class="name pdd-right-10">{{ Auth::user()->name }}  </span>
                                        <i class="ti-angle-down font-size-10"></i>
                                    </div>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#">
                                            <i class="ti-user pdd-right-10"></i>
                                            <span>Profile</span>
                                        </a>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li>
                                    <a  href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="ti-power-off pdd-right-10"></i>
                                            <span>
                                           
                                        {{ __('Logout') }}
                                    
                                        </span>
                                        </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                        
                                    </li>
                                </ul>
                               
                            </li>
                        </ul>
                    </div>
                </div>
                @endguest
                <!-- Header END -->
                <!-- Content Wrapper START -->
                <div class="main-content">
                    <div class="container-fluid">
                    @yield('content')
                    </div>
                </div>
                <!-- Content Wrapper END -->

              

            </div>
            <!-- Page Container END -->

        </div>
    </div>

    <script src="{{ asset('js/vendor.js') }}"></script>
    <script src="{{ asset('js/app.min.js') }}"></script>
    <script src="{{ asset('bower_components/datatables/media/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('bower_components/tinymce/tinymce.min.js') }}"></script>
    @yield('scriptarea')
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    
    <!-- page js -->
    <!-- <script src="assets/js/dashboard/dashboard.js"></script> -->

</body>


<!-- Mirrored from themenate.com/espire/html/dist/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Jul 2018 19:14:52 GMT -->
</html>
