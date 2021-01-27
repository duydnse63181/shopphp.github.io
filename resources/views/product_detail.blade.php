<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
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
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">

	
<style>
    .hide-bullets {
list-style:none;
margin-left: -40px;
margin-top:20px;

}

.carousel{
  width:70%;
  
}

p{
  white-space:break-spaces;
}

.item{
  padding-left:0px;
}
</style>
</head>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
                                                                        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
                                                                        <script>
                                                                            jQuery(document).ready(function($) {
                                                                              //set here the speed to change the slides in the carousel
                                                                              $('#myCarousel').carousel({
                                                                                      interval: 5000
                                                                              });
                                                                              
                                                                      //Loads the html to each slider. Write in the "div id="slide-content-x" what you want to show in each slide
                                                                              $('#carousel-text').html($('#slide-content-0').html());
                                                                      
                                                                              //Handles the carousel thumbnails
                                                                            $('[id^=carousel-selector-]').click( function(){
                                                                                  var id = this.id.substr(this.id.lastIndexOf("-") + 1);
                                                                                  var id = parseInt(id);
                                                                                  $('#myCarousel').carousel(id);
                                                                              });
                                                                      
                                                                      
                                                                              // When the carousel slides, auto update the text
                                                                              $('#myCarousel').on('slid.bs.carousel', function (e) {
                                                                                      var id = $('.item.active').data('slide-number');
                                                                                      $('#carousel-text').html($('#slide-content-'+id).html());
                                                                              });
                                                                      });
                                                                        </script><!--/head-->

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
							<a href="#"><img style="width:50%" src="{{URL::asset('img/Logo.png')}}" alt="" /></a>
            </div>
            
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-user"></i> Account</a></li>
								<li><a href="#"><i class="fa fa-shopping-cart"></i> Cart</a></li>
								<li><a href="#"><i class="fa fa-lock"></i> Login</a></li>
							</ul>
						</div>
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
								<li><a href="index.html" class="active">Home</a></li>
								<li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="shop.html">Men</a></li>
										<li><a href="product-details.html">Women</a></li> 
										<li><a href="checkout.html">Kid</a></li> 
										<li><a href="cart.html">Boy</a></li> 
										<li><a href="login.html">Girl</a></li> 
                                    </ul>
                                </li> 
								<li><a href="#">Blog</a></li>
								<li><a href="#">Contact</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" placeholder="Search"/>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->