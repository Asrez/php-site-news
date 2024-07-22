<div class="container">
    <div class="row">
        <div class="col-12 col-md-6">
            <section class="box ads">
            <?php
            $setting_row=getSetting("Advertise_right1_about_us");
?>
                <div class="col-12 text-center p-0">
                    <a href="<?php echo $setting_row['link']; ?>" target="_blank">
                        <img src="image/<?php echo $setting_row['value_setting']; ?>" class="img-fluid w-100"  alt="" title="">
                    </a>
                </div>
                <?php
            $setting_row=getSetting("Advertise_right2_about_us");
?>
                <div class="col-12 text-center p-0">
                    <a href="<?= $setting_row['link']; ?>" target="_blank">
                        <img src="image/<?= $setting_row['value_setting']; ?>" class="img-fluid w-100" alt="" title="">
                    </a>
                </div>
                <?php
            $setting_row=getSetting("Advertise_right3_about_us");
?>
                <div class="col-12 text-center p-0">
                    <a href="<?=  $setting_row['link']; ?>" target="_blank">
                        <img src="image/<?=  $setting_row['value_setting']; ?>" class="img-fluid w-100" alt="" title="">
                    </a>
                </div>
                <div class="row">
                <?php
                                $article_result=getArticles("`viewcount` ASC",3);
                                while($article___row=$article_result->fetch_assoc()){

                                ?>
                            <div class="col-6 col-lg-4">
                                <a href="show_news.php?article_slug=<?=  $article___row['slug']; ?>">
                                    <img src="image/<?=  $article___row['image']; ?>" class="img-fluid" alt="" title="">
                                    <div class="ads_text">
                                        <p><?=  $article___row['title']; ?></p>
                                    </div>
                                </a>
                            </div>
                            <?php } ?>
                </div>
                </section>