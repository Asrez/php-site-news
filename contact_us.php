<?php
require("config.php");
$row_about=getaboutus();
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
<?php include("header.php") ;?>
<?php include("tab_h.php") ;?>
            <article class="box-10">
                <div class="row">
                    <div class="col-12">
                        <ul class="breadcrumb">
                        </ul>
                        <?php
                        $about_query="SELECT * FROM about_us ";
                        $about_result=mysqli_query($link,$about_query);
                        $about_row=mysqli_fetch_array($about_result);
                        ?>
                        <div class="title">
                            <h2>تماس با ما</h2>
                        </div>
                        <div class="title-desc">
                            <p>صفحه تماس با ما خبر <?php echo $about_row['title'] ;?></p>
                        </div>
                        <div class="body">
                            <p>
                                نشانی: <?php echo $about_row['address'] ;?> کد پستی: <?php echo $about_row['post_code'] ;?>
                            </p>
                            <p>
                                در صورت تمایل جهت ارسال هر گونه خبر، پیشنهاد و یا انتقاد به
                                <a href="<?php echo $about_row['link'] ;?>" class="font-weight-bold text-danger">خبر اینلاین</a>
                                از طریق پست الکترونیکی زیر اقدام فرمایید.
                            </p>
                            <a href="#" class="d-block">
                                <strong><?php echo $about_row['email'] ;?></strong>
                            </a>
                            
                            
                        </div>
                    </div>
                </div>
                <hr style="width: 100%;height: 1px;background-color: #adb5bd">
                <div class="row">
                    <div class="col-12 col-md-6 social">
                        <ul>
                            <li class="fb"><a href="#"><i class="fab fa-facebook-f"></i></a> </li>
                            <li class="tw"><a href="#"><i class="fab fa-twitter"></i></a> </li>
                            <li class="wa"><a href="#"><i class="fab fa-whatsapp"></i></a> </li>
                            <li class="tg"><a href="#"><i class="fab fa-telegram-plane"></i></a> </li>
                        </ul>
                    </div>
                    <div class="col-12 col-md-6 short-link">
                        <i class="fas fa-link"></i>
                        <span><?php echo $about_row['link'] ;?></span>
                    </div>
                </div>
            </article>
            <section class="box ads">
            <?php
            $setting_row=getSetting("Advertise_right3_about_us");
?>
                <div class="col-12 text-center p-0">
                    <a href="<?= $setting_row['link']; ?>" target="_blank">
                        <img src="image/<?= $setting_row['value_setting']; ?>" class="img-fluid"  alt="" title="">
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
                        <?php
                               $article_result=getArticles("`viewcount` ASC",6);
                                while($article___row=$article_result->fetch_assoc()){

                                ?>
                            <div class="col-6 col-lg-4">
                                <a href="show_news.php?article_slug=<?php echo $article___row['slug']; ?>">
                                    <img src="image/<?php echo $article___row['image']; ?>" class="img-fluid" alt="" title="">
                                    <div class="ads_text">
                                        <p><?php echo $article___row['title']; ?></p>
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

                                <li><a href="archive.php"><?php echo $row_about['tag']; ?></a> </li>
                               
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
                                    
                                <?php
                                
                                $article_result=getArticles("publicationdate",15);
                                while($article__row=$article_result->fetch_assoc()){

                                    ?>
                                    <li><a href="show_news.php?article_slug=<?= $article__row['slug']; ?>"> <?=  $article__row['title']; ?> </a> </li>
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