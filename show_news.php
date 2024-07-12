<?php session_start();
$link=mysqli_connect("localhost","root","","news");
$article_slug=$_GET['article_slug'];
$article_queryy="SELECT * FROM articles WHERE slug='$article_slug'";
$article_resultt=mysqli_query($link,$article_queryy);
$article_roww=mysqli_fetch_array($article_resultt);
$article_id=$article_roww['id'];
$query_update_viewcount="UPDATE `articles` SET `viewcount`=viewcount+1 WHERE id = $article_id ;";
if(mysqli_query($link,$query_update_viewcount))
echo "";
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
        <div class="col-12 col-md-6">
            <section class="box ads">
                <?php
            $setting_Query="SELECT * FROM   setting where key_setting='Advertise_right1_show_news' ";
            include("setting_query_result.php");
            ?>
                <div class="col-12 text-center p-0">
                    <a href="<?php echo $setting_row['link']; ?>" target="_blank">
                        <img src="image/<?php echo $setting_row['value_setting']; ?>" class="img-fluid w-100"  alt="" title="">
                    </a>
                </div>
                <?php
            $setting_Query="SELECT * FROM   setting where key_setting='Advertise_right2_show_news' ";
            include("setting_query_result.php");
            ?>
                <div class="col-12 text-center p-0">
                    <a href="<?php echo $setting_row['link']; ?>" target="_blank">
                        <img src="image/<?php echo $setting_row['value_setting']; ?>" class="img-fluid w-100" alt="" title="">
                    </a>
                </div>
                <?php
            $setting_Query="SELECT * FROM   setting where key_setting='Advertise_right3_show_news' ";
            include("setting_query_result.php");
            ?>
                <div class="col-12 text-center p-0">
                    <a href="<?php echo $setting_row['link']; ?>" target="_blank">
                        <img src="image/<?php echo $setting_row['value_setting']; ?>" class="img-fluid w-100" alt="" title="">
                    </a>
                </div>
                <div class="row">
                    <?php
                    $category_id_article=$article_roww['category_id'];
                    $article_quer="SELECT * FROM articles WHERE category_id=$category_id_article LIMIT 4";
                    $article_resul=mysqli_query($link,$article_quer);
                    while($article_ro=mysqli_fetch_array($article_resul)){
                    ?>
                    <div class="col-6 col-lg-3">
                        <a href="show_news.php?article_slug=<?php echo $article_ro['slug']; ?>">
                            <img src="image/<?php echo $article_ro['image']; ?>" class="img-fluid" alt="" title="">
                            <div class="ads_text">
                                <p> <?php echo $article_ro['title']; ?></p>
                            </div>
                        </a>
                    </div>
                    <?php } ?>
                </div>
            </section>
            <article class="show-news">
                <div class="row">
                    <div class="col-12">
                        <ul class="breadcrumb mb-4">
                            <?php
                              $category_id_article=$article_roww['category_id'];
                              $category_mini_query="SELECT * FROM categorys WHERE id=$category_id_article";
                              $category_mini_result=mysqli_query($link,$category_mini_query);
                              $category_mini_row=mysqli_fetch_array($category_mini_result);
                              $category_parent_id=$category_mini_row['parent_id'];
                              $category_parent_query="SELECT * FROM categorys WHERE parent_id=0 and id=$category_parent_id";
                              $category_parent_result=mysqli_query($link,$category_parent_query);
                              $category_parent_row=mysqli_fetch_array($category_parent_result);

                            
                            ?>
                            <li class="breadcrumb-item"><a href="index.php">صفحه اصلی</a> </li>
                            <li class="breadcrumb-item"><a href="archive.php">  <?php echo $category_parent_row['title'] ;?></a> </li>
                            <li class="breadcrumb-item active"><?php echo $category_mini_row['title'] ;?> </li>
                        </ul>
                        <div class="show-news-header col">
                            <?php ?>
                            <div class="row">
                                <div class="col-4">
                                    <div class="rating">
                                        <div class="rate-count">
                                          <?php echo $article_roww['viewcount'] ;?> نفر
                                        </div>
                                        <div class="starrating risingstar justify-content-center flex-row-reverse">
                                            <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="5 star"><i class="fas fa-star"></i></label>
                                            <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="4 star"><i class="fas fa-star"></i></label>
                                            <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="3 star"><i class="fas fa-star"></i></label>
                                            <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="2 star"><i class="fas fa-star"></i></label>
                                            <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="1 star"><i class="fas fa-star"></i></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="news-time text-center">
                                        <span>  <?php echo $article_roww['publicationdate'] ;?></span>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="news-print text-left">
                                        <a href="#"><i class="fas fa-print"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="show-news-title my-4">
                            <h2>
                                <a href="show_news.php?article_slug=<?php echo $article_roww['slug'] ;?>">
                                <?php echo $article_roww['title'] ;?>
                                 </a>
                            </h2>
                        </div>
                        <div class="show-news-summary">
                            <div class="row">
                                <div class="col-6">
                                    <p>   <?php echo $article_roww['summery'] ;?> </p>
                                </div>
                                <div class="col-6">
                                    <img src="image/<?php echo $article_roww['image'] ;?>" alt="" title="" class="img-fluid img-thumbnail w-100">
                                </div>
                            </div>
                        </div>
                        <div class="show-news-body">
                            <div>
                            <?php echo $article_roww['content'] ;?>
                            </div>
                        </div>
                        <div class="news-code">
                            <p>کد خبر <span>  <?php echo $article_roww['id'] ;?></span></p>
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
                        <span>  <?php echo $article_roww['source'] ;?></span>
                    </div>
                </div>
            </article>
            <section class="box ads">
            <?php
            $setting_Query="SELECT * FROM   setting where key_setting='Advertise_right4_show_news' ";
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
                                $article1___query="SELECT * FROM articles LIMIT 6";
                                $article1___result=mysqli_query($link,$article1___query);
                                while($article1___row=mysqli_fetch_array($article1___result)){

                                ?>
                            <div class="col-6 col-lg-4">
                                <a href="show_news.php?article_slug=<?php echo $article1___row['slug']; ?>">
                                    <img src="image/<?php echo $article1___row['image']; ?>" class="img-fluid" alt="" title="">
                                    <div class="ads_text">
                                        <p><?php echo $article1___row['title']; ?></p>
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
                                <a href="#">برچسب ها</a>
                            </h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 p-0">
                            <ul>
                                <?php
                                $article_tag_query="SELECT * FROM article_tag WHERE article_id=$article_id";
                                $article_tag_result=mysqli_query($link,$article_tag_query);
                                while($article_tag_row=mysqli_fetch_array($article_tag_result)){
                                    $tag_id=$article_tag_row['tag_id'];
                                    $tag_query="SELECT * FROM tags WHERE id=$tag_id";
                                $tag_result=mysqli_query($link,$tag_query);
                                while($tag_row=mysqli_fetch_array($tag_result)){

                                ?>

                                <li><a href="archive.php"><?php echo $tag_row['title']; ?></a> </li>
                                <?php } 
                                } ?>
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
                                    <li><a href="show_news.php?article_slug=<?php echo $article__row['slug']; ?>"> <?php echo $article__row['title']; ?> </a> </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="box box_1">
                <div class="col-12">
                    <div class="row">
                        <div class="box_header">
                            <h2>
                                <a href="#">نظر شما</a>
                            </h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 p-0">
                        
                            <form action="action_insert_comment.php?article_slug=<?php echo $article_slug; ?>" method="post" name="comment_form">
                                <fieldset class="row">
                                    <div class="col-12 col-md-6 form-group name-group">
                                        <label for="userName">نام</label>
                                        <input type="text" id="userName" name="name" placeholder="نام" maxlength="50" class="form-control" data-minlength="3" data-required-msg="لطفا نام خود را وارد کنید.">
                                    </div>
                                    <div class="col-12 col-md-6 form-group email-group">
                                        <label for="userEmail">ایمیل</label>
                                        <input type="email" placeholder="ایمیل" class="form-control ltr" id="userEmail" name="Email" maxlength="80">
                                    </div>
                                    <div class="col-12 form-group text-group">
                                        <label for="body">نظر شما *</label>
                                        <textarea maxlength="1000" placeholder="نظر شما" data-required-msg="لطفاً نظر خود را وارد کنید." class="form-control" required="true" id="body" name="comment" rows="5"></textarea>
                                    </div><div class="col-12 col-md-6 form-group captcha-group">
                                    <div class="captcha">
                                        <input id="captchaKey" name="captchaKey" value="-4573118011947117407" type="hidden">
                                        <label for="number"><i class="req">*</i> لطفا حاصل عبارت را در جعبه متن روبرو وارد کنید</label>

                                    </div></div>
                                    <div class="col-12 col-md-6">
                                        <div style="direction: ltr">
                                        <?php
                                        $num1=rand(1,10);
                                        $num2=rand(1,10);
                                        $sum= $num1 + $num2;
                                        ?>
                                        <input type="number" name="real_sum" value="<?php echo $sum; ?>" style="opacity: 0;position: absolute;">
                                            <div class="captcha-image d-inline-block"><?php echo $num1; ?> +<?php echo $num2; ?>=
                                            </div>
                                            <div class="captcha-input d-inline-block">
                                                <input type="number" name="sum" id="number" required="required" data-required-msg="حاصل عبارت را وارد کنید.">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 form-group submit-group">
                                        <button class="btn btn-default" id="btnSave" type="submit" name="btnsubmit">ارسال</button>
                                        <div class="msg"></div>
                                    </div>
                                </fieldset>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-12 col-md-3">
            <section class="box box_news box_caricature">
                <ul class="nav nav-tabs my-2" role="tablist">
                    <li class="nav-item">
                        <a href="#content" class="nav-link active text-right " data-toggle="tab"></a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="content" class="tab-pane active">
                        <div class="col-12 p-0">
                            <div class="owl-carousel4 owl-carousel owl-theme">
                            <?php $end_news_query="SELECT * FROM `articles` ORDER BY `publicationdate` LIMIT 4";
                                 $result_end_news_query=mysqli_query($link,$end_news_query);
                              while($row_end_news_query=mysqli_fetch_array($result_end_news_query)){ ?>
                                <div class="item">
                                    <a href="show_news.php?article_slug=<?php echo $row_end_news_query['slug'] ;?>" target="_blank">
                                        <img src="image/<?php echo $row_end_news_query['image'] ;?>" class="img-fluid" alt="" title="">
                                        <p><?php echo $row_end_news_query['title'] ;?></p>
                                    </a>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="box box_1 last_news">
                <div class="col-12">
                    <div class="row">
                        <div class="box_header">
                            <h2>
                                <a href="category.php">آخرین مطالب استان ها</a>
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
                                <li><a href="show_news.php?article_slug=<?php echo $row_ostan_query4['slug'] ;?>"><?php echo  $row_ostan_query4['title'];?></a> </li>
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
                                <a href="archive.php">آخرین اخبار</a>
                            </h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="most_viewed_news">
                            <ul>
                            <?php $end_news_query="SELECT * FROM `articles` ORDER BY `publicationdate` ";
                                 $result_end_news_query=mysqli_query($link,$end_news_query);
                              while($row_end_news_query=mysqli_fetch_array($result_end_news_query)){ ?>
                                <li><a href="show_news.php?article_slug=<?php echo $row_end_news_query['slug'] ;?>"> <?php echo $row_end_news_query['title']; ?></a> </li>
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
                        <?php $coment_count="SELECT DISTINCT articles.id,articles.image,articles.title  FROM comments , articles WHERE comments.article_id=articles.id  LIMIT 10";
                        $coment_result=mysqli_query($link,$coment_count);
                        while($coment_row=mysqli_fetch_array($coment_result)){ ?>
                        <div class="col-5 p-0">
                            <a href="show_news.php?article_slug=<?php echo $coment_row['slug'] ;?>" target="_blank">
                                <img src="image/<?php echo $coment_row['image'] ; ?>" class="img-fluid" alt="" title="">
                            </a>
                        </div>
                        <div class="col-7 p-0">
                            <a href="show_news.php?article_slug=<?php echo $coment_row['slug'] ;?>" target="_blank" class="">
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
                            <a href="show_news.php?article_slug=<?php echo $row_siyasi_query['slug'] ;?>" target="_blank">
                                <img src="image/<?php echo $row_siyasi_query['image']; ?>" class="img-fluid" alt="" title="">
                            </a>
                        </div>
                        <div class="col-7 p-0">
                            <a href="show_news.php?article_slug=<?php echo $row_siyasi_query['slug'] ;?>" target="_blank" class="">
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
                            <a href="show_news.php?article_slug=<?php echo $row_farhangi_query['slug'] ;?>" target="_blank">
                                <img src="image/<?php echo $row_farhangi_query['image']; ?>" class="img-fluid" alt="" title="">
                            </a>
                        </div>
                        <div class="col-7 p-0">
                            <a href="show_news.php?article_slug=<?php echo $row_farhangi_query['slug'] ;?>" target="_blank" class="">
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
            $setting_Query="SELECT * FROM   setting where key_setting='Advertise_left1_show_news' ";
            include("setting_query_result.php");
            ?>
                <div class="col-12 text-center p-0">
                    <a href="#" target="_blank">
                        <img src="image/<?php echo $setting_row['value_setting']; ?>" class="img-fluid w-100"  alt="" title="">
                    </a>
                </div>
                <?php
            $setting_Query="SELECT * FROM   setting where key_setting='Advertise_left2_show_news' ";
            include("setting_query_result.php");
            ?>
                <div class="col-12 text-center p-0">
                    <a href="#" target="_blank">
                        <img src="image/<?php echo $setting_row['value_setting']; ?>" class="img-fluid w-100" alt="" title="">
                    </a>
                </div>
                <?php
            $setting_Query="SELECT * FROM   setting where key_setting='Advertise_left3_show_news' ";
            include("setting_query_result.php");
            ?>
                <div class="col-12 text-center p-0">
                    <a href="#" target="_blank">
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
                            <a href="show_news.php?article_slug=<?php echo $row_ostan_query1['slug'] ;?>" target="_blank">
                                <img src="image/<?php echo $row_ostan_query1['image']; ?>" class="img-fluid" alt="" title="">
                            </a>
                        </div>
                        <div class="col-7 p-0">
                            <a href="show_news.php?article_slug=<?php echo $row_ostan_query1['slug'] ;?>" target="_blank" class="">
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
                            <a href="show_news.php?article_slug=<?php echo $row_eghtesad_query['slug'] ;?>" target="_blank">
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
                                <li><a href="show_news.php?article_slug=<?php echo $row_sport_query3['slug'] ;?>" target="_blank"><?php echo $row_sport_query3['title'] ?> </a> </li>
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






<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="js/popper.min.js" type="text/javascript"></script>
<script src="js/bootstrap.js" type="text/javascript"></script>
<script src="js/owl.carousel.js" type="text/javascript"></script>
<script src="js/js.js" type="text/javascript"></script>
<script src="js/fontawesome.js" type="text/javascript"></script>
<script src="js/yBox.js" type="text/javascript"></script>
</body>
</html>