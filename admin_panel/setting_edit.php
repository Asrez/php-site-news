<?php
define("LOAD", "");

require "config.php";

if (isset($_GET['id'])) {
$id = $_GET['id'];                 
$row_select=setting($id);
}         
else header("Location: 404.php");
                 ?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>فرم عمومی | کنترل پنل</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="dist/css/bootstrap-theme.css">
  <link rel="stylesheet" href="dist/css/rtl.css">
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.css">
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <?php include("header.php"); ?>
<div class="wrapper">
  <div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">  تنظیمات</h3>
            </div>
            <div class="box-body">
               
              <form role="form" method="post" action="actions/setting_edit_action.php?id=<?= $id ?>&action=update" enctype="multipart/form-data">
                <div class="form-group">
                  <label>کلید</label>
                  <input type="text" class="form-control" placeholder="کلید" name="key_setting" id="key_setting" value="<?= $row_select['key_setting'] ?>" disabled>
                </div>
                <div class="form-group">
                  <label>مقدار</label>
                   <input type="file" class="form-control" placeholder="مقدار" name="image" id="image" >
                </div>
                <div class="form-group">
                  <label>لینک</label>
                   <input type="text" class="form-control" placeholder="لینک" name="qlink" id="qlink" value="<?= $row_select['link'] ?>">
                </div>
                <button type="submit" name="btn">تایید</button>
              </form>
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
