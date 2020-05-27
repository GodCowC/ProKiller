<?php
	include "config.php";
	header('Content-Type:text/html;charset=utf-8');
?>

<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<title>主页</title>
	<!-- web fonts -->
	<link href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet">
	<link href="http://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900&display=swap"
	      rel="stylesheet">
	<!-- //web fonts -->
	<!-- Template CSS -->
	<link rel="stylesheet" href="assets/css/style-starter.css">
</head>
<body>
<?php include 'navgen.php'; ?>
<!-- index-block1 -->
<div class="w3l-index-block1">
	<div class="content py-5">
		<div class="container">
			<div class="row align-items-center py-md-5 py-3">
				<div class="col-md-5 content-left pt-md-0 pt-5">
					<h1>创建和分享专属于你的精彩题库</h1>
					<p class="mt-3 mb-md-5 mb-4">
						在这里你可以共享其他人提供的题库，上传你的题库跟其他人分享，享受前所未有的精彩服务，构建一个全新的友好的问题社区，让你们共同享受知识的盛宴。</p>
				</div>
				<div class="col-md-7 content-photo mt-md-0 mt-5">
					<img src="assets/images/main.jpg" class="img-fluid" alt="main image">
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>
<!-- //index-block1 -->
<!-- index-block2 -->
<section class="w3l-index-block2 py-5">
	<div class="container py-md-3">
		<div class="heading text-center mx-auto">
			<h3 class="head">主要服务和功能 </h3>
		</div>
		<div class="row bottom_grids pt-md-3">
			<div class="col-lg-4 col-md-6 mt-5">
				<div class="s-block">
					<a href="new-bank.php" class="d-block p-lg-4 p-3"> <img src="assets/images/s1.png" alt=""
					                                                        class="img-fluid"/>
						<h3 class="my-3">创建题库</h3>
						<p class="">每个人可以独创属于自己的题库，分享自己的心得体会，并对自己的题库设置权限。</p>
					</a>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 mt-5">
				<div class="s-block">
					<a href="#blog-single.html" class="d-block p-lg-4 p-3"> <img src="assets/images/s2.png" alt=""
					                                                             class="img-fluid"/>
						<h3 class="my-3">上传试题</h3>
						<p class="">试题可以由用户动态的修改和上传，保证题库的实时性。</p>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- /index-block2 -->
<!-- content-with-photo17 -->




<!-- move top -->
<button onclick="topFunction()" id="movetop" title="Go to top">
	&#10548;
</button>
<script>
	// When the user scrolls down 20px from the top of the document, show the button
	window.onscroll = function () {
		scrollFunction()
	};
	function scrollFunction() {
		if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
			document.getElementById("movetop").style.display = "block";
		} else {
			document.getElementById("movetop").style.display = "none";
		}
	}
	// When the user clicks on the button, scroll to the top of the document
	function topFunction() {
		document.body.scrollTop = 0;
		document.documentElement.scrollTop = 0;
	}
</script>
<!-- /move top --></section>
<!-- //footer-28 block -->

<!-- jQuery, Bootstrap JS -->
<script src="assets/js/jquery-3.3.1.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

<!-- Template JavaScript -->

<script src="assets/js/owl.carousel.js"></script>

<!-- script for owlcarousel -->
<script>
	$(document).ready(function () {
		$('.owl-one').owlCarousel({
			loop: true,
			margin: 0,
			nav: true,
			responsiveClass: true,
			autoplay: false,
			autoplayTimeout: 5000,
			autoplaySpeed: 1000,
			autoplayHoverPause: false,
			responsive: {
				0: {
					items: 1,
					nav: false
				},
				480: {
					items: 1,
					nav: false
				},
				667: {
					items: 1,
					nav: true
				},
				1000: {
					items: 1,
					nav: true
				}
			}
		})
	})
</script>
<!-- //script for owlcarousel -->

<!-- disable body scroll which navbar is in active -->
<script>
	$(function () {
		$('.navbar-toggler').click(function () {
			$('body').toggleClass('noscroll');
		})
	});
</script>
<!-- disable body scroll which navbar is in active -->

<script src="assets/js/jquery.magnific-popup.min.js"></script>
<script>
	$(document).ready(function () {
		$('.popup-with-zoom-anim').magnificPopup({
			type: 'inline',
			fixedContentPos: false,
			fixedBgPos: true,
			overflowY: 'auto',
			closeBtnInside: true,
			preloader: false,
			midClick: true,
			removalDelay: 300,
			mainClass: 'my-mfp-zoom-in'
		});
		$('.popup-with-move-anim').magnificPopup({
			type: 'inline',
			fixedContentPos: false,
			fixedBgPos: true,
			overflowY: 'auto',
			closeBtnInside: true,
			preloader: false,
			midClick: true,
			removalDelay: 300,
			mainClass: 'my-mfp-slide-bottom'
		});
	});
</script>

</body>
</html>
