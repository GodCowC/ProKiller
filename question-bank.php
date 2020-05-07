<?php
	include "config.php";
	header('Content-Type:text/html;charset=utf-8');
	$conn = new mysqli($host, $user, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . mysqli_connect_error());
	}
	$sql = "select * from banks ";
	$result = $conn->query($sql);
	$row = mysqli_fetch_array($result);
	$current = 1;
	$page_num = 20;
	$pages = ($result->num_rows + $page_num - 1) / $page_num;
	function min_of($a, $b)
	{
		if ($a > $b) {
			return $b;
		} else {
			return $a;
		}
	}
	if (isset($_POST['set_current'])) {
		$current = $_POST['set_current'];
	}
?>
<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>题库</title>
	<!-- web fonts -->
	<link href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet">
	<link href="http://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900&display=swap"
	      rel="stylesheet">
	<!-- //web fonts -->
	<!-- Template CSS -->
	<link rel="stylesheet" type="text/css" href="assets/css/style-starter.css">
</head>
<body>
<?php include 'navgen.php'; ?>
<!-- index-block2 -->
<section class="w3l-index-block2 py-5">
	<div class="container py-md-3">
		<div class="row bottom_grids pt-md-5">
			<div class="col-lg-auto col-md-12 mt-5" style="align-items:center">
				<div class="s-block">
					<a href="new-bank.php" class="d-block p-lg-4 p-3">
						<h3 class="my-3">创建题库</h3>
						<p class="">每个人可以独创属于自己的题库，分享自己的心得体会，并对自己的题库设置权限。</p>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- /index-block2 -->
