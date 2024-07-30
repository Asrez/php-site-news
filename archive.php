<?php 
define("LOAD", "");

require "config.php";

if (isset($_POST['btnsearch'])) {
    $search = $_POST['search'];
    $result_article = search($search);
  }
  else {$result_article = getArticlesInCategory();}

$tag_array=[];
$article_array=[];
while($row_article = $result_article->fetch_assoc()) {
    $article_array[]=$row_article;
    $artic_id=$row_article['id'];
    $tag_result=getTagsInner($artic_id);
    while($tag_row=$tag_result->fetch_assoc()) {
       $tag_array[]=$tag_row;
    }
}
?>
<!doctype html>
<html dir="rtl" lang="fa_IR">
<head>
    <meta charset="UTF-8">
    <title>آرشیو - <?= $title ?></title>
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

<div class="filter">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <button class="filter-icon float-left d-inline-block d-lg-none" onclick="open_filter()">
                    <i class="fas fa-filter"></i>
                </button>
              </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-12 col-md-8">
            <div class="row">
                <div class="col-12 main_content box">

                <?php 
                foreach($article_array as $row_articles) {
                  ?>
                    <div class="row mb-3">
                        <div class="after-content col-4 pl-0">
                            <a href="show_news.php?article_slug=<?= $row_articles['slug']; ?>" target="_blank">
                                <img src="image/<?= $row_articles['image'];?>" class="img-fluid" alt="" title="">
                            </a>
                        </div>
                        <div class="after-content col-8">
                            <div class="news_title">
                                <h2 class="h6">
                                    <a href="show_news.php?article_slug=<?= $row_articles['slug']; ?>" target="_blank">
                                    <?= $row_articles['title'];?>
                                    </a>
                                </h2>
                            </div>
                            <div class="desc_news d-none d-md-block">
                                <p>
                                    <span class="category">
                                    <?php  foreach($tag_array as $row_tags) {
                                        if ($row_tags['article_id'] == $row_articles['id']) {
                                            ?>
                                             <a href="archive.php" target="_blank"> <?= $row_tags["title"];?> </a>
                                                <?php
                                                  } 
                                                                                 }
                                    ?></label> 
                                    </span>
                                    <?= $row_articles['summery'];?>
                                </p>
                            </div>
                            <time>
                                <i class="far fa-clock"></i>
                                <?php 
                                       echo date($row_articles['publicationdate']);?>
                            </time>
                        </div>
                    </div><?php 
                    
                
                } ?>
                    
                </div>
            </div>
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