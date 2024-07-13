<?php
session_start();
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
            <section class="box">
                <div id="carousel" class="carousel slide" data-ride="carousel">
                    <ul class="carousel-indicators">
                        <li data-target="#carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel" data-slide-to="1"></li>
                        <li data-target="#carousel" data-slide-to="2"></li>
                    </ul>
                    <div class="carousel-inner">
                    <?php
                            $query_article_view3="SELECT * FROM `articles` WHERE viewcount>0 ORDER BY RAND() LIMIT 3 ";
                            $article_result3=mysqli_query($link,$query_article_view3);
                            $counter1=0;
                            while($row_article_view3=mysqli_fetch_array($article_result3)){
                               
                    ?>
                        <div class="carousel-item <?php if ($counter1==0) 
                        echo ' active';?>">
                           
                            <a href="show_news.php?article_slug=<?php echo $row_article_view3['slug'] ; ?>" target="_blank">
                                <img src="image/<?php echo $row_article_view3['image'];  ?>" alt="" class="img-fluid">
                                <div class="carousel-caption">
                                    <p>
                                       <?php echo $row_article_view3['summery'];  ?>
                                    </p>
                                    <h2>
                                    <?php echo $row_article_view3['title'];  ?>
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
                            $query_article_view1="SELECT * FROM `articles` ORDER BY RAND() LIMIT 4  ";
                            $article_result1=mysqli_query($link,$query_article_view1);
                            while($row_article_view1=mysqli_fetch_array($article_result1)){
                               
                    ?>
                            <div class="col-6 mt-4">
                                <div class="row">
                                    <div class="col-12 text-center text-md-right col-lg-5 p-md-1 p-lg-0">
                                        <a href="show_news.php?article_slug=<?php echo $row_article_view1['slug'] ; ?>" target="_blank">
                                            <img src="image/<?php echo $row_article_view1['image']; ?>" class="img-fluid" alt="" title="">
                                        </a>
                                    </div>
                                    <div class="col-12 text-center text-md-right col-lg-7 p-md-1 p-lg-0">
                                        <div class="desc_news ">
                                            <h3>
                                                <a href="show_news.php?article_slug=<?php echo $row_article_view1['slug'] ; ?>" target="_blank">ببینید | <?php echo $row_article_view1['title']; ?></a>
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
                        <a href="#box2" class="nav-link " data-toggle="tab">پربحث ترین ها</a>
                    </li>
                    <li class="nav-item">
                        <a href="#box4" class="nav-link" data-toggle="tab">آخرین نظرات</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="box2" class="tab-pane active fade">
                        <div class="row">
                        <?php $query_article_view11="SELECT * FROM `articles` WHERE viewcount>5 ";
                            $article_result11=mysqli_query($link,$query_article_view11);
                            while($row_article_view11=mysqli_fetch_array($article_result11)){?>
                            <div class="col12 col-lg-6">
                                <div class="desc_news">
                                    <h3>
                                        <a href="show_news.php?article_slug=<?php echo $row_article_view11['slug'] ; ?>" target="_blank"> <?php echo $row_article_view11['title']; ?> </a>
                                    </h3>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    
                    <?php
                    $comment_query="SELECT * FROM comments WHERE venify=1 ORDER BY comments.date LIMIT 2 ";
                    $comment_result=mysqli_query($link,$comment_query);

                     ?>
                    <div id="box4" class="tab-pane fade">
                        <div class="col-12 show_comment">
                            <?php while($row_comment=mysqli_fetch_array($comment_result)){ ?>
                            <div class="row mt-2">
                                <div class="col-12 comment_header">
                                    <div class="row">
                                        <div class="col-6 username">
                                            <i class="fas fa-user"></i>
                                            <?php echo $row_comment['name']; ?>
                                        </div>
                                        <div class="col-6 time">
                                            <i class="far fa-calendar-alt"></i>
                                            <?php echo $row_comment['date'];?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 comment_body">
                                    <div class="news_title">
                                        <?php $article_id=$row_comment['article_id'];
                                          $article_Query_comment="SELECT * FROM articles WHERE id=$article_id";
                                          $r=mysqli_query($link,$article_Query_comment);
                                          $rr=mysqli_fetch_array($r)
                                                ?>
                                        <h3>
                                            <a href="show_news.php?article_slug=<?php echo $rr['slug'] ; ?>" target="_blank"> <?php  echo $rr['title']; ?></a>
                                        </h3>
                                    </div>
                                    <div class="comment">
                                        <p>  <?php echo $row_comment['comment'];?> </p>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </section>
            <section class="box box_1">
                <div class="col-12">
                    <div class="row">
                        <div class="box_header">
                            <h2>
                                <a href="#">یادداشت</a>
                            </h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="owl-carousel1 owl-carousel owl-theme">
                                    <div class="item">
                                        <a href="show_news.html" target="_blank" class="text-dark">
                                            <div>
                                                <img src="image/1.jpg" class="img-fluid" alt="" title="">
                                            </div>
                                            <div class="text-center">
                                                <p class="p-2">عنوان یاداشت</p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="show_news.html" target="_blank" class="text-dark">
                                            <div>
                                                <img src="image/2.jpg" class="img-fluid" alt="" title="">
                                            </div>
                                            <div class="text-center">
                                                <p class="p-2">عنوان یاداشت</p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="show_news.html" target="_blank" class="text-dark">
                                            <div>
                                                <img src="image/3.jpg" class="img-fluid" alt="" title="">
                                            </div>
                                            <div class="text-center">
                                                <p class="p-2">عنوان یاداشت</p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="show_news.html" target="_blank" class="text-dark">
                                            <div>
                                                <img src="image/index-carusel-image1.jpg" class="img-fluid" alt="" title="">
                                            </div>
                                            <div class="text-center">
                                                <p class="p-2">عنوان یاداشت</p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="show_news.html" target="_blank" class="text-dark">
                                            <div>
                                                <img src="image/index-carusel-image3.jpg" class="img-fluid" alt="" title="">
                                            </div>
                                            <div class="text-center">
                                                <p class="p-2">عنوان یاداشت</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php 
            $categoryn_parentt="SELECT * FROM `categorys` WHERE parent_id=0 ";
               $result_category_parentt=mysqli_query($link,$categoryn_parentt); 
               while ($row_parent_category=mysqli_fetch_array($result_category_parentt)){
               ?>
            <section class="box box_2">
                
                <?php 
                $category_id_category=$row_parent_category['id'];
                $category_small="SELECT * FROM categorys WHERE parent_id=$category_id_category";
                $category_small_result=mysqli_query($link,$category_small);
                while($category_small_row=mysqli_fetch_array($category_small_result)){
                    $categorry_id=$category_small_row['id'];
                
              $article_category_id="SELECT * FROM `articles` WHERE category_id=$categorry_id  ORDER BY publicationdate";
               $result_article_category=mysqli_query($link,$article_category_id); 
               $row_article_category=mysqli_fetch_array($result_article_category);
            }
                ?>
                <div class="col-12">
                    <div class="row">
                        <div class="box_header">
                            <h2>
                                <a href="archive.php"><?php echo $row_parent_category['title']; ?></a>
                            </h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div>
                                <a href="show_news.php?article_slug=<?php echo $row_article_category['slug'] ; ?>" target="_blank">
                                    <img src="image/<?php echo $row_article_category['image']; ?>" alt="" title="" class="img-fluid">
                                </a>
                                <div class="desc">
                                    <h2><a href="show_news.php?article_slug=<?php echo $row_article_category['slug'] ; ?>"> <?php echo $row_article_category['title']; ?></a> </h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="most_viewed_news">
                                <ul>
                                    <?php  
                                    $cc="SELECT * FROM categorys WHERE parent_id=$category_id_category";
                                    $rr=mysqli_query($link,$cc);
                                    while($cr=mysqli_fetch_array($rr)){
                                        $category_id=$cr['id'];
                                    $tt="SELECT * FROM `articles` WHERE category_id=$category_id  ORDER BY publicationdate ";
                                     $tr=mysqli_query($link,$tt);
                                  while($ttr=mysqli_fetch_array($tr)){
 ?>
                                    <li><a href="show_news.php?article_slug=<?php echo $ttr['slug'] ; ?>" > </a> <?php echo $ttr['title']; ?> </li>
                                    <?php 
                                    } 
                                    } ?>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
            </section>
            <?php  }
        ?>
            
        </div>
        <div class="col-12 col-md-3">
            <section class="box box_news">
                <ul class="nav nav-tabs " role="tablist">
                    <li class="nav-item">
                        <a href="#most_viewed" class="nav-link active" data-toggle="tab">پربیننده ترین</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="most_viewed" class="tab-pane active">
                        <div class="most_viewed_news">
                            <ul>
                            <?php
                            $query_article_vieww="SELECT * FROM `articles` WHERE viewcount>0 ORDER BY viewcount ";
                            $article_resultt=mysqli_query($link,$query_article_vieww);
                            while($row_article_vieww=mysqli_fetch_array($article_resultt))
                            {  ?>
                                <li><a href="show_news.php?article_slug=<?php echo $row_article_vieww['slug'] ; ?>"><?php echo $row_article_vieww['title']; ?> </a> </li><?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
            <section class="box ads">
            <?php
            $setting_Query="SELECT * FROM   setting where key_setting='Advertise_middel1_index' ";
           include("setting_query_result.php");
?>
                <div class="col-12 text-center p-0">
                    <a href="<?php echo $setting_row['link']; ?>" target="_blank">
                        <img src="image/<?php echo $setting_row['value_setting']; ?>" class="img-fluid w-100"  alt="" title="">
                    </a>
                </div>
                <?php
            $setting_Query="SELECT * FROM   setting where key_setting='Advertise_middel2_index' ";
           include("setting_query_result.php");
?>
                <div class="col-12 text-center p-0">
                    <a href="<?php echo $setting_row['link']; ?>" target="_blank">
                        <img src="image/<?php echo $setting_row['value_setting']; ?>" class="img-fluid w-100" alt="" title="">
                    </a>
                </div>
            </section>
            <section class="box box_1 suggested_content">
                <div class="col-12">
                    <div class="row">
                        <div class="box_header">
                            <h2>
                              ورزشی
                            </h2>
                        </div>
                    </div>
                    <div class="row container_box">
                    
                    <?php
                    $sport_query1="SELECT * FROM categorys WHERE parent_id=5 ";
                    $result_sport_query1=mysqli_query($link,$sport_query1);
                    while($row_sport_query1=mysqli_fetch_array($result_sport_query1)){
                        $ididd=$row_sport_query1['id'];
                                $sport_query="SELECT * FROM `articles` WHERE category_id=$ididd  ORDER BY publicationdate LIMIT 4";
                                 $result_sport_query=mysqli_query($link,$sport_query);
                              while($row_sport_query=mysqli_fetch_array($result_sport_query)){ ?>
                        <div class="col-6 p-0 boxing">
                            <a href="show_news.php?article_slug=<?php echo $row_sport_query['slug'] ; ?>" target="_blank">
                                <img src="image/<?php echo $row_sport_query['image']; ?> " class="img-fluid" alt="" title="">
                                <div class="">
                                    <p> <?php echo $row_sport_query['title']; ?></p>
                                </div>
                            </a>
                        </div>
                        <?php }
                        } ?>
                        
                    </div>

                </div>
            </section>
            <section class="box box_1 selected_news">
                <div class="col-12">
                    <div class="row">
                        <div class="box_header">
                            <h2>
                                سیاسی
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
                        <div class="col-6 p-0 boxing">
                            <a href="show_news.php?article_slug=<?php echo $row_siyasi_query['slug'] ; ?>" target="_blank">
                                <img src="image/<?php echo $row_siyasi_query['image']; ?>" class="img-fluid" alt="" title="">
                                <div class="">
                                    <p>ببینید | <?php echo $row_siyasi_query['title']; ?> </p>
                                </div>
                            </a>
                        </div>
                        <?php } 
                        }
                        ?>
                        
                    </div>
                </div>
            </section>
            <section class="box box_1 last_news">
                <div class="col-12">
                    <div class="row">
                        <div class="box_header">
                            <h2>
                                <a href="#">آخرین اخبار</a>
                            </h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="most_viewed_news">
                            <ul>
                            <?php $end_news_query="SELECT * FROM `articles` ORDER BY `publicationdate` ";
                                 $result_end_news_query=mysqli_query($link,$end_news_query);
                              while($row_end_news_query=mysqli_fetch_array($result_end_news_query)){ ?>
                                <li><a href="show_news.php?article_slug=<?php echo $row_end_news_query['slug'] ; ?>"> <?php echo $row_end_news_query['title']; ?></a> </li>
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
            <section class="box box_news box_newspaper d-none d-lg-block">
                <ul class="nav nav-tabs my-2" role="tablist">
                    <li class="nav-item">
                        <a href="#newspaper" class="nav-link active text-right " data-toggle="tab">اخبار</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="newspaper" class="tab-pane active">
                        <div class="col-12">
                            <div class="row">
                                <div class="owl-carousel3 owl-carousel owl-theme">
                                <?php $end_news_query2="SELECT * FROM `articles` ORDER BY `publicationdate` LIMIT 4";
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
        </div>
        <div class="col-12 col-md-3">
            <section class="box box_1 web">
                <div class="col-12">
                    <div class="row">
                        <div class="box_header">
                            <h2>
                                فرهنگی
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
                        <div class="col-6 p-0 boxing">
                            <a href="show_news.php?article_slug=<?php echo $row_farhangi_query['slug'] ; ?>" target="_blank">
                                <img src="image/<?php echo $row_farhangi_query['image']; ?>" class="img-fluid" alt="" title="">
                                <div class="">
                                    <p><?php echo $row_farhangi_query['title']; ?></p>
                                </div>
                            </a>
                        </div>
                        <?php }
                        } ?>
                        
                    </div>

                </div>
            </section>
            <section class="box ads">
                <?php
            $setting_Query="SELECT * FROM   setting where key_setting='Advertise_left1_index' ";
           include("setting_query_result.php");
?>
                <div class="col-12 text-center p-0">
                    <a href="<?php echo $setting_row['link']; ?>" target="_blank">
                        <img src="image/<?php echo $setting_row['value_setting']; ?>" class="img-fluid w-100"  alt="" title="">
                    </a>
                </div>
                <?php
            $setting_Query="SELECT * FROM   setting where key_setting='Advertise_left2_index' ";
           include("setting_query_result.php");
?>
                <div class="col-12 text-center p-0">
                    <a href="<?php echo $setting_row['link']; ?>" target="_blank">
                        <img src="image/<?php echo $setting_row['value_setting']; ?>" class="img-fluid w-100" alt="" title="">
                    </a>
                </div>
                <?php
            $setting_Query="SELECT * FROM   setting where key_setting='Advertise_left3_index' ";
           include("setting_query_result.php");
?>
                <div class="col-12 text-center p-0">
                    <a href="<?php echo $setting_row['link']; ?>" target="_blank">
                        <img src="image/<?php echo $setting_row['value_setting']; ?>" class="img-fluid w-100" alt="" title="">
                    </a>
                </div>
                <?php
            $setting_Query="SELECT * FROM   setting where key_setting='Advertise_left4_index' ";
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
                                $category_ostan="SELECT * FROM categorys WHERE parent_id=10";
                                $category_ostan_result=mysqli_query($link,$category_ostan);
                                while($category_ostan_row=mysqli_fetch_array($category_ostan_result)){
                                    $category_id=$category_ostan_row['id'];
                                $ostan_query="SELECT * FROM `articles` WHERE category_id=$category_id  ORDER BY publicationdate ";
                                 $result_ostan_query=mysqli_query($link,$ostan_query);
                              while($row_ostan_query=mysqli_fetch_array($result_ostan_query)){ ?>
                                <li><a href="show_news.php?article_slug=<?php echo $row_ostan_query['slug'] ; ?>"><?php echo  $row_ostan_query['title'];?></a> </li>
                                <?php } 
                                }?>
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
                            <a href="show_news.php?article_slug=<?php echo $row_ostan_query1['slug'] ; ?>" target="_blank">
                                <img src="image/<?php echo $row_ostan_query1['image']; ?>" class="img-fluid" alt="" title="">
                            </a>
                        </div>
                        <div class="col-7 p-0">
                            <a href="show_news.php?article_slug=<?php echo $row_ostan_query1['slug'] ; ?>" target="_blank" class="">
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
                            <a href="show_news.php?article_slug=<?php echo $row_eghtesad_query['slug'] ; ?>" target="_blank">
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
                                <li><a href="show_news.php?article_slug=<?php echo $row_sport_query3['slug'] ; ?>" target="_blank"><?php echo $row_sport_query3['title'] ?> </a> </li>
                                <?php }
                                 } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
            <section class="box ads">
            <?php
            $setting_Query="SELECT * FROM   setting where key_setting='Advertise_left5_index' ";
           include("setting_query_result.php");
