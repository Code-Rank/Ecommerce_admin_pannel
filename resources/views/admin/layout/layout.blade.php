<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>@yield('title')</title>

    <!-- Fontfaces CSS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{asset('admin_asset/css/font-face.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin_asset/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin_asset/vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin_asset/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{asset('admin_asset/vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
     <link href="{{asset('admin_asset/vendor/animsition/animsition.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin_asset/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin_asset/vendor/wow/animate.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin_asset/vendor/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin_asset/vendor/slick/slick.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin_asset/vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin_asset/vendor/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{asset('admin_asset/css/theme.css')}}" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                        <img src="{{asset('admin_asset/images/icon/new.png')}}" alt="Cool Admin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                   
                        <li class="@yield('select_guestadmin')">
                        <a href="{{url('admin/guestadmin')}}">
                                <i class="fas fa-user"></i>Guest Admin
                            </a>
                        </li>
                        <li class="@yield('select_category')">
                        <a href="{{url('admin/category_table')}}">
                        <i class="fas fa-list-alt"></i>category 
                            </a>
                        </li>
                        <li class="@yield('select_cupon')">
                        <a href="{{url('admin/cupon_table')}}">
                        <i class="fa fa-gift" aria-hidden="true"></i>
                            Coupon 
                            </a>
                        </li>

                        <li class="@yield('select_size')">
                            <a href="{{url('admin/size_table')}}">
                            <i class="fa fa-retweet" ></i>
                            Size 
                            </a>
                        </li>
                        <li class="@yield('select_color')">
                            <a href="{{url('admin/color_table')}}">
                            <i class='fa fa-paint-brush'></i>
                            color
                            </a>
                        </li>

                        <li class="@yield('select_brand')">
                            <a href="{{url('admin/brand_table')}}">
                            <i class="fa fa-square-b" ><span style="text-color:white;">B</span></i>
                            Brand
                            </a>
                        </li>
                        <li class="@yield('select_product')">
                            <a href="{{url('admin/product_table')}}">
                            <i class="fa fa-square-p" ><span style="text-color:white;">P</span></i>
                            Product
                            </a>
                        </li>
                      
                      
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="{{asset('admin_asset/images/icon/new.png')}}" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                    
                    <li class="@yield('select_guestadmin')">
                        <a href="{{url('admin/guestadmin')}}">
                                <i class="fas fa-user"></i>Guest Admin
                            </a>
                        </li>
                        <li class="@yield('select_category')">
                        <a href="{{url('admin/category_table')}}">
                        <i class="fas fa-list-alt"></i>category 
                            </a>
                        </li>
                        <li class="@yield('select_cupon')">
                        <a href="{{url('admin/cupon_table')}}">
                        <i class="fa fa-gift" aria-hidden="true"></i>
                            Coupon 
                            </a>
                        </li>

                        <li class="@yield('select_size')">
                        <a href="{{url('admin/size_table')}}">
                        <i class="fa fa-retweet" ></i>
                            Size 
                            </a>
                        </li>
                     
                        <li class="@yield('select_color')">
                            <a href="{{url('admin/color_table')}}">
                            <i class='fa fa-paint-brush'></i>
                            Color
                            </a>
                        </li>
                        <li class="@yield('select_brand')">
                            <a href="{{url('admin/brand_table')}}">
                            <i class="fa fa-square-b" ><span style="text-color:white;">B</span></i>
                            Brand
                            </a>
                        </li>
                        <li class="@yield('select_product')">
                            <a href="{{url('admin/product_table')}}">
                            <i class="fa fa-square-p" ><span style="text-color:white;">P</span></i>
                            Product
                            </a>
                        </li>
                       
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            <div class="header-button">
                               
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="{{asset('storage/data/'.session('admin_image'))}}" alt="John Doe" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">{{session('admin_name')}}</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="{{asset('storage/data/'.session('admin_image'))}}" alt="John Doe" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#">{{session('admin_name')}}</a>
                                                    </h5>
                                                    <span class="email">{{session('admin_mail')}}</span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-settings"></i>Setting</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-money-box"></i>Billing</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="{{url('admin/logout')}}">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- END HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                @section('contain')
                @show
            </div>
        <!-- END PAGE CONTAINER-->

    </div>

    <!-- Jquery JS-->
     <script src="{{asset('admin_asset/vendor/jquery-3.2.1.min.js')}}"></script>  
    <!-- Bootstrap JS-->
     <script src="{{asset('admin_asset/vendor/bootstrap-4.1/popper.min.js')}}"></script>
    <script src="{{asset('admin_asset/vendor/bootstrap-4.1/bootstrap.min.js')}}"></script> 
    <!-- Vendor JS       -->
     <script src="{{asset('admin_asset/vendor/slick/slick.min.js')}}">
    </script>
     <script src="{{asset('admin_asset/vendor/wow/wow.min.js')}}"></script>
    <script src="{{asset('admin_asset/vendor/animsition/animsition.min.js')}}"></script>
    <script src="{{asset('admin_asset/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}">
    </script>
    <script src="{{asset('admin_asset/vendor/counter-up/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('admin_asset/vendor/counter-up/jquery.counterup.min.js')}}">
    </script>-->
    <script src="{{asset('admin_asset/vendor/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{asset('admin_asset/vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('admin_asset/vendor/chartjs/Chart.bundle.min.js')}}"></script>
    <script src="{{asset('admin_asset/vendor/select2/select2.min.js')}}">
    </script>   
    <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
    <!-- Main JS-->
    <script src="{{asset('admin_asset/js/main.js')}}"></script>
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>

</body>

</html>
<!-- end document-->
