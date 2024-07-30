<?php 
define("LOAD", "");

require "config.php";

if (isset($_GET['article_slug'])) $article_slug = $_GET['article_slug'];
else header("Location: 404.php");

$article_row_main= getArticlesWithSlug($article_slug);
if (!isset($article_row_main)) exit();

$id_main = $article_row_main['id'];
$category_id = $article_row_main['category_id'];
$subcat_row = findParentRow($category_id);
$title_subcategory = $subcat_row['title'];
$cat_row = findParentRow($subcat_row['parent_id']);
$cat_title = $cat_row['title'];

// verify for comment 
$num1 = rand(1,10);
$num2 = rand(1,10);
$sum = $num1 + $num2;

$setting_row_left4 = getSetting("Advertise_left4");

// Get user ip
$ip = GetRealIp();

$article_result2 = getArticles("`publicationdate` DESC", 6);
$article_result4 = getArticles("`publicationdate` DESC", 10);
$comment_result = getComments(0, $id_main);

// Insert to view count
$viewcountresult = ISSETIP($ip, $id_main);
if ($viewcountresult === "") {
    viewcount($id_main,$ip);
}

$tag_result = getTagsInner($id_main);
?>
<!doctype html>
<html dir="rtl" lang="fa_IR">
<head>
    <meta charset="UTF-8">
    <title><?= $article_row_main['title'] ?> - <?= $title ?></title>
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
    <?php include("tab_h.php") ;?>
        <article class="show-news">
            <div class="row">
                <div class="col-12">
                    <ul class="breadcrumb mb-4">
                        <?php
                            

                        
                        ?>
                        <li class="breadcrumb-item"><a href="index.php">صفحه اصلی</a> </li>
                        <li class="breadcrumb-item"><a href="archive.php">  <?= $cat_title ?></a> </li>
                        <li class="breadcrumb-item active"><?= $title_subcategory ?> </li>
                    </ul>
                    <div class="show-news-header col">
                        <?php ?>
                        <div class="row">
                            <div class="col-4">
                                <div class="rating">
                                    <div class="rate-count">
                                        <?= $article_row_main['viewcount'] ?> نفر
                                    </div>   
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="news-time text-center">
                                    <span>  <?= $article_row_main['publicationdate'] ?></span>
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
                            <a href="show_news.php?article_slug=<?= $article_row_main['slug'] ?>">
                                <?= $article_row_main['title'] ?>
                            </a>
                        </h2>
                    </div>
                    <div class="show-news-summary">
                        <div class="row">
                            <div class="col-6">
                                <p> <?= $article_row_main['summery'] ?> </p>
                            </div>
                            <div class="col-6">
                                <img src="image/<?= $article_row_main['image'] ?>" alt="<?= $article_row_main['title'] ?>" title="<?= $article_row_main['title'] ?>" class="img-fluid img-thumbnail w-100">
                            </div>
                        </div>
                    </div>
                    <div class="show-news-body">
                        <div>
                        <?= $article_row_main['content'] ?>
                        </div>
                    </div>
                    <div class="news-code">
                        <p>کد خبر <span> <?= $article_row_main['id'] ?></span></p>
                    </div>
                </div>
            </div>
            <hr style="width: 100%;height: 1px;background-color: #adb5bd">
            <div class="row">
                <div class="col-6 short-link">
                    <i class="fas fa-link"></i>
                    <span>  <?= $article_row_main['source'] ?></span>
                </div>
            </div>
        </article>
        <section class="box ads">
            <div class="col-12 text-center p-0">
                <a href="<?= $setting_row_left4['link'] ?>" target="_blank">
                    <img src="image/<?= $setting_row_left4['value_setting'] ?>" class="img-fluid"  alt="<?= $setting_row_left4['key_setting'] ?>" title="<?= $setting_row_left4['key_setting'] ?>">
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
                            while($article_row = $article_result2->fetch_assoc()) {

                            ?>
                        <div class="col-6 col-lg-4">
                            <a href="show_news.php?article_slug=<?= $article_row['slug'] ?>">
                                <img src="image/<?= $article_row['image'] ?>" class="img-fluid" alt="<?= $article_row['title'] ?>" title="<?= $article_row['title'] ?>">
                                <div class="ads_text">
                                    <p><?= $article_row['title'] ?></p>
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
                            
                            
                            while($tag_row = mysqli_fetch_array($tag_result)) {

                            ?>

                            <li><a href="archive.php"><?= $tag_row['title'] ?></a> </li>
                            <?php } 
                                ?>
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
                                while($article_row4 = $article_result4->fetch_assoc()) {
                                ?>
                                <li><a href="show_news.php?article_slug=<?= $article_row4['slug'] ?>"> <?= $article_row4['title'] ?> </a> </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="box_news">
            <div class="tab-content">
                <div class="tab-pane active">
                    <div class="col-12 show_comment">
                        <?php while($row_comment = $comment_result->fetch_assoc()) { ?>
                        <div class="row mt-2">
                            <div class="col-12 comment_header">
                                <div class="row">
                                    <div class="col-6 username">
                                        <i class="fas fa-user"></i>
                                        <?= $row_comment['name'] ?>
                                    </div>
                                    <div class="col-6 time">
                                        <i class="far fa-calendar-alt"></i>
                                        <?= $row_comment['date']?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 comment_body">
                                <div class="comment">
                                    <p>  <?= $row_comment['comment'] ?> </p>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
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
                    
                        <form action="action_insert_comment.php?article_slug=<?= $article_slug ?>" method="post" name="comment_form">
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
                                    
                                    <input type="number" name="real_sum" value="<?= $sum ?>" style="opacity: 0;position: absolute;">
                                        <div class="captcha-image d-inline-block"><?= $num1 ?> +<?= $num2 ?>=
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