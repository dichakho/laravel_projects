@extends('client.index')
@section('content')
    <div class="site-main-container">
			<!-- Start top-post Area -->
			<section class="top-post-area pt-10">
				<div class="container no-padding">
					<div class="row">
						<div class="col-lg-12">
							<div class="hero-nav-area">
								<h1 class="text-white">Standard Post</h1>
								<p class="text-white link-nav"><a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span><a href="#">Post Types </a><span class="lnr lnr-arrow-right"></span><a href="standard-post.html">Standard Post </a></p>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="news-tracker-wrap">
								<h6><span>Breaking News:</span><a href="#">Astronomy Binoculars A Great Alternative</a></h6>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- End top-post Area -->
			<!-- Start latest-post Area -->
			<section class="latest-post-area pb-120">
				<div class="container no-padding">
					<div class="row">
						<div class="col-lg-8 post-list">
							<!-- Start single-post Area -->
							<div class="single-post-wrap">
								<div class="content-wrap">
									<ul class="tags">
										<li><a href="#">{{$article[0]->category->name}}</a></li>
									</ul>
									<a href="#">
										<h3>{{$article[0]->title}}</h3>
									</a>
									<ul class="meta pb-20">
										<li><a href="#"><span class="lnr lnr-user"></span>Mark wiens</a></li>
										<li><a href="#"><span class="lnr lnr-calendar-full"></span>{{$article[0]->created_at}}</a></li>
										<li><a href="#"><span class="lnr lnr-bubble"></span>06 </a></li>
									</ul>
									<blockquote>
										{!!$article[0]->description!!}
									</blockquote>
									<p>
										{!!$article[0]->content!!}
									</p>
									<hr>
									<p>

										<ul class="d-flex">
										@foreach ($article[0]->tag as $e)
												<li class=" mx-1 btn" style="background-color: #ebebeb"> <b>{{$e->name}}</b> </li>
										@endforeach
										</ul>
									</p>

							</div>
							<div class="comment-form">
								<h4>Post Comment</h4>
								<div class="fb-comments" data-href="http://localhost:8000/post/{{$article[0]->url_name}}" data-numposts="5"></div>
							</div>
						</div>
						<!-- End single-post Area -->
					</div>
					<div class="col-lg-4">
						<div class="sidebars-area">
							<div class="single-sidebar-widget editors-pick-widget">
								@php
								
								$relativeNews = $post->where('id', '!=', '$article[0]->id')->take(5); 
								$relativeNews1 = $relativeNews->shift();
								$relativeNews2 = $relativeNews->shift();
								
								@endphp
								<h6 class="title">Editor’s Pick</h6>
								<div class="editors-pick-post">
									<a href="post/{{$relativeNews2->url_name}}">
										<div class="feature-img-wrap relative">
											<div class="feature-img relative">
												<div class="overlay overlay-bg"></div>
												<img class="img-fluid" src="client_resource/img/{{$relativeNews2->image}}" alt="">
											</div>
											<ul class="tags">
												<li><a href="post/{{$relativeNews2->url_name}}">{{$relativeNews2->category->name}}</a></li>
											</ul>
										</div>
												<div class="details">
													<a href="post/{{$relativeNews2->url_name}}">
														<h4 class="mt-20">
															{{$relativeNews2->title}}
														</h4>
													</a>
													<ul class="meta">
														<li><a href="#"><span class="lnr lnr-user"></span{{$relativeNews2->user->username}}</a></li>
														<li><a href="#"><span class="lnr lnr-calendar-full"></span>{{$relativeNews2->created_at}}</a></li>
														{{--  <li><a href="#"><span class="lnr lnr-bubble"></span>06 </a></li>  --}}
													</ul>
													<p class="excert">
														{{$relativeNews2->description}}
													</p>
												</div>
									</a>
									<div class="post-lists">
										@foreach ($relativeNews as $e)
											<a href="post/{{$e->url_name}}">
												<div class="single-post d-flex flex-row">
														<div class="thumb">
															<img src="client_resource/img/{{$e->image}}" alt="" style="width:100px">
														</div>
														<div class="detail">
															<a href="post/{{$e->url_name}}"><h6>{{$e->title}}</h6></a>
															<ul class="meta">
																<li><a href="#"><span class="lnr lnr-calendar-full"></span>{{$e->created_at}}</a></li>
																{{--  <li><a href="#"><span class="lnr lnr-bubble"></span>06</a></li>  --}}
															</ul>
														</div>
												</div>
											</a>
										@endforeach
										{{--  <div class="single-post d-flex flex-row">
											<div class="thumb">
												<img src="client_resource/img/e3.jpg" alt="">
											</div>
											<div class="detail">
												<a href="image-post.html"><h6>Compatible Inkjet Cartr
												world famous</h6></a>
												<ul class="meta">
													<li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a></li>
													<li><a href="#"><span class="lnr lnr-bubble"></span>06</a></li>
												</ul>
											</div>
										</div>
										<div class="single-post d-flex flex-row">
											<div class="thumb">
												<img src="client_resource/img/e4.jpg" alt="">
											</div>
											<div class="detail">
												<a href="image-post.html"><h6>5 Tips For Offshore Soft
												Development </h6></a>
												<ul class="meta">
													<li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a></li>
													<li><a href="#"><span class="lnr lnr-bubble"></span>06</a></li>
												</ul>
											</div>
										</div>  --}}
									</div>
								</div>
							</div>
							<div class="single-sidebar-widget ads-widget">
								<img class="img-fluid" src="client_resource/img/sidebar-ads.jpg" alt="">
							</div>
							{{--  <div class="single-sidebar-widget newsletter-widget">
								<h6 class="title">Newsletter</h6>
								<p>
									Here, I focus on a range of items
									andfeatures that we use in life without
									giving them a second thought.
								</p>
								<div class="form-group d-flex flex-row">
									<div class="col-autos">
										<div class="input-group">
											<input class="form-control" placeholder="Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address'" type="text">
										</div>
									</div>
									<a href="#" class="bbtns">Subcribe</a>
								</div>
								<p>
									You can unsubscribe us at any time
								</p>
							</div>  --}}
							<div class="single-sidebar-widget most-popular-widget">
									@php
                                    $mostPopNews = $post->where('view', 1)->take(4);
                                @endphp
								<h6 class="title">Most Popular</h6>
								@foreach ($mostPopNews as $e)
								<a href="post/{{$e->url_name}}">
									<div class="single-list flex-row d-flex">
										<div class="thumb">
											<img src="client_resource/img/{{$e->image}}" alt="" style="width:100px">
										</div>
										<div class="details">
											<a href="image-post.html">
												<h6>{{$e->title}}</h6>
											</a>
											<ul class="meta">
												<li><a href="#"><span class="lnr lnr-calendar-full"></span>{{$e->created_at}}</a></li>
												{{--  <li><a href="#"><span class="lnr lnr-bubble"></span>06</a></li>  --}}
											</ul>
										</div>
									</div>
								</a>
								@endforeach
								{{--  <div class="single-list flex-row d-flex">
									<div class="thumb">
										<img src="client_resource/img/m2.jpg" alt="">
									</div>
									<div class="details">
										<a href="image-post.html">
											<h6>Compatible Inkjet Cartr
											world famous</h6>
										</a>
										<ul class="meta">
											<li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a></li>
											<li><a href="#"><span class="lnr lnr-bubble"></span>06</a></li>
										</ul>
									</div>
								</div>
								<div class="single-list flex-row d-flex">
									<div class="thumb">
										<img src="client_resource/img/m3.jpg" alt="">
									</div>
									<div class="details">
										<a href="image-post.html">
											<h6>5 Tips For Offshore Soft
											Development </h6>
										</a>
										<ul class="meta">
											<li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a></li>
											<li><a href="#"><span class="lnr lnr-bubble"></span>06</a></li>
										</ul>
									</div>
								</div>
								<div class="single-list flex-row d-flex">
									<div class="thumb">
										<img src="client_resource/img/m4.jpg" alt="">
									</div>
									<div class="details">
										<a href="image-post.html">
											<h6>5 Tips For Offshore Soft
											Development </h6>
										</a>
										<ul class="meta">
											<li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a></li>
											<li><a href="#"><span class="lnr lnr-bubble"></span>06</a></li>
										</ul>
									</div>
								</div>  --}}
							</div>
							<div class="single-sidebar-widget social-network-widget">
								<h6 class="title">Social Networks</h6>
								<ul class="social-list">
									<li class="d-flex justify-content-between align-items-center fb">
										<div class="icons d-flex flex-row align-items-center">
											<i class="fa fa-facebook" aria-hidden="true"></i>
											<p>983 Likes</p>
										</div>
										<a href="#">Like our page</a>
									</li>
									<li class="d-flex justify-content-between align-items-center tw">
										<div class="icons d-flex flex-row align-items-center">
											<i class="fa fa-twitter" aria-hidden="true"></i>
											<p>983 Followers</p>
										</div>
										<a href="#">Follow Us</a>
									</li>
									<li class="d-flex justify-content-between align-items-center yt">
										<div class="icons d-flex flex-row align-items-center">
											<i class="fa fa-youtube-play" aria-hidden="true"></i>
											<p>983 Subscriber</p>
										</div>
										<a href="#">Subscribe</a>
									</li>
									<li class="d-flex justify-content-between align-items-center rs">
										<div class="icons d-flex flex-row align-items-center">
											<i class="fa fa-rss" aria-hidden="true"></i>
											<p>983 Subscribe</p>
										</div>
										<a href="#">Subscribe</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End latest-post Area -->
	</div>
@endsection

