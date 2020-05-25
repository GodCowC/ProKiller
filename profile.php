<!doctype html>
<?php include 'config.php'; ?>
<html>
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="单项选择题" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<title>用户<?php 
if (!isset($_SESSION['uname']))
{

    Header("Location: home.php");
exit;
}
else
    echo $_SESSION['uname'];
?>的个人空间</title>
	<!-- web fonts -->
	<link href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet">
	<link href="http://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900&display=swap"
	      rel="stylesheet">
	<!-- //web fonts -->
	<!-- Template CSS -->
	<link rel="stylesheet" href="assets/css/style-starter.css">
	<script src="assets/js/jquery-3.3.1.min.js" type="text/javascript"></script>
</head>
<script type="text/javascript"
        src="http://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML"></script>
<script type="text/x-mathjax-config">
MathJax.Hub.Config({
tex2jax: {inlineMath: [['$','$'], ['\(','\)']]}
});

</script>
<body>
<?php include 'navgen.php'; ?>
<div class="w3l-index-block1">
	<div class="content py-5">
		<div class="container">
			<div class="row py-md-5">
				<p><h5>欢迎您，用户 <?php echo $_SESSION['uname'];?>！</h5>
			</div>
			<div class="row py-md-1">
			<?php
echo '我的题库：';
					global $bankid, $pcnt, $pid;
					$sql = "SELECT bid, name, creator FROM banks WHERE creator='".$_SESSION['uname'] ."'";
					$result = $conn->query($sql);
					while ($row = mysqli_fetch_array($result))
	{
    echo "<a href=\"problems.php?bankid=". $row['bid'] . "\" class=\"btn btn-success\">" . $row['name'] . "</a>";
}?>
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
