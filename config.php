<?php
session_start();
$link = mysqli_connect("localhost","root","","news");

function getCategories(?int $parent_id=0) {
    global $link;
    $sql1="SELECT * FROM `categorys` WHERE `parent_id`=$parent_id;";
    $category_query = $link->prepare($sql1);
    $category_query->execute();
    $result_category_query=$category_query->get_result();
    return $result_category_query;
}
function getArticlesInCategory(?int $category_id = null) {
    global $link;

    if ($category_id === null) $sql = "SELECT * FROM `articles`  ORDER BY `publicationdate`,`viewcount` LIMIT 8;";
    else $sql = "SELECT * FROM `articles` WHERE `category_id` = ?  ORDER BY `publicationdate`,`viewcount` LIMIT 8;";

    $category_query1= $link->prepare($sql);
    $category_query1->bind_param("i", $category_id);
    $category_query1->execute();
    $category_query1_result = $category_query1->get_result();

    return $category_query1_result;
}

function getArticles($order,$limit) {
    global $link;
       $news_sql="SELECT * FROM `articles` ORDER BY  ".$order." LIMIT ? ;";

    $news_query=$link->prepare($news_sql);
    $news_query->bind_param("i",$limit);
    $news_query->execute();
    $news_query_result = $news_query->get_result();

    return $news_query_result;
}


function getSetting($key) {
    global $link;
    $setting_sql="SELECT * FROM `setting` where `key_setting`=? ";
    $setting_Query=$link->prepare($setting_sql);
    $setting_Query->bind_param("s",$key);
    $setting_Query->execute();
    $setting_result=$setting_Query->get_result();
    $setting_row=$setting_result->fetch_assoc();
    
    return $setting_row;
}
function getaboutus() {
    global $link;
    $about_query=$link->prepare("SELECT * FROM `about_us` ;");
    $about_query->execute();
    $about_result=$about_query->get_result();
    $about_row=$about_result->fetch_assoc();
    
    return $about_row;
}
function getCategoryWithSlug($category_slug) {
    global $link;
    $cat_sql="SELECT * FROM `categorys` WHERE `slug`=?";
    $cat_queryy=$link->prepare($cat_sql);
    $cat_queryy->bind_param("s",$category_slug);
    $cat_queryy->execute(); 
    $cat_result=$cat_queryy->get_result();
    $cat_row=$cat_result->fetch_assoc();
    
    return $cat_row;
}

function findParentRow($id) {
    global $link;
    $catt_sql="SELECT * FROM `categorys` WHERE `id`=?";
    $catt_queryy=$link->prepare($catt_sql);
    $catt_queryy->bind_param("i",$id);
    $catt_queryy->execute(); 
    $catt_result=$catt_queryy->get_result();
    $catt_row=$catt_result->fetch_assoc();
    
    return $catt_row;
}

function getArticlesWithSlug($slug) {
    global $link;
       $news_sqll="SELECT * FROM `articles` WHERE `slug`=? ;";

    $news1_query=$link->prepare($news_sqll);
    $news1_query->bind_param("i",$slug);
    $news1_query->execute();
    $news1_query_result = $news1_query->get_result();
    $news1_query_row1 = $news1_query_result->fetch_assoc();
    return $news1_query_row1;
}