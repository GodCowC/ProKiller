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
			
			<input type="text" placeholder="&#xf007;  username" id="txt_uname" name="txt_uname"/> <input type="password"
			                                                                                             placeholder="&#xf023;  password"
			                                                                                             id="txt_uname"
			                                                                                             name="txt_pwd"/>
			
			<button class="btn form-control btn-primary" type="submit" name="but_submit" id="but_submit">登录</button>
			<p class="message"></p>
		</form>
		<br/>
		<form class="login-form">
			<a href="signup.php" class="btn btn-primary btn-theme">注册</a>
		</form>
	</div>
</div>

</body>
</html>
