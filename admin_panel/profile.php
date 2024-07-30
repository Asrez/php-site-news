<?php  
define("LOAD", "");

require "config.php";

if(isset($_SESSION["state_login"]) && $_SESSION["state_login"]===true)
{
$adminn_id = $_SESSION["admin_id"];
$row_count_article = get_count_tables(" `articles` ","WHERE `admin_id`='$adminn_id'");
}
else{
  header("Location: 404.php");
  exit;
}
$result__article = get_tables_with_where(" `articles` ","WHERE `admin_id`='$adminn_id'");

$result = get_tables_with_where(" `admins` ","WHERE `id`='$adminn_id'");
$row = $result->fetch_assoc();
 ?>
<!doctype html>
<html dir="rtl" lang="fa_IR">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>پروفایل | کنترل پنل</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="dist/css/bootstrap-theme.css">
  <link rel="stylesheet" href="dist/css/rtl.css">
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.css">
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php include("header.php"); ?>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        پروفایل کاربری
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> خانه</a></li>
        <li><a href="#">مثال ها</a></li>
        <li class="active"> پروفایل</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="dist/img/<?= $_SESSION["admin_image"] ?>" alt="User profile picture">
              <h3 class="profile-username text-center"><?= $_SESSION["name"] ?></h3>
              <p class="text-muted text-center"> <?= $_SESSION["username"] ?></p>
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b> تعداد مقالات ثبت شده</b>
                   <a class="pull-left"><?= $row_count_article['count'] ?></a>
               </li>
              </ul>
              </div>
          </div>
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">فعالیت ها</a></li>
              <li><a href="#settings" data-toggle="tab">تنظیمات</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
              <?php  while($row__article = $result__article->fetch_assoc()) { ?>
                <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="dist/img/<?= $_SESSION["admin_image"] ?>" alt="user image">
                        <span class="username">
                          <a href="#"> <?= $_SESSION["username"] ?></a>
                          <a href="#" class="pull-left btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                    <span class="description"></span>
                  </div>
                  <p>
                  <?= $row__article['summery'] ?>
                  </p>
                </div>
                <?php } ?>
              </div>
              <div class="tab-pane" id="settings">
                <form class="form-horizontal" action="actions/action_profil.php" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">نام</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" name="name" placeholder="نام" value="<?= $row['name'] ?>">
                    </div>
                  </div>
                    <div class="form-group">
                    <label for="password" class="col-sm-2 control-label">پسورد</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="password" name="password" placeholder="پسورد" value="<?= $row['password'] ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="username" class="col-sm-2 control-label">نام کاربری</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="username" name="username" placeholder="نام کاربری" value="<?= $row['username'] ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="image" class="col-sm-2 control-label">تصویر </label>
                    <div class="col-sm-10">
                      <input type="file" class="form-control" id="image" name="image" placeholder="تصویر " value="<?= $row['image'] ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger" name="subbtn">ارسال</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <?php include("footer.php"); ?>
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/demo.js"></script>
</body>
</html>
