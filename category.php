<?php session_start();
$link=mysqli_connect("localhost","root","","news");
$category_slug=$_GET['category_slug'];
$cat_queryy="SELECT * FROM categorys WHERE slug='$category_slug'";
$cat_resultt=mysqli_query($link,$cat_queryy);
$cat_roww=mysqli_fetch_array($cat_resultt);
$cat_id=$cat_roww['id'];
$category_mini_query="SELECT * FROM categorys WHERE id=$cat_id";
$category_mini_result=mysqli_query($link,$category_mini_query);
$category_mini_row=mysqli_fetch_array($category_mini_result);
$category_parent_id=$category_mini_row['parent_id'];
$category_parent_query="SELECT * FROM categorys WHERE parent_id=0 and id=$category_parent_id";
$category_parent_result=mysqli_query($link,$category_parent_query);
$category_parent_row=mysqli_fetch_array($category_parent_result);
$article_query="SELECT * FROM articles WHERE category_id=$cat_id LIMIT 7";
$article_result=mysqli_query($link,$article_query);


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
                        <li class="breadcrumb-item"><a href="#"><?php echo $category_parent_row['title'] ;?> </a> </li>
                        <li class="breadcrumb-item active"><?php echo $category_mini_row['title'] ;?> </li>
                    </ul>
                </div>
                <div class="col-12 main_content">
                    <?php while($article_row=mysqli_fetch_array($article_result)){
                        ?>
                    <div class="row mb-2">
                        <div class="col-4 pl-0">
                            <a href="show_news.php?article_slug=<?php echo $article_row['slug']; ?>" target="_blank">
                                <img src="image/<?php echo $article_row['image']; ?>" class="img-fluid" alt="" title="">
                            </a>
                        </div>
                        <div class="col-8">
                            <div class="news_title">
                                <h2 class="h6">
                                    <a href="show_news.php?article_slug=<?php echo $article_row['slug']; ?>" target="_blank">
                                    <?php echo $article_row['title']; ?>
                                    </a>
                                </h2>
                            </div>
                            <div class="desc_news d-none d-md-block">
                               <p>
                               <?php echo $article_row['summery']; ?>
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
                            <?php $end_news_query="SELECT * FROM `articles` ORDER BY `publicationdate` LIMIT 20 ";
                                 $result_end_news_query=mysqli_query($link,$end_news_query);
                              while($row_end_news_query=mysqli_fetch_array($result_end_news_query)){ ?>
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