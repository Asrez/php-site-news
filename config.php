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

    if ($category_id === null) $sql = "SELECT * FROM `articles` WHERE `viewcount` > 0 ORDER BY `publicationdate` LIMIT 8;";
    else $sql = "SELECT * FROM `articles` WHERE `category_id` = ?  AND `viewcount` > 0 ORDER BY `publicationdate` LIMIT 8;";

    $category_query1= $link->prepare($sql);
    $category_query1->bind_param("i", $category_id);
    $category_query1->execute();
    $category_query1_result = $category_query1->get_result();

    return $category_query1_result;
}

function getArticles($limit, $order) {
    global $link;
       $news_sql="SELECT * FROM `articles` ORDER BY  ? LIMIT ? ;";

    $news_query=$link->prepare($news_sql);
    $news_query->bind_param("si",$order ,$category_id);
    $category_query1->execute();
    $category_query1_result = $category_query1->get_result();

    return $category_query1_result;
}