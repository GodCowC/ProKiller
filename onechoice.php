<!doctype html>
<?php include 'config.php'; ?>
<html>
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="单项选择题" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<title>单项选择题</title>
	<!-- web fonts -->
	<link href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet">
	<link href="http://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900&display=swap"
	      rel="stylesheet">
	<!-- //web fonts -->
	<!-- Template CSS -->
	<link rel="stylesheet" href="assets/css/style-starter.css">
	<script src="assets/js/jquery-3.3.1.min.js" type="text/javascript"></script>
	<?php
		global $bankid, $pcnt, $pid, $totalcnt;
if (!isset($_GET["bankid"]) || !isset($_GET["pid"]))
	if (!isset($_POST["answer"]))
		echo "<script>history.back();</script>";
                $bankid = 1;
		$pcnt = 1;
$pid = 1;
		if (isset($_GET["bankid"]))
			$bankid = $_GET["bankid"]; 
                if (isset($_GET["pid"]))
                        $pcnt = $_GET["pid"];
                $str = "SELECT bid, onechoice FROM banks WHERE bid=" . $bankid;
                $result = $conn->query($str);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                $str = $row["onechoice"];
                $tok = strtok($str, ",");
while ($tok != false) {
							$cnt++;
														if ($cnt == $pcnt){
								$pid = $tok;}$tok = strtok(",");
							}
$totalcnt = $cnt;
?>
<?php

if (isset($_POST['answer']))

{

    global $bankid, $pid, $pcnt;

    $bankid = $_SESSION['bid'];

    unset($_SESSION['bid']);

    $pid = $_SESSION['pid'];



    unset($_SESSION['pid']);

    $pcnt = $_SESSION['pcnt'];



    unset($_SESSION['pcnt']);

}

	?></head>
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
				<p><h5>这是一道单项选择题，在下列选项中，有且仅有一个是正确答案。</h5>
			</div>
			<div class="row py-md-1">
				<?php
					global $bankid, $pcnt, $pid;
					$sql = "SELECT pid, text, choices, answer FROM onechoice WHERE pid=" . $pid;
					$result = $conn->query($sql);
					$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
					$str = $row["text"];
					echo $pcnt . ". " . $str;
					echo "</div>";
					$str = $row["choices"];
					$tok = strtok($str, "\n");
					$cnt = 0;
if (!isset($_SESSION))
session_start();
$_SESSION['pid'] = $pid;
$_SESSION['bid'] = $bankid;
$_SESSION['pcnt'] = $pcnt;
					echo '<form method="post" action="onechoice.php"><table><tbody>';
					while ($tok != false) {
						$cnt = $cnt + 1;
						echo '<tr><td><input name="answer" type="radio" class="py-md-1" value="' . chr(64 + $cnt) . '" /></td><td>' . chr($cnt + 64) . ". " . $tok . "</td></tr>";
						$tok = strtok("\n");
					}
					echo "</tbody></table>";
					echo '<div class="row py-md-2"><input type="submit" value="提交答案" class="btn btn-primary btn-theme"></div>';
					echo '</form>';
			
				?>
				</p>
				<div class="row py-md-2" id="show">
<?php if (isset($_POST['answer']))
{
    global $pid;
     $sql = "SELECT pid, answer FROM onechoice WHERE pid=" . $pid;

                                        $result = $conn->query($sql);

                                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$ans = $_POST['answer'];
$correct =$row['answer'];
if ($ans == $correct)
    echo "恭喜您，回答正确";
else 
    echo "回答错误，答案为" . $correct . "，而您选了" . $ans;
}
?></div>
<div class="row"><?php global $bankid, $pcnt; if (isset($_POST['answer']) && $pcnt > 1) echo "<a href=onechoice.php?bankid=".$bankid."&pid=".($pcnt-1)." class=\"btn btn-success\">上一题</a>";?><?php global $bankid, $pcnt, $totalcnt; 
$str = "SELECT bid, onechoice FROM banks WHERE bid=" . $bankid;

                $result = $conn->query($str);

$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                $str = $row["onechoice"];
$tok = strtok($str, ",");
$cnt = 0;
while ($tok != false) {

                                                        $cnt++;

                                                        $tok = strtok(",");

                                                        }
if (isset($_POST['answer']) && $pcnt < $cnt) echo "<a href=onechoice.php?bankid=".$bankid."&pid=".($pcnt+1)." class=\"btn btn-success\">下一题</a>";?></div>
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
