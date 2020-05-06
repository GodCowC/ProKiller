<!doctype HTML>
<html lang="en" >
<head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" type="text/css" href="login_style.css">
    <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    <link href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900&display=swap" rel="stylesheet">
</head>

<body class="body">
<?php include 'navgen.php'; ?>
注册成功！<br/>
5秒后返回登录界面<br/>
你也可以直接点击回到<a href="login.php">登录页面</a>
<script type="text/javascript">
    setTimeout("ren()",5000);
    function ren()
    {
        window.location="login.php";
    }

</script>
</body>
</html>
