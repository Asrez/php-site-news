<?php
require "config.php";
if(isset($_POST['btn'])){
  $pass=$_POST['password'];
  $user=$_SESSION['username'];
  $passtrue_sql="SELECT * FROM `admins` WHERE `username` = ? AND `password` = ? ;";
  $passtrue=$link->prepare($passtrue_sql);
  $passtrue->bind_param("ss",$user, $pass);
  $passtrue->execute();
  $result=$passtrue->get_result();
  $row=$result->fetch_assoc();
  if($row){
    ?>
    <script type='text/javascript'> window.alert('خوش آمدید ');
location.replace('profile.php');
</script>
    <?php
  }
  else{
    ?>
    <script type='text/javascript'> window.alert('اشتباه است');
</script>
    <?php
  }
}
?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>قفل صفحه | کنترل پنل</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="dist/css/bootstrap-theme.css">
  <!-- Bootstrap rtl -->
  <link rel="stylesheet" href="dist/css/rtl.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition lockscreen">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    <a href="index.php"><b>کنترل پنل مدیریت</b></a>
  </div>
  <!-- User name -->
  <div class="lockscreen-name"> <?php if(isset($_SESSION["state_login"]) && $_SESSION["state_login"]===true){
  echo $_SESSION["name"];
} ?>
</div>

  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen image -->
    <div class="lockscreen-image">
      <img src='dist/img/<?php if(isset($_SESSION["state_login"]) && $_SESSION["state_login"]===true){
  echo $_SESSION["admin_image"];
} ?>' alt="User Image">
    </div>
    <!-- /.lockscreen-image -->

    <!-- lockscreen credentials (contains the form) -->
    <form class="lockscreen-credentials" method="post" action="lockscreen.php">
      <div class="input-group">
        <input type="password" class="form-control" placeholder="رمز عبور" name="password">

        <div class="input-group-btn">
          <button type="submit" class="btn" name="btn"><i class="fa fa-arrow-right text-muted"></i></button>
        </div>
      </div>
    </form>

    <!-- /.lockscreen credentials -->

  </div>
  <!-- /.lockscreen-item -->
  <div class="help-block text-center">
    برای ورود مجدد رمز عبور خود را وارد کنید
  </div>
  <div class="text-center">
    <a href="login.php">و یا با یک یوزرنیم دیگر وارد شوید</a>
  </div>
  <div class="lockscreen-footer text-center">
    <b>Copyleft &copy; 2014-2017 <a href="https://netparadis.com">NetParadis</a></b>
  </div>
</div>
<!-- /.center -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
