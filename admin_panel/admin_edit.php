<?php
define("LOAD", "");

<<<<<<< HEAD
require "config.php";

if (isset($_GET['action'])) {
  $action = $_GET['action'];
} else {
=======
require "config.php"; 

if(isset($_GET['action'])) {
$action = $_GET['action'];}
else
{
>>>>>>> ccb84342f5e2d3160d997b6013b7247ad6100933
  header("Location: 404.php");
  exit();
}

<<<<<<< HEAD
if ($action != 'insert') {
  $id = $_GET['id'];
=======
if($action != 'insert') { $id = $_GET['id'];
>>>>>>> ccb84342f5e2d3160d997b6013b7247ad6100933
  $row_select = get_tables_with_id(" `admins` ", $id);
}
?>
<html>
<<<<<<< HEAD

=======
>>>>>>> ccb84342f5e2d3160d997b6013b7247ad6100933
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
<<<<<<< HEAD
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
=======
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
>>>>>>> ccb84342f5e2d3160d997b6013b7247ad6100933
</head>

<body class="hold-transition skin-blue sidebar-mini">
<<<<<<< HEAD
  <?php include ("header.php"); ?>
  <div class="wrapper">
    <div class="content-wrapper">
      <section class="content">
        <div class="row">
          <div class="col-md-6">
            <div class="box box-warning">
              <div class="box-header with-border">
                <h3 class="box-title"> ادمین ها</h3>
              </div>
              <div class="box-body">
                <form role="form" method="post"
                  action="actions/admin_edit_action.php?action=<?php echo $action;
                  if ($action != "insert") {
                    echo "& id=" . $id;
                  } ?>"
                  enctype="multipart/form-data">
                  <div class="form-group">
                    <label>نام کاربری </label>
                    <input type="text" class="form-control" placeholder="نام کاربری" name="username" id="username"
                      value="<?php if ($action != 'insert') {
                        echo $row_select['username'];
                      } ?>">
                  </div>
                  <div class="form-group">
                    <label>نام</label>
                    <input type="text" class="form-control" placeholder="نام" name="name" id="name"
                      value="<?php if ($action != 'insert') {
                        echo $row_select['name'];
                      } ?>">

                  </div>
                  <div class="form-group">
                    <label>پسورد</label>
                    <input type="password" class="form-control" placeholder="پسورد" name="password" id="password"
                      value="<?php if ($action != 'insert') {
                        echo $row_select['password'];
                      } ?>">

                  </div>
                  <div class="form-group">
                    <label>عکس</label>
                    <input type="file" class="form-control" name="image">
                  </div>
              </div>
              <button type="submit" name="btn">تایید</button>
              </form>

            </div>
          </div>
        </div>
    </div>
    </section>
  </div>
  <?php include ("footer.php"); ?>

  <script src="bower_components/jquery/dist/jquery.min.js"></script>
  <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="bower_components/fastclick/lib/fastclick.js"></script>
  <script src="dist/js/adminlte.min.js"></script>
  <script src="dist/js/demo.js"></script>
=======
  <?php include("header.php"); ?>
<div class="wrapper">
  <div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">  ادمین ها</h3>
            </div>
            <div class="box-body">
              <form role="form" method="post" action="actions/admin_edit_action.php?action=<?php echo $action; if($action != "insert") { echo "& id=".$id ;}?>" enctype="multipart/form-data">
                <div class="form-group">
                  <label>نام کاربری </label>
                  <input type="text" class="form-control" placeholder="نام کاربری" name="username" id="username" value="<?php if($action != 'insert') {echo $row_select['username'];} ?>" >
                </div>
                <div class="form-group">
                  <label>نام</label>
                   <input type="text" class="form-control" placeholder="نام" name="name" id="name" value="<?php if($action != 'insert') { echo $row_select['name']; }?>">
                 
                </div>
                <div class="form-group">
                  <label>پسورد</label>
                   <input type="password" class="form-control" placeholder="پسورد" name="password" id="password" value="<?php if($action != 'insert') { echo $row_select['password']; }?>">
                 
                </div>
                <div class="form-group">
                  <label>عکس</label>
                  <input type="file" class="form-control" name="image"  >
                </div>
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
>>>>>>> ccb84342f5e2d3160d997b6013b7247ad6100933
</body>

</html>