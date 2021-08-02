<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{asset('asset_fe/images/logo2.png')}}" type="image/x-icon')}}">
    <link rel="icon" href="{{asset('asset_fe/images/logo2.png')}}" sizes="32x32')}}">
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<meta name="keywords" content="Electro Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"
	/>
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- //Meta tag Keywords -->

	<!-- Custom-Files -->
	<link href="{{asset('asset_fe/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
	<!-- Bootstrap css -->
	<link href="{{asset('asset_fe/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
	<!-- Main css -->
	<link rel="stylesheet" href="{{asset('asset_fe/css/fontawesome-all.css')}}">
    <link rel="stylesheet" href="{{asset('asset_be/plugins/fontawesome-free/css/all.min.css')}}">
	<!-- Font-Awesome-Icons-CSS -->
	<link href="{{asset('asset_fe/css/popuo-box.css')}}" rel="stylesheet" type="text/css" media="all" />
	<!-- pop-up-box -->
	<link href="{{asset('asset_fe/css/menu.css')}}" rel="stylesheet" type="text/css" media="all" />
	<!-- menu style -->
	<!-- //Custom-Files -->

	<!-- web fonts -->
	<link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
	    rel="stylesheet">
	<!-- //web fonts -->

</head>

<body>
	<!-- top-header -->
    @include('client.components.header')
	<!-- //header-bottom -->

<!-- navigation -->
<div class="navbar-inner">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <!-- <div class="agileits-navi_search">
                <form action="#" method="post">
                  
                </form>
            </div> -->
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto text-center col-md-12">
                    <li class="nav-item active mr-lg-2 mb-lg-0 mb-2">
                        <a class="nav-link" href="{{route('/')}}">Trang chủ
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    
                
@yield('navigation')
                    <li class="nav-item mr-lg-2 mb-lg-0 mb-2">
                        <a class="nav-link" href="about.html">About Us</a>
                    </li>
                    <li class="nav-item mr-lg-2 mb-lg-0 mb-2">
                        <a class="nav-link" href="product.html">New Arrivals</a>
                    </li>
                    <li class="nav-item dropdown mr-lg-2 mb-lg-0 mb-2">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Pages
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="product.html">Product 1</a>
                            <a class="dropdown-item" href="product2.html">Product 2</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="single.html">Single Product 1</a>
                            <a class="dropdown-item" href="single2.html">Single Product 2</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="checkout.html">Checkout Page</a>
                            <a class="dropdown-item" href="payment.html">Payment Page</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">Liên hệ với chúng tôi</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>

<!-- //navigation -->

<!-- content  -->
	@yield('content')
<!-- end content  -->
    
	<!-- footer -->
@include('client.components.footer')
<!-- //footer -->
	<!-- js-files -->
@include('client.components.layout_js')
	<!-- //js-files -->


    @yield('javascript')
</body>

</html>