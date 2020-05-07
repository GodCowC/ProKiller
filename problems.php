<!doctype html>
<?php include "config.php"; ?>
<html>
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="题库概览" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<title>题库概览</title>
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
						$sql = "SELECT bid, name, onechoice, multichoice, fillblank FROM banks WHERE bid=" . $bankid;
						$result = $conn->query($sql);
						$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
						echo $row["name"];
						$conn->close(); ?></h3> </p>
			</div>
			<div class="row">
				<p>
				<h3>单项选择题：</h3>
				<table class="table table-bordered" align="center" style="table-layout:fixed">
					<tbody>
					<?php
						global $bankid;
						$servername = "localhost";
						$username = "root";
						$password = "changke0328";
						$dbname = "banks";
						// 创建连接
						$conn = new mysqli($servername, $username, $password, $dbname);
						$sql = "SELECT bid, name, onechoice, multichoice, fillblank FROM banks WHERE bid=" . $bankid;
						$result = $conn->query($sql);
						$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
						$str = $row["onechoice"];
						$tok = strtok($str, ",");
						$cnt = 0;
						echo "<tr>";
						while ($tok != false) {
							$cnt++;
							echo "<td><a href = onechoice.php?pid=" . $tok . " class=\"btn btn-dark\">" . $cnt . "</a></td>";
							$tok = strtok(",");
							if ($cnt % 10 == 0 && $tok == true) {
								echo "</tr><tr>";
							}
						}
						if ($cnt > 0) {
							while ($cnt % 10 != 0) {
								$cnt++;
								echo "<td></td>";
							}
						} else {
							echo "<td>该题库下没有单项选择题哦~</td>";
						}
						echo "</tr>";
						$conn->close();
					?>
					</tbody>
				</table>
				</p>
			</div>
			<div class="row">
				<p>
				<h3>多项选择题：</h3>
				<table class="table table-bordered" align="center" style="table-layout:fixed">
					<tbody>
					<?php
						global $bankid;
						$servername = "localhost";
						$username = "root";
						$password = "changke0328";
						$dbname = "banks";
						// 创建连接
						$conn = new mysqli($servername, $username, $password, $dbname);
						$sql = "SELECT bid, name, onechoice, multichoice, fillblank FROM banks WHERE bid=" . $bankid;
						$result = $conn->query($sql);
						$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
						$str = $row["multichoice"];
						$tok = strtok($str, ",");
						$cnt = 0;
						echo "<tr>";
						while ($tok != false) {
							$cnt++;
							echo "<td><a href = multichoice.php?pid=" . $tok . " class=\"btn btn-primary btn-theme\">" . $cnt . "</a></td>";
							$tok = strtok(" ");
							if ($cnt % 10 == 0 && $tok == true) {
								echo "</tr><tr>";
							}
						}
						if ($cnt > 0) {
							while ($cnt % 10 != 0) {
								$cnt++;
								echo "<td></td>";
							}
						} else {
							echo "<td>该题库下没有多项选择题哦~</td>";
						}
						echo "</tr>";
						$conn->close();
					?>
					</tbody>
				</table>
				</p>
			</div>
			<div class="row">
				<p>
				<h3>填空题：</h3>
				<table class="table table-bordered" align="center" style="table-layout:fixed">
					<tbody>
					<?php
						global $bankid;
						$servername = "localhost";
						$username = "root";
						$password = "changke0328";
						$dbname = "banks";
						// 创建连接
						$conn = new mysqli($servername, $username, $password, $dbname);
						$sql = "SELECT bid, name, onechoice, multichoice, fillblank FROM banks WHERE bid=" . $bankid;
						$result = $conn->query($sql);
						$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
						$str = $row["fillblank"];
						$tok = strtok($str, ",");
						$cnt = 0;
						echo "<tr>";
						while ($tok != false) {
							$cnt++;
							echo "<td><a href = fillblank.php?pid=" . $tok . " class=\"btn btn-primary btn-theme\">" . $cnt . "</a></td>";
							$tok = strtok(" ");
							if ($cnt % 10 == 0 && $tok == true) {
								echo "</tr><tr>";
							}
						}
						if ($cnt > 0) {
							while ($cnt % 10 != 0) {
								$cnt++;
								echo "<td></td>";
							}
						} else {
							echo "<td>该题库下没有填空题哦~</td>";
						}
						echo "</tr>";
						$conn->close();
					?>
					</tbody>
				</table>
				</p>
			</div>
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