<!-- content-with-photo17 -->
<!-- content-with-photo17 -->
<div class="w3l-index-block4">
	<div class="features-bg py-5">
		<!-- features15 block -->
		<div class="container py-md-3">
			<div class="heading text-center mx-auto">
				<h3 class="head">题库列表</h3>
				<h4 class="head" style="padding-top:20px">第<?php echo $current ?>页</h4>
			</div>
			<div class="row">
				<?php
					if ($result->num_rows == 0) {
						echo "<div class=\"col-md-12 features15-col-text\">";
						echo "<a class=\"d-flex flex-wrap feature-unit align-items-center\">";
						echo "<div class=\"col-sm-12 mt-sm-0 mt-4\">";
						echo "<div class=\"features15-para\">";
						echo "<h4>\"no question-banks\"</h4>";
						echo "</div></div></a></div>";
					} else {
						$start_num = ($current - 1) * $page_num;
						$end_num = min_of($start_num + $page_num, $result->num_rows);
						for ($i = $start_num; $i < $end_num; $i += 1) {
							$j = $i + 1;
							echo "<div class=\"col-md-6 features15-col-text\">";
							echo "<a class=\"d-flex flex-wrap feature-unit align-items-center\" href='problems.php?bankid=" . $j . "'>";
							echo "<div class=\"col-sm-12 mt-sm-0 mt-4\">";
							echo "<div class=\"features15-para\">";
							$sql = "SELECT bid, name FROM banks WHERE bid=" . $j;
							$result = $conn->query($sql);
							$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
							$str = $row["name"];
							echo "<h4>" . $str . "</h4>";
							echo "</div></div></a></div>";
						}
					}
				?>
			</div>
			<div class="row">
				<?php if ($pages > 7): ?>
					<div class="col-md-auto features15-col-text">
						<a class="d-flex flex-wrap feature-unit align-items-center">
							<div class="col-sm-5 mt-sm-0 mt-4">
								<div>
									<form method='post' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
										<h4>
											<button style="font-size:15px" type="submit" value=1 name="set_current">1
											</button>
										</h4>
									</form>
								</div>
							</div>
						</a>
					</div>
					<div class="col-md-auto features15-col-text">
						<a class="d-flex flex-wrap feature-unit align-items-center">
							<div class="col-sm-5 mt-sm-0 mt-4">
								<div class="features14-para">
									<form method='post' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
										<h4>
											<button style="font-size:15px" type="submit" value=2 name="set_current">2
											</button>
										</h4>
									</form>
								</div>
							</div>
						</a>
					</div>
					<?php if ($current >= 5): ?>
						<div class="col-md-auto features15-col-text">
							<a class="d-flex flex-wrap feature-unit align-items-center">
								<div class="col-sm-5 mt-sm-0 mt-4">
									<div class="features14-para">
										<h4 style="font-size:15px">...</h4>
									</div>
								</div>
							</a>
						</div>
					<?php endif; ?>
					<?php if ($current >= 4 && $current <= $pages - 1): ?>
						<div class="col-md-auto features15-col-text">
							<a class="d-flex flex-wrap feature-unit align-items-center">
								<div class="col-sm-5 mt-sm-0 mt-4">
									<div class="features14-para">
										<form method='post'
										      action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
											<h4>
												<button style="font-size:15px" type="submit"
												        value=<?php $tmp = $current - 1;
													        echo $tmp ?> name="set_current"><?php $tmp = $current - 1;
														echo $tmp ?></button>
											</h4>
										</form>
									</div>
								</div>
							</a>
						</div>
					<?php endif; ?>
					<?php if ($current >= 3 && $current <= $pages - 2): ?>
						<div class="col-md-auto features15-col-text">
							<a class="d-flex flex-wrap feature-unit align-items-center">
								<div class="col-sm-5 mt-sm-0 mt-4">
									<div class="features14-para">
										<form method='post'
										      action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
											<h4>
												<button style="font-size:15px" type="submit"
												        value=<?php echo $current ?> name="set_current"><?php echo $current ?></button>
											</h4>
										</form>
									</div>
								</div>
							</a>
						</div>
					<?php endif; ?>
					<?php if ($current >= 2 && $current <= $pages - 3): ?>
						<div class="col-md-auto features15-col-text">
							<a class="d-flex flex-wrap feature-unit align-items-center">
								<div class="col-sm-5 mt-sm-0 mt-4">
									<div class="features14-para">
										<form method='post'
										      action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
											<h4>
												<button style="font-size:15px" type="submit"
												        value=<?php $tmp = $current + 1;
													        echo $tmp ?> name="set_current"><?php $tmp = $current + 1;
														echo $tmp ?></button>
											</h4>
										</form>
									</div>
								</div>
							</a>
						</div>
					<?php endif; ?>
					<?php if ($current <= $pages - 4): ?>
						<div class="col-md-auto features15-col-text">
							<a class="d-flex flex-wrap feature-unit align-items-center">
								<div class="col-sm-5 mt-sm-0 mt-4">
									<div class="features14-para">
										<h4 style="font-size:15px">...</h4>
									</div>
								</div>
							</a>
						</div>
					<?php endif; ?>
					<div class="col-md-auto features15-col-text">
						<a class="d-flex flex-wrap feature-unit align-items-center">
							<div class="col-sm-5 mt-sm-0 mt-4">
								<div class="features14-para">
									<form method='post' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
										<h4>
											<button style="font-size:15px" type="submit" value=<?php $tmp = $pages - 1;
												echo $tmp ?> name="set_current"><?php $tmp = $pages - 1;
													echo $tmp ?></button>
										</h4>
									</form>
								</div>
							</div>
						</a>
					</div>
					<div class="col-md-auto features15-col-text">
						<a class="d-flex flex-wrap feature-unit align-items-center">
							<div class="col-sm-5 mt-sm-0 mt-4">
								<div class="features14-para">
									<form method='post' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
										<h4>
											<button style="font-size:15px" type="submit"
											        value=<?php echo $pages ?> name="set_current"><?php echo $pages ?></button>
										</h4>
									</form>
								</div>
							</div>
						</a>
					</div>
				<?php else: ?>
					<?php for ($i = 1; $i <= $pages; $i += 1): ?>
						<div class="col-md-auto features15-col-text">
							<a class="d-flex flex-wrap feature-unit align-items-center">
								<div class="col-sm-5 mt-sm-0 mt-4">
									<div class="features14-para">
										<form method='post'
										      action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
											<h4>
												<button style="font-size:15px" type="submit"
												        value=<?php echo $i ?> name="set_current"><?php echo $i ?></button>
											</h4>
										</form>
									</div>
								</div>
							</a>
						</div>
					<?php endfor; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
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
<!-- /move top -->
</section>
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


