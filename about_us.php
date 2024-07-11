<!DOCTYPE html>
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
                    <div class="col-6 col-lg-3">
                        <a href="#">
                            <img src="image/s1.jpg" class="img-fluid" alt="" title="">
                            <div class="ads_text">
                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-lg-3">
                        <a href="#">
                            <img src="image/s2.jpg" class="img-fluid" alt="" title="">
                            <div class="ads_text">
                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-lg-3">
                        <a href="#">
                            <img src="image/s3.jpg" class="img-fluid" alt="" title="">
                            <div class="ads_text">
                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-lg-3">
                        <a href="#">
                            <img src="image/s4.jpg" class="img-fluid" alt="" title="">
                            <div class="ads_text">
                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم</p>
                            </div>
                        </a>
                    </div>
                </div>
            </section>
            <article class="box-10">
                <div class="row">
                    <div class="col-12">
                        <ul class="breadcrumb">
                           
                        </ul>
                        <div class="title">
                            <h2>درباره خبر اینلاین</h2>
                        </div>
                        <div class="body">
                            <p>
                                خبر اینلاین که کار خود را از سال ۱۳۸۷ شروع کرده است تلاش دارد آخرین تحلیل‌ها و گزارش‌ها از مهم‌ترین اتفاقات روز ایران و جهان را به صورت آنلاین در اختیار مخاطبان خود قرار دهد.
                            </p>
                            <p>
                                مشی رسانه‌ای این سایت، تحلیلی - خبری است و اعضای تحریریه این مجموعه می‌کوشند از قالب ظاهری خبرها فراتر رفته و به زوایای پنهان و آشکار حوادث سرک بکشند و با کندوکاو بیشتر، ناگفته‌ها و وجوه نامکشوف وقایع و حوادث را بیابند.
                            </p>
                            <p>
                                این مجموعه رسانه‌ای خود را در امر اطلاع‌رسانی مستقل می‌داند و در چارچوب قوانین نظام جمهوری اسلامی و تعهد به آرمان‌های انقلاب اسلامی و امام راحل و شهیدان انقلاب، از درغلتیدن به تمایلات حزبی و جناحی پرهیز دارد.
                            </p>
                            <p>
                                این مجموعه اما نقد و تحلیل کارشناسانه دستگاه‌ها، عملکرد مسئولان و احزاب را وظیفه ذاتی خود می‌پندارد و آن را با هدف ارتقای دانایی جامعه، حق پرسشگری شهروندان و وظیفه پاسخگویی مسئولان با جدیت دنبال می‌کند.
                            </p>
                            <p>
                                تحریریه
                                <a href="#">خبر اینلاین</a>
                                همچنین با بهره‌مندی از همکاران حرفه‌ای و با سابقه می‌کوشد عرصه‌های جدیدی در اطلاع‌رسانی بهنگام و شفاف بجوید و بگشاید.
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
                        <span>khabarinline.ir/news/822037</span>
                    </div>
                </div>
            </article>
            <section class="box ads">
            <?php
            $setting_Query="SELECT * FROM   setting where key_setting='Advertise_right3_about_us' ";
           include("setting_query_result.php");
