<?php
define("LOAD", "");

require "config.php";

$news_result = selectall("articles");
$setting_result = selectall("setting");
?>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>جدول ها | کنترل پنل</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="dist/css/bootstrap-theme.css">
  <link rel="stylesheet" href="dist/css/rtl.css">
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.css">
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php include("header.php"); ?>

  <div class="content-wrapper">
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

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">جدول اخبار</h3>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover" >
                <thead>
                <tr>
                  <th><a href="article_edit.php?action=insert"><button type="button"  class="btn btn-block btn-success btn-sm" >افزودن</button></a></th>
                  <th>کد خبر</th>
                  <th>نام خبر</th>
                  <th>خلاصه</th>
                  <th>منبع</th>
                  <th>زمان انتشار</th>
                  <th>وضعیت</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                <?php while($news_row = $news_result->fetch_assoc()) { ?>
                <tr>
<<<<<<< HEAD
<<<<<<< HEAD
                  <td><a href="article_edit.php?slug=<?= $news_row['slug']; ?>&action=update"><button type="button" class="btn btn-block btn-warning btn-sm">ویرایش</button></a>
                      <a href="actions/article_edit_action.php?slug=<?= $news_row['slug'];?>&action=delete"><button type="button"  class="btn btn-block btn-danger btn-sm">حذف</button></a>
                      <a href="read-article.php?slug=<?= $news_row['slug']; ?>"><i class="fa fa-eye" title="نمایش مقاله"></i></a>
                  </td>
                  <td><?= $news_row['id']; ?></td>
                  <td><?= $news_row['title']; ?></td>
                  <td><?= $news_row['summery']; ?></td>
                  <td><?= $news_row['source']; ?></td>
                  <td><?= $news_row['publicationdate']; ?></td>
=======
                  <td><a href="article_edit.php?slug=<?= $news_row['slug']  ?>&action=update"><button type="button" class="btn btn-block btn-warning btn-sm">ویرایش</button></a>
                      <a href="actions/article_edit_action.php?slug=<?= $news_row['slug'] ?>&action=delete"><button type="button"  class="btn btn-block btn-danger btn-sm">حذف</button></a>
                      <a href="read-article.php?slug=<?= $news_row['slug'] ?>"><i class="fa fa-eye" title="نمایش مقاله"></i></a>
                  </td>
=======
                  <td><a href="article_edit.php?slug=<?= $news_row['slug']  ?>&action=update"><button type="button" class="btn btn-block btn-warning btn-sm">ویرایش</button></a>
                      <a href="actions/article_edit_action.php?slug=<?= $news_row['slug'] ?>&action=delete"><button type="button"  class="btn btn-block btn-danger btn-sm">حذف</button></a>
                      <a href="read-article.php?slug=<?= $news_row['slug'] ?>"><i class="fa fa-eye" title="نمایش مقاله"></i></a>
                  </td>
>>>>>>> ccb84342f5e2d3160d997b6013b7247ad6100933
                  <td><?= $news_row['id'] ?></td>
                  <td><?= $news_row['title'] ?></td>
                  <td><?= $news_row['summery'] ?></td>
                  <td><?= $news_row['source'] ?></td>
                  <td><?= $news_row['publicationdate'] ?></td>
<<<<<<< HEAD
>>>>>>> ccb84342f5e2d3160d997b6013b7247ad6100933
=======
>>>>>>> ccb84342f5e2d3160d997b6013b7247ad6100933
                  <td><span class="label <?php if(($news_row['verify']) === 1)
                  { echo 'label-success' ;}
                   else{ echo 'label-warning'; }?>">
                   <?php if(($news_row['verify']) === 1) { echo 'تایید شده' ;}
                    else{ echo 'در انتظار تایید'; }?> </span></td>
<<<<<<< HEAD
<<<<<<< HEAD
                    <td> <?php if(($news_row['verify']) === 0)  {?><a href="actions/article_edit_action.php?slug=<?=$news_row['slug']; ?>&action=verify"><button type="button" class="btn btn-block btn-success btn-sm">تایید</button></a> <?php } ?></td>
=======
                    <td> <?php if(($news_row['verify']) === 0 and $_SESSION["admin_id"] === 13  )  {?><a href="actions/article_edit_action.php?slug=<?=$news_row['slug'] ?>&action=verify"><button type="button" class="btn btn-block btn-success btn-sm">تایید</button></a> <?php } ?></td>
>>>>>>> ccb84342f5e2d3160d997b6013b7247ad6100933
=======
                    <td> <?php if(($news_row['verify']) === 0 and $_SESSION["admin_id"] === 13  )  {?><a href="actions/article_edit_action.php?slug=<?=$news_row['slug'] ?>&action=verify"><button type="button" class="btn btn-block btn-success btn-sm">تایید</button></a> <?php } ?></td>
>>>>>>> ccb84342f5e2d3160d997b6013b7247ad6100933
                </tr>
               
                <?php } ?>
                </tbody>
              </table>
            </div>
          </div>

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">جدول تنظیمات (تبلیغات)</h3>
            </div>
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
                <?php while($setting_row = $setting_result->fetch_assoc()) { ?>
                <tr>
<<<<<<< HEAD
                  <td><a class="fa fa-trash" href="actions/setting_edit_action.php?id=<?= $setting_row['id'];?>&action=delete" title="حذف"></a>
                      <a class="fa fa-fw fa-cloud-download" href="setting_edit.php?id=<?= $setting_row['id'];?>&action=update" title="ویرایش"></a>
                  </td>
                  <td><?= $setting_row['id'];?></td>
=======
                  <td><a class="fa fa-trash" href="actions/setting_edit_action.php?id=<?= $setting_row['id'] ?>&action=delete" title="حذف"></a>
                      <a class="fa fa-fw fa-cloud-download" href="setting_edit.php?id=<?= $setting_row['id'] ?>&action=update" title="ویرایش"></a>
                  </td>
                  <td><?= $setting_row['id'] ?></td>
>>>>>>> ccb84342f5e2d3160d997b6013b7247ad6100933
                  <td><?php
                  switch ($setting_row['id']) {
                    case '1':
                      echo "عکس تبلیغ بخش هدر سایت ";
                      break;
                    case '2':
                      echo "عکس تبلیغ میانی بالا";
                      break;
                    case '3':
                      echo "عکس تبلیغ میانی پایین";
                      break;
                    case '4':
                      echo "عکس تبلیغ اول سمت چپ ";
                      break;
                    case '5':
                      echo "عکس تبلیغ دوم سمت چپ ";
                      break;
                    case '6':
                      echo "عکس تبلیغ سوم سمت چپ ";
                      break;
                    case '7':
                      echo "عکس لوگو سایت (قسمت هدر) ";
                      break;
                    case '8':
                      echo "عکس تبلیغ اول سمت راست ";
                      break;
                    case '9':
                      echo "عکس تبلیغ دوم سمت راست";
                      break;
                    case '10':
                      echo "عکس تبلیغ سوم سمت راست ";
                      break;
                    case '11':
                      echo "عکس تبلیغ چهارم سمت راست ";
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
                      case '16':
                        echo "عنوان سایت";
                        break;
                      case '17':
                        echo "بخش فوتر سایت";
                        break;
                  }
                  ?></td>
                  <td><?= $setting_row['value_setting'] ?> </td>
                  <td><?= $setting_row['link'] ?> </td>
                </tr>
                <?php } ?>
                </tbody>
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
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/demo.js"></script>
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
