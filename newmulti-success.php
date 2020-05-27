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
<?php
$con = mysqli_connect($host, $user, $password, $dbname);
if (!$con) {
                die("Connection failed: " . mysqli_connect_error());
        }	
header('Content-Type:text/html;charset=utf-8');
	if (!isset($_SESSION['uname'])) {
		header('Location: login.php');
	}
        $nameError = "";
if (isset($_POST['text']))
                $text = mysqli_real_escape_string($con, $_POST['text']);
else
	$nameError="未填写题干";
if (isset($_POST['texta'])) 
                $choices = mysqli_real_escape_string($con, $_POST['texta']) . '\n';
else
     $nameError="部分选项未填写";
if (isset($_POST['textb']))

                $choices = $choices . mysqli_real_escape_string($con, $_POST['textb']) . '\n';

else

     $nameError="部分选项未填写";
if (isset($_POST['textc']))

                $choices = $choices . mysqli_real_escape_string($con, $_POST['textc']) . '\n';

else

     $nameError="部分选项未填写";
if (isset($_POST['textd']))

                $choices = $choices . mysqli_real_escape_string($con, $_POST['textd']) . '\n';

else

     $nameError="部分选项未填写";{
			$str2 = "select count(*) from multichoice";
			$result2 = mysqli_query($con, $str2);
			$pass2 = mysqli_fetch_row($result2);
			$pa2 = $pass2[0] + 1;
if (isset($_SESSION['bankid']))
{
$sql_query = "update banks set multichoice=CONCAT(multichoice,'" . $pa2 . ",')WHERE bid='". $_SESSION['bankid'] . "'";
$con->query($sql_query);
unset($_SESSION['bankid']);
}
else
$nameError="未指定题库，或直接刷新此界面";
			{				
$sql_query = "insert into multichoice values(" . $pa2 . ",'" . $text . "','" . $choices ."','".implode($_POST['answer']) .  "')";
	if ($con->query($sql_query) === true) {
if ($nameError == "")
					echo "上传题目成功！";
				} else {
echo $nameError;
					$nameError = "新建失败";
				}
			}
		}
echo $nameError;
?>
          </div>
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
