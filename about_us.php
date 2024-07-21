<?php
require("config.php");
$article___query=$link->prepare("SELECT * FROM articles ORDER BY viewcount ASC LIMIT 3");
$article___query->execute();
$article___result=$article___query->get_result();

$about_query=$link->prepare("SELECT * FROM `about_us` ;");
$about_query->execute();
$about_result=$about_query->get_result();
$about_row=$about_result->fetch_assoc();

$article___query=$link->prepare("SELECT * FROM articles LIMIT 6");
$article___query->execute();
$article___result=$article___query->get_result();

$article__query=$link->prepare("SELECT * FROM `articles`  LIMIT 5 ;");
$article__query->execute();
$article__result=$article__query->get_result();

$end_news_query2=$link->prepare("SELECT * FROM `articles` ORDER BY RAND() LIMIT 4 ;");
$end_news_query2->execute();
$result_end_news_query2=$end_news_query2->get_result();

$category_ostan4=$link->prepare("SELECT * FROM categorys WHERE parent_id=10");
$category_ostan4->execute();
$category_ostan_result4=$category_ostan4->get_result();

$category_id4=0;
$ostan_query4=$link->prepare("SELECT * FROM `articles` WHERE `category_id`=? ORDER BY publicationdate LIMIT 20 ;");
$ostan_query4->bind_param("i", $category_id4);
$ostan_query4->execute();
$result_ostan_query4=$ostan_query4->get_result();

$end_news_query=$link->prepare("SELECT * FROM `articles` ORDER BY `publicationdate` LIMIT 20 ;");
$end_news_query->execute();
$result_end_news_query=$end_news_query->get_result();

$coment_count=$link->prepare("SELECT DISTINCT articles.id,articles.image,articles.title,articles.slug FROM comments , articles WHERE comments.article_id=articles.id  LIMIT 10 ;");
$coment_count->execute();
$coment_result=$coment_count->get_result();

$siyasi_query1=$link->prepare("SELECT * FROM `categorys` WHERE `parent_id`=3 ;");
$siyasi_query1->execute();
$result_siyasi_query1=$siyasi_query1->get_result();

$idd=0;
$siyasi_query=$link->prepare("SELECT * FROM `articles` WHERE `category_id`=?  ORDER BY `publicationdate` LIMIT 4; ");
$siyasi_query->bind_param("i",$idd);
$siyasi_query->execute();
$result_siyasi_query=$siyasi_query->get_result();

$farhangi_query1=$link->prepare("SELECT * FROM `categorys` WHERE `parent_id`=2 ");
$farhangi_query1->execute();
$result_farhangi_query1=$farhangi_query1->get_result();

$farhangi_id=0;
$farhangi_query=$link->prepare("SELECT * FROM `articles` WHERE `category_id`=?  ORDER BY `publicationdate` LIMIT 4 ;");
$farhangi_query->bind_param("i",$farhangi_id);
$farhangi_query->execute();
$result_farhangi_query=$farhangi_query->get_result();

$category_ostan1=$link->prepare("SELECT * FROM `categorys` WHERE `parent_id`=10");
$category_ostan1->execute();
$category_ostan_result1=$category_ostan1->get_result();

// بخش ایرانگردی
$category_id=0;
$ostan_query1=$link->prepare("SELECT * FROM `articles` WHERE `category_id`=?  ORDER BY `publicationdate`;");
$ostan_query1->bind_param("i", $category_id);
$ostan_query1->execute();
$result_ostan_query1=$ostan_query1->get_result();

// بخش اقتصادی
$eghtesad_query1=$link->prepare("SELECT * FROM `categorys` WHERE `parent_id`=4 ;");
$eghtesad_query1->execute();
$result_eghtesad_query1=$eghtesad_query1->get_result();

$eghtesad_id=0;
$eghtesad_query=$link->prepare("SELECT * FROM `articles` WHERE `category_id`=?  ORDER BY `publicationdate` LIMIT 4 ;");
$eghtesad_query->bind_param("i",$eghtesad_id);
$eghtesad_query->execute();
$result_eghtesad_query=$eghtesad_query->get_result();



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
<div class="container">
    <div class="row">
        <div class="col-12 col-md-6">
            <section class="box ads">
            <?php
            $keyy="Advertise_right1_about_us";
           include("setting_query_result.php");
