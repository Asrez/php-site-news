<?php
define("LOAD", "");

require "config.php";

$footer=get_tables_with_where(" `setting` ","WHERE `key_setting` = 'footer' ");
$footer_row=$footer->fetch-assoc();

if(isset($_POST['btn'])) {
  $pass = $_POST['password'];
  $user = $_SESSION['username'];
  $passtrue_sql = "SELECT * FROM `admins` WHERE `username` = ? AND `password` = ?;";
  $passtrue = $link->prepare($passtrue_sql);
  $passtrue->bind_param("ss",$user, $pass);
  $passtrue->execute();
  $result = $passtrue->get_result();
  $row = $result->fetch_assoc();
  if($row) {
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
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="dist/css/bootstrap-theme.css">
  <link rel="stylesheet" href="dist/css/rtl.css">
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.css">
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition lockscreen">
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    <a href="index.php"><b>کنترل پنل مدیریت</b></a>
  </div>
  <div class="lockscreen-name"> <?php if(isset($_SESSION["state_login"]) && $_SESSION["state_login"]===true) {
  echo $_SESSION["name"];
} ?>
</div>
  <div class="lockscreen-item">
    <div class="lockscreen-image">
      <img src='dist/img/<?php if(isset($_SESSION["state_login"]) && $_SESSION["state_login"]===true) {
  echo $_SESSION["admin_image"];
} ?>' alt="User Image">
    </div>
    <form class="lockscreen-credentials" method="post" action="lockscreen.php">
      <div class="input-group">
        <input type="password" class="form-control" placeholder="رمز عبور" name="password">

        <div class="input-group-btn">
          <button type="submit" class="btn" name="btn"><i class="fa fa-arrow-right text-muted"></i></button>
        </div>
      </div>
    </form>
  </div>
  <div class="help-block text-center">
    برای ورود مجدد رمز عبور خود را وارد کنید
  </div>
  <div class="text-center">
    <a href="login.php">و یا با یک یوزرنیم دیگر وارد شوید</a>
  </div>
  <div class="lockscreen-footer text-center">
    <b>Copyright &copy; 2024 <a href="<?= $footer_row['link'] ?>"><?= $footer_row['value_setting'] ?></a></b>
  </div>
</div>
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
