

@extends('layouts.app')



@section('content')

	
	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
              <div class="item active">
								<div class="col-sm-6" style="width:40%">
									<h1><span>DDD</span>N</h1>
									<h2>Thời Trang cho mọi nhà</h2>
									<p>Gắn kết yêu thương</p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="{{URL::asset('img/banner/banner.jpg')}}" class="girl img-responsive" alt="" />
								</div>
              </div>

              
                @foreach ($listbanner as $ba)
							<div class="item">
              <div class="col-sm-6" style="width:40%">
									<h1><span>D</span>N</h1>
									<h2>Thời Trang cho mọi nhà</h2>
									<p>Gắn kết yêu thương </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
                  <img src="{{URL::asset($ba->Img_link)}}" class="girl img-responsive" alt="" />
								</div>
              </div>
              @endforeach
            </div>
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
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
					<div class="features_items"><!--features_items-->
            <h2 class="title text-center">Features Items</h2>
			@foreach($listpro as $pro)
			@if($pro->is_hot == 1)
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
						
					</div><!--features_items-->
					
					
					
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">recommended items</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">
									@foreach($listpro as $pro)
									@if($pro->id == mt_rand(1,18))
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
									@if($pro->id == mt_rand(1,18))
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
									@if($pro->id == mt_rand(1,18))
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
									@if($pro->id == mt_rand(1,18))
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
									@if($pro->id == mt_rand(1,18))
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
									@if($pro->id == mt_rand(1,18))
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
	</section>
	

	@stop