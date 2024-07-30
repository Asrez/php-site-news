<?php
define("LOAD", "");

require "../config.php";

if(isset ($_GET['action']))
    $action = $_GET['action'];
else 
    header("Location: ../404.php");

if($action != "insert") {$slug = $_GET['slug'];}
if(isset($_POST["title"]) && !empty($_POST["title"])&&
isset($_POST["summery"]) && !empty($_POST["summery"])&&
isset($_POST["content"]) && !empty($_POST["content"]))

{
   
      
                $title = $_POST['title'];
                $summery = $_POST['summery'];
                $content = $_POST['content'];
                $source = $_POST['source'];
                $category = $_POST['category'];
                $admin = $_SESSION["admin_id"];
                $image = basename($_FILES["image"]["name"]);
                $target_dir = "../../image/";
                $target_file = $target_dir.basename($_FILES["image"]["name"]);
                $uploadok = 1;
                $imagefiletype = pathinfo($target_file,PATHINFO_EXTENSION);
                if($admin === 13){
                    $verify=1;
                }
                else{
                    $verify= 0;
                }
   
              
}
else{ 
    if($action!="delete"  and  $action!= "verify") {
  ?>
  <script type="text/javascript">
    window.alert("برخی فیلد ها مقدار دهی نشده است");
location.replace("../article_edit.php?action=<?php  echo $action ; if($action!="insert") {?>&slug=<?= $slug ;  }?>");
</script>
  <?php
  exit();
 }
}
if(isset($_POST['tags'])) {
$tags = $_POST['tags'];
}
if($action!="delete" or $action!= "verify") {

    if($imagefiletype!="jpg" &&$imagefiletype!="png"&& $imagefiletype!="jpeg" && $imagefiletype!="gif")
    {
        echo('
    
    <script type="text/javascript">
    window.alert("شما فقط پسوند های png , jpg , jpeg ,gif مجاز هستید");
        location.replace("article_edit.php?action=<?php  echo $action ; if($action!="insert") {?> & slug=<?php  echo $slug ;  }?>");
    </script>');
        $uploadok = 0;
    }
                      if(!file_exists($target_file)) {
                        
     move_uploaded_file($_FILES["image"]["tmp_name"],$target_file);}
}
switch ($action) {
    case "verify":
        $verifyy = $link->prepare("UPDATE `articles` SET `verify` = 1  WHERE `slug`=? ;");
        if($verifyy) {
           $verifyy->bind_param("s",$slug);
           if($verifyy->execute()) {
               ?>
               <script>
                   window.alert("تایید شد");
                   location.replace("../data.php");
               </script>
               <?php
                   }
                }

        break;
    case "delete":
        $found_article = "SELECT * FROM `articles` WHERE `slug`= ?;";
        $found_article = $link->prepare($found_article);
        $found_article->bind_param("s",$slug);
        $found_article->execute();
        $found_article_result = $found_article->get_result();
        $found_article_row = $found_article_result->fetch_assoc();

        $id = $found_article_row['id'];
        $delete_comment = $link->prepare("DELETE FROM `comments` WHERE `article_id`=?");
        $delete_article_tag = $link->prepare("DELETE FROM `article_tag` WHERE `article_id`=?");
        $delete = $link->prepare("DELETE FROM `articles` WHERE `slug` =? ;");
       if($delete_comment) {
        if($delete_article_tag) {
            if($delete) {
          $delete_comment->bind_param("i",$id);
          $delete_article_tag->bind_param("i",$id);
          $delete->bind_param("s",$slug);
          if($delete_comment->execute()) {
            if($delete_article_tag->execute()) {
                if($delete->execute()) {
              ?>
              <script>
                  window.alert("حذف شد");
                  location.replace("../data.php");
              </script>
              <?php
                 }} }
                  else{
                          ?>
              <script>
                  window.alert("حذف نشد");
                  location.replace("../article_edit.php?action=<?php  echo $action ; if($action!="insert") {?> & slug=<?php  echo $slug ;  }?>");
              </script>
              <?php
                  }
         }} }    
        break;
        case "update":
            if($image === "") {
            $select_img = get_article_with_slug($slug);
            $image = $select_img['image'];}
            $update = $link->prepare("UPDATE `articles` SET `title` =?, `summery`=?, `content` =?, `image` =?, `source` =?, `category_id` =?  WHERE `slug`=? ;");
            if($update) {
               $update->bind_param("sssssis",$title, $summery , $content ,$image , $source ,$category ,$slug);
               if($update->execute()) {
                   ?>
                   <script>
                       window.alert("ویرایش  شد");
                       location.replace("../data.php");
                   </script>
                   <?php
                       }
                       else{
                               ?>
                   <script>
                       window.alert("ویرایش نشد");
                       location.replace("../article_edit.php?action=<?php  echo $action ; if($action!="insert") {?> & slug=<?= $slug ;  }?>");
                   </script>
                   <?php
                       }
                     }    
            break;
        
}

             

$myChars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$text = substr( str_shuffle($myChars), 5, 16 );
$date = date('Y-m-d h:i:s');

           $insert = $link->prepare("INSERT INTO `articles`(`id`, `publicationdate`, `title`, `summery`, `content`, `image`, `source`, `viewcount`, `category_id`, `admin_id`, `slug`,`verify`)VALUES (?,?,?,?,?,?,?,?,?,?,?,?);");
         if($insert) {
            if($image === "") {
                $image = "default_art_img.png";
            }
            $code = "NULL";
            $view_count = 0;
            $insert->bind_param("issssssiiisi",$code, $date, $title, $summery , $content , $image , $source , $ $view_count , $category ,$admin , $text,$verify);
            if($insert->execute()) {
                $find_id_art_result = get_tables_with_where(" `articles` ","WHERE `slug`='$text'");
                $find_id_art_row = $find_id_art_result->fetch_assoc();
                $id_article = $find_id_art_row['id'];
                if (count($tags) > 0)
                { 
                    foreach ($tags as $tag_id) {  
                        $insert_tags = $link->prepare("INSERT INTO `article_tag`(`id`, `article_id`, `tag_id`) VALUES (?,?,?);") ;
                        $idd = "NULL";
                        $insert_tags->bind_param("iii",$idd,$id_article,$tag_id);
                        $insert_tags->execute();
                    }  
                }
            
                ?>
                <script>
                    window.alert("ثبت شد");
                    location.replace("../data.php");
                </script>
                <?php
                    }
                    else{
                            ?>
                <script>
                    window.alert("ثبت نشد");
                    location.replace("../article_edit.php?action=<?php  echo $action ; if($action!="insert") {?> & slug=<?= $slug ;  }?>");
                </script>
                <?php
                    }
            }

              mysqli_close($link);
              ?>