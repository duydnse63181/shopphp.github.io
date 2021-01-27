<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home</title>
    <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/price-range.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/animate.css') }}" rel="stylesheet">
	<link href="{{ URL::asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/responsive.css') }}" rel="stylesheet">
    
  
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{URL::asset('img/Logo.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">

    
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> 0935220464</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> duydnse63181@fpt.edu.vn</a></li>
                                
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <i class="fa fa-google-plus"></i>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="{{url('/home')}}"><img style="width:50%" src="{{URL::asset('img/Logo.png')}}" alt="" /></a>
            </div>
            
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                                @if(Auth::check())
                                    @if(Auth::user()->level == 1)
                                    <li><a href="{{url('/home_admin')}}"><i class="fa fa-unlock" aria-hidden="true"></i>LOCK</a></li>
                                    @elseif(Auth::user()->level == 2)
                                    <li><a href="{{url('/home_admin')}}"><i class="fa fa-unlock-alt" aria-hidden="true"></i>LOCK</a></li>
                                    @elseif(Auth::user()->level == 3)
                                    <li><a href="#"><i class="fa fa-lock" aria-hidden="true"></i>LOCK</a></li>
                                    @endif
                                @endif
                                @if (Auth::check())
								<li><a href="#"><i class="fa fa-user"></i> {{ Auth::user()->name }}</a></li>
                                @else
                                <li><a href="#"><i class="fa fa-user"></i> Accout</a></li>
                                @endif
                                
								<li><a href="{{ url('/cart') }}"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                            
                                @if (Auth::check())
								<li><a href="{{ url('/logout') }}"><i class="fa fa-lock"></i> Logout</a></li>
                                @else
                                <li><a href="{{ url('/login') }}"><i class="fa fa-lock"></i> Login</a></li>
                                @endif
							</ul>
						</div>
                        @if (Auth::check())
                                <a>
                                Bạn đang đăng nhập với quyền 
                                @if( Auth::user()->level == 1)
                                    {{ "SuperAdmin" }}
                                @elseif( Auth::user()->level == 2)
                                    {{ "Admin" }}
                                @elseif( Auth::user()->level == 3)
                                    {{ "Thành viên" }}
                                @endif
                                <a>
                        @endif
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a></a></li>
								<li><a href="{{ url('/home') }}">Home</a></li>
								<li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="{{route('website.show_page', ['id' => 3]) }}">Men</a></li>
										<li><a href="{{route('website.show_page', ['id' => 4]) }}">Women</a></li>  
										<li><a href="{{route('website.show_page', ['id' => 2]) }}">Boy</a></li> 
										<li><a href="{{route('website.show_page', ['id' => 1]) }}">Girl</a></li> 
                                    </ul>
                                </li> 
								<li><a href="#">Blog</a></li>
								<li><a href="#">Contact</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
                        <form action="http://localhost/project1/public/search" method="POST" role="search">
                            {{ csrf_field() }}
                            <div class="input-group">
                                <input type="text" class="search_box pull-right" name="q" placeholder="Search products" > 
                            </div>
						</form>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->

    
    @yield('content')



    <footer id="footer"><!--Footer-->
		
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Service</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Online Help</a></li>
								<li><a href="#">Contact Us</a></li>
								<li><a href="#">Order Status</a></li>
								<li><a href="#">Change Location</a></li>
								<li><a href="#">FAQ’s</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Quock Shop</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">T-Shirt</a></li>
								<li><a href="#">Mens</a></li>
								<li><a href="#">Womens</a></li>
								<li><a href="#">Gift Cards</a></li>
								<li><a href="#">Shoes</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Policies</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Terms of Use</a></li>
								<li><a href="#">Privecy Policy</a></li>
								<li><a href="#">Refund Policy</a></li>
								<li><a href="#">Billing System</a></li>
								<li><a href="#">Ticket System</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Company Information</a></li>
								<li><a href="#">Careers</a></li>
								<li><a href="#">Store Location</a></li>
								<li><a href="#">Affillate Program</a></li>
								<li><a href="#">Copyright</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>About Shopper</h2>
							@if (session('alert'))
                <p class="alert alert-success">{{ session('alert') }}</p>
            @endif
            @if (count($errors) > 0)
                @foreach ($errors->all() as $error)
                        <p class="text-center alert alert-danger">{{ $error }}</p>
                @endforeach
            @endif
            <form action="{{ url('apply-two') }}" method="post" class="form-inline">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="jane.test@example.com">
                </div>
                <button type="submit" class="btn btn-primary">Apply</button>
            </form>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2013 DN</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	


    <script src="{{ URL::asset('js/jquery.js') }}"></script>
	<script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ URL::asset('js/jquery.scrollUp.min.js') }}"></script>
	<script src="{{ URL::asset('js/price-range.js') }}"></script>
    <script src="{{ URL::asset('js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ URL::asset('js/main.js') }}"></script>

</body>
</html>