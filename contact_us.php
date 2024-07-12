<?php
session_start();
?>
<html >
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
            <section class="box ads">
            <?php
            $setting_Query="SELECT * FROM   setting where key_setting='Advertise_right1_about_us' ";
           include("setting_query_result.php");
?>
                <div class="col-12 text-center p-0">
                    <a href="#" target="_blank">
                        <img src="image/<?php echo $setting_row['value_setting']; ?>" class="img-fluid w-100"  alt="" title="">
                    </a>
                </div>
                <?php
            $setting_Query="SELECT * FROM   setting where key_setting='Advertise_right2_about_us' ";
           include("setting_query_result.php");
?>
                <div class="col-12 text-center p-0">
                    <a href="#" target="_blank">
                        <img src="image/<?php echo $setting_row['value_setting']; ?>" class="img-fluid w-100" alt="" title="">
                    </a>
                </div>
                <?php
            $setting_Query="SELECT * FROM   setting where key_setting='Advertise_right3_about_us' ";
           include("setting_query_result.php");
?>
                <div class="col-12 text-center p-0">
                    <a href="#" target="_blank">
                        <img src="image/<?php echo $setting_row['value_setting']; ?>" class="img-fluid w-100" alt="" title="">
                    </a>
                </div>
                <div class="row">
                <?php
                                $article___query="SELECT * FROM articles ORDER BY viewcount ASC LIMIT 3";
                                $article___result=mysqli_query($link,$article___query);
                                while($article___row=mysqli_fetch_array($article___result)){

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
            </section>
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
            $setting_Query="SELECT * FROM   setting where key_setting='Advertise_right3_about_us' ";
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
                                $article___query="SELECT * FROM articles LIMIT 6";
                                $article___result=mysqli_query($link,$article___query);
                                while($article___row=mysqli_fetch_array($article___result)){

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
                                $article__query="SELECT * FROM articles  LIMIT 5";
                                $article__result=mysqli_query($link,$article__query);
                                while($article__row=mysqli_fetch_array($article__result)){
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
                                <?php $end_news_query2="SELECT * FROM `articles` ORDER BY RAND() LIMIT 4";
                                 $result_end_news_query2=mysqli_query($link,$end_news_query2);
                              while($row_end_news_query2=mysqli_fetch_array($result_end_news_query2)){ ?>
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
                                $category_ostan4="SELECT * FROM categorys WHERE parent_id=10";
                                $category_ostan_result4=mysqli_query($link,$category_ostan4);
                                while($category_ostan_row4=mysqli_fetch_array($category_ostan_result4)){
                                    $category_id4=$category_ostan_row4['id'];
                                $ostan_query4="SELECT * FROM `articles` WHERE category_id=$category_id4  ORDER BY publicationdate ";
                                 $result_ostan_query4=mysqli_query($link,$ostan_query4);
                              while($row_ostan_query4=mysqli_fetch_array($result_ostan_query4)){ ?>
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
                        <?php $coment_count="SELECT DISTINCT articles.id,articles.image,articles.title,articles.slug  FROM comments , articles WHERE comments.article_id=articles.id  LIMIT 10";
                        $coment_result=mysqli_query($link,$coment_count);
                        while($coment_row=mysqli_fetch_array($coment_result)){ ?>
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
                    $siyasi_query1="SELECT * FROM categorys WHERE parent_id=3 ";
                    $result_siyasi_query1=mysqli_query($link,$siyasi_query1);
                    while($row_siyasi_query1=mysqli_fetch_array($result_siyasi_query1)){
                        $idd=$row_siyasi_query1['id'];
                    $siyasi_query="SELECT * FROM `articles` WHERE category_id=$idd  ORDER BY publicationdate LIMIT 4";
                                 $result_siyasi_query=mysqli_query($link,$siyasi_query);
                              while($row_siyasi_query=mysqli_fetch_array($result_siyasi_query)){ ?>
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
                    $farhangi_query1="SELECT * FROM categorys WHERE parent_id=2 ";
                    $result_farhangi_query1=mysqli_query($link,$farhangi_query1);
                    while($row_farhangi_query1=mysqli_fetch_array($result_farhangi_query1)){
                        $idid=$row_farhangi_query1['id'];
                    $farhangi_query="SELECT * FROM `articles` WHERE category_id=$idid  ORDER BY publicationdate LIMIT 4";
                                 $result_farhangi_query=mysqli_query($link,$farhangi_query);
                              while($row_farhangi_query=mysqli_fetch_array($result_farhangi_query)){ ?>
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
            $setting_Query="SELECT * FROM   setting where key_setting='Advertise_right3_about_us' ";
           include("setting_query_result.php");
?>
                <div class="col-12 text-center p-0">
                    <a href="<?php echo $setting_row['link']; ?>" target="_blank">
                        <img src="image/<?php echo $setting_row['value_setting']; ?>" class="img-fluid w-100"  alt="" title="">
                    </a>
                </div>
                <?php
            $setting_Query="SELECT * FROM   setting where key_setting='Advertise_right3_about_us' ";
           include("setting_query_result.php");
?>
                <div class="col-12 text-center p-0">
                    <a href="<?php echo $setting_row['link']; ?>" target="_blank">
                        <img src="image/<?php echo $setting_row['value_setting']; ?>" class="img-fluid w-100" alt="" title="">
                    </a>
                </div>
                <?php
            $setting_Query="SELECT * FROM   setting where key_setting='Advertise_right3_about_us' ";
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
                                $category_ostan1="SELECT * FROM categorys WHERE parent_id=10";
                                $category_ostan_result1=mysqli_query($link,$category_ostan1);
                                while($category_ostan_row1=mysqli_fetch_array($category_ostan_result1)){
                                    $category_id=$category_ostan_row1['id'];
                                $ostan_query1="SELECT * FROM `articles` WHERE category_id=$category_id  ORDER BY publicationdate ";
                                 $result_ostan_query1=mysqli_query($link,$ostan_query1);
                              while($row_ostan_query1=mysqli_fetch_array($result_ostan_query1)){ ?>
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
                    $eghtesad_query1="SELECT * FROM categorys WHERE parent_id=4 ";
                    $result_eghtesad_query1=mysqli_query($link,$eghtesad_query1);
                    while($row_eghtesad_query1=mysqli_fetch_array($result_eghtesad_query1)){
                        $dd=$row_eghtesad_query1['id'];
                    $eghtesad_query="SELECT * FROM `articles` WHERE category_id=$dd  ORDER BY publicationdate LIMIT 4";
                                 $result_eghtesad_query=mysqli_query($link,$eghtesad_query);
                              while($row_eghtesad_query=mysqli_fetch_array($result_eghtesad_query)){ ?>
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
                                 $sport_query3="SELECT * FROM categorys WHERE parent_id=5 ";
                                 $result_sport_query3=mysqli_query($link,$sport_query3);
                                 while($row_sport_query3=mysqli_fetch_array($result_sport_query3)){
                                     $category_idd=$row_sport_query3['id'];
                                             $sport_query3="SELECT * FROM `articles` WHERE category_id=$category_idd  AND viewcount>0 ORDER BY publicationdate LIMIT 6";
                                              $result_sport_query3=mysqli_query($link,$sport_query3);
                                           while($row_sport_query3=mysqli_fetch_array($result_sport_query3)){
                                
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