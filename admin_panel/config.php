<?php
session_start();
$link=mysqli_connect("localhost" , "root" ,"" ,"news") ;

function get_count_tables($table_name,$where) {
    global $link;

    $comment_sql="SELECT COUNT(`id`) AS `count` FROM ".$table_name." ".$where." ; ";
    $comment_query = $link->prepare($comment_sql);
    $comment_query->execute();
    $comment_result = $comment_query->get_result();
    $comment_row = $comment_result->fetch_assoc();

    return $comment_row;


}


function commentswithVenify($venify) {
    global $link;
    
    $comment_sql="SELECT * FROM `comments` WHERE `venify` = ? ;";
    $comment_query = $link->prepare($comment_sql);
    $comment_query->bind_param("i",$venify);
    $comment_query->execute();
    $comment_result = $comment_query->get_result();

    return $comment_result;
}

function gettables($tables,$order,$limit) {
    global $link;
    
    $tables_sql="SELECT * FROM ".$tables." ORDER BY ".$order." LIMIT ? ;";
    $tables_query = $link->prepare($tables_sql);
    $tables_query->bind_param("i",$limit);
    $tables_query->execute();
    $tables_result = $tables_query->get_result();

    return $tables_result;
}

function get_tables_with_id($table_name,$id) {
    global $link;

    $table_sql="SELECT * FROM ".$table_name." WHERE `id` = ? ; ";
    $table_query = $link->prepare($table_sql);
    $table_query->bind_param("i",$id);
    $table_query->execute();
    $table_result = $table_query->get_result();
    $table_row = $table_result->fetch_assoc();

    return $table_row;


}
function get_article_with_slug($id) {
    global $link;

    $table_sql="SELECT * FROM `articles` WHERE `id` = ? ; ";
    $table_query = $link->prepare($table_sql);
    $table_query->bind_param("i",$id);
    $table_query->execute();
    $table_result = $table_query->get_result();
    $table_row = $table_result->fetch_assoc();

    return $table_row;


}

?>