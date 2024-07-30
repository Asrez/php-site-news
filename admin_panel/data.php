<?php
require "config.php";

$news_result = selectall(" `articles` ");
$setting_result = selectall(" `setting` ");
?>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>جدول ها | کنترل پنل</title>
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
  <!-- DataTables -->
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
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
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php include("header.php"); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        جدول ها
        <small>پیشرفته</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> خانه</a></li>
        <li><a href="#">جدول</a></li>
        <li class="active">پیشرفته</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">جدول اخبار</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover" >
                <thead>
                  
                <tr>
                <th><a href="article_edit.php?action=insert"><button type="button"  class="btn btn-block btn-success btn-sm" >افزودن</button></a> </th>
                  <th>کد خبر</th>
                  <th>نام خبر</th>
                  <th>خلاصه</th>
                  <th>منبع</th>
                  <th>زمان انتشار</th>
                </tr>
                </thead>
                <tbody>
                
                <?php 
                    while($news_row = $news_result->fetch_assoc()) {
                     ?>
                <tr >
                <td>                     <a href="article_edit.php?slug=<?= $news_row['slug']; ?>&action=update"><button type="button" class="btn btn-block btn-warning btn-sm"  >ویرایش</button></a>
                <a href="actions/article_edit_action.php?slug=<?= $news_row['slug'];?>&action=delete" ><button type="button"  class="btn btn-block btn-danger btn-sm"  >حذف</button></a>
                <a href="read-article.php?slug=<?= $news_row['slug']; ?>"><i class="fa fa-eye" title="نمایش مقاله"></i></a>
              </td>
                  <td> <?= $news_row['id']; ?> </td>
                  <td> <?= $news_row['title']; ?> </td>
                  <td> <?= $news_row['summery']; ?> </td>
                  <td> <?= $news_row['source']; ?> </td>
                  <td> <?= $news_row['publicationdate']; ?> </td>
                </tr>
                  
                <?php
                      }
             ?>  
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">جدول  تنظیمات (تبلیغات)</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  
                  <th></th>
                  <th>کد</th>
                  <th>کلید</th>
                  <th>مقدار</th>
                  <th>لینک</th>
                </tr>
                </thead>
                <tbody>
             
                <?php
              
                while($setting_row = $setting_result->fetch_assoc()) {
                ?>
                <tr>
                  <td><a class="fa fa-trash" href="actions/setting_edit_action.php?id=<?= $setting_row['id'];?>&action=delete" title="حذف"></a>
                <a class="fa fa-fw fa-cloud-download" href="setting_edit.php?id=<?= $setting_row['id'];?>&action=update" title="ویرایش"></a>
                </td>
                  
                  <td><?= $setting_row['id'];?></td>
                  <td><?php
                  switch ($setting_row['id']) {
                    case '1':
                      echo "عکس تبلیغ بخش هدر سایت ";
                      break;
                    case '2':
                      echo " عکس تبلیغ میانی بالا";
                      break;
                    case '3':
                      echo " عکس تبلیغ میانی پایین";
                      break;
                    case '4':
                      echo " عکس تبلیغ اول سمت چپ ";
                      break;
                    case '5':
                      echo " عکس تبلیغ دوم سمت چپ ";
                      break;
                    case '6':
                      echo " عکس تبلیغ سوم سمت چپ ";
                      break;
                    case '7':
                      echo "عکس لوگو سایت (قسمت هدر) ";
                      break;
                    case '8':
                      echo " عکس تبلیغ اول سمت راست ";
                      break;
                      case '9':
                        echo " عکس تبلیغ دوم سمت راست";
                        break;
                      case '10':
                        echo " عکس تبلیغ سوم سمت راست ";
                        break;
                      case '11':
                        echo " عکس تبلیغ چهارم سمت راست ";
                        break;
                      case '12':
                        echo "اینستاگرام";
                        break;
                      case '13':
                        echo "تلگرام";
                        break;
                      case '14':
                        echo "توییتر";
                        break;
                      case '15':
                        echo "فیسبوک";
                        break;
                  }
                  ?></td>
                  <td><?= $setting_row['value_setting'];?> </td>
                  <td><?= $setting_row['link'];?> </td>
                </tr>
                <?php } ?>
              
                </tbody>
               
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include("footer.php"); ?>

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
