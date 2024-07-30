<?php
define("LOAD", "");

require "config.php";

$row_about = getaboutus();
$setting_row_left4 = getSetting("Advertise_left4");
$article_result1 = getArticles("`viewcount` ASC",6);
$article_result2 = getArticles("publicationdate",15);
?>
<!doctype html>
<html dir="rtl" lang="fa_IR">
<head>
    <meta charset="UTF-8">
    <title>درباره ما - <?= $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/fontawesome.css" type="text/css">
    <link rel="stylesheet" href="css/yBox.css" type="text/css">
</head>
<body>
    <?php include("header.php") ;?>
    <?php include("tab_h.php") ;?>
            <article class="box-10">
                <div class="row">
                    <div class="col-12">
                        <ul class="breadcrumb">
                           
                        </ul>
                        <?php
                        
                        ?>
                        <div class="title">
                            
                            <h2>درباره خبر <?= $row_about['title'] ?></h2>
                        </div>
                        <div class="body">
                            <p>
                            <?= $row_about['about_us_text'] ?>
                        </p>
                        </div>
                    </div>
                </div>
                <hr style="width: 100%;height: 1px;background-color: #adb5bd">
                <div class="row">
                    <div class="col-6 social">
                        <ul>
                            <li class="fb"><a href="#"><i class="fab fa-facebook-f"></i></a> </li>
                            <li class="tw"><a href="#"><i class="fab fa-twitter"></i></a> </li>
                            <li class="wa"><a href="#"><i class="fab fa-whatsapp"></i></a> </li>
                            <li class="tg"><a href="#"><i class="fab fa-telegram-plane"></i></a> </li>
                        </ul>
                    </div>
                    <div class="col-6 short-link">
                        <i class="fas fa-link"></i>
                        <span><?= $row_about['link'] ?></span>
                    </div>
                </div>
            </article>
            <section class="box ads">
            
                <div class="col-12 text-center p-0">
                    <a href="<?= $setting_row_left4['link'] ?>" target="_blank">
                        <img src="image/<?= $setting_row_left4['value_setting'] ?>" class="img-fluid"  alt="<?= $setting_row_left4['value_setting'] ?>" title="<?= $setting_row_left4['value_setting'] ?>">
                    </a>
                </div>
            </section>
            <section class="box box_1 web">
                <div class="col-12">
                    <div class="row">
                        <div class="box_header">
                            <h2>
                                مطالب پیشنهادی
                            </h2>
                        </div>
                    </div>
                    <div class="row container_box">
                        <div class="row">
                        <?php while($article_row = $article_result1->fetch_assoc()) {  ?>
                            <div class="col-6 col-lg-4">
                                <a href="show_news.php?article_slug=<?= $article_row['slug']; ?>">
                                    <img src="image/<?= $article_row['image']; ?>" class="img-fluid" alt="<?= $article_row['title']; ?>" title="<?= $article_row['title']; ?>">
                                    <div class="ads_text">
                                        <p><?= $article_row['title']; ?></p>
                                    </div>
                                </a>
                            </div>
                        <?php } ?>
                        </div>
                    </div>

                </div>
            </section>
            <section class="box box_1 tags">
                <div class="col-12">
                    <div class="row">
                        <div class="box_header">
                            <h2>
                                <a href="archive.php">برچسب ها</a>
                            </h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 p-0">
                            <ul>

                                <li><a href="archive.php"><?= $row_about['tag'] ?></a> </li>
                               
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
            <section class="box box_2">
                <div class="col-12">
                    <div class="row">
                        <div class="box_header">
                            <h2>
                                <a href="#">مطالب پیشنهادی</a>
                            </h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 p-0">
                            <div class="most_viewed_news suggested">
                                <ul>    
                                 <?php while($article_row = $article_result2->fetch_assoc()) { ?>
                                    <li><a href="show_news.php?article_slug=<?= $article_row['slug'] ?>"> <?= $article_row['title'] ?> </a> </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
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