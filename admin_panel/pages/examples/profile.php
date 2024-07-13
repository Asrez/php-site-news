<?php $page2=true; ?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>پروفایل | کنترل پنل</title>
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
<?php include("../../header.php"); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
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

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="../../dist/img/<?php if(isset($_SESSION["state_login"]) && $_SESSION["state_login"]===true){
  echo $_SESSION["admin_image"];
} ?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?php if(isset($_SESSION["state_login"]) && $_SESSION["state_login"]===true){
  echo $_SESSION["name"];
} ?></h3>

              <p class="text-muted text-center"> <?php if(isset($_SESSION["state_login"]) && $_SESSION["state_login"]===true){
  echo $_SESSION["username"];
} ?></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b> تعداد مقالات ثبت شده</b>
                  <?php  
                  if(isset($_SESSION["state_login"]) && $_SESSION["state_login"]===true)
                  {
                   $adminn_id=$_SESSION["admin_id"];
                  } ?> <a class="pull-left"><?php 
                $query_count_article="SELECT COUNT(id) as count FROM `articles` WHERE admin_id=$adminn_id";
                $result_count_article=mysqli_query($link,$query_count_article);
                $row_count_article=mysqli_fetch_array($result_count_article);
                  echo $row_count_article['count'];
             
              
              ?></a>
               </li>
              </ul>

              </div>
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          
          
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">فعالیت ها</a></li>
              
              <li><a href="#settings" data-toggle="tab">تنظیمات</a></li>
            </ul>
            <div class="tab-content">
              
              <div class="active tab-pane" id="activity">
              <?php 
              $query__article="SELECT * FROM `articles` WHERE admin_id=$adminn_id";
              $result__article=mysqli_query($link,$query__article);
              while($row__article=mysqli_fetch_array($result__article)){
              ?>
                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="../../dist/img/<?php echo $_SESSION["admin_image"]; ?>" alt="user image">
                        <span class="username">
                          <a href="#"> <?php echo $_SESSION["username"]; ?></a>
                          <a href="#" class="pull-left btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                    <span class="description"></span>
                  </div>
                  <!-- /.user-block -->
                  <p>
                  <?php echo $row__article['summery']; ?>
                  </p>
                  <ul class="list-inline">
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> اشتراک گذاری</a></li>
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> لایک</a>
                    </li>
                    <li class="pull-right">
                      <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> نظر
                        (
                        <?php
                       $article_id=$row__article['id'];
                        $count_comment="SELECT COUNT(id) AS count FROM comments WHERE article_id=$article_id";
                        $count_comment_result=mysqli_query($link,$count_comment);
                        $count_comment_row=mysqli_fetch_array($count_comment_result);
                        echo $count_comment_row['count'];
                          ?>
                        )</a></li>
                  </ul>

                  <input class="form-control input-sm" type="text" placeholder="نظر">
                </div>
                

                  <ul class="list-inline">
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> اشتراک گذاری</a></li>
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> لایک</a>
                    </li>
                    <li class="pull-right">
                      <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> نظر
                        (5)</a></li>
                  </ul>

                  <input class="form-control input-sm" type="text" placeholder="نظر">
                
                <!-- /.post -->

                <?php } ?>
              </div>
             
              <!-- /.tab-pane -->
              

<?php
 $id=$_SESSION['admin_id'];
 $query_select_admin="SELECT * FROM admins WHERE id= $id";
 $result=mysqli_query($link,$query_select_admin);
 $row=mysqli_fetch_array($result);
  ?>
              <div class="tab-pane" id="settings">
                <form class="form-horizontal" action="update_admin.php" metod="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">نام</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" name="name" placeholder="نام" value="<?php echo $row['name'] ;?>">
                    </div>
                  </div>
                    <div class="form-group">
                    <label for="password" class="col-sm-2 control-label">پسورد</label>

                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="password" name="password" placeholder="پسورد" value="<?php echo $row['password'] ;?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="username" class="col-sm-2 control-label">نام کاربری</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="username" name="username" placeholder="نام کاربری" value="<?php echo $row['username'] ;?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="image" class="col-sm-2 control-label">تصویر </label>

                    <div class="col-sm-10">
                      <input type="file" class="form-control" id="image" name="image" placeholder="تصویر " value="<?php echo $row['image'] ;?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> من <a href="#">قوانین و شرایط</a> را قبول میکنم.
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger" name="subbtn">ارسال</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include("../../footer.php"); ?>

<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>
