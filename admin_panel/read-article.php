<?php
define("LOAD", "");

require "config.php";

if(isset($_GET['slug'])) {
  $slug = $_GET['slug'];

}
else
{
  header("Location: 404.php");
  exit();
}

$row = get_article_with_slug($slug);
?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ایمیل ها | کنترل پنل</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="dist/css/bootstrap-theme.css">
  <link rel="stylesheet" href="dist/css/rtl.css">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.css">
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include("header.php"); ?>
  <div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-body no-padding">
              <div class="mailbox-read-info">
                <h3><?= $row['title'] ?></h3>
                  <span class="mailbox-read-time pull-left"><?= $row['publicationdate'] ?></span>
              </div>
              <div class="mailbox-read-message">
                <p><?= $row['summery'] ?></p>
                <p><?= $row['content'] ?></p>
              </div>
            </div>
            <div class="box-footer">
              <ul class="mailbox-attachments clearfix">
                <li>
                  <img src="../image/<?= $row['image'] ?>" alt="Attachment">
                </li>
              </ul>
            </div>
          </div>
          </div></div>
      </div>
    </section>

  <?php include("footer.php"); ?>
  </div>
  </div>

<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/demo.js"></script>
</body>
</html>
