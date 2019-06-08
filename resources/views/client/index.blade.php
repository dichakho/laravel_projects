<!DOCTYPE html>
<html lang="zxx" class="no-js">
	<head>
		<style>
			.nav-menu > li{
				margin-left: 2px !important;
			}
			.imgs{
				height: 372px !important;
			}
			.sidebar_imgs{
				height: 182px !important;
			}
			
		</style>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="colorlib">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>Magazine</title>
		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
		<!--
		CSS
		============================================= -->
		<base href="{{asset('')}}">
		<link rel="stylesheet" href="client_resource/css/linearicons.css">
		<link rel="stylesheet" href="client_resource/css/font-awesome.min.css">
		<link rel="stylesheet" href="client_resource/css/bootstrap.css">
		<link rel="stylesheet" href="client_resource/css/magnific-popup.css">
		<link rel="stylesheet" href="client_resource/css/nice-select.css">
		<link rel="stylesheet" href="client_resource/css/animate.min.css">
		<link rel="stylesheet" href="client_resource/css/owl.carousel.css">
		<link rel="stylesheet" href="client_resource/css/jquery-ui.css">
		<link rel="stylesheet" href="client_resource/css/main.css">
	</head>
	<body>
		@include('client.common.header')
		
		@yield('content')
		
		
		
		@include('client.common.footer')
		<script src="client_resource/js/vendor/jquery-2.2.4.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="client_resource/js/vendor/bootstrap.min.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
		<script src="client_resource/js/easing.min.js"></script>
		<script src="client_resource/js/hoverIntent.js"></script>
		<script src="client_resource/js/superfish.min.js"></script>
		<script src="client_resource/js/jquery.ajaxchimp.min.js"></script>
		<script src="client_resource/js/jquery.magnific-popup.min.js"></script>
		<script src="client_resource/js/mn-accordion.js"></script>
		<script src="client_resource/js/jquery-ui.js"></script>
		<script src="client_resource/js/jquery.nice-select.min.js"></script>
		<script src="client_resource/js/owl.carousel.min.js"></script>
		<script src="client_resource/js/mail-script.js"></script>
		<script src="client_resource/js/main.js"></script>
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.1';
			fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
		</script>
	</body>
</html>