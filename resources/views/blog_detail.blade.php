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
										<i class="fa fa-google-plus-official"></i>
										<i class="fa fa-camera-retro"></i>
										<i class="fa fa-star-half-o"></i>
								</span>
							</div>
							<a href="">
                                <?php echo "$blog->img";?>
							</a>
							<?php echo "$blog->description";?>
							<h1> Comment </h1>
							@foreach($list_comment as $comment)
							@if($comment->blog_id == $blog->id)
							<div class="media commnets">
								<a class="pull-left" href="#">
									<img class="media-object" style="width:50%" src="{{URL::asset('img/product/avatar.png')}}" alt="">
								</a>
								<div class="media-body">
									@foreach($list_user as $user)
									@if($user->id == $comment->user_id)
									<h4 class="media-heading">{{$user->name}}</h4>
									@endif
									@endforeach
									<?php echo "$comment->content";?>
									<div class="blog-socials">
										<ul>
											<i class="fa fa-facebook"></i>
											<i class="fa fa-user-circle-o" aria-hidden="true"></i>
											<li><a href=""><i class="fa fa-twitter"></i></a></li>
											<li><a href=""><i class="fa fa-dribbble"></i></a></li>
											<li><a href=""><i class="fa fa-google-plus"></i></a></li>
										</ul>
										<a class="btn btn-primary" href="">Other Posts</a>
									</div>
								</div>
							</div>
							@endif
							@endforeach
							@if (Auth::check())
							<li><i class="fa fa-user"></i> {{ Auth::user()->name }}</li>
							<div class="replay-box">
								<form role="form" action="{{route('add_comment')}}" method="POST">
                    			@csrf
                      				<div class="mb-3">
                      				<h1>Content</h1>
                      				<textarea class="textarea"  name="Description" 
                          				style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
									  </div>
									
									<div class="col-sm-6" style="display:none">
										<div class="form-group">
											<label>User ID</label>
											<input type="text" name="User_id" class="form-control" value="{{Auth::user()->id}}">
										</div>
									</div>
									<div class="col-sm-6" style="display:none">
										<div class="form-group">
											<label>Blog ID</label>
											<input type="text" name="Blog_id"  class="form-control" value="{{$blog->id}}">
										</div>
									</div>

									<div class="mb-3">
									<div class="btn-submit">
									<button type="submit" class="btn btn-primary">Submit</button>
									</div>   
								</form>
							</div>
                            @else
                            <li><a href="{{ url('/login') }}"><i class="fa fa-user"></i> Login to comment</a></li>
                             @endif	
						</div>
					</div>
				</div>

	</div>
</div>
@stop