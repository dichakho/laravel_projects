@extends('client.index')
@section('content')
    <div class="site-main-container">
        <!-- Start top-post Area -->
        <section class="top-post-area pt-10">
            <div class="container no-padding">
                <div class="row small-gutters">
                    @php 
                        $news = $article->sortByDesc('created_at')->take(8);
                        $ediNews = $article->where('view', 1)->take(4);
                        $news1 = $news->shift();
                        $news2 = $news->shift();
                        $news3 = $news->shift();
                        $news4 = $news->shift();
                    @endphp
                    <a href="post/{{$news1->url_name}}">
                            <div class="col-lg-8 top-post-left" style="margin-top: 10px">
                        
                                    <div class="feature-image-thumb relative">
                                        <div class="overlay overlay-bg"></div>
                                        
                                        <img class="img-fluid imgs" src="client_resource/img/{{$news1->image}}" alt="">
                                    </div>
                                    <div class="top-post-details">
                                            {{-- $data = $article->category->parent->parent->name; --}}
                                        <ul class="tags">
                                            {{-- @foreach ($category as $cate)
                                                <li><a href="">{{$cate->name}}</a></li>
                                            @endforeach --}}
                                            
                                            <li><a href="post/{{$news1->url_name}}">
                                                {{$news1->category->name}}
                                            </a></li>
                                        </ul>
                                        <a href="post/{{$news1->url_name}}">
                                            <h3 style="padding: 5px">{{str_limit($news1->title, 100)}}</h3>
                                        </a>
                                        <ul class="meta">
                                            <li><span class="lnr lnr-user"></span>{{$news1->user->username}}</li>
                                            <li><span class="lnr lnr-calendar-full"></span>{{$news1->created_at}}</li>
                                            {{-- <li><span class="lnr lnr-bubble"></span>06 Comments</li> --}}
                                        </ul>
                                    </div>
                                </div>
                    </a>
                    <div class="col-lg-4 top-post-right mt-10" >
                        <a href="post/{{$news2->url_name}}">
                            <div class="single-top-post">
                                <div class="feature-image-thumb relative">
                                    <div class="overlay overlay-bg"></div>
                                    <img class="img-fluid sidebar_imgs" src="client_resource/img/{{$news2->image}}" alt="">
                                </div>
                                <div class="top-post-details">
                                    <ul class="tags">
                                        <li style="margin-bottom: 15px"><a href="post/{{$news2->url_name}}">{{$news2->category->name}}</a></li>
                                    </ul>
                                    <a href="post/{{$news2->url_name}}">
                                        <h4 style="color: white">{{str_limit($news2->title, 50)}}</h4>
                                    </a>
                                    <ul class="meta">
                                        <li><span class="lnr lnr-user"></span>{{$news2->user->username}}</li>
                                        <li><span class="lnr lnr-calendar-full"></span>{{$news2->created_at}}</li>
                                        {{-- <li><span class="lnr lnr-bubble"></span>06 Comments</li> --}}
                                    </ul>
                                </div>
                            </div>
                        </a>
                        
                        <a href="post/{{$news3->url_name}}">
                                <div class="single-top-post mt-10">
                                        <div class="feature-image-thumb relative">
                                            <div class="overlay overlay-bg"></div>
                                            <img class="img-fluid sidebar_imgs" src="client_resource/img/{{$news3->image}}" alt="">
                                        </div>
                                        <div class="top-post-details">
                                            <ul class="tags">
                                                <li><a href="post/{{$news3->url_name}}">{{$news3->category->name}}</a></li>
                                            </ul>
                                            <a href="post/{{$news3->url_name}}">
                                                <h4 style="color: white">{{str_limit($news3->title, 50)}}</h4>
                                            </a>
                                            <ul class="meta">
                                                <li><span class="lnr lnr-user"></span>{{$news3->user->username}}</li>
                                                <li><span class="lnr lnr-calendar-full"></span>{{$news3->created_at}}</li>
                                                {{-- <li><span class="lnr lnr-bubble"></span>06 Comments</li> --}}
                                            </ul>
                                        </div>
                                    </div>
                        </a>
                    </div>
                    <div class="col-lg-12">
                        <div class="news-tracker-wrap">
                            <h6><span>Breaking News:</span>   <a href="#">Astronomy Binoculars A Great Alternative</a></h6>
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
                        <!-- Start latest-post Area -->
                        <div class="latest-post-wrap">
                            <h4 class="cat-title">Latest News</h4>
                            @foreach ($news as $ns)
                               <a href="post/{{$ns->url_name}}">
                                    <div class="single-latest-post row align-items-center">
                                            <div class="col-lg-5 post-left">
                                                <div class="feature-img relative">
                                                    <div class="overlay overlay-bg"></div>
                                                    <img class="img-fluid" src="client_resource/img/{{$ns->image}}" alt="">
                                                </div>
                                                <ul class="tags">
                                                    <li><a href="post/{{$ns->url_name}}">{{$ns->category->name}}</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-lg-7 post-right">
                                                <a href="post/{{$ns->url_name}}">
                                                    <h4>
                                                        {{$ns->title}}
                                                    </h4>
                                                </a>
                                                <ul class="meta">
                                                    <li><a href="#"><span class="lnr lnr-user"></span>{{$ns->user->username}}</a></li>
                                                    <li><a href="#"><span class="lnr lnr-calendar-full"></span>{{$ns->created_at}}</a></li>
                                                    {{-- <li><a href="#"><span class="lnr lnr-bubble"></span>06 Comments</a></li> --}}
                                                </ul>
                                                <p class="excert">
                                                    {{str_limit($ns->description, 100)}}
                                                </p>
                                            </div>
                                    </div>
                               </a>
                            @endforeach
                            {{-- <div class="single-latest-post row align-items-center">
                                <div class="col-lg-5 post-left">
                                    <div class="feature-img relative">
                                        <div class="overlay overlay-bg"></div>
                                        <img class="img-fluid" src="client_resource/img/l2.jpg" alt="">
                                    </div>
                                    <ul class="tags">
                                        <li><a href="#">Science</a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-7 post-right">
                                    <a href="image-post.html">
                                        <h4>A Discount Toner Cartridge Is
                                        Better Than Ever.</h4>
                                    </a>
                                    <ul class="meta">
                                        <li><a href="#"><span class="lnr lnr-user"></span>Mark wiens</a></li>
                                        <li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a></li>
                                        <li><a href="#"><span class="lnr lnr-bubble"></span>06 Comments</a></li>
                                    </ul>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.
                                    </p>
                                </div>
                            </div>
                            <div class="single-latest-post row align-items-center">
                                <div class="col-lg-5 post-left">
                                    <div class="feature-img relative">
                                        <div class="overlay overlay-bg"></div>
                                        <img class="img-fluid" src="client_resource/img/l3.jpg" alt="">
                                    </div>
                                    <ul class="tags">
                                        <li><a href="#">Travel</a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-7 post-right">
                                    <a href="image-post.html">
                                        <h4>A Discount Toner Cartridge Is
                                        Better Than Ever.</h4>
                                    </a>
                                    <ul class="meta">
                                        <li><a href="#"><span class="lnr lnr-user"></span>Mark wiens</a></li>
                                        <li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a></li>
                                        <li><a href="#"><span class="lnr lnr-bubble"></span>06 Comments</a></li>
                                    </ul>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.
                                    </p>
                                </div>
                            </div>
                            <div class="single-latest-post row align-items-center">
                                <div class="col-lg-5 post-left">
                                    <div class="feature-img relative">
                                        <div class="overlay overlay-bg"></div>
                                        <img class="img-fluid" src="client_resource/img/l4.jpg" alt="">
                                    </div>
                                    <ul class="tags">
                                        <li><a href="#">Fashion</a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-7 post-right">
                                    <a href="image-post.html">
                                        <h4>A Discount Toner Cartridge Is
                                        Better Than Ever.</h4>
                                    </a>
                                    <ul class="meta">
                                        <li><a href="#"><span class="lnr lnr-user"></span>Mark wiens</a></li>
                                        <li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a></li>
                                        <li><a href="#"><span class="lnr lnr-bubble"></span>06 Comments</a></li>
                                    </ul>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.
                                    </p>
                                </div>
                            </div> --}}
                        </div>
                        <!-- End latest-post Area -->
                        
                        <!-- Start banner-ads Area -->
                        <div class="col-lg-12 ad-widget-wrap mt-30 mb-30">
                            <img class="img-fluid" src="client_resource/img/banner-ad.jpg" alt="">
                        </div>
                        <!-- End banner-ads Area -->
                        <!-- Start popular-post Area -->
                        <div class="popular-post-wrap">
                            <h4 class="title">Popular Posts</h4>
                            @php
                                $popNews = $article->where('view', 2)->take(3);
                                $popNews1 = $popNews->shift();
                            @endphp
                            <a href="post/{{$popNews1->url_name}}">
                                <div class="feature-post relative">
                                            <div class="feature-img relative">
                                                <div class="overlay overlay-bg"></div>
                                                <img class="img-fluid" src="client_resource/img/{{$popNews1->image}}" alt="">
                                            </div>
                                            <div class="details">
                                                <ul class="tags">
                                                    <li><a href="popNews1">{{$popNews1->category->name}}</a></li>
                                                </ul>
                                                <a href="popNews1">
                                                    <h3>{{$popNews1->title}}</h3>
                                                </a>
                                                <ul class="meta">
                                                    <li><a href="#"><span class="lnr lnr-user"></span>{{$popNews1->user->username}}</a></li>
                                                    <li><a href="#"><span class="lnr lnr-calendar-full"></span>{{$popNews1->created_at}}</a></li>
                                                    {{--  <li><a href="#"><span class="lnr lnr-bubble"></span>06 Comments</a></li>  --}}
                                                </ul>
                                            </div>
                                </div>
                            </a>
                            <div class="row mt-20 medium-gutters">
                                @foreach ($popNews as $e)
                                    <a href="post/{{$e->url_name}}">
                                        <div class="col-lg-6 single-popular-post">
                                                <div class="feature-img-wrap relative">
                                                    <div class="feature-img relative">
                                                        <div class="overlay overlay-bg"></div>
                                                        <img class="img-fluid" src="client_resource/img/{{$e->image}}" alt="">
                                                    </div>
                                                    <ul class="tags">
                                                        <li><a href="post/{{$e->url_name}}">Travel</a></li>
                                                    </ul>
                                                </div>
                                                <div class="details">
                                                    <a href="post/{{$e->url_name}}">
                                                        <h4>{{str_limit($e->title, 50)}}</h4>
                                                    </a>
                                                    <ul class="meta">
                                                        <li><a href="#"><span class="lnr lnr-user"></span>{{$e->user->username}}</a></li>
                                                        <li><a href="#"><span class="lnr lnr-calendar-full"></span>{{$e->created_at}}</a></li>
                                                        {{--  <li><a href="#"><span class="lnr lnr-bubble"></span>06 </a></li>  --}}
                                                    </ul>
                                                    <p class="excert">
                                                        {{$e->description}}
                                                    </p>
                                                </div>
                                        </div>
                                    </a>
                                @endforeach
                                {{--  <div class="col-lg-6 single-popular-post">
                                    <div class="feature-img-wrap relative">
                                        <div class="feature-img relative">
                                            <div class="overlay overlay-bg"></div>
                                            <img class="img-fluid" src="client_resource/img/f3.jpg" alt="">
                                        </div>
                                        <ul class="tags">
                                            <li><a href="#">Travel</a></li>
                                        </ul>
                                    </div>
                                    <div class="details">
                                        <a href="image-post.html">
                                            <h4>A Discount Toner Cartridge Is
                                            Better Than Ever.</h4>
                                        </a>
                                        <ul class="meta">
                                            <li><a href="#"><span class="lnr lnr-user"></span>Mark wiens</a></li>
                                            <li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a></li>
                                            <li><a href="#"><span class="lnr lnr-bubble"></span>06 </a></li>
                                        </ul>
                                        <p class="excert">
                                            Lorem ipsum dolor sit amet, consecteturadip isicing elit, sed do eiusmod tempor incididunt ed do eius.
                                        </p>
                                    </div>
                                </div>  --}}
                            </div>
                        </div>
                        <!-- End popular-post Area -->
                        
                    </div>
                    <div class="col-lg-4">
                        <div class="sidebars-area">
                            <div class="single-sidebar-widget editors-pick-widget">
                                <h6 class="title">Editor’s Pick</h6>
                                <div class="editors-pick-post">
                                    <a href="post/{{$news4->url_name}}">
                                        <div class="feature-img-wrap relative">
                                            <div class="feature-img relative">
                                                <div class="overlay overlay-bg"></div>
                                                <img class="img-fluid" src="client_resource/img/{{$news4->image}}" alt="">
                                            </div>
                                            <ul class="tags">
                                                <li><a href="post/{{$news4->url_name}}">{{$news4->category->name}}</a></li>
                                            </ul>
                                        </div>
                                    </a>
                                    <div class="details">
                                        <a href="post/{{$news4->url_name}}">
                                            <h4 class="mt-20">{{$news4->title}}</h4>
                                        </a>
                                        <ul class="meta">
                                            <li><a href="#"><span class="lnr lnr-user"></span>{{$news4->user->username}}</a></li>
                                            <li><a href="#"><span class="lnr lnr-calendar-full"></span>{{$news4->created_at}}</a></li>
                                            {{--  <li><a href="#"><span class="lnr lnr-bubble"></span>06 </a></li>  --}}
                                        </ul>
                                        <p class="excert">
                                            {{$news4->description}}
                                        </p>
                                    </div>
                                    <div class="post-lists">
                                        @foreach ($ediNews as $en)
                                        <a href="post/{{$en->url_name}}">
                                                <div class="single-post d-flex flex-row">
                                                        <div class="thumb">
                                                                <img src="client_resource/img/{{$en->image}}" alt="" style="width:100px">
                                                        </div>
                                                        <div class="detail">
                                                            <a href="post/{{$en->url_name}}"><h6>{{str_limit($en->title, 80)}}</h6></a>
                                                            <ul class="meta">
                                                                <li><a href="#"><span class="lnr lnr-calendar-full"></span>{{$en->created_at}}</a></li>
                                                                {{--  <li><a href="#"><span class="lnr lnr-bubble"></span>06</a></li>  --}}
                                                            </ul>
                                                        </div>
                                                    </div>
                                        </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="single-sidebar-widget ads-widget">
                                <img class="img-fluid" src="img/sidebar-ads.jpg" alt="">
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
                                    $mostPopNews = $article->sortBy('created_at')->take(4);
                                @endphp
                                <h6 class="title">Most Popular</h6>
                                @foreach ($mostPopNews as $e)
                                    <div class="single-list flex-row d-flex">
                                            <div class="thumb">
                                                <img src="client_resource/img/{{$e->image}}" alt="" style="width:100px">
                                            </div>
                                            <div class="details">
                                                <a href="post/{{$e->url_name}}">
                                                    <h6>{{$e->title}}</h6>
                                                </a>
                                                <ul class="meta">
                                                    <li><a href="#"><span class="lnr lnr-calendar-full"></span>{{$e->created_at}}</a></li>
                                                    {{--  <li><a href="#"><span class="lnr lnr-bubble"></span>06</a></li>  --}}
                                                </ul>
                                            </div>
                                    </div>
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
