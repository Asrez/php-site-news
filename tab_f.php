<?php
$setting_row_middel1 = getSetting("Advertise_middel1");
$setting_row_middel2 = getSetting("Advertise_middel2");
$setting_row_left1 = getSetting("Advertise_left1");
$setting_row_left2 = getSetting("Advertise_left2");
$setting_row_left3 = getSetting("Advertise_left3");
$article_result1 = getArticles(" RAND() ",5);

$result_news_query1 = getArticles("publicationdate",20);
$result_news_query2 = getArticles("`viewcount` > 0",4);

$row_ostan = getARTICLEinLIST(10);
$row_siyasi = getARTICLEinLIST(3);
$row_farhangi = getARTICLEinLIST(2);
$row_iran = getARTICLEinLIST(10);
$row_eghtesad = getARTICLEinLIST(4);
$row_sport_news = getARTICLEinLIST(5);
?>
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
                              while($row_end_news_query2 = $article_result1->fetch_assoc()){
?>
                                    <div class="item">
                                        <a href="show_news.php?article_slug=<?= $row_end_news_query2['slug'] ; ?>" target="_blank">
                                            <img src="image/<?= $row_end_news_query2['image']; ?>" class="img-fluid" alt="" title="">
                                            <p><?= $row_end_news_query2['title']; ?> </p>
                                        </a>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="box ads">
           
                <div class="col-12 text-center p-0">
                    <a href="<?= $setting_row_middel1['link']; ?>" target="_blank">
                        <img src="image/<?= $setting_row_middel1['value_setting']; ?>" class="img-fluid"  alt="" title="">
                    </a>
                </div>
            </section>
            <section class="box ads">
                <div class="col-12 text-center p-0">
                    <a href="<?= $setting_row_middel2['link']; ?>" target="_blank">
                        <img src="image/<?= $setting_row_middel2['value_setting']; ?>" class="img-fluid"  alt="" title="">
                    </a>
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
                                   foreach ($row_ostan["maincategory"] as $row_getCategories){
                                   foreach ($row_ostan["subCategory"] as $row_getArticlesInCategory){ 
                                    if( $row_getArticlesInCategory['category_id'] == $row_getCategories['id']){
                                    ?>
                                <li><a href="show_news.php?article_slug=<?= $row_getArticlesInCategory['slug']; ?>"><?= $row_getArticlesInCategory['title'];?></a> </li>
                                <?php } 
                                   }
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
                              while($row_news_query = $result_news_query1->fetch_assoc()){ ?>
                               <li><a href="show_news.php?article_slug=<?= $row_news_query['slug'] ; ?>"><?= $row_news_query['title'] ;?></a> </li>
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
                        while($coment_row = $result_news_query2->fetch_assoc()){ 
                        ?>
                        <div class="col-5 p-0">
                            <a href="#" target="_blank">
                                <img src="image/<?=$coment_row['image'] ; ?>" class="img-fluid" alt="" title="">
                            </a>
                        </div>
                        <div class="col-7 p-0">
                            <a href="show_news.php?article_slug=<?= $coment_row['slug'] ; ?>" target="_blank" class="">
                                <?= $coment_row['title']; ?>
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
                     
                     foreach ($row_siyasi["maincategory"] as $row_getCategories){
                        foreach ($row_siyasi["subCategory"] as $row_getArticlesInCategory){ 
                         if( $row_getArticlesInCategory['category_id'] == $row_getCategories['id']){?>
                        <div class="col-5 p-0">
                            <a href="show_news.php?article_slug=<?= $row_getArticlesInCategory['slug']; ?>" target="_blank">
                                <img src="image/<?= $row_getArticlesInCategory['image']; ?>" class="img-fluid" alt="" title="">
                            </a>
                        </div>
                        <div class="col-7 p-0">
                            <a href="show_news.php?article_slug=<?= $row_getArticlesInCategory['slug']; ?>" target="_blank" class="">
                            <?= $row_getArticlesInCategory['title']; ?>
                            </a>
                        </div>
                        <?php }
                        }
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
                    foreach ($row_farhangi["maincategory"] as $row_getCategories){
                        foreach ($row_farhangi["subCategory"] as $row_getArticlesInCategory){ 
                         if( $row_getArticlesInCategory['category_id'] == $row_getCategories['id']){ ?>
                        <div class="col-5 p-0">
                            <a href="#show_news.php?article_slug=<?= $row_getArticlesInCategory['slug']; ?>" target="_blank">
                                <img src="image/<?= $row_getArticlesInCategory['image']; ?>" class="img-fluid" alt="" title="">
                            </a>
                        </div>
                        <div class="col-7 p-0">
                            <a href="show_news.php?article_slug=<?= $row_getArticlesInCategory['slug']; ?>" target="_blank" class="">
                            <?= $row_getArticlesInCategory['title']; ?>
                            </a>
                        </div>
                        <?php }
                        }
                    } ?>
                    </div>
                </div>
            </section>
            <section class="box ads">
                <div class="col-12 text-center p-0">
                    <a href="<?= $setting_row_left1['link']; ?>" target="_blank">
                        <img src="image/<?= $setting_row_left1['value_setting']; ?>" class="img-fluid w-100"  alt="" title="">
                    </a>
                </div>
                <div class="col-12 text-center p-0">
                    <a href="<?= $setting_row_left2['link']; ?>" target="_blank">
                        <img src="image/<?= $setting_row_left2['value_setting']; ?>" class="img-fluid w-100" alt="" title="">
                    </a>
                </div>
                <div class="col-12 text-center p-0">
                    <a href="<?= $setting_row_left3['link']; ?>" target="_blank">
                        <img src="image/<?= $setting_row_left3['value_setting']; ?>" class="img-fluid w-100" alt="" title="">
                    </a>
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
                           foreach ($row_iran["maincategory"] as $row_getCategories){
                            foreach ($row_iran["subCategory"] as $row_getArticlesInCategory){ 
                             if( $row_getArticlesInCategory['category_id'] == $row_getCategories['id']){ ?>
                        <div class="col-5 p-0">
                            <a href="show_news.php?article_slug=<?= $row_getArticlesInCategory['slug']; ?>" target="_blank">
                                <img src="image/<?= $row_getArticlesInCategory['image']; ?>" class="img-fluid" alt="" title="">
                            </a>
                        </div>
                        <div class="col-7 p-0">
                            <a href="show_news.php?article_slug=<?= $row_getArticlesInCategory['slug']; ?>" target="_blank" class="">
                            <?= $row_getArticlesInCategory['title']; ?>
                            </a>
                        </div>
                        <?php } 
                                }
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
                              foreach ($row_eghtesad["maincategory"] as $row_getCategories){
                                foreach ($row_eghtesad["subCategory"] as $row_getArticlesInCategory){ 
                                 if( $row_getArticlesInCategory['category_id'] == $row_getCategories['id']){?>
                        <div class="col-6 p-0 boxing">
                            <a href="show_news.php?article_slug=<?= $row_getArticlesInCategory['slug']; ?>" target="_blank">
                                <img src="image/<?= $row_getArticlesInCategory['image']; ?>" class="img-fluid" alt="" title="">
                                <div >
                                    <p>ببینید | <?= $row_getArticlesInCategory['title']; ?> </p>
                                </div>
                            </a>
                        </div>
                        <?php } 
                        }
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
                                foreach ($row_sport_news["maincategory"] as $row_getCategories){
                                    foreach ($row_sport_news["subCategory"] as $row_getArticlesInCategory){ 
                                     if( $row_getArticlesInCategory['category_id'] == $row_getCategories['id']){
                                
                                ?>
                                <li><a href="show_news.php?article_slug=<?= $row_getArticlesInCategory['slug']; ?>" target="_blank"><?= $row_getArticlesInCategory['title'] ?> </a> </li>
                                <?php }
                                    }
                                 } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

