<?php




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

<div class="filter">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <button class="filter-icon float-left d-inline-block d-lg-none" onclick="open_filter()">
                    <i class="fas fa-filter"></i>
                </button>
                <form action="" method="" class="archive-filter d-none  d-lg-block ">
                    <div class="row clearfix">
                        <div class="col-12 col-lg-4">
                            <div class="row">
                                <div class="col-12 col-lg-1 p-0">
                                    <label class="pt-2 pb-2">تاریخ</label>
                                </div>
                                <div class="col-12 col-lg">
                                    <div class="form-group">
                                        <select id="toDay" name="toDay" size="1" class="form-control">
                                            <option value="" disabled="disabled">همه‌ی روزها</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                            <option value="24">24</option>
                                            <option value="25">25</option>
                                            <option value="26" selected="selected">26</option>
                                            <option value="27">27</option>
                                            <option value="28">28</option>
                                            <option value="29">29</option>
                                            <option value="30">30</option>
                                            <option value="31">31</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-lg">
                                    <div class="form-group">
                                        <select id="toMonth" name="toMonth" size="1" class="form-control">
                                            <option value="" disabled="disabled">همه‌ی ماه‌ها</option>
                                            <option value="1"> فروردین</option>
                                            <option value="2"> اردیبهشت</option>
                                            <option value="3"> خرداد</option>
                                            <option value="4" selected="selected"> تیر</option>
                                            <option value="5"> مرداد</option>
                                            <option value="6"> شهریور</option>
                                            <option value="7"> مهر</option>
                                            <option value="8"> آبان</option>
                                            <option value="9"> آذر</option>
                                            <option value="10"> دی</option>
                                            <option value="11"> بهمن</option>
                                            <option value="12"> اسفند</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-lg">
                                    <div class="form-group">
                                        <select id="toYear" name="toYear" size="1" class="form-control ">
                                            <option value="" disabled="disabled">همه‌ی سال‌ها</option>
                                            <option value="1387">1387</option>
                                            <option value="1388">1388</option>
                                            <option value="1389">1389</option>
                                            <option value="1390">1390</option>
                                            <option value="1391">1391</option>
                                            <option value="1392">1392</option>
                                            <option value="1393">1393</option>
                                            <option value="1394">1394</option>
                                            <option value="1395">1395</option>
                                            <option value="1396">1396</option>
                                            <option value="1397">1397</option>
                                            <option value="1398">1398</option>
                                            <option value="1399">1399</option>
                                            <option value="1400" selected="selected">1400</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-5">
                            <div class="row">
                                <div class="col-12 col-lg-1 p-0 ">
                                    <label class="pt-2 pb-2">فیلتر ها</label>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <div class="form-group">
                                        <select id="topic" name="topic" size="1" class="form-control">
                                            <option value="">همه سرویس‌ها</option>
                                            <option value="1" selected="selected">اخبار سیاسی ایران</option>
                                            <option value="14">اخبار سیاسی ایران &gt; رهبری</option>
                                            <option value="15">اخبار سیاسی ایران &gt; احزاب و شخصیت‌ها</option>
                                            <option value="16">اخبار سیاسی ایران &gt; نظامی</option>
                                            <option value="17">اخبار سیاسی ایران &gt; انتخابات</option>
                                            <option value="18">اخبار سیاسی ایران &gt; دولت</option>
                                            <option value="19">اخبار سیاسی ایران &gt; مجلس</option>
                                            <option value="2">اخبار اقتصادی ایران و جهان</option>
                                            <option value="20">اخبار اقتصادی ایران و جهان &gt; اقتصاد کلان</option>
                                            <option value="1313">اخبار اقتصادی ایران و جهان &gt; راهنمای خريد</option>
                                            <option value="21">اخبار اقتصادی ایران و جهان &gt; مسکن</option>
                                            <option value="22">اخبار اقتصادی ایران و جهان &gt; جهان</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-lg">
                                    <div class="form-group">
                                        <select id="newsType" name="newsType" size="1" class="form-control">
                                            <option value="" selected="selected">همه انواع خبر</option>
                                            <option value="1">خبر</option>
                                            <option value="15">Cof-news</option>
                                            <option value="14">Weblog</option>
                                            <option value="13">Movie</option>
                                            <option value="12">Newsg</option>
                                            <option value="11">یادداشت</option>
                                            <option value="10">مقاله</option>
                                            <option value="9">گفتگو</option>
                                            <option value="8">پرونده</option>
                                            <option value="7">گزارش</option>
                                            <option value="5">صوت</option>
                                            <option value="4">لینک</option>
                                            <option value="3">فيلم</option>
                                            <option value="2">عکس</option>
                                            <option value="16">Inter-act</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-lg">
                                    <div class="form-group">
                                        <select id="place" name="place" size="1" class="form-control">
                                            <option value="" selected="selected">همه باکس‌ها</option>
                                            <option value="13">تیتر یک سرویس</option>
                                            <option value="1">تیتر یک صفحه اول</option>
                                            <option value="14">ویدیو</option>
                                            <option value="210">يادداشت</option>
                                            <option value="218">گزارش</option>
                                            <option value="217">گفتگو</option>
                                            <option value="2">تیتر دو صفحه اول</option>
                                            <option value="8">تیتر دو سرویس</option>
                                            <option value="6">پربیننده دیگران</option>
                                            <option value="265">انتخاب سردبیر</option>
                                            <option value="161">برگزیده‌ها</option>
                                            <option value="212">پیشخوان مطبوعات</option>
                                            <option value="294">ديباچه</option>
                                            <option value="213">کاریکاتور</option>
                                            <option value="162">یادداشت</option>
                                            <option value="164">سیاست</option>
                                            <option value="169">اقتصاد</option>
                                            <option value="170">جامعه</option>
                                            <option value="171">فرهنگ</option>
                                            <option value="172">بین الملل</option>
                                            <option value="173">ورزش</option>
                                            <option value="175">فناوری اطلاعات</option>
                                            <option value="174">دانش</option>
                                            <option value="203">گردشگری</option>
                                            <option value="178">استان‌ها</option>
                                            <option value="19">عکس</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-3">
                            <a href="#" class="btn filter-btn">اخبار امروز</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-12 col-md-8">
            <div class="row">
                <div class="col-12 main_content box">
                <?php 
                
              
                $articles="SELECT * FROM articles ";
                 $result_article=mysqli_query($link,$articles);
                while($row_articles=mysqli_fetch_array($result_article)) {
                  ?>
                    <div class="row mb-3">
                        <div class="after-content col-4 pl-0">
                            <a href="show_news.php?article_slug=<?php echo  $row_articles['slug']; ?>" target="_blank">
                                <img src="image/<?php echo $row_articles['image'];?>" class="img-fluid" alt="" title="">
                            </a>
                        </div>
                        <div class="after-content col-8">
                            <div class="news_title">
                                <h2 class="h6">
                                    <a href="show_news.php?article_slug=<?php echo  $row_articles['slug']; ?>" target="_blank">
                                    <?php echo $row_articles['title'];?>
                                    </a>
                                </h2>
                            </div>
                            <div class="desc_news d-none d-md-block">
                                <p>
                                    <span class="category">
                                    <?php $article_id=$row_articles['id'];
                                            $article_tag="SELECT * FROM article_tag WHERE article_id = $article_id"; 
                                             $g=mysqli_query($link,$article_tag);
                                             while($row_article_tag=mysqli_fetch_array($g)) {
                                             $tag_id=$row_article_tag['tag_id']; 
                                             $tags="SELECT * FROM tags WHERE id = $tag_id"; 
                                             $d=mysqli_query($link,$tags);
                                             while($row_tags=mysqli_fetch_array($d)){ ?>
                                             <a href="#" target="_blank"> <?php  echo $row_tags["title"];?> </a>
                                                <?php }
                                            } ?></label> 
                                    </span>
                                    <?php echo $row_articles['summery'];?>
                                </p>
                            </div>
                            <time>
                                <i class="far fa-clock"></i>
                                <?php $public=$row_articles['publicationdate'];
                                       echo date($public);?>
                            </time>
                        </div>
                    </div><?php 
                    
                
                } ?>
                    <div class="row">
                        <div class="col-12">
                            <ul class="pagination justify-content-center">
                                <li class="page-item"><a class="page-link" href="#">قبلی</a></li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">بعدی</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
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