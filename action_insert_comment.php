<?php 
define("LOAD", "");

require "config.php";

$article_slug = $_GET['article_slug'];
$article_roww = getArticlesWithSlug($article_slug);
$article_id = $article_roww['id'];
$date = jdate('Y-m-d h:i:s');
$insert_comment_sql = "INSERT INTO `comments`(`id`, `name`, `email`, `comment`, `date`, `article_id`, `venify`) VALUES (?, ?, ?, ?, ?, ?, ?);";
$insert_comment_query = $link->prepare($insert_comment_sql);
$code = "NULL";
$venify = 0;

if (isset($_POST['btnsubmit']) and isset($_POST['sum'])) {
    if ($_POST['sum'] === $_POST['real_sum']) {
        if (isset($_POST['name']) && !empty($_POST['name']) &&
        isset($_POST['Email']) && !empty($_POST['Email']) &&
        isset($_POST['comment']) && !empty($_POST['comment'])
        ) {
            $name = $_POST['name'];
            $email = $_POST['Email'];
            $comment = $_POST['comment'];
        }
        else {
        ?>
            <script type="text/javascript">
            window.alert("برخی فیلد ها مقدار دهی نشده است");
            </script>
        <?php
        }
        $insert_comment_query->bind_param("issssii",$code,$name,$email,$comment,$date,$article_id,$venify);
        
        if ($insert_comment_query->execute()) {
        ?>
            <script type="text/javascript">
            window.alert("سپاس از نظر شما.نظرات بعد از بررسی در سایت قرار خواهد گرفت");        
            location.replace("show_news.php?article_slug=<?= $article_slug ?>");
            </script>
        <?php
        }
        else {
        ?>
            <script type="text/javascript">
            window.alert("ثبت کامنت با شکست مواجه شد . دوباره تلاش کنید");
            location.replace("show_news.php?article_slug=<?= $article_slug ?>");
            </script>
        <?php
        }
    }
}
?>