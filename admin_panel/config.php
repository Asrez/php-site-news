<?php
if (!defined("LOAD")) exit();

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

session_start();
$link=mysqli_connect("localhost" , "root" ,"" ,"news") ;

if(!(isset($_SESSION["state_login"]) && $_SESSION["state_login"]===true))
{
    header("Location: 404.php");
    exit();
}

function get_count_tables(string $table_name, string $where) {
    global $link;

    $comment_sql = "SELECT COUNT(`id`) AS `count` FROM ".$table_name." ".$where." ; ";
    $comment_query = $link->prepare($comment_sql);
    $comment_query->execute();
    $comment_result = $comment_query->get_result();
    $comment_row = $comment_result->fetch_assoc();

    return $comment_row;


}


function commentswithVenify(int $venify) {
    global $link;
    
    $comment_sql = "SELECT * FROM `comments` WHERE `venify` = ?;";
    $comment_query = $link->prepare($comment_sql);
    $comment_query->bind_param("i",$venify);
    $comment_query->execute();
    $comment_result = $comment_query->get_result();

    return $comment_result;
}

function gettables(string $tables, string $order, int $limit) {
    global $link;
    
    $tables_sql = "SELECT * FROM ".$tables." ORDER BY ".$order." LIMIT ?;";
    $tables_query = $link->prepare($tables_sql);
    $tables_query->bind_param("i",$limit);
    $tables_query->execute();
    $tables_result = $tables_query->get_result();

    return $tables_result;
}

function get_tables_with_id(string $table_name, int $id) {
    global $link;

    $table_sql = "SELECT * FROM ".$table_name." WHERE `id` = ? ; ";
    $table_query = $link->prepare($table_sql);
    $table_query->bind_param("i",$id);
    $table_query->execute();
    $table_result = $table_query->get_result();
    $table_row = $table_result->fetch_assoc();

    return $table_row;


}
function get_article_with_slug(string $slug) {
    global $link;

    $table_sql = "SELECT * FROM `articles` WHERE `slug` = ?  and `verify` = 1 ; ";
    $table_query = $link->prepare($table_sql);
    $table_query->bind_param("s",$slug);
    $table_query->execute();
    $table_result = $table_query->get_result();
    $table_row = $table_result->fetch_assoc();

    return $table_row;


}
function getTagsInner(int $id)
{  
   global $link;

   $inner_sql = "SELECT `tags`.`title` , `tags`.`id` , `article_tag`.`article_id` FROM `tags` INNER JOIN `article_tag` ON `tags`.`id` = `article_tag`.`tag_id` WHERE `article_tag`.`article_id` = ?; ";
   $inner_query = $link->prepare($inner_sql);
   $inner_query->bind_param("i",$id);
   $inner_query->execute();
   $inner_result = $inner_query->get_result();   
   return $inner_result;
}

function selectall(string $table_name) {
    global $link;

    $table_sql = "SELECT * FROM ".$table_name." ; ";
    $table_query = $link->prepare($table_sql);
    $table_query->execute();
    $table_result = $table_query->get_result();
    return $table_result;
}
function get_tables_with_where(string $table_name, string $where) {
    global $link;

    $t_sql = "SELECT * FROM ".$table_name." ".$where." ; ";
    $t_query = $link->prepare($t_sql);
    $t_query->execute();
    $t_result = $t_query->get_result();

    return $t_result;


}

function get_categorys() {
    global $link;
    
    $parent_category = [];
    $sub_category = [];
    $category_result = get_tables_with_where(" `categorys` ","WHERE `parent_id`=0");
    while($category_row = $category_result->fetch_assoc()) {
        $parent_category[] = $category_row;
        $id_category = $category_row['id'];
        $category_result1 = get_tables_with_where(" `categorys` ","WHERE `parent_id`='$id_category';");
        while($category_row1 = $category_result1->fetch_assoc()) {
            $sub_category[] = $category_row1;
        }
    }
     $category = ["pcat"=>$parent_category,"scat"=>$sub_category];
    return $category;


}

function get_article_for_chart() {
    global $link;

    $chart_sql = "SELECT * FROM `articles` WHERE `verify` = 1  ORDER BY `viewcount` DESC LIMIT 6  ; ";
    $chart_query = $link->prepare($chart_sql);
    $chart_query->execute();
    $chart_result = $chart_query->get_result();

    return $chart_result;


}
function setting($id) {
    global $link;

    $sql_select = "SELECT * FROM `setting` WHERE `id` = ?;";

    $query_select = $link->prepare($sql_select);
    $query_select->bind_param("i",$id);
    $query_select->execute();
    $result_select = $query_select->get_result();
    $row_select = $result_select->fetch_assoc();

    return $row_select;
}
?>