<?php
	include "config.php";
	header('Content-Type:text/html;charset=utf-8');
	$con = $conn;
	if (isset($_POST['creat'])) {
		$uname = mysqli_real_escape_string($con, $_POST['txt_uname']);
		$password = mysqli_real_escape_string($con, $_POST['txt_pwd']);
		$password_repeat = mysqli_real_escape_string($con, $_POST['txt_pwd_repeat']);
		if ($uname == "" || $password == "" || $password_repeat == "")//判断是否填写
		{
			echo "<script type=" . "\"" . "text/javascript" . "\"" . ">" . "window.alert" . "(" . "\"" . "请填写完成！" . "\"" . ")" . ";" . "</script>";
			echo "<script type=" . "\"" . "text/javascript" . "\"" . ">" . "window.location=" . "\"" . "signup.php" . "\"" . "</script>";
			exit;
		}
		if ($password_repeat == $password) {
			$str = "select count(*) from users where username='" . $uname . "' ";
			$result = mysqli_query($con, $str);
			$pass = mysqli_fetch_row($result);
			$pa = $pass[0];
			if ($pa == 1)//判断数据库表中是否已存在该用户名
			{
				echo "<script type=" . "\"" . "text/javascript" . "\"" . ">" . "window.alert" . "(" . "\"" . "该用户名已被注册" . "\"" . ")" . ";" . "</script>";
				echo "<script type=" . "\"" . "text/javascript" . "\"" . ">" . "window.location=" . "\"" . "signup.php" . "\"" . "</script>";
				exit;
			}
			$sql_query = "insert into users values('" . $uname . "','" . $password . "')";
			mysqli_query($con, $sql_query);
			$close = mysqli_close($con);
			if ($close) {
				//echo"数据库关闭";
				//echo"注册成功！";
				echo "<script type=" . "\"" . "text/javascript" . "\"" . ">" . "window.location=" . "\"" . "creat-success.php" . "\"" . "</script>";
			} else {
				echo "<script type=" . "\"" . "text/javascript" . "\"" . ">" . "window.alert" . "(" . "\"" . "密码不一致！" . "\"" . ")" . ";" . "</script>";
				echo "<script type=" . "\"" . "text/javascript" . "\"" . ">" . "window.location=" . "\"" . "signup.php" . "\"" . "</script>";
			}
		} else {
			echo "<script type=" . "\"" . "text/javascript" . "\"" . ">" . "window.alert" . "(" . "\"" . "密码错误" . "\"" . ")" . ";" . "</script>";
			echo "<script type=" . "\"" . "text/javascript" . "\"" . ">" . "window.location=" . "\"" . "signup.php" . "\"" . "</script>";
			exit;
		}
	}
?>
<!doctype HTML>
<html lang="en">
<head>
	<title>Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link rel="stylesheet" type="text/css" href="assets/css/login_style.css">
	<link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
	<link href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet">
	<link href="http://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900&display=swap"
	      rel="stylesheet">
</head>

<body class="body">
<?php include 'navgen.php'; ?>
<div class="login-page">
	<div class="form">
		
		<form method="post" action="">
			
			<input type="text" placeholder="&#xf007;  用户名" id="txt_uname" name="txt_uname"/> <input type="password"
			                                                                                        placeholder="&#xf023;  密码"
			                                                                                        id="txt_uname"
			                                                                                        name="txt_pwd"/>
			<input type="password" placeholder="&#xf023;  重复密码" id="txt_uname" name="txt_pwd_repeat"/>
			<button class="btn form-control btn-primary" type="submit" name="creat" id="creat">注册</button>
			<p class="message"></p>
		</form>
	
	
	</div>
</div>

</body>
</html>
