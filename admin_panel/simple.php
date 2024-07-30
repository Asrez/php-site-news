<?php 
define("LOAD", "");

require "config.php";

$admin_result = selectall(" `admins` ");
$category_result = get_categorys();
$tag_result = selectall(" `tags` ");
$comment_result = selectall(" `comments` ");
?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>جدول ساده | کنترل پنل</title>
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
<div class="wrapper">
    <?php include("header.php") ;?>
  <div class="content-wrapper">
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

    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">ادمین ها</h3>
            </div>
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <td><a href="admin_edit.php?action=insert"><button type="button" class="btn btn-block btn-success btn-sm" 
                     <?php 
                       if($_SESSION["admin_id"] != 13 ) {
                      echo "disabled";
}  ?>>افزودن</button></a></td>
                  <th style="width: 10px">کد کاربر</th>
                  <th>نام</th>
                  <th>نام کاربری</th>
                  <th >تاریخ ورود</th>
                </tr>
                <?php while($admin_row = $admin_result->fetch_assoc()) { ?>
                <tr>
                  <td>  <a href="admin_edit.php?id=<?= $admin_row['id'];?> & action=update"><button type="button" class="btn btn-block btn-warning btn-sm"  
                  <?php 
                       if(isset($_SESSION["state_login"]) && $_SESSION["state_login"] === true && $_SESSION["admin_id"]!=13 && $admin_row['id'] === 13) {
                      echo "disabled";
}  ?>
                  >ویرایش</button></a>
                     <?php if ($admin_row['id'] != 13) { ?>   <a href="actions/admin_edit_action.php?id=<?= $admin_row['id'];?> & action=delete"><button type="button" class="btn btn-block btn-danger btn-sm"
                  <?php if($_SESSION["admin_id"] != 13 and $_SESSION["admin_id"] != $admin_row['id']) {
                    echo "disabled";
                  } 
                  ?>
                        >حذف</button></a> <?php } ?>
                </td>
                  <td><?= $admin_row['id'] ?></td>
                  <td><?= $admin_row['name'] ?></td>
                  <td><?= $admin_row['username'] ?></td>
                  <td><?= $admin_row['date'] ?>
               </td>
                </tr>
                
                <?php } ?>
                
              </table>
            </div>
          </div>
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">منو ها </h3>
            </div>
            <div class="box-body no-padding">
              <table class="table table-condensed">
                <tr>
                  <th>کد </th>
                  <th>عنوان</th>
                  <th>زیر منو ها</th>
                </tr>

                  <?php foreach($category_result['pcat'] as $category_row ) {?>
                <tr>
                     <td ><?= $category_row['id'] ?></td>
                     <td><?= $category_row['title'] ?> <a href = "actions/action_category_edit.php?id=<?= $category_row['id']; ?>&action=delete&parent_id=0"> <i class="fa fa-fw fa-trash"></i></a>
                          <a href="category_edit.php?id=<?= $category_row['id']; ?>&action=update&parent_id=0"> <i class="fa fa-fw  fa-pencil"></i></a></td>
                     <td>
                                   <?php 
                                   foreach ($category_result['scat'] as $category_row1 ) { 
                                          if($category_row1['parent_id'] === $category_row['id']) {?>
                       
                                   <p><?= $category_row1['title']; ?> (<?= $category_row1['id'] ?> )
                                   <a href="actions/action_category_edit.php?id=<?= $category_row1['id'] ?>&action=delete&parent_id=<?= $category_row['id'] ?>"> <i class="fa fa-fw fa-trash"></i></a>
                                   <a href="category_edit.php?id=<?= $category_row1['id'] ?>&action=update&parent_id=<?= $category_row['id'] ?>"> <i class="fa fa-fw  fa-pencil"></i></a>
                                        </p>
                                   
                                 <?php }
                                 } ?>
                                 <a href="category_edit.php?action=insert&parent_id=<?= $category_row['id'] ?>"><i class="fa fa-fw  fa-plus"></i></a>
                       </td>
                   </tr>
                    <?php } ?>
              
                <tr>
                  <td><a href="category_edit.php?action=insert&parent_id=0"><i class="fa fa-fw  fa-plus"></i></a></td>
                </tr>
              </table>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="box"  style="margin-top: 100px;">
            <div class="box-header">
              <h3 class="box-title"> تگ ها </h3>
            </div>
            <div class="box-body no-padding">
              <table class="table table-striped">
                <tr>
                  <th><a href="tag_edit.php?action=insert"><button type="button" class="btn btn-block btn-success btn-sm">افزودن</button></a></th>
                  <th >کد تگ</th>
                  <th>عنوان</th>
                </tr>
                <?php while($tag_row = $tag_result->fetch_assoc()) { ?>
                <tr>
                  <td><a href="tag_edit.php?action=update&id=<?= $tag_row['id'] ?>"><button type="button" class="btn btn-block btn-warning btn-sm">ویرایش</button></a>
                  <a href="actions/tag_edit_action.php?action=delete&id=<?= $tag_row['id'] ?>"><button type="button" class="btn btn-block btn-danger btn-sm">حذف</button></a></td>
                  <td><?= $tag_row['id'] ?></td>
                  <td><?= $tag_row['title'] ?></td>
                </tr>
                <?php } ?>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">کامنت ها</h3>
            </div>
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th></th>
                  <th>کد</th>
                  <th>نام کاربر</th>
                  <th>تاریخ</th>
                  <th>وضعیت</th>
                  <th>متن</th>
                </tr>
                <?php while($comment_row = $comment_result->fetch_assoc()) { ?>
                <tr>
                  <td><?php
                  if($comment_row['venify'] === 0) { ?>  <a href="actions/comment_action.php?action=update&id=<?= $comment_row['id'];?>"><button type="button" class="btn btn-block btn-success btn-sm">تایید</button></a>
                    <?php } ?>
                  <a href="actions/comment_action.php?action=delete&id=<?= $comment_row['id'];?>"><button type="button" class="btn btn-block btn-danger btn-sm">حذف</button></a></td>
                  <td><?= $comment_row['id'] ?></td>
                  <td><?= $comment_row['name'] ?></td>
                  <td><?= $comment_row['date'] ?></td>
                  <td><span class="label <?php if(($comment_row['venify']) === 1)
                  { echo 'label-success' ;}
                   else{ echo 'label-warning'; }?>">
                   <?php if(($comment_row['venify']) === 1) { echo 'تایید شده' ;}
                    else{ echo 'در انتظار تایید'; }?> </span></td>
                  <td><?= $comment_row['comment'] ?> </td>
                </tr>
                <?php } ?>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <?php include("footer.php"); ?>

<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/demo.js"></script>
</body>
</html>