?>
                <div class="col-12 text-center p-0">
                    <a href="#" target="_blank">
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
                            <div class="col-6 col-lg-4">
                                <a href="#">
                                    <img src="image/s1.jpg" class="img-fluid" alt="" title="">
                                    <div class="ads_text">
                                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-6 col-lg-4">
                                <a href="#">
                                    <img src="image/s2.jpg" class="img-fluid" alt="" title="">
                                    <div class="ads_text">
                                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-6 col-lg-4">
                                <a href="#">
                                    <img src="image/s3.jpg" class="img-fluid" alt="" title="">
                                    <div class="ads_text">
                                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-6 col-lg-4">
                                <a href="#">
                                    <img src="image/s4.jpg" class="img-fluid" alt="" title="">
                                    <div class="ads_text">
                                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم</p>
                                    </div>
                                </a>
                            </div>
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
                                <li><a href="#">خبر آنلاین</a> </li>
                                <li><a href="#">اخبار روز</a> </li>
                                <li><a href="#">آخرین خبرها</a> </li>
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
                                    
                                    <li><a href="#">دلیل حمایت رهبر انقلاب از دولت احمدی نژاد به روایت کیهان</a> </li>
                                    <li><a href="#"> دلیل حمایت رهبر انقلاب از دولت احمدی نژاد به روایت کیهان
                                        ۳ صندلی مهم دولت رئیسی به چه کسانی می‌رسد؟ /پایداری ها منتظرند
                                    </a> </li>
                                    <li><a href="#">گزارشگران، سوهان روح عاشقان فوتبال</a> </li>
                                    <li><a href="#">اعتراض به نجوای عجیب جمعه یکی از روحانیون در فضای مجازی/ دیگر دولت امام زمان درست نکنید!</a> </li>
                                    <li><a href="#">ببینید | لحظه جنایت بی‌رحمانه در آمریکا؛ شلیک مرگبار به دختر و پسر 18 ساله</a> </li>
                                    <li><a href="#">دلیل حمایت رهبر انقلاب از دولت احمدی نژاد به روایت کیهان</a> </li>
                                    <li><a href="#"> دلیل حمایت رهبر انقلاب از دولت احمدی نژاد به روایت کیهان
                                        ۳ صندلی مهم دولت رئیسی به چه کسانی می‌رسد؟ /پایداری ها منتظرند
                                    </a> </li>
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
                            <form action="" method="">
                                <fieldset class="row">
                                    <div class="col-12 col-md-6 form-group name-group">
                                        <label for="userName">نام</label>
                                        <input type="text" id="userName" name="userName" placeholder="نام" maxlength="50" class="form-control" data-minlength="3" data-required-msg="لطفا نام خود را وارد کنید.">
                                    </div>
                                    <div class="col-12 col-md-6 form-group email-group">
                                        <label for="userEmail">ایمیل</label>
                                        <input type="email" placeholder="ایمیل" class="form-control ltr" id="userEmail" name="userEmail" maxlength="80">
                                    </div>
                                    <div class="col-12 form-group text-group">
                                        <label for="body">نظر شما *</label>
                                        <textarea maxlength="1000" placeholder="نظر شما" data-required-msg="لطفاً نظر خود را وارد کنید." class="form-control" required="true" id="body" name="body" rows="5"></textarea>
                                    </div><div class="col-12 col-md-6 form-group captcha-group">
                                    <div class="captcha">
                                        <input id="captchaKey" name="captchaKey" value="-4573118011947117407" type="hidden">
                                        <label for="number"><i class="req">*</i> لطفا حاصل عبارت را در جعبه متن روبرو وارد کنید</label>

                                    </div></div>
                                    <div class="col-12 col-md-6">
                                        <div style="direction: ltr">
                                            <div class="captcha-image d-inline-block">1 + 4 =
                                            </div>
                                            <div class="captcha-input d-inline-block">
                                                <input type="number" name="captchaText" id="number" required="required" data-required-msg="حاصل عبارت را وارد کنید.">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 form-group submit-group">
                                        <button class="btn btn-default" id="btnSave">ارسال</button>
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
                                <div class="item">
                                    <a href="#" target="_blank">
                                        <img src="image/box2-f.jpg" class="img-fluid" alt="" title="">
                                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم</p>
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="#" target="_blank">
                                        <img src="image/index-carusel-image1.jpg" class="img-fluid" alt="" title="">
                                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم</p>
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="#" target="_blank">
                                        <img src="image/index-carusel-image3.jpg" class="img-fluid" alt="" title="">
                                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم</p>
                                    </a>
                                </div>
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
                                <a href="#">مطالب جالب ایران و جهان</a>
                            </h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="most_viewed_news">
                            <ul>
                                <li><a href="#">دلیل حمایت رهبر انقلاب از دولت احمدی نژاد به روایت کیهان</a> </li>
                                <li><a href="#"> دلیل حمایت رهبر انقلاب از دولت احمدی نژاد به روایت کیهان
                                    ۳ صندلی مهم دولت رئیسی به چه کسانی می‌رسد؟ /پایداری ها منتظرند
                                </a> </li>
                                <li><a href="#">گزارشگران، سوهان روح عاشقان فوتبال</a> </li>
                                <li><a href="#">اعتراض به نجوای عجیب جمعه یکی از روحانیون در فضای مجازی/ دیگر دولت امام زمان درست نکنید!</a> </li>
                                <li><a href="#">ببینید | لحظه جنایت بی‌رحمانه در آمریکا؛ شلیک مرگبار به دختر و پسر 18 ساله</a> </li>
                                <li><a href="#">دلیل حمایت رهبر انقلاب از دولت احمدی نژاد به روایت کیهان</a> </li>
                                <li><a href="#"> دلیل حمایت رهبر انقلاب از دولت احمدی نژاد به روایت کیهان
                                    ۳ صندلی مهم دولت رئیسی به چه کسانی می‌رسد؟ /پایداری ها منتظرند
                                </a> </li>
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
                                <a href="#">آخرین اخبار فرهنگی هنری</a>
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
                        <div class="col-5 p-0">
                            <a href="#" target="_blank">
                                <img src="image/4.jpg" class="img-fluid" alt="" title="">
                            </a>
                        </div>
                        <div class="col-7 p-0">
                            <a href="#" target="_blank" class="">
                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم
                            </a>
                        </div>
                        <div class="col-5 p-0">
                            <a href="#" target="_blank">
                                <img src="image/3.jpg" class="img-fluid" alt="" title="">
                            </a>
                        </div>
                        <div class="col-7 p-0">
                            <a href="#" target="_blank" class="">
                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم
                            </a>
                        </div>
                    </div>
                </div>
            </section>
            <section class="box box_1 participation">
                <div class="col-12">
                    <div class="row">
                        <div class="box_header">
                            <h2>
                                مطالب پیشنهادی
                            </h2>
                        </div>
                    </div>
                    <div class="row container_box">
                        <div class="col-5 p-0">
                            <a href="#" target="_blank">
                                <img src="image/1.jpg" class="img-fluid" alt="" title="">
                            </a>
                        </div>
                        <div class="col-7 p-0">
                            <a href="#" target="_blank" class="">
                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم
                            </a>
                        </div>
                        <div class="col-5 p-0">
                            <a href="#" target="_blank">
                                <img src="image/2.jpg" class="img-fluid" alt="" title="">
                            </a>
                        </div>
                        <div class="col-7 p-0">
                            <a href="#" target="_blank" class="">
                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوممتن خبر
                            </a>
                        </div>
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
                                بخوانید
                            </h2>
                        </div>
                    </div>
                    <div class="row container_box">
                        <div class="col-5 p-0">
                            <a href="#" target="_blank">
                                <img src="image/10.jpg" class="img-fluid" alt="" title="">
                            </a>
                        </div>
                        <div class="col-7 p-0">
                            <a href="#" target="_blank" class="">
                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم
                            </a>
                        </div>
                        <div class="col-5 p-0">
                            <a href="#" target="_blank">
                                <img src="image/b1.jpg" class="img-fluid" alt="" title="">
                            </a>
                        </div>
                        <div class="col-7 p-0">
                            <a href="#" target="_blank" class="">
                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم
                            </a>
                        </div>
                    </div>
                </div>
            </section>
            <section class="box ads">
            <?php
            $setting_Query="SELECT * FROM   setting where key_setting='Advertise_right3_about_us' ";
           include("setting_query_result.php");
