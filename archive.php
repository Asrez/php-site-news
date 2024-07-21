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
               
              if(isset($_POST['btnsearch'])){
                $search=$_POST['search'];
                 $articles="SELECT * FROM articles WHERE title LIKE '%$search%'  ";}
              else{$articles="SELECT * FROM articles ";}
                 $result_article=mysqli_query($link,$articles);
                while($row_articles=mysqli_fetch_array($result_article)) {
                  ?>
                    <div class="row mb-3">
                        <div class="after-content col-4 pl-0">
                            <a href="show_news.php?article_slug=<?=  $row_articles['slug']; ?>" target="_blank">
                                <img src="image/<?= $row_articles['image'];?>" class="img-fluid" alt="" title="">
                            </a>
                        </div>
                        <div class="after-content col-8">
                            <div class="news_title">
                                <h2 class="h6">
                                    <a href="show_news.php?article_slug=<?=  $row_articles['slug']; ?>" target="_blank">
                                    <?=  $row_articles['title'];?>
                                    </a>
                                </h2>
                            </div>
                            <div class="desc_news d-none d-md-block">
                                <p>
                                    <span class="category">
                                    <?php $article_id=$row_articles['id'];
                                            $article_tag="SELECT * FROM article_tag WHERE article_id = $article_id"; 
                                             $g=mysqli_query($link,$article_tag);
                                             while($row_article_tag=mysqli_fetch_array($g)) {
                                             $tag_id=$row_article_tag['tag_id']; 
                                             $tags="SELECT * FROM tags WHERE id = $tag_id"; 
                                             $d=mysqli_query($link,$tags);
                                             while($row_tags=mysqli_fetch_array($d)){ ?>
                                             <a href="#" target="_blank"> <?php  echo $row_tags["title"];?> </a>
                                                <?php }
                                            } ?></label> 
                                    </span>
                                    <?php echo $row_articles['summery'];?>
                                </p>
                            </div>
                            <time>
                                <i class="far fa-clock"></i>
                                <?php $public=$row_articles['publicationdate'];
                                       echo date($public);?>
                            </time>
                        </div>
                    </div><?php 
                    
                
                } ?>
                    <div class="row">
                        <div class="col-12">
                            <ul class="pagination justify-content-center">
                                <li class="page-item"><a class="page-link" href="#">قبلی</a></li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">بعدی</a></li>
                            </ul>
                        </div>
                    </div>
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