?>
                <div class="col-12 text-center p-0">
                    <a href="<?php echo $setting_row['link']; ?>" target="_blank">
                        <img src="image/<?php echo $setting_row['value_setting']; ?>" class="img-fluid w-100"  alt="" title="">
                    </a>
                </div>
                <?php
            $setting_Query="SELECT * FROM   setting where key_setting='Advertise_left6_index' ";
           include("setting_query_result.php");
?>
                <div class="col-12 text-center p-0">
                    <a href="<?php echo $setting_row['link']; ?>" target="_blank">
                        <img src="image/<?php echo $setting_row['value_setting']; ?>" class="img-fluid w-100" alt="" title="">
                    </a>
                </div>
                <?php
            $setting_Query="SELECT * FROM   setting where key_setting='Advertise_left7_index' ";
           include("setting_query_result.php");
?>

                <div class="col-12 text-center p-0">
                    <a href="<?php echo $setting_row['link']; ?>" target="_blank">
                        <img src="image/<?php echo $setting_row['value_setting']; ?>" class="img-fluid w-100" alt="" title="">
                    </a>
                </div>
                <?php
            $setting_Query="SELECT * FROM   setting where key_setting='Advertise_left8_index' ";
           include("setting_query_result.php");
?>
                <div class="col-12 text-center p-0">
                    <a href="<?php echo $setting_row['link']; ?>" target="_blank">
                        <img src="image/<?php echo $setting_row['value_setting']; ?>" class="img-fluid w-100" alt="" title="">
                    </a>
                </div>
            </section>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-12 col-md-5">
            <section class="box_news">
                <ul class="nav nav-tabs my-2" role="tablist">
                    <li class="nav-item">
                        <a href="#videos" class="nav-link active text-right" data-toggle="tab">ویدیو</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="videos" class="tab-pane active">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12 p-0 m-0 news_video">
                                    <video controls>
                                        <source src="video/irana.mp4" type="video/mp4">
                                    </video>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 text-center mt-2 p-2 text-light" style="background-color: #595782">
                                    <h3 class="h6">آخرین ویدیو ها</h3>
                                </div>
                                <div class="owl-carousel2 owl-carousel owl-theme pt-md-2 pb-md-3">
                                    
                                    <div class="item">
                                        <a href="show_video.html" target="_blank">
                                            <img src="image/1.jpg" class="img-fluid" alt="" title="">
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="show_video.html" target="_blank">
                                            <img src="image/2.jpg" class="img-fluid" alt="" title="">
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="show_video.html" target="_blank">
                                            <img src="image/3.jpg" class="img-fluid" alt="" title="">
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="show_video.html" target="_blank">
                                            <img src="image/box2-j.jpg" class="img-fluid" alt="" title="">
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="show_video.html" target="_blank">
                                            <img src="image/box2-f.jpg" class="img-fluid" alt="" title="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-12 col-md-7">
            <section class="box_news">
                <ul class="nav nav-tabs my-2" role="tablist">
                    <li class="nav-item">
                        <a href="#image" class="nav-link active text-right" data-toggle="tab">عکس</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="image" class="tab-pane active">
                        <div class="col-12">
                            <div class="row">
                                <div id="image_carousel" class="carousel slide mt-2 mt-lg-0" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <a href="photo.html" target="_blank">
                                                <img src="image/1.jpg" alt="Los Angeles" class="img-fluid">
                                                <div class="carousel-caption">
                                                    <h3>
                                                        <a href="#" target="_blank">
                                                            ببینید | اگر در آسانسور بودیم و برق رفت چه کاری انجام دهیم؟
                                                        </a>
                                                    </h3>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="carousel-item">
                                            <a href="photo.html" target="_blank">
                                                <img src="image/2.jpg" alt="Chicago" class="img-fluid">
                                                <div class="carousel-caption">
                                                    <h3>
                                                        <a href="#" target="_blank">
                                                            اینفوگرافیک | نکات مهم درباره گونه دلتای ویروس کرونا
                                                        </a>
                                                    </h3>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="carousel-item">
                                            <a href="photo.html" target="_blank">
                                                <img src="image/10.jpg" alt="New York" class="img-fluid">
                                                <div class="carousel-caption">
                                                    <h3>
                                                        <a href="#" target="_blank">
                                                            تصاویر | تیپ جالب بوریس جانسون، دیوید بکام و تام کروز در فینال یورو ۲۰۲۰
                                                        </a>
                                                    </h3>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <a class="carousel-control-prev" href="#image_carousel" data-slide="prev">
                                        <span class="carousel-control-prev-icon"></span>
                                    </a>
                                    <a class="carousel-control-next" href="#image_carousel" data-slide="next">
                                        <span class="carousel-control-next-icon"></span>
                                    </a>
                                </div>
                            </div>
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