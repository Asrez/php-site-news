<?php 
define("LOAD", "");

require "config.php";

if(isset($_GET['action'])) {
$action = $_GET['action'];
}else header("Location: 404.php");

if($action === "update") {
  $slug = $_GET['slug'];
  $row_up = get_article_with_slug($slug);
  $id = $row_up['admin_id'];
  $admin_row = get_tables_with_id(" `admins` ",$id);
  $article_tag = getTagsInner($id);
  
}
$tags_result = selectall(" `tags` ");
  $category_parent_0 = get_tables_with_where(" `categorys` "," WHERE `parent_id` != 0");
?>
<html>
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
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <?php include("header.php"); ?>
<div class="wrapper">
  <div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">خبر</h3>
            </div>
            <div class="box-body">
                
              <form role="form" method="post" action="actions/article_edit_action.php?action=<?php echo $action ; if($action!='insert') {echo "&slug=".$slug ;}?>" enctype="multipart/form-data">
                <div class="form-group">
                  <label>عنوان</label>
                  <input type="text" class="form-control" placeholder="متن" name="title" id="title" value="<?php if($action=='update') {echo $row_up['title'];} ?>">
                </div>
                <div class="form-group">
                  <label>نویسنده</label>
                  <input type="text" class="form-control" name="admin"  id="admin" 
                  value="<?php if($action === 'insert') { echo $_SESSION["name"]; }
                  if($action === 'update') {echo $admin_row['name'];} ?>" 
                  disabled>
                </div>

                <?php while($tags_row = $tags_result->fetch_assoc()) { ?>
                <div class="form-group">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="tags[]"  value="<?= $tags_row['id'] ?>" >
                    <?= $tags_row['title'] ?>
                    </label>
                  </div>
                <?php } 
                ?>


    
                <div class="form-group">
                  <label>دسته بندی</label>
                  <select class="form-control" name="category">
                    <?php while($categorys_row1 = $category_parent_0->fetch_assoc()) {?>
                    <option value="<?= $categorys_row1['id'] ?>" <?php if($action!="insert") { if ($row_up['category_id'] === $categorys_row1['id']) {echo "selected";} }?>><?= $categorys_row1['title'] ?></option>
                   <?php }  ?>
                  </select>
                      </div>
                <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">خلاصه</h3>
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body pad">
                    <textarea id="editor1"  rows="5" cols="45" name="summery"><?php if($action=='update') {echo $row_up['summery'];} ?></textarea>
               </div>
          </div>
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">متن خبر</h3>
               tools box
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body pad">
              <textarea id="editor1" rows="20" cols="45" name="content" ><?php if($action === 'update') {echo $row_up['content'];} ?></textarea>
            </div>
            <div class="form-group">
                  <label>منبع</label>
                  <input type="text" class="form-control" placeholder="منبع" name="source" value="<?php if($action === 'update') {echo $row_up['source'];} ?>">
                </div>
          </div>
          <div class="form-group">
                  <label>عکس</label>
                  <input type="file" class="form-control" name="image" value="<?php if($action === 'update') {echo $row_up['image'];} ?>">
                </div>
          </div>
          <button type="submit" name="btn" >ثبت</button>
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
</body>
</html>
