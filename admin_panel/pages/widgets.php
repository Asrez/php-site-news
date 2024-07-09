
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ویجت ها | کنترل پنل</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../dist/css/bootstrap-theme.css">
  <!-- Bootstrap rtl -->
  <link rel="stylesheet" href="../dist/css/rtl.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">

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
<?php include("../header.php"); ?>
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        ویجت ها
        <small>نمونه مثال ها</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> خانه</a></li>
        <li class="active">ویجت ها</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">پیام ها</span>
              <span class="info-box-number"> <?php 
                $query_count_comment="SELECT COUNT(id) as count FROM `comments` ";
                $result_count_comment=mysqli_query($link,$query_count_comment);
                while($row_count_comment=mysqli_fetch_array($result_count_comment)){
                  echo $row_count_comment['count'];
                }
             
              
              ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-flag-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">دسته بندی ها</span>
              <span class="info-box-number"><?php 
                $query_count_category="SELECT COUNT(id) as count FROM `categorys` WHERE parent_id=0 ";
                $result_count_category=mysqli_query($link,$query_count_category);
                while($row_count_category=mysqli_fetch_array($result_count_category)){
                  echo $row_count_category['count'];
                }
             
              
              ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-files-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"> اخبار</span>
              <span class="info-box-number"><?php 
                $query_count_article="SELECT COUNT(id) as count FROM `articles` ";
                $result_count_article=mysqli_query($link,$query_count_article);
                while($row_count_article=mysqli_fetch_array($result_count_article)){
                  echo $row_count_article['count'];
                }
             
              
              ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-star-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">ادمین ها</span>
              <span class="info-box-number"><?php 
                $query_count_admins="SELECT COUNT(id) as count FROM `admins` ";
                $result_count_admin=mysqli_query($link,$query_count_admins);
                while($row_count_admin=mysqli_fetch_array($result_count_admin)){
                  echo $row_count_admin['count'];
                }
             
              
              ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- =========================================================== -->

      
      <!-- =========================================================== -->

      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php 
                $query_count_article="SELECT COUNT(id) as count FROM `articles` ";
                $result_count_article=mysqli_query($link,$query_count_article);
                while($row_count_article=mysqli_fetch_array($result_count_article)){
                  echo $row_count_article['count'];
                }
             
              
              ?></h3>

              <p>افزودن خبر جدید</p>
            </div>
            <div class="icon">
              <i class="fa fa-shopping-cart"></i>
            </div>
            <a href="forms/article_edit.php" class="small-box-footer">
               افزودن <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php 
                $query_count_category="SELECT COUNT(id) as count FROM `categorys` WHERE parent_id=0 ";
                $result_count_category=mysqli_query($link,$query_count_category);
                while($row_count_category=mysqli_fetch_array($result_count_category)){
                  echo $row_count_category['count'];
                }
             
              
              ?></h3>

              <p>افزودن دسته بندی </p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">
               افزودن <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php 
                $query_count_admins="SELECT COUNT(id) as count FROM `admins` ";
                $result_count_admin=mysqli_query($link,$query_count_admins);
                while($row_count_admin=mysqli_fetch_array($result_count_admin)){
                  echo $row_count_admin['count'];
                }
             
              
              ?></h3>

              <p>ثبت نام</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">
               افزودن کاربر <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php 
                $query_count_tag="SELECT COUNT(id) as count FROM `tags` ";
                $result_count_tag=mysqli_query($link,$query_count_tag);
                while($row_count_tag=mysqli_fetch_array($result_count_tag)){
                  echo $row_count_tag['count'];
                }
             
              
              ?></h3>

              <p>افزودن تگ</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">
               افزودن <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->

      <h2 class="page-header">ادمین ها</h2>

      <div class="row">
        <?php $admins="SELECT * FROM `admins` ";
        $admin_result=mysqli_query($link,$admins);
        while($admin_row=mysqli_fetch_array($admin_result)){
        ?>
        <div class="col-md-4">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-red">
              <div class="widget-user-image">
                <img class="img-circle" src="../dist/img/<?php echo $admin_row['image']; ?>" alt="User Avatar">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username"><?php echo $admin_row['name']; ?></h3>
              <h5 class="widget-user-desc"> admin</h5>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="#">پروژه <span class="pull-left badge bg-blue">
                  <?php
                  $admin_id=$admin_row['name'];
                  $count_project="SELECT COUNT(id) as count FROM `articles` WHERE admin_id=$admin_id  "
                  ?>

                </span></a></li>
              </ul>
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
        <?php } ?>
       
      </div>
      <!-- /.row -->

      <div class="row">
      <?php $article2="SELECT * FROM `articles` ORDER BY publicationdate LIMIT 4 ";
        $article_result=mysqli_query($link,$article2);
        while($article_row=mysqli_fetch_array($article_result)){
          $idd=$article_row['admin_id'];
          $name_admin1="SELECT * FROM `admins` WHERE id=$idd";
          $name_admin1_result=mysqli_query($link,$name_admin1);
          $name_admin_row1=mysqli_fetch_array($name_admin1_result);

        ?>
        <div class="col-md-6">
          <!-- Box Comment -->
          <div class="box box-widget">
            <div class="box-header with-border">
              <div class="user-block">
                <img class="img-circle" src="../dist/img/<?php  echo $admin_id['image']; ?>" alt="User Image">
                <span class="username"><a href="#"><?php
               
                echo $name_admin_row1['name']; ?></a></span>
                <span class="description"> <?php  echo $article_row['publicationdate']; ?></span>
              </div>
              <!-- /.user-block -->
              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="خوانده شده">
                  <i class="fa fa-circle-o"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <img class="img-responsive pad" src="../dist/img/<?php echo $article_row['image']; ?>" alt="Photo">

              <p><?php  echo $article_row['title']; ?></p>
              <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> اشتراک گذاری</button>
              <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> لایک</button>
              <span class="pull-left text-muted">
              <?php 
                $count_article1="SELECT COUNT(id) as count FROM comments WHERE article_id=$idd";
                $result_count_article1=mysqli_query($link,$count_article1);
                $row_count_article1=mysqli_fetch_array($result_count_article1);
                echo $row_count_article1['count'];
                ?>
              </span>

            </div>
            <?php 
                $comment_article="SELECT * FROM comments WHERE article_id=$idd";
                $comment_article_result=mysqli_query($link,$comment_article);
                while ($comment_article_row=mysqli_fetch_array($comment_article_result)){
                  ?>

            <!-- /.box-body -->
            <div class="box-footer box-comments">
              <div class="box-comment">
                <!-- User image -->
                <img class="img-circle img-sm" src="../dist/img/user.png" alt="User Image">

                <div class="comment-text">
                      <span class="username">
                        <?php echo $comment_article_row['name']; ?>
                        <span class="text-muted pull-left"><?php echo $comment_article_row['date']; ?></span>
                      </span><!-- /.username -->
                      <?php echo $comment_article_row['comment']; ?>  
                                  </div>
                <!-- /.comment-text -->
              </div>
              <?php } ?>
              
            <div class="box-footer">
              <form action="widgets.php" method="post">
                <img class="img-responsive img-circle img-sm" src="../dist/img/<?php if(isset($_SESSION["state_login"]) && $_SESSION["state_login"]===true){
  echo $_SESSION["admin_image"];
} ?>" alt="Alt Text">
                <!-- .img-push is used to add margin to elements next to floating images -->
                <div class="img-push">
                  <input type="text" class="form-control input-sm" placeholder="نظر">
                </div>
                <button type="submit" >ارسال پیام</button>
              </form>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <?php } ?>
        <!-- /.col -->
        
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include("../footer.php"); ?>
  <!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Slimscroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
</body>
</html>
