<?php $page2=true; ?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>جدول ساده | کنترل پنل</title>
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
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <?php include("../../header.php") ;?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        جدول ها
        <small>ساده</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> خانه</a></li>
        <li><a href="#">جدول</a></li>
        <li class="active">ساده</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">ادمین ها</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <td><a href="admin_edit.php?action=insert"><button type="button" class="btn btn-block btn-success btn-sm" 
                     <?php 
                       if($_SESSION["admin_id"]!=13 ){
                      echo "disabled";
}  ?>>افزودن</button></a></td>
                  <th style="width: 10px">کد کاربر</th>
                  <th>نام</th>
                  <th>نام کاربری</th>
                  <th >تاریخ ورود</th>
                </tr>
                <?php 
                $admin_query="SELECT * FROM admins ";
                $admin_result=mysqli_query($link,$admin_query);
                while($admin_row=mysqli_fetch_array($admin_result)){
                ?>
                <tr>
                  <td>  <a href="admin_edit.php?id=<?php echo $admin_row['id'];?> & action=update"><button type="button" class="btn btn-block btn-warning btn-sm"  
                  <?php 
                       if(isset($_SESSION["state_login"]) && $_SESSION["state_login"]===true && $_SESSION["admin_id"]!=13 && $admin_row['id']==13){
                      echo "disabled";
}  ?>
                  >ویرایش</button></a>
                     <?php if ($admin_row['id']!=13) { ?>   <a href="admin_edit_action.php?id=<?php echo $admin_row['id'];?> & action=delete"><button type="button" class="btn btn-block btn-danger btn-sm"
                  <?php if($_SESSION["admin_id"]!=13 and $_SESSION["admin_id"]!=$admin_row['id']){
                    echo "disabled";
                  } 
                  ?>
                        >خذف</button></a> <?php } ?>
                </td>
                  <td><?php echo $admin_row['id'] ;?></td>
                  <td><?php echo $admin_row['name'] ;?></td>
                  <td><?php echo $admin_row['username'] ;?></td>
                  <td><?php echo $admin_row['date'] ;?>
               </td>
                </tr>
                
                <?php } ?>
                
              </table>
            </div>
            <!-- /.box-body -->
            
          </div>
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">منو ها </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-condensed">
                
                <tr>
                  <th>کد </th>
                  <th>عنوان</th>
                  <th>زیر منو ها</th>
                 
                </tr>
                  <?php
                $category_query="SELECT * FROM categorys WHERE parent_id=0";
                $category_result=mysqli_query($link,$category_query);
                while($category_row=mysqli_fetch_array($category_result)){
                ?>
                <tr>
                  <td ><?php echo $category_row['id']; ?></td>
                  <td><?php echo $category_row['title']; ?></td>
                  <td><ul>
                  
                    <?php
                  $idd=$category_row['id'];
                $category_query1="SELECT * FROM categorys WHERE parent_id=$idd";
                $category_result1=mysqli_query($link,$category_query1);
                while($category_row1=mysqli_fetch_array($category_result1)){
                ?>
                       
                        <li><?php echo $category_row1['title']; ?> (<?php echo $category_row1['id']; ?> )</li>
                <?php } ?>
                </ul>
                </td>
                </tr>
                    <?php } ?>
                 
                                    
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-6">
          <div class="box"  style="margin-top: 100px;">
            <div class="box-header">
              <h3 class="box-title">  تنظیمات </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-striped">
                <tr>
                  <th >کد تگ</th>
                  <th>عنوان</th>
                </tr>
                <?php
                $tag_query="SELECT * FROM tags";
                $tag_result=mysqli_query($link,$tag_query);
                while($tag_row=mysqli_fetch_array($tag_result)){
                 ?>
                <tr>
                  <td><?php echo $tag_row['id'] ;?></td>
                  <td><?php echo $tag_row['title'] ;?></td>
                </tr>
                <?php } ?>
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">جدول کامنت ها</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="جستجو">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>کد</th>
                  <th>نام کاربر</th>
                  <th>تاریخ</th>
                  <th>وضعیت</th>
                  <th>متن</th>
                </tr>
                <?php
                $comment_query="SELECT * FROM comments ";
                $comment_result=mysqli_query($link,$comment_query);
                while($comment_row=mysqli_fetch_array($comment_result)){

                ?>
                <tr>
                  <td><?php echo $comment_row['id'];?></td>
                  <td><?php echo $comment_row['name'];?></td>
                  <td><?php echo $comment_row['date'];?></td>
                  <td><span class="label <?php if(($comment_row['venify'])==1)
                  { echo 'label-success' ;}
                   else{ echo 'label-warning'; }?>">
                   <?php if(($comment_row['venify'])==1){ echo 'تایید شده' ;}
                    else{ echo 'در انتظار تایید'; }?> </span></td>
                  <td><?php echo $comment_row['comment'];?> </td>
                </tr>
                <?php } ?>
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>

  <?php include("../../footer.php"); ?>


<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Slimscroll -->
<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>
