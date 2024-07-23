<?php
$setting_row_right1=getSetting("Advertise_right1");
$setting_row_right2=getSetting("Advertise_right2");
$setting_row_right3=getSetting("Advertise_right3");
$article_result=getArticles("`viewcount` ASC",3);
?>
<div class="container">
    <div class="row">
        <div class="col-12 col-md-6">
            <section class="box ads">
          
                <div class="col-12 text-center p-0">
                    <a href="<?= $setting_row_right1['link']; ?>" target="_blank">
                        <img src="image/<?= $setting_row_right1['value_setting']; ?>" class="img-fluid w-100"  alt="" title="">
                    </a>
                </div>
                <div class="col-12 text-center p-0">
                    <a href="<?= $setting_row_right2['link']; ?>" target="_blank">
                        <img src="image/<?= $setting_row_right2['value_setting']; ?>" class="img-fluid w-100" alt="" title="">
                    </a>
                </div>
                <div class="col-12 text-center p-0">
                    <a href="<?=  $setting_row_right3['link']; ?>" target="_blank">
                        <img src="image/<?=  $setting_row_right3['value_setting']; ?>" class="img-fluid w-100" alt="" title="">
                    </a>
                </div>
                <div class="row">
                <?php
                               
                                while($article_row=$article_result->fetch_assoc()){

                                ?>
                            <div class="col-6 col-lg-4">
                                <a href="show_news.php?article_slug=<?=  $article_row['slug']; ?>">
                                    <img src="image/<?=  $article_row['image']; ?>" class="img-fluid" alt="" title="">
                                    <div class="ads_text">
                                        <p><?=  $article_row['title']; ?></p>
                                    </div>
                                </a>
                            </div>
                            <?php } ?>
                </div>
                </section>