<?php
session_start();
$link = mysqli_connect("localhost","root","","news");

function getCategories($parent_id) {
    global $link;

    $sport_query3 = $link->prepare("SELECT * FROM `categorys` WHERE `parent_id`=$parent_id;");
    $sport_query3->execute();
    $result_sport_query3=$sport_query3->get_result();
    
    return $result_sport_query3;
}

function getArticlesInCategory(?int $category_id = null) {
    global $link;

    if ($category_id === null) $sql = "SELECT * FROM `articles` WHERE `viewcount` > 0 ORDER BY `publicationdate` LIMIT 6;";
    else $sql = "SELECT * FROM `articles` WHERE `category_id` = ?  AND `viewcount` > 0 ORDER BY `publicationdate` LIMIT 6;";

    $sport_query3 = $link->prepare($sql);
    $sport_query3->bind_param("i", $category_id);
    $sport_query3->execute();
    $result_sport_query3 = $sport_query3->get_result();

    return $result_sport_query3;
}


 ?>