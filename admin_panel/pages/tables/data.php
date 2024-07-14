<?php $page2=true; ?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>جدول ها | کنترل پنل</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../dist/css/bootstrap-theme.css">
  <!-- Bootstrap rtl -->
  <link rel="stylesheet" href="../../dist/css/rtl.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">

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

<?php include("../../header.php"); ?>
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
                <th><a href="article_edit.php? action=insert"><button type="button"  class="btn btn-block btn-success btn-sm" >افزودن</button></a> </th>
                  <th>کد خبر</th>
                  <th>نام خبر</th>
                  <th>خلاصه</th>
                  <th>متن کل</th>
                  <th>منبع</th>
                  <th>زمان انتشار</th>
                </tr>
                </thead>
                <tbody>
                
                <?php 
                    $news_query="SELECT * FROM articles ";
                    $news_result=mysqli_query($link,$news_query);
                    while($news_row=mysqli_fetch_array($news_result)){
                     ?>
                <tr>
                <td>                     <a href="article_edit.php?slug=<?php echo $news_row['slug'];?> & action=update"><button type="button" class="btn btn-block btn-warning btn-sm"  >ویرایش</button></a>
                <a href="article_edit_action.php?slug=<?php echo $news_row['slug'];?>& action=delete" ><button type="button"  class="btn btn-block btn-danger btn-sm"  >حذف</button></a>
              </td>
                  <td> <?php echo $news_row['id']; ?> </td>
                  <td> <?php echo $news_row['title']; ?> </td>
                  <td> <?php echo $news_row['summery']; ?> </td>
                  <td> <?php echo $news_row['content']; ?> </td>
                  <td> <?php echo $news_row['source']; ?> </td>
                  <td> <?php echo $news_row['publicationdate']; ?> </td>
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
                </tr>
                </thead>
                <tbody>
             
                <?php
                $setting_query="SELECT * FROM setting ";
                $setting_result=mysqli_query($link,$setting_query);
                while($setting_row=mysqli_fetch_array($setting_result)){
                ?>
                <tr><td>                     <a href="setting_edit.php?id=<?php echo $setting_row['id'];?>"><button type="button" class="btn btn-block btn-warning btn-sm"  >ویرایش</button></a>
                    </td>
                  <td><?php echo $setting_row['id'];?></td>
                  <td><?php echo $setting_row['key_setting'];?> </td>
                  <td><?php echo $setting_row['value_setting'];?> </td>
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
  <?php include("../../footer.php"); ?>

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
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
