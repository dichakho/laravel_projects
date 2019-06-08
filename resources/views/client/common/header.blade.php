
<header>		
    <div class="header-top">
        <div class="container">
            <div class="row" >
                <div class="col-lg-5 col-md-6 col-sm-6 col-6 header-top-left no-padding">
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                        <li><a href="#"><i class="fa fa-behance"></i></a></li>
                    </ul>
                </div>

                <div class="navbar-right" >
                    <form class="Search">
                        <input type="text" class="form-control Search-box" name="Search-box" id="Search-box" placeholder="Search">
                        <label for="Search-box" class="Search-box-label">
                            <span class="lnr lnr-magnifier"></span>
                        </label>
                        <span class="Search-close">
                            <span class="lnr lnr-cross"></span>
                        </span>
                    </form>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6 col-6 header-top-right no-padding">
                    <ul >
                        <li><a href="tel:+440 012 3654 896"><span class="lnr lnr-phone-handset"></span><span>+84 981234899</span></a></li>
                        <li><a href="mailto:support@colorlib.com"><span class="lnr lnr-envelope"></span><span>dichakho@gmail.com</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="logo-wrap">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-4 col-md-4 col-sm-12 logo-left no-padding">
                    <a href="http://localhost:8000/">
                        <img class="img-fluid" src="client_resource/img/logo.png" alt="">
                    </a>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 logo-right no-padding ads-banner">
                    <img class="img-fluid" src="client_resource/img/banner-ad.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="container main-menu" id="main-menu">
        <div class="row align-items-center justify-content-between">
            <nav id="nav-menu-container">
                
                <ul class="nav-menu">
                        
                    {{-- <li class="menu-active"><a href="index.html">Home</a></li>
                    <li><a href="archive.html">Archive</a></li>
                    <li><a href="category.html">Category</a></li>
                    <li class="menu-has-children"><a href="">Post Types</a>
                        <ul>
                            <li><a href="standard-post.html">Standard Post</a></li>
                            <li><a href="image-post.html">Image Post</a></li>
                            <li><a href="gallery-post.html">Gallery Post</a></li>
                            <li><a href="video-post.html">Video Post</a></li>
                            <li><a href="audio-post.html">Audio Post</a></li>
                        </ul>
                    </li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="contact.html">Contact</a></li> --}}
                    {{-- @php
                        var_dump($category[0]->children[0]->name); exit;
                    @endphp --}}
                    @foreach ($category as $cate)
                        <li><a href="postbycate/{{$cate->url_name}}">{{$cate->name}}</a>                    
                            <ul>
                                @foreach ($cate->children as $ca)
                                    <li><a href="postbycate/{{$ca->url_name}}">{{$ca['name']}}</a>
                                        <ul>
                                            @foreach ($ca->children as $c)
                                                <li><a href="postbycate/{{$c->url_name}}">{{$c['name']}}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>                        
                        </li> 
                    @endforeach
            </ul>
            
            </nav><!-- #nav-menu-container -->
            
        </div>
    </div>
</header>