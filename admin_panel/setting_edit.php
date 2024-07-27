<?php
require "config.php" ;
if (isset($_GET['id'])){
$id=$_GET['id'];                 
$sql_select="SELECT * FROM `setting` WHERE `id` = ? ;";
$query_select=$link->prepare($sql_select);
$query_select->bind_param("i",$id);
$query_select->execute();
$result_select= $query_select->get_result();
$row_select=$result_select->fetch_assoc();
}         
else{
  ?>
  <script>
    location.replace("404.html");
  </script>
  <?php
  exit();
}  
                 ?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>فرم عمومی | کنترل پنل</title>
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
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <?php include("header.php"); ?>
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
     <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">  تنظیمات</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               
              <form role="form" method="post" action="actions/setting_edit_action.php?id=<?= $id; ?>&action=update" enctype="multipart/form-data">
                <!-- text input -->
                <div class="form-group">
                  <label>کلید</label>
                  <input type="text" class="form-control" placeholder="کلید" name="key_setting" id="key_setting" value="<?= $row_select['key_setting']; ?>" disabled>
                </div>
                <div class="form-group">
                  <label>مقدار</label>
                   <input type="file" class="form-control" placeholder="مقدار" name="image" id="image" >
                </div>
                <div class="form-group">
                  <label>لینک</label>
                   <input type="text" class="form-control" placeholder="لینک" name="qlink" id="qlink" value="<?= $row_select['link']; ?>">
                 
                </div>
                <button type="submit" name="btn">تایید</button>
              </form>
              
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
<?php include("footer.php"); ?>
<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
