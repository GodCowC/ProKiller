
<!doctype html>
<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="单项选择题" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>单项选择题</title>
    <!-- web fonts -->
    <link href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900&display=swap" rel="stylesheet">
    <!-- //web fonts -->
    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style-starter.css">
	 <script src="assets/js/jquery-3.3.1.min.js" type="text/javascript"></script>
	  <?php 
				global $pid;
				$pid = 1;
				if (isset($_GET["pid"]))
					$pid = $_GET["pid"];?>
<?php
function judge() {
}    
?>  
</head>
<script type="text/javascript"

src="http://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML">

</script>

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
	  	global $pid;
				$servername = "localhost";
$username = "root";
$password = "changke0328";$dbname = "problems";
 
// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "SELECT pid, text, choices, answer FROM onechoice WHERE pid=" . $pid;
$result = $conn->query($sql);
				$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	  $str = $row["text"];
			  echo $str;
echo "</div>";
          $str = $row["choices"];
$tok = strtok($str, "\n");
$cnt = 0;
echo '<form action=" "><table><tbody>';
while ($tok != false)
{
    $cnt = $cnt + 1;
    echo '<tr><td><input name="answer" type="radio" class="py-md-1" value="'. $cnt . '" /></td><td>' . chr($cnt + 64) . ". " . $tok . "</td></tr>";
    $tok = strtok("\n");
}
echo "</tbody></table>";
echo '<div class="row py-md-2"><input type="submit" value="提交答案" class="btn btn-primary btn-theme"></div>';
echo '</form>';
	  
$conn->close();
	  ?>
  </p>
	<div class="row py-md-2" id="show"></div>	
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
