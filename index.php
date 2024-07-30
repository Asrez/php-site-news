<?php require "config.php";
$counter1 = 0;
$count = 0;
$article_result_rand = getArticles("RAND()",3);
$article_result_rand2 = getArticles("RAND()",3);
$article_result_v = getArticles("viewcount ASC " ,10);
$comment_result = getComments2(6);
$article11__result4 = getArticles("viewcount DESC",4);
$row_category = getARTICLEinLISTinINDEX(0);
$most_comment = [];
$article = [];
while($row_comment = $comment_result->fetch_assoc()){ 
    $most_comment[]= $row_comment;
    $article_comment = getArticlesWithId($row_comment['article_id']); 
    $article[] = $article_comment;
}
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
        <div class="col-12 col-md-6">
            <section class="box">
                <div id="carousel" class="carousel slide" data-ride="carousel">
                    <ul class="carousel-indicators">
                        <li data-target="#carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel" data-slide-to="1"></li>
                        <li data-target="#carousel" data-slide-to="2"></li>
                    </ul>
                    <div class="carousel-inner">
                    <?php
                            
                            while($row_article_view3 = $article_result_rand->fetch_assoc()){
                               
                    ?>
                        <div class="carousel-item <?php if ($counter1 == 0) 
                        echo' active';?>">
                           
                            <a href="show_news.php?article_slug=<?= $row_article_view3['slug'] ; ?>" target="_blank">
                                <img src="image/<?= $row_article_view3['image'];  ?>" alt="" class="img-fluid">
                                <div class="carousel-caption">
                                    <p>
                                       <?= $row_article_view3['summery'];  ?>
                                    </p>
                                    <h2>
                                    <?= $row_article_view3['title'];  ?>
                                    </h2>
                                </div>
                            </a>
                        </div>
                       <?php $counter1++;
                    } ?>
                        
                    </div>
                    <a class="carousel-control-prev" href="#carousel" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#carousel" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                </div>
            </section>
            
            <section>
                <div id="media_news">
                    <div class="col-12">
                        <div class="row">
                        <?php
                            while($row_article_view1 = $article_result_rand2->fetch_assoc()){
                               
                    ?>
                            <div class="col-6 mt-4">
                                <div class="row">
                                    <div class="col-12 text-center text-md-right col-lg-5 p-md-1 p-lg-0">
                                        <a href="show_news.php?article_slug=<?= $row_article_view1['slug'] ; ?>" target="_blank">
                                            <img src="image/<?= $row_article_view1['image']; ?>" class="img-fluid" alt="" title="">
                                        </a>
                                    </div>
                                    <div class="col-12 text-center text-md-right col-lg-7 p-md-1 p-lg-0">
                                        <div class="desc_news ">
                                            <h3>
                                                <a href="show_news.php?article_slug=<?= $row_article_view1['slug'] ; ?>" target="_blank">ببینید | <?php echo $row_article_view1['title']; ?></a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </section>
            <section class="box_news">
                <ul class="nav nav-tabs my-2" role="tablist">
                    
                    <li class="nav-item pr-lg-1">
                        <a href="#box2" class="nav-link active" data-toggle="tab">پربازدید ترین ها</a>
                    </li>
                    <li class="nav-item">
                        <a href="#box4" class="nav-link" data-toggle="tab">آخرین نظرات</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="box2" class="tab-pane active ">
                        <div class="row">
                        <?php 
                          
                            while($row_article_view = $article_result_v->fetch_assoc()){?>
                            <div class="col12 col-lg-6">
                                <div class="desc_news">
                                    <h3>
                                        <a href="show_news.php?article_slug=<?= $row_article_view['slug'] ; ?>" target="_blank"> <?= $row_article_view['title']; ?> </a>
                                    </h3>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div id="box4" class="tab-pane fade">
                        <div class="col-12 show_comment">
                            <?php
                            
                            foreach ($most_comment as $row_comment ){ 
                                foreach ($article as $row_article ){ 
                                    if($row_comment['article_id'] === $row_article['id']){?>
                            <div class="row mt-2">
                                <div class="col-12 comment_header">
                                    <div class="row">
                                        <div class="col-6 username">
                                            <i class="fas fa-user"></i>
                                            <?= $row_comment['name']; ?>
                                        </div>
                                        <div class="col-6 time">
                                            <i class="far fa-calendar-alt"></i>
                                            <?= $row_comment['date'];?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 comment_body">
                                    <div class="news_title">

                                        <h3>
                                            <a href="show_news.php?article_slug=<?= $row_article['slug'] ; ?>" target="_blank"> <?= $row_article['title']; ?></a>
                                        </h3>
                                    </div>
                                    <div class="comment">
                                        <p>  <?= $row_comment['comment'];?> </p>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                         } ?>
                        </div>
                    </div>
                </div>
            </section>
            <section class="box box_1">
                <div class="col-12">
                    <div class="row">
                        <div class="box_header">
                            <h2>
                                <a href="show_news.php">پربازدید ترین ها</a>
                            </h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="owl-carousel1 owl-carousel owl-theme">
                                    
                                    <?php
                              
                                while($article11__row = $article11__result4->fetch_assoc()){
                                    ?>
                                    <div class="item">
                                        <a href="show_news.php?article_slug=<?= $article11__row['slug']; ?>" target="_blank" class="text-dark">
                                            <div>
                                                <img src="image/<?= $article11__row['image']; ?>" class="img-fluid" alt="" title="">
                                            </div>
                                            <div class="text-center">
                                                <p class="p-2"><?= $article11__row['title']; ?></p>
                                            </div>
                                        </a>
                                    </div>
                                    <?php } ?>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php 
             
             foreach ($row_category["category"] as $row_main_category){
               ?>
            <section class="box box_2">
                
              
                <div class="col-12">
                    <div class="row">
                        <div class="box_header">
                            <h2>
                                <a href="archive.php"><?= $row_main_category['title'];?></a>
                            </h2>
                        </div>
                    </div>
                    <div class="row">
                        <?php 
                              foreach ($row_category["maincategory"] as $row_getCategories){
                                if( $row_main_category['id'] === $row_getCategories['parent_id']){
                                  foreach ($row_category["subCategory"] as $row_article_category){ 
                                   if( $row_article_category['category_id'] === $row_getCategories['id']){
                                    if($count == 0 ){ 
                                    $count++; 
                          
                              ?>
                        <div class="col-12 col-lg-6">
                            <div>
                                <a href="show_news.php?article_slug=<?= $row_article_category['slug'] ; ?>" target="_blank">
                                    <img src="image/<?= $row_article_category['image']; ?>" alt="" title="" class="img-fluid">
                                </a>
                                <div class="desc">
                                    <h2><a href="show_news.php?article_slug=<?= $row_article_category['slug'] ; ?>"> <?= $row_article_category['title']; ?></a> </h2>
                                </div>
                            </div>
                        </div>
                        <?php } 
                        }
                    }
                }
                }?>
                        <div class="col-12 col-lg-6">
                            <div class="most_viewed_news">
                                <ul>
                                <?php 
                foreach ($row_category["maincategory"] as $row_getCategories){
                                if( $row_main_category['id'] === $row_getCategories['parent_id']){
                                  foreach ($row_category["subCategory"] as $row_article_category){ 
                                   if( $row_article_category['category_id'] === $row_getCategories['id']){
                        
            
                ?>
                                    <li><a href="show_news.php?article_slug=<?= $row_article_category['slug'] ; ?>" > </a> <?= $row_article_category['title']; ?> </li>
                                    <?php 
                                    } 
                               
                            }
                        }
                                    } $count = 0 ;
                                    ?>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
            </section>
          
            <?php  }  ?>
        </div>
        
<?php include("tab_f.php") ;?>
<?php include("footer.php") ;?>





<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="js/popper.min.js" type="text/javascript"></script>
<script src="js/bootstrap.js" type="text/javascript"></script>
<script src="js/owl.carousel.js" type="text/javascript"></script>
<script src="js/js.js" type="text/javascript"></script>
<script src="js/fontawesome.js" type="text/javascript"></script>
<script src="js/yBox.js" type="text/javascript"></script>
</body>
</html>