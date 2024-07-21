<?php 
require "config.php";
$link=mysqli_connect("localhost","root","","news");
$category_slug=$_GET['category_slug'];
$cat_sql="SELECT * FROM categorys WHERE slug=?";
$cat_queryy=$link->prepare($cat_sql);
$cat_queryy->bind_param("s",$category_slug);
$cat_queryy->execute(); 
$cat_resultt=$cat_queryy->get_result();
$cat_roww=$cat_resultt->fetch_assoc();
$cat_id=$cat_roww['id'];

$cat_mini_sql="SELECT * FROM categorys WHERE id=?";
$cat_query=$link->prepare($cat_mini_sql);
$cat_query->bind_param("i",$cat_id);
$cat_query->execute(); 
$cat_result=$cat_query->get_result();
$cat_row=$cat_result->fetch_assoc();

$category_parent_id=$cat_row['parent_id'];
$category_parent_sql="SELECT * FROM `categorys` WHERE `parent_id`=0 and `id`=?";

$cat_parent_query=$link->prepare($category_parent_sql);
$cat_parent_query->bind_param("i",$category_parent_id);
$cat_parent_query->execute(); 
$cat_parent_result=$cat_parent_query->get_result();
$cat_parent_row=$cat_parent_result->fetch_assoc();

$article_sql="SELECT * FROM `articles` WHERE `category_id`=? ;";
$article_query=$link->prepare($article_sql);
$article_query->bind_param("i",$cat_id);
$article_query->execute(); 
$article_result=$article_query->get_result();


?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>خبر اینلاین</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/fontawesome.css" type="text/css">
    <link rel="stylesheet" href="css/yBox.css" type="text/css">
</head>
<body>
<?php include("header.php"); ?>

<div class="container">
    <div class="row">
        <div class="col-12 col-md-8 col-lg-6 box">
            <div class="row">
                <div class="col-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">صفحه اصلی</a> </li>
                        <li class="breadcrumb-item"><a href="#"><?=  $cat_parent_row['title'] ;?> </a> </li>
                        <li class="breadcrumb-item active"><?=  $cat_row['title'] ;?> </li>
                    </ul>
                </div>
                <div class="col-12 main_content">
                    <?php while($article_row=$article_result->fetch_assoc()){
                        ?>
                    <div class="row mb-2">
                        <div class="col-4 pl-0">
                            <a href="show_news.php?article_slug=<?=  $article_row['slug']; ?>" target="_blank">
                                <img src="image/<?php echo $article_row['image']; ?>" class="img-fluid" alt="" title="">
                            </a>
                        </div>
                        <div class="col-8">
                            <div class="news_title">
                                <h2 class="h6">
                                    <a href="show_news.php?article_slug=<?=  $article_row['slug']; ?>" target="_blank">
                                    <?=  $article_row['title']; ?>
                                    </a>
                                </h2>
                            </div>
                            <div class="desc_news d-none d-md-block">
                               <p>
                               <?=  $article_row['summery']; ?>
                            </p>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    </div>
                    <div class="row">
                        <div class="col-12 mt-3 text-center">
                            <a href="archive.php" class="btn btn-secondary">بیشتر</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 col-lg-3 box d-none d-md-block">
            <section class="box_1 last_news">
                <div class="col-12">
                    <div class="row">
                        <div class="box_header">
                            <h2>
                                <a href="archive.php">آخرین اخبار  </a>
                            </h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="most_viewed_news">
                            <ul>
                            <?php 
                            $result_end_news_query=getArticles("publicationdate",20);
                              while($row_end_news_query=result_end_news_query->fetch_assoc()){ ?>
                                <li><a href="show_news.php?article_slug=<?php echo $row_end_news_query['slug'] ; ?>"><?php echo $row_end_news_query['title'] ;?></a> </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<?php include("footer.php"); ?>

<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="js/popper.min.js" type="text/javascript"></script>
<script src="js/bootstrap.js" type="text/javascript"></script>
<script src="js/owl.carousel.js" type="text/javascript"></script>
<script src="js/js.js" type="text/javascript"></script>
<script src="js/fontawesome.js" type="text/javascript"></script>
<script src="js/yBox.js" type="text/javascript"></script>
</body>
</html>