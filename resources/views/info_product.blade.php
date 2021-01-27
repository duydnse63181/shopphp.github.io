@extends('layouts.app')
	
@section('content')
<style>
    .hide-bullets {
list-style:none;
margin-left: -40px;
margin-top:20px;

}

.carousel{
  width:100%;
  
}

p{
  white-space:break-spaces;
}

.item{
  padding-left:0px;
}
</style>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#mens">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Mens
										</a>
									</h4>
								</div>
								<div id="mens" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="{{route('website.show_page', ['id' => 3]) }}">DN</a></li>
										</ul>
									</div>
								</div>
							</div>
							
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#womens">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Womens
										</a>
									</h4>
								</div>
								<div id="womens" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="{{route('website.show_page', ['id' => 4]) }}">DN</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="{{route('website.show_page', ['id' => 1]) }}">Girl</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="{{route('website.show_page', ['id' => 2]) }}">Boy</a></h4>
								</div>
							</div>
						</div><!--/category-products-->
					
						
						
						
						<div class="shipping text-center"><!--shipping-->
							<img src="{{URL::asset('img/banner/bgai.jpg')}}" alt="" />
            </div><!--/shipping-->
            <div class="shipping text-center"><!--shipping-->
							<img src="{{URL::asset('img/banner/btrai.jpg')}}" alt="" />
						</div><!--/shipping-->
					
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
                                                        <div id="main_area">
                                                            <!-- Slider -->
                                                            <div class="row">
                                                              <div class="col-xs-12" id="slider">
                                                                <!-- Top part of the slider -->
                                                                <div class="row">
                                                                  <div class="col-sm-8" id="carousel-bounding-box">
                                                                    <div class="carousel slide" id="myCarousel">
                                                                      <!-- Carousel items -->
                                                                      <div class="carousel-inner">
                                                                        <div class="active item" data-slide-number="0">
                                                                        
                                                                          <img src="{{URL::asset($item->photo)}}"></div>

                                                                        <div class="item" data-slide-number="1">
                                                                          <img src="{{URL::asset($item->photo1)}}"></div>

                                                                        <div class="item" data-slide-number="2">
                                                                          <img src="{{URL::asset($item->photo2)}}"></div>

                                                                        <div class="item" data-slide-number="3">
                                                                          <img src="{{URL::asset($item->photo3)}}"></div>

                                                                        <div class="item" data-slide-number="4">
                                                                          <img src="{{URL::asset($item->photo4)}}"></div>

                                                                        <div class="item" data-slide-number="5">
                                                                          <img src="{{URL::asset($item->photo5)}}"></div>
                                                                      </div>
                                                                    
                                                                      <!-- Carousel nav -->
                                                                      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                                                                        <span class="glyphicon glyphicon-chevron-left"></span>
                                                                      </a>
                                                                      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                                                                        <span class="glyphicon glyphicon-chevron-right"></span>
                                                                      </a>
                                                                    </div>
                                                                  </div>

                                                                  <div class="col-sm-4" id="carousel-text"></div>

                                                                  <div id="slide-content" >
                                                                    <div id="slide-content-0">
                                                                      <h2>{{$item->name}}</h2>
                                                                      <h3>{{$item->price}} VND</h3>              
                                                                      <?php
                        												echo "$item->description";
                      												  ?>
                                                                      <form method="POST" action="{{url('cart\add')}}">
                                    										<input type="hidden" name="product_id" value="{{$item->id}}">
                                    										<input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    										<button type="submit" class="btn btn-fefault add-to-cart">
                                        										<i class="fa fa-shopping-cart"></i>
                                        										Add to cart
                                    										</button>
                            											</form>
                                                                    </div>

                                                                    
                                                                  </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                            <!--/Slider-->

                                                            <div class="row hidden-xs" id="slider-thumbs">
                                                              <!-- Bottom switcher of slider -->
                                                              <ul class="hide-bullets">
                                                                <li class="col-sm-2">
                                                                  <a class="thumbnail" id="carousel-selector-0"><img src="{{URL::asset($item->photo)}}"></a>
                                                                </li>

                                                                <li class="col-sm-2">
                                                                  <a class="thumbnail" id="carousel-selector-1"><img src="{{URL::asset($item->photo1)}}"></a>
                                                                </li>

                                                                <li class="col-sm-2">
                                                                  <a class="thumbnail" id="carousel-selector-2"><img src="{{URL::asset($item->photo2)}}"></a>
                                                                </li>

                                                                <li class="col-sm-2">
                                                                  <a class="thumbnail" id="carousel-selector-3"><img src="{{URL::asset($item->photo3)}}"></a>
                                                                </li>

                                                                <li class="col-sm-2">
                                                                  <a class="thumbnail" id="carousel-selector-4"><img src="{{URL::asset($item->photo4)}}"></a>
                                                                </li>

                                                                <li class="col-sm-2">
                                                                  <a class="thumbnail" id="carousel-selector-5"><img src="{{URL::asset($item->photo5)}}"></a>
                                                                </li>
                                                              </ul>
                                                            </div>
                                                          </div>         
                        
					</div><!--/product-details-->
					
					
						
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">recommended items</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">
									@foreach($listpro as $pro)
									@if($pro->id == 1)
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<a href="{{route('website.show_product', ['id' => $pro->id]) }}"><img src="{{URL::asset($pro->photo)}}" alt="" /></a>
													<h2>{{$pro->price}} VND</h2>
													<p>{{$pro->name}}</p>
													<form method="POST" action="{{url('cart\add')}}">
                                    					<input type="hidden" name="product_id" value="{{$pro->id}}">
                                    					<input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    					<button type="submit" class="btn btn-fefault add-to-cart">
                                        				<i class="fa fa-shopping-cart"></i>
                                        				Add to cart
                                    					</button>
                            						</form>
												</div>
											</div>
										</div>
									</div>
									@endif
									@if($pro->id == 2)
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<a href="{{route('website.show_product', ['id' => $pro->id]) }}"><img src="{{URL::asset($pro->photo)}}" alt="" /></a>
													<h2>{{$pro->price}} VND</h2>
													<p>{{$pro->name}}</p>
													<form method="POST" action="{{url('cart\add')}}">
                                    					<input type="hidden" name="product_id" value="{{$pro->id}}">
                                    					<input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    					<button type="submit" class="btn btn-fefault add-to-cart">
                                        					<i class="fa fa-shopping-cart"></i>
                                        					Add to cart
                                    					</button>
                            						</form>
												</div>
											</div>
										</div>
									</div>
									@endif
									@if($pro->id == 3)
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<a href="{{route('website.show_product', ['id' => $pro->id]) }}"><img src="{{URL::asset($pro->photo)}}" alt="" /></a>
													<h2>{{$pro->price}} VND</h2>
													<p>{{$pro->name}}</p>
													<form method="POST" action="{{url('cart\add')}}">
                                    					<input type="hidden" name="product_id" value="{{$pro->id}}">
                                    					<input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    					<button type="submit" class="btn btn-fefault add-to-cart">
                                        					<i class="fa fa-shopping-cart"></i>
                                        					Add to cart
                                    					</button>
                            						</form>
												</div>
											</div>
										</div>
									</div>
									@endif
									@endforeach
								</div>
								<div class="item">	
									@foreach($listpro as $pro)
									@if($pro->id == rand(1,7) && $pro->catogoris_id == 2)
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<a href="{{route('website.show_product', ['id' => $pro->id]) }}"><img src="{{URL::asset($pro->photo)}}" alt="" /></a>
													<h2>{{$pro->price}} VND</h2>
													<p>{{$pro->name}}</p>
													<form method="POST" action="{{url('cart\add')}}">
                                    					<input type="hidden" name="product_id" value="{{$pro->id}}">
                                    					<input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    					<button type="submit" class="btn btn-fefault add-to-cart">
                                        					<i class="fa fa-shopping-cart"></i>
                                        					Add to cart
                                    					</button>
                            						</form>
												</div>
											</div>
										</div>
									</div>
									@endif
									@if($pro->id == rand(1,7) && $pro->catogoris_id == 3)
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<a href="{{route('website.show_product', ['id' => $pro->id]) }}"><img src="{{URL::asset($pro->photo)}}" alt="" /></a>
													<h2>{{$pro->price}} VND</h2>
													<p>{{$pro->name}}</p>
													<form method="POST" action="{{url('cart\add')}}">
                                    					<input type="hidden" name="product_id" value="{{$pro->id}}">
                                    					<input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    					<button type="submit" class="btn btn-fefault add-to-cart">
                                        					<i class="fa fa-shopping-cart"></i>
                                        					Add to cart
                                    					</button>
                            						</form>
												</div>
											</div>
										</div>
									</div>
									@endif
									@if($pro->id == rand(1,7) && $pro->catogoris_id == 1)
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<a href="{{route('website.show_product', ['id' => $pro->id]) }}"><img src="{{URL::asset($pro->photo)}}" alt="" /></a>
													<h2>{{$pro->price}} VND</h2>
													<p>{{$pro->name}}</p>
													<form method="POST" action="{{url('cart\add')}}">
                                    					<input type="hidden" name="product_id" value="{{$pro->id}}">
                                    					<input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    					<button type="submit" class="btn btn-fefault add-to-cart">
                                        					<i class="fa fa-shopping-cart"></i>
                                        					Add to cart
                                    					</button>
                            						</form>
												</div>
											</div>
										</div>
									</div>
									@endif
									@endforeach
								</div>
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div><!--/recommended_items-->
					
					
				</div>
			</div>
		</div>

		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <script>
                                                                            jQuery(document).ready(function($) {
                                                                              //set here the speed to change the slides in the carousel
                                                                              $('#myCarousel').carousel({
                                                                                      interval: 5000
                                                                              });
                                                                              
                                                                      //Loads the html to each slider. Write in the "div id="slide-content-x" what you want to show in each slide
                                                                            //   $('#carousel-text').html($('#slide-content-0').html());
                                                                      
                                                                              //Handles the carousel thumbnails
                                                                            $('[id^=carousel-selector-]').click( function(){
                                                                                  var id = this.id.substr(this.id.lastIndexOf("-") + 1);
                                                                                  var id = parseInt(id);
                                                                                  $('#myCarousel').carousel(id);
                                                                              });
                                                                      
                                                                      
                                                                              // When the carousel slides, auto update the text
                                                                              $('#myCarousel').on('slid.bs.carousel', function (e) {
                                                                                      var id = $('.item.active').data('slide-number');
                                                                                    //   $('#carousel-text').html($('#slide-content-'+id).html());
                                                                              });
                                                                      });
                                                                        </script><!--/head-->

	</section>
	
	@stop