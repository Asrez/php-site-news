<?php 
require "config.php";
if(isset($_GET['category_slug'])){
    $slug = $_GET['category_slug'];
}
else{
    ?>
    <script>
        location.replace("404.php");
    </script>
    <?php
}
$subcategory_row = getCategoryWithSlug($slug);
if($subcategory_row == false){
    ?>
    <script>
        location.replace("404.php");
    </script>
    <?php
}
$category_row = findParentRow($subcategory_row['parent_id']);
$article_result_cat = getArticlesInCategory($subcategory_row['id']);
$result_news_query = getArticles("publicationdate",20);
?>
<!doctype html>
<html dir="rtl" lang="fa_IR">
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
                        <li class="breadcrumb-item"><a href="#"><?= $category_row['title'] ;  ?>
                     <?php  
                        
                        ?> </a> </li>
                        <li class="breadcrumb-item active"><?= $subcategory_row['title'] ; ?> </li>
                    </ul>
                </div>
                <div class="col-12 main_content">
                    
                    <?php
                  
                    while($article_row = $article_result_cat->fetch_assoc()){
                        ?>
                    <div class="row mb-2">
                        <div class="col-4 pl-0">
                            <a href="show_news.php?article_slug=<?= $article_row['slug']; ?>" target="_blank">
                                <img src="image/<?=  $article_row['image']; ?>" class="img-fluid" alt="" title="">
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
                            
                              while($row_news_query = $result_news_query->fetch_assoc()){ ?>
                                <li><a href="show_news.php?article_slug=<?= $row_news_query['slug'] ; ?>"><?= $row_news_query['title'] ;?></a> </li>
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