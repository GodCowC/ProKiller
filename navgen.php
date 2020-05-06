<?php
session_start();
echo '<div class="w3l-bootstrap-header fixed-top">

	<nav class="navbar navbar-expand-lg navbar-light p-2">

    <div class="container">

      <a class="navbar-brand" href="home.php">还没起名字QAQ</a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"

        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

        <span class="navbar-toggler-icon"></span>

      </button>



      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav mr-auto">

          <li class="nav-item active">

            <a class="nav-link" href="home.php">主页</a>

          </li>

          <li class="nav-item">

            <a class="nav-link" href="question-bank.php">题库</a>

          </li>

          <li class="nav-item">

            <a class="nav-link" href="exam.php">考试</a>

          </li>

        </ul>';

if (isset($_SESSION['uname']))

	{

		echo '<div class="form-inline">

		<label>欢迎您，' . $_SESSION['uname'] . '！&nbsp;&nbsp;  </label>

          <a href="profile.php" class="btn btn-outline-primary mr-2 btn-demo">个人中心</a>

            <a href="logout.php" class="btn btn-primary btn-theme">退出登录</a>

        </div>';

	}

	else

	{

		echo '<div class="form-inline">

          <a href="login.php" class="login mr-4">登录</a>

            <a href="signup.php" class="btn btn-primary btn-theme">注册</a>

        </div>';

	}

        

    echo  '</div>

    </div>

  </nav>

	  </div>';?>
