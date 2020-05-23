<?php
	include "config.php";
$con = mysqli_connect($host, $user, $password, $dbname);
// Check connection
        if (!$con) {
                die("Connection failed: " . mysqli_connect_error());
        }	
header('Content-Type:text/html;charset=utf-8');
	if (!isset($_SESSION['uname'])) {
		header('Location: login.php');
	}
	$nameError = "";
	if (isset($_POST['qb_name'])) {
		$qb_name = mysqli_real_escape_string($con, $_POST['qb_name']);
		if (qb_name == "") {
			$nameError = "题库名不能为空";
		} else {
			$str = "select count(*) from banks where name='" . $qb_name . "' ";
			$result = mysqli_query($con, $str);
			$pass = mysqli_fetch_row($result);
			$pa = $pass[0];
			$str2 = "select count(*) from banks";
			$result2 = mysqli_query($con, $str2);
			$pass2 = mysqli_fetch_row($result2);
			$pa2 = $pass2[0] + 1;
			if ($pa > 0) {
				$nameError = "题库名重复";
			} else {
				$sql_query = "insert into banks values(" . $pa2 . ",'" . $qb_name . " ',0,0,0,'". $_SESSION['uname'] ."', 0)";
				if ($con->query($sql_query) === true) {
					echo "<script type=" . "\"" . "text/javascript" . "\"" . ">" . "window.location=" . "\"" . "createqb-success.php" . "\"" . "</script>";
				} else {
					$nameError = "新建失败";
				}
			}
		}
	}
?>

<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Contact</title>
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
<!-- contacts -->
<section class="w3l-contact mt-5">
    <div class="contacts-9 py-5 mt-5">
        <div class="container py-lg-3">
            <div class="row top-map">
                <div class="cont-details col-md-5">
                    <div class="heading mb-lg-4 mb-4">
                        <h3 class="head">创建题库</h3>
                    </div>
                    <p><a>请在右侧填写题库信息</a></p>
                </div>
                <div class="map-content-9 col-md-7 mt-5 mt-md-0">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label class="contact-textfield-label" for="w3lSubject">题库名</label>
                            <input type="text" class="form-control" name="qb_name" id="w3lSubject" placeholder=""
                                   required="">
                            <span class="error"><?php echo $nameError; ?></span>
                        </div>
                        <button type="submit" class="btn btn-primary btn-contact">创建</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="map">
        <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387193.3059445135!2d-74.25986613799748!3d40.69714941774136!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m3!3e3!4m0!4m0!5e0!3m2!1sen!2sin!4v1570181661801!5m2!1sen!2sin"
                allowfullscreen=""></iframe>
    </div>
</section>
<!-- //contacts -->
<!-- footer-28 block -->
<section class="w3l-market-footer">
    <footer class="footer-28">
        <div class="footer-bg-layer">
            <div class="container py-lg-3">
                <div class="row footer-top-28">
                    <div class="col-md-6 footer-list-28 mt-5">
                        <h6 class="footer-title-28">Contact information</h6>
                        <ul>
                            <li>
                                <p><strong>Address</strong> : #135 block, Barnard St. Brooklyn, NY 10036, USA</p>
                            </li>
                            <li>
                                <p><strong>Phone</strong> : <a href="tel:+404-11-22-89">+404-11-22-89</a></p>
                            </li>
                            <li>
                                <p><strong>Email</strong> : <a href="mailto:example@mail.com">example@mail.com</a></p>
                            </li>
                        </ul>

                        <div class="main-social-footer-28 mt-3">
                            <ul class="social-icons">
                                <li class="facebook">
                                    <a href="#link" title="Facebook">
                                        <span class="fa fa-facebook" aria-hidden="true"></span>
                                    </a>
                                </li>
                                <li class="twitter">
                                    <a href="#link" title="Twitter">
                                        <span class="fa fa-twitter" aria-hidden="true"></span>
                                    </a>
                                </li>
                                <li class="dribbble">
                                    <a href="#link" title="Dribbble">
                                        <span class="fa fa-dribbble" aria-hidden="true"></span>
                                    </a>
                                </li>
                                <li class="google">
                                    <a href="#link" title="Google">
                                        <span class="fa fa-google" aria-hidden="true"></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-4 footer-list-28 mt-5">
                                <h6 class="footer-title-28">Company</h6>
                                <ul>
                                    <li><a href="about.html">About</a></li>
                                    <li><a href="#blog.html">Blog Posts</a></li>
                                    <li><a href="#pricing.html">FAQ</a></li>
                                    <li><a href="#pricing.html">Pricing</a></li>
                                </ul>
                            </div>
                            <div class="col-md-4 footer-list-28 mt-5">
                                <h6 class="footer-title-28">Support</h6>
                                <ul>
                                    <li><a href="contact.html">Contact Us</a></li>
                                    <li><a href="#signup.html">Create account</a></li>
                                    <li><a href="#learn.html">Learning Center</a></li>
                                    <li><a href="#career.html">Team</a></li>
                                </ul>
                            </div>
                            <div class="col-md-4 footer-list-28 mt-5">
                                <h6 class="footer-title-28">Product</h6>
                                <ul>
                                    <li><a href="#URL">Market</a></li>
                                    <li><a href="#URL">VIP</a></li>
                                    <li><a href="#URL">Resources</a></li>
                                    <li><a href="#URL">Sale</a></li>
                                    <li><a href="#URL">Admin UI</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="midd-footer-28 align-center py-lg-4 py-3 mt-5">
                <div class="container">
                    <p class="copy-footer-28 text-center">Copyright &copy; 2020.Company name All rights reserved.<a
                                target="_blank" href="http://sc.chinaz.com/moban/">&#x7F51;&#x9875;&#x6A21;&#x677F;</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>

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