?>
                <div class="col-12 text-center p-0">
                    <a href="<?php echo $setting_row['link']; ?>" target="_blank">
                        <img src="image/<?php echo $setting_row['value_setting']; ?>" class="img-fluid w-100"  alt="" title="">
                    </a>
                </div>
                <?php
            $keyy="Advertise_right2_about_us";
           include("setting_query_result.php");
?>
                <div class="col-12 text-center p-0">
                    <a href="<?php echo $setting_row['link']; ?>" target="_blank">
                        <img src="image/<?php echo $setting_row['value_setting']; ?>" class="img-fluid w-100" alt="" title="">
                    </a>
                </div>
                <?php
            $keyy="Advertise_right3_about_us";
           include("setting_query_result.php");
?>
                <div class="col-12 text-center p-0">
                    <a href="<?php echo $setting_row['link']; ?>" target="_blank">
                        <img src="image/<?php echo $setting_row['value_setting']; ?>" class="img-fluid w-100" alt="" title="">
                    </a>
                </div>
                <div class="row">
                <?php
                                
                                while($article___row=$article___result->fetch_assoc()){

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
            </section>
            <article class="box-10">
                <div class="row">
                    <div class="col-12">
                        <ul class="breadcrumb">
                           
                        </ul>
                        <?php
                        
                        ?>
                        <div class="title">
                            <h2>درباره خبر <?php echo $about_row['title'] ;?></h2>
                        </div>
                        <div class="body">
                            <p>
                            <?php echo $about_row['about_us_text'] ;?>
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
                        <span><?php echo $about_row['link'] ;?></span>
                    </div>
                </div>
            </article>
            <section class="box ads">
            <?php
            $keyy="Advertise_right3_about_us";
           include("setting_query_result.php");
?>
                <div class="col-12 text-center p-0">
                    <a href="<?php echo $setting_row['link']; ?>" target="_blank">
                        <img src="image/<?php echo $setting_row['value_setting']; ?>" class="img-fluid"  alt="" title="">
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
                                
                                while($article___row=$article___result->fetch_assoc()){

                                ?>
                            <div class="col-6 col-lg-4">
                                <a href=show_news.php?article_slug=<?php echo $article___row['slug']; ?>">
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

                                <li><a href="archive.php"><?php echo $about_row['tag']; ?></a> </li>
                               
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
                                
                                while($article__row=$article__result->fetch_assoc()){
                                    ?>
                                    <li><a href="#?article_slug=<?php echo $article__row['slug']; ?>"> <?php echo $article__row['title']; ?> </a> </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-12 col-md-3">
        <section class="box box_news box_caricature">
                <ul class="nav nav-tabs my-2" role="tablist">
                    <li class="nav-item">
                        <a href="#caricature" class="nav-link active text-right " data-toggle="tab"> اخبار تصادفی</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="caricature" class="tab-pane active">
                        <div class="col-12">
                            <div class="row">
                                <div class="owl-carousel3 owl-carousel owl-theme">
                                <?php 
                              while($row_end_news_query2=$result_end_news_query2->fetch_assoc()){ ?>
                                    <div class="item">
                                        <a href="show_news.php?article_slug=<?php echo $row_end_news_query2['slug'] ; ?>" target="_blank">
                                            <img src="image/<?php echo $row_end_news_query2['image']; ?>" class="img-fluid" alt="" title="">
                                            <p><?php echo $row_end_news_query2['title']; ?> </p>
                                        </a>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            </section>
            <section class="box box_1 last_news">
                <div class="col-12">
                    <div class="row">
                        <div class="box_header">
                            <h2>
                                <a href="#">آخرین مطالب استان ها</a>
                            </h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="most_viewed_news">
                            <ul>
                                <?php 
                               
                                while($category_ostan_row4=$category_ostan_result4->fetch_assoc()){
                                  $category_id4=$category_ostan_row4['id'];
                              while($row_ostan_query4=$result_ostan_query4->fetch_assoc()){ ?>
                                <li><a href="#"><?php echo  $row_ostan_query4['title'];?></a> </li>
                                <?php } 
                                }?>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
            <section class="box box_1 last_news">
                <div class="col-12">
                    <div class="row">
                        <div class="box_header">
                            <h2>
                                <a href="#">آخرین اخبار  </a>
                            </h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="most_viewed_news">
                            <ul>
                            <?php
                              while($row_end_news_query=$result_end_news_query->fetch_assoc()){ ?>
                               <li><a href="show_news.php?article_slug=<?php echo $row_end_news_query['slug'] ; ?>"><?php echo $row_end_news_query['title'] ;?></a> </li>
                               <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
            <section class="box box_1 participation">
                <div class="col-12">
                    <div class="row">
                        <div class="box_header">
                            <h2>
                                در بحث مشارکت کنید
                            </h2>
                        </div>
                    </div>
                    <div class="row container_box">
                        <?php 
                        while($coment_row=$coment_result->fetch_assoc()){ ?>
                        <div class="col-5 p-0">
                            <a href="#" target="_blank">
                                <img src="image/<?php echo $coment_row['image'] ; ?>" class="img-fluid" alt="" title="">
                            </a>
                        </div>
                        <div class="col-7 p-0">
                            <a href="show_news.php?article_slug=<?php echo $coment_row['slug'] ; ?>" target="_blank" class="">
                                <?php echo $coment_row['title']; ?>
                            </a>
                        </div>
                        <?php } ?>
                        
                    </div>
                </div>
            </section>
            <section class="box box_1 participation">
                <div class="col-12">
                    <div class="row">
                        <div class="box_header">
                            <h2>
                                اخبار سیاسی
                            </h2>
                        </div>
                    </div>
                    <div class="row container_box">
                    <?php
                    
                    while($row_siyasi_query1=$result_siyasi_query1->fetch_assoc()){
                        $idd=$row_siyasi_query1['id'];
                    while($row_siyasi_query=$result_siyasi_query->fetch_assoc()){ ?>
                        <div class="col-5 p-0">
                            <a href="#" target="_blank">
                                <img src="image/<?php echo $row_siyasi_query['image']; ?>" class="img-fluid" alt="" title="">
                            </a>
                        </div>
                        <div class="col-7 p-0">
                            <a href="#" target="_blank" class="">
                            <?php echo $row_siyasi_query['title']; ?>
                            </a>
                        </div>
                        <?php }
                          } ?>
                        
                    </div>
                </div>
            </section>
        </div>
        <div class="col-12 col-md-3">
        <section class="box box_1 participation">
                <div class="col-12">
                    <div class="row">
                        <div class="box_header">
                            <h2>
                                اخبار فرهنگی
                            </h2>
                        </div>
                    </div>
                    <div class="row container_box">
                    <?php
                    
                    while($row_farhangi_query1=$result_farhangi_query1->fetch_assoc()){
                        $farhangi_id=$row_farhangi_query1['id'];
                    while($row_farhangi_query=$result_farhangi_query->fetch_assoc()){ ?>
                        <div class="col-5 p-0">
                            <a href="#" target="_blank">
                                <img src="image/<?php echo $row_farhangi_query['image']; ?>" class="img-fluid" alt="" title="">
                            </a>
                        </div>
                        <div class="col-7 p-0">
                            <a href="#" target="_blank" class="">
                            <?php echo $row_farhangi_query['title']; ?>
                            </a>
                        </div>
                        <?php }
                    } ?>
                    </div>
                </div>
            </section>
            <section class="box ads">
            <?php
            $keyy="Advertise_right3_about_us";
           include("setting_query_result.php");
?>
                <div class="col-12 text-center p-0">
                    <a href="<?php echo $setting_row['link']; ?>" target="_blank">
                        <img src="image/<?php echo $setting_row['value_setting']; ?>" class="img-fluid w-100"  alt="" title="">
                    </a>
                </div>
                <?php
             $keyy="Advertise_right3_about_us";
           include("setting_query_result.php");
?>
                <div class="col-12 text-center p-0">
                    <a href="<?php echo $setting_row['link']; ?>" target="_blank">
                        <img src="image/<?php echo $setting_row['value_setting']; ?>" class="img-fluid w-100" alt="" title="">
                    </a>
                </div>
                <?php
            $keyy="Advertise_right4_about_us";
           include("setting_query_result.php");
?>
                <div class="col-12 text-center p-0">
                    <a href="<?php echo $setting_row['link']; ?>" target="_blank">
                        <img src="image/<?php echo $setting_row['value_setting']; ?>" class="img-fluid w-100" alt="" title="">
                    </a>
                </div>
            </section>
            <section class="box web2">
                <div class="col-12">
                    <div class="row">
                        <div class="box_header">
                            <p>آخرین اخبار و اطلاعیه های فروش خودرو car.ir</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="web_box_content">
                            <ul>
                                <li><a href="#" target="_blank">بلیط هواپیما</a> </li>
                                <li><a href="#" target="_blank">بلیط اتوبوس</a> </li>
                                <li><a href="#" target="_blank">نرم افزار حسابداری</a> </li>
                                <li><a href="#" target="_blank">دوره جامع داوری با تدریس دکتر توکلی</a> </li>
                                <li><a href="#" target="_blank">سفارش بک لینک</a> </li>
                                <li><a href="#" target="_blank">تور آنتالیا</a> </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
            <section class="box web2">
                <div class="col-12">
                    <div class="row">
                        <div class="box_header">
                            <p>وبگردی</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="web_box_content">
                            <ul>
                                <li><a href="#" target="_blank">بلیط هواپیما</a> </li>
                                <li><a href="#" target="_blank">بلیط اتوبوس</a> </li>
                                <li><a href="#" target="_blank">نرم افزار حسابداری</a> </li>
                                <li><a href="#" target="_blank">دوره جامع داوری با تدریس دکتر توکلی</a> </li>
                                <li><a href="#" target="_blank">سفارش بک لینک</a> </li>
                                <li><a href="#" target="_blank">تور آنتالیا</a> </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
            <section class="box box_1 participation">
                <div class="col-12">
                    <div class="row">
                        <div class="box_header">
                            <h2>
                                ایرانگردی
                            </h2>
                        </div>
                    </div>
                        
                    <div class="row container_box">
                    <?php 
                                $parent_id=5;
                                while($category_ostan_row1=$category_ostan_result1->fetch_assoc()){
                                    $category_id=$category_ostan_row1['id'];
                              while($row_ostan_query1=$result_ostan_query1->fetch_assoc()){ ?>
                        <div class="col-5 p-0">
                            <a href="#" target="_blank">
                                <img src="image/<?php echo $row_ostan_query1['image']; ?>" class="img-fluid" alt="" title="">
                            </a>
                        </div>
                        <div class="col-7 p-0">
                            <a href="#" target="_blank" class="">
                            <?php echo $row_ostan_query1['title']; ?>
                            </a>
                        </div>
                        <?php } 
                                }
                        ?>
                    </div>
                </div>
            </section>
            <section class="box box_1 participation">
                <div class="col-12">
                    <div class="row">
                        <div class="box_header">
                            <h2>
                                اقتصادی
                            </h2>
                        </div>
                    </div>
                    <div class="row container_box">
                    <?php
                    
                    while($row_eghtesad_query1=$result_eghtesad_query1->fetch_assoc()){
                        $eghtesad_id=$row_eghtesad_query1['id'];
                    while($row_eghtesad_query=$result_eghtesad_query->fetch_assoc()){ ?>
                        <div class="col-6 p-0 boxing">
                            <a href="#" target="_blank">
                                <img src="image/<?php echo $row_eghtesad_query['image']; ?>" class="img-fluid" alt="" title="">
                                <div class="">
                                    <p>ببینید | <?php echo $row_eghtesad_query['title']; ?> </p>
                                </div>
                            </a>
                        </div>
                        <?php } 
                        }
                        ?>
                    </div>
                </div>
            </section>
            <section class="box web2">
                <div class="col-12">
                    <div class="row">
                        <div class="box_header">
                            <p>برگزیده های خبرورزشی</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="web_box_content">
                            <ul>
                                <?php
                                getCategories(1);
                                 while($row_sport_query3=$result_sport_query3->fetch_assoc()){
                                     $category_idd=$row_sport_query3['id'];
                                 while($row_sport_query3=$result_sport_query3->fetch_assoc()){
                                
                                ?>
                                <li><a href="#" target="_blank"><?php echo $row_sport_query3['title'] ?> </a> </li>
                                <?php }
                                 } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>



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