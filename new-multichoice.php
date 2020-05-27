<!doctype html>
<?php include "config.php"; ?>
<html>
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="添加新的多选题" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<title>添加新的多选题</title>
	<!-- web fonts -->
	<link href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet">
	<link href="http://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900&display=swap"
	      rel="stylesheet">
	<!-- //web fonts -->
	<!-- Template CSS -->
	<link rel="stylesheet" href="assets/css/style-starter.css">
	<script src="assets/js/jquery-3.3.1.min.js" type="text/javascript"></script>

</head>
<body>
<?php include 'navgen.php'; ?>
<div class="w3l-index-block1">
	<div class="content py-5">
		<div class="container">			
<div class="row py-md-5">
				<p>
				<h3>当前访问题库：<?php
						global $bankid;
						$bankid = 1;
						if (isset($_GET["bankid"]))
							$bankid = $_GET["bankid"];
if (!isset($_SESSION))
session_start();
$_SESSION['bankid']=$bankid;
						$sql = "SELECT bid, name, onechoice, multichoice, fillblank FROM banks WHERE bid=" . $bankid;
						$result = $conn->query($sql);
						$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
						echo $row["name"];
						?></h3> </p>
			</div>
<form method="post" action="newmulti-success.php">
			<div class="row">
				<h3>题目正文</h3>
</div><div class="row">
<textarea name="text"></textarea>
</div><div class="row">
                                <h3>A选项</h3>

</div><div class="row py-md-1">

<input type="text" name="texta">
</div><div class="row py-md-1"><h3>B选项</h3>

</div><div class="row py-md-1">

<input type="text" name="textb">
</div><div class="row py-md-1"><h3>C选项</h3>

</div><div class="row py-md-1">

<input type="text" name="textc">
</div><div class="row py-md-1"><h3>D选项</h3>

</div><div class="row py-md-1">
<input type="text" name="textd">

</div><div class="row py-md-1"><h3>正确答案：</h3></div>

<div class="row"><input type="checkbox" name="answer[]" value="A">A</input></div>
<div class="row"><input type="checkbox" name="answer[]" value="B">B</input></div>
<div class="row"><input type="checkbox" name="answer[]" value="C">C</input></div>
<div class="row"><input type="checkbox" name="answer[]" value="D">D</input></div>
<div class="row py-md-1"><input type="submit" value="上传题目" class="btn btn-success btn-theme"></div>
</form>
	</div>
	
	</div>
	
	
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