?>
                <div class="col-12 text-center p-0">
                    <a href="#" target="_blank">
                        <img src="image/<?php echo $setting_row['value_setting']; ?>" class="img-fluid w-100"  alt="" title="">
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
                <?php
            $setting_Query="SELECT * FROM   setting where key_setting='Advertise_right3_about_us' ";
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
            <section class="box box_1 web">
                <div class="col-12">
                    <div class="row">
                        <div class="box_header">
                            <h2>
                                وب گردی
                            </h2>
                        </div>
                    </div>
                    <div class="row container_box">
                        <div class="col-6 p-0 boxing">
                            <a href="#" target="_blank">
                                <img src="image/1.jpg" class="img-fluid" alt="" title="">
                                <div class="">
                                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 p-0 boxing">
                            <a href="#" target="_blank">
                                <img src="image/2.jpg" class="img-fluid" alt="" title="">
                                <div class="">
                                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 p-0 boxing">
                            <a href="#" target="_blank">
                                <img src="image/3.jpg" class="img-fluid" alt="" title="">
                                <div class="">
                                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 p-0 boxing">
                            <a href="#" target="_blank">
                                <img src="image/4.jpg" class="img-fluid" alt="" title="">
                                <div class="">
                                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم</p>
                                </div>
                            </a>
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
                        <div class="col-5 p-0">
                            <a href="#" target="_blank">
                                <img src="image/b1.jpg" class="img-fluid" alt="" title="">
                            </a>
                        </div>
                        <div class="col-7 p-0">
                            <a href="#" target="_blank" class="">
                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم
                            </a>
                        </div>
                        <div class="col-5 p-0">
                            <a href="#" target="_blank">
                                <img src="image/b2.jpg" class="img-fluid" alt="" title="">
                            </a>
                        </div>
                        <div class="col-7 p-0">
                            <a href="#" target="_blank" class="">
                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم
                            </a>
                        </div>
                    </div>
                </div>
            </section>
            <section class="box box_1 participation">
                <div class="col-12">
                    <div class="row">
                        <div class="box_header">
                            <h2>
                                بازار
                            </h2>
                        </div>
                    </div>
                    <div class="row container_box">
                        <div class="col-5 p-0">
                            <a href="#" target="_blank">
                                <img src="image/d.jpg" class="img-fluid" alt="" title="">
                            </a>
                        </div>
                        <div class="col-7 p-0">
                            <a href="#" target="_blank" class="">
                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم
                            </a>
                        </div>
                        <div class="col-5 p-0">
                            <a href="#" target="_blank">
                                <img src="image/o.jpg" class="img-fluid" alt="" title="">
                            </a>
                        </div>
                        <div class="col-7 p-0">
                            <a href="#" target="_blank" class="">
                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم
                            </a>
                        </div>
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