<?php $page2=true; 
if ($page2===true){echo "fBG"; }
exit();?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>فرم عمومی | کنترل پنل</title>
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
  <?php include("../../header.php"); ?>
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
              <h3 class="box-title">خبر</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" method="post" action="action_article_edit.php" enctype="multipart/form-data">
                <!-- text input -->
                <div class="form-group">
                  <label>عنوان</label>
                  <input type="text" class="form-control" placeholder="متن" name="title" id="title">
                </div>
                <div class="form-group">
                  <label>نویسنده</label>
                  <input type="text" class="form-control" name="admin"  id="admin" value="<?php if(isset($_SESSION["state_login"]) && $_SESSION["state_login"]===true){
  echo $_SESSION["name"];
} ?>" disabled>
                </div>

                <?php 
                $tags_query="SELECT * FROM tags";
                $tags_result=mysqli_query($link,$tags_query);
                while($tags_row=mysqli_fetch_array($tags_result)){
                ?>
                <div class="form-group">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="tag"  id="tag">
                    <?php echo $tags_row['title']; ?>
                    </label>
                  </div>
                <?php } ?>


    
                <div class="form-group">
                  <label>دسته بندی</label>
                  <select class="form-control" name="category">
                    <?php
                    $categorys_query="SELECT * FROM categorys WHERE parent_id!=0";
                    $categorys_result=mysqli_query($link,$categorys_query);
                    while($categorys_row=mysqli_fetch_array($categorys_result)){
                    ?>
                    <option value="<?php echo $categorys_row['id'] ?>"><?php echo $categorys_row['title'] ?></option>
                   <?php } ?>
                  </select>
                      </div>
                

                <!-- Select multiple-->
                
                <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">خلاصه</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
             
                    <textarea id="editor1"  rows="5" cols="60" name="summery"></textarea>
               </div>
          </div>
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">متن خبر</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
              <textarea id="editor1" rows="20" cols="60" name="content"></textarea>
              
            </div>
            <div class="form-group">
                  <label>منبع</label>
                  <input type="text" class="form-control" placeholder="منبع" name="source">
                </div>
          </div>
          <div class="form-group">
                  <label>عکس</label>
                  <input type="file" class="form-control" name="image" value="footer_logo.png" >
                </div>
          </div>
          <button type="submit" name="btn">ثبت</button>
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
<?php include("../../footer.php"); ?>
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
