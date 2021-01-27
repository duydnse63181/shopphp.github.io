@extends('layouts.app')

@section('content') 
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
                <div class="col-sm-9">
					<div class="blog-post-area">
                        <h2 class="title text-center">Blog</h2>
                        @foreach($list_json as $blog)
						<div class="single-blog-post">
							<?php echo "$blog->title";?>
							<div class="post-meta">
								<ul>
									<li><i class="fa fa-user"></i> {{$blog->created_at}}</li>
								</ul>
								<span>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-half-o"></i>
								</span>
							</div>
							<a href="">
                                <?php echo "$blog->img";?>
							</a>
                            <?php echo "$blog->content";?>
                            <a  class="btn btn-primary" href="{{route('website.show_blog', ['id' => $blog->id]) }}">Read More</a>
						</div>
						@endforeach	
					</div>
				</div>

	</div>
</div>
@stop