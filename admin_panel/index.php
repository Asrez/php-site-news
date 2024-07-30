<?php
define("LOAD", "");

require "config.php";
 
$count_category = get_count_tables(" `categorys` ","WHERE `parent_id` = 0 ");
$count_comment = get_count_tables(" `comments` ","");
$count_article = get_count_tables(" `articles` ","");
$count_admin = get_count_tables(" `admins` ","");
$last_admin = gettables(" `admins` ", " `date` ",8);
$last_comment = gettables(" `comments` ", " `date` ",10);
$last_article = gettables(" `articles` ", " `publicationdate` ",6);
$chart_article = get_article_for_chart();
$chart_article_label = [];
$chart_article_viewcount = [];
$chart_article_comment_count = [];
while($chart_row = $chart_article->fetch_assoc()) {
  $chart_article_label[] = $chart_row['id'];
  $chart_article_viewcount[] = $chart_row["viewcount"];
  $id_artic = $chart_row['id'];
  $count_comment = get_count_tables(" `comments` "," WHERE `article_id` = '$id_artic' ");
  $chart_article_comment_count[] = $count_comment['count'];
}
?>
<!doctype html>
<html dir="rtl" lang="fa_IR">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>کنترل پنل مدیریت</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="dist/css/bootstrap-theme.css">
  <link rel="stylesheet" href="dist/css/rtl.css">
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.css">
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php include("header.php"); ?>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        داشبرد
        <small>ورژن ۱</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> خانه</a></li>
        <li class="active">داشبرد</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">دسته بندی ها</span>
              <span class="info-box-number">
              <?= $count_category['count'] ?></span>
            </div>
          </div>
        </div>
         /.col
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">کامنت ها</span>
              <span class="info-box-number">
                <?= $count_comment['count'] ?></span>
            </div>
          </div>
        </div>
        <div class="clearfix visible-sm-block"></div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">اخبار  </span>
              <span class="info-box-number">
              <?= $count_article['count'] ?></span>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">ادمین ها</span>
              <span class="info-box-number">
              <?= $count_admin['count'] ?>
              </span>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">گزارش ماهانه</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-wrench"></i></button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">منوی ۱</a></li>
                    <li><a href="#">منوی ۲</a></li>
                    <li><a href="#">منو ۳</a></li>
                    <li class="divider"></li>
                    <li><a href="#">لینک</a></li>
                  </ul>
                </div>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-md-8">
                  <p class="text-center">
                    
                  </p>

                  <div class="chart">
                    <canvas id="salesChart" style="height: 180px;"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-8">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">آخرین پیام ها</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>شماره</th>
                    <th>نام</th>
                    <th>وضعیت</th>
                    <th> متن پیام </th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    while($row_comment = $last_comment->fetch_assoc()) {
                    ?>
                  <tr>
                    <td><a href="pages/examples/invoice.html"><?= $row_comment['id'] ?></a></td>
                    <td><?=$row_comment['name'] ?></td>
                    
                    <td><span class="label <?php if($row_comment['venify']==1) { echo 'label-success';}else {echo 'label-warning';}?>"><?php if($row_comment['venify']==1) {echo  "تایید شده";} else{ echo "در انتظار تایید";}?></span></td> 
                    <td>
                      <div ><?= $row_comment['comment'] ?></div>
                    </td>
                    
                  </tr>
                  <?php } ?>
                
                  </tbody>
                </table>
              </div>
            </div>
            <div class="box-footer clearfix">
              <a href="simple.php" class="btn btn-sm btn-default btn-flat pull-right">نمایش همه</a>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">آخرین اخبار</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <ul class="products-list product-list-in-box">
                <?php while($article_row = $last_article->fetch_assoc()) { ?>
                <li class="item">
                  <div class="product-img">
                    <img src="../image/<?= $article_row['image'] ?>" alt="Product Image">
                  </div>
                  <div class="product-info">
                    <a href="javascript:void(0)" class="product-title"> <?= $article_row['title'] ?>
                      <span class="label label-warning pull-left"><?= $article_row['source'] ?></span></a>
                  </div>
                </li>
                <?php } ?>                
              </ul>
            </div>
            <div class="box-footer text-center">
              <a href="data.php" class="uppercase">نمایش همه</a>
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
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="bower_components/Chart.js/Chart.js"></script>
<script src="dist/js/pages/dashboard2.js"></script>
<script>
    var salesChartCanvas = $('#salesChart').get(0).getContext('2d');
    var salesChart       = new Chart(salesChartCanvas);

    var salesChartData = {
      labels  : <?php echo json_encode($chart_article_label); ?>,
      datasets: [
        {
          label               : 'Electronics',
          fillColor           : 'rgb(210, 214, 222)',
          strokeColor         : 'rgb(210, 214, 222)',
          pointColor          : 'rgb(210, 214, 222)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgb(220,220,220)',
          data                : <?php echo json_encode($chart_article_viewcount); ?>
        },
        {
          label               : 'Digital Goods',
          fillColor           : 'rgba(60,141,188,0.9)',
          strokeColor         : 'rgba(60,141,188,0.8)',
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : <?php echo json_encode($chart_article_comment_count); ?>
        }
      ]
    };

    var salesChartOptions = {
      showScale               : true,
      scaleShowGridLines      : false,
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      scaleGridLineWidth      : 1,
      scaleShowHorizontalLines: true,
      scaleShowVerticalLines  : true,
      bezierCurve             : true,
      bezierCurveTension      : 0.3,
      pointDot                : false,
      pointDotRadius          : 4,
      pointDotStrokeWidth     : 1,
      pointHitDetectionRadius : 20,
      datasetStroke           : true,
      datasetStrokeWidth      : 2,
      datasetFill             : true,
      legendTemplate          : '<ul class=\'<%=name.toLowerCase()%>-legend\'><% for (var i=0; i<datasets.length; i++) {%><li><span style=\'background-color:<%=datasets[i].lineColor%>\'></span><%=datasets[i].label%></li><%}%></ul>',
      maintainAspectRatio     : true,
      responsive              : true
    };
    salesChart.Line(salesChartData, salesChartOptions);
 </script>
<script src="dist/js/demo.js"></script>
</body>
</html>