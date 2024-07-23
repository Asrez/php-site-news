<?php
session_start();
$link = mysqli_connect("localhost","root","","news");

function getCategories(?int $parent_id = 0) {
    global $link;
    $sql1 = "SELECT * FROM `categorys` WHERE `parent_id` = $parent_id ;";
    $category_query = $link->prepare($sql1);
    $category_query->execute();
    $result_category_query = $category_query->get_result();
    return $result_category_query;
}
function getArticlesInCategory(?int $category_id = null) {
    global $link;

    if ($category_id === null){
         $sql = "SELECT * FROM `articles`  ORDER BY `publicationdate`,`viewcount` ;";
        $category_query1 = $link->prepare($sql);
        }
    else{ $sql = "SELECT * FROM `articles` WHERE `category_id` = ?  ORDER BY `publicationdate`,`viewcount` LIMIT 8;";
    $category_query1 = $link->prepare($sql);
    $category_query1->bind_param("i", $category_id);
    }
    $category_query1->execute();
    $category_query1_result = $category_query1->get_result();

    return $category_query1_result;
}

function getArticles($order,$limit) {
    global $link;
       $news_sql = "SELECT * FROM `articles` ORDER BY  " . $order . " LIMIT ? ;";

    $news_query = $link->prepare($news_sql);
    $news_query->bind_param("i",$limit);
    $news_query->execute();
    $news_query_result = $news_query->get_result();

    return $news_query_result;
}


function getSetting($key) {
    global $link;
    $setting_sql = "SELECT * FROM `setting` where `key_setting` = ? ;";
    $setting_Query = $link->prepare($setting_sql);
    $setting_Query->bind_param("s",$key);
    $setting_Query->execute();
    $setting_result = $setting_Query->get_result();
    $setting_row = $setting_result->fetch_assoc();
    
    return $setting_row;
}
function getaboutus() {
    global $link;
    $about_query = $link->prepare("SELECT * FROM `about_us` ;");
    $about_query->execute();
    $about_result = $about_query->get_result();
    $about_row = $about_result->fetch_assoc();
    
    return $about_row;
}
function getCategoryWithSlug($category_slug) {
    global $link;
    $cat_sql = "SELECT * FROM `categorys` WHERE `slug` = ? ;";
    $cat_queryy = $link->prepare($cat_sql);
    $cat_queryy->bind_param("s",$category_slug);
    $cat_queryy->execute(); 
    $cat_result = $cat_queryy->get_result();
    $cat_row = $cat_result->fetch_assoc();
    
    return $cat_row;
}


function findParentRow($id) {
    global $link;
    $catt_sql = "SELECT * FROM `categorys` WHERE `id` = ? ;";
    $catt_queryy = $link->prepare($catt_sql);
    $catt_queryy->bind_param("i",$id);
    $catt_queryy->execute(); 
    $catt_result = $catt_queryy->get_result();
    $catt_row = $catt_result->fetch_assoc();
    
    return $catt_row;
}

function getArticlesWithSlug($slug) {
    global $link;
       $news_sqll = "SELECT * FROM `articles` WHERE `slug` = ? ;";

    $news1_query = $link->prepare($news_sqll);
    $news1_query->bind_param("s",$slug);
    $news1_query->execute();
    $news1_query_result = $news1_query->get_result();
    $news1_query_row1 = $news1_query_result->fetch_assoc();
    return $news1_query_row1;
}

function searchInArticleTag($id) {
    global $link;
    $article_tag_sql = "SELECT * FROM `article_tag` WHERE `article_id` = ? ;";
    $article_tag_query = $link->prepare($article_tag_sql);
    $article_tag_query->bind_param("i",$id);
    $article_tag_query->execute();
    $article_tag_result = $article_tag_query->get_result();
    return $article_tag_result;
}

function getArticlesWithId($id) {
    global $link;
       $news_sqll = "SELECT * FROM `articles` WHERE `id` = ? ;";

    $news2_query = $link->prepare($news_sqll);
    $news2_query->bind_param("i",$id);
    $news2_query->execute();
    $news2_query_result = $news2_query->get_result();
    $news2_query_row = $news2_query_result->fetch_assoc();
    return $news2_query_row;
}


function getTags($id) {
    global $link;
    $tag_sql = "SELECT * FROM `tags` WHERE `id` = ? ;";
    $tag_query = $link->prepare($tag_sql);
    $tag_query->bind_param("i",$id);
    $tag_query->execute();
    $tag_result = $tag_query->get_result();
    return $tag_result;
}

function getComments($venify,$id) {
    global $link;
    $comment_sql = "SELECT * FROM `comments` WHERE `venify` = ? AND `article_id` = ?  ORDER BY `date` ;";
    $comment_query = $link->prepare($comment_sql);
    $comment_query->bind_param("ii",$venify,$id);
    $comment_query->execute();
    $comment_result = $comment_query->get_result();
    return $comment_result;
}
function getComments2($limit) {
    global $link;
    $comment_sql = "SELECT * FROM `comments` WHERE `venify`='1'  ORDER BY `date` LIMIT ? ;";
    $comment_query = $link->prepare($comment_sql);
    $comment_query->bind_param("i",$limit);
    $comment_query->execute();
    $comment_result = $comment_query->get_result();
    return $comment_result;
}
function search($text) {
    global $link;
    $search_sql = "SELECT * FROM `articles` WHERE `title` LIKE ? ;";
    $search_query = $link->prepare($search_sql);
    $text = '%'.$text.'%';
    $search_query->bind_param("s",$text);
    $search_query->execute();
    $search_result = $search_query->get_result();
    return $search_result;
}
function GetRealIp()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))
        //check ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
        //to check ip is pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else
        $ip = $_SERVER['REMOTE_ADDR'];
    return $ip;
}
