<?php
define("LOAD", "");

require "../config.php";

if(isset ($_GET['action']))
    $action = $_GET['action'];
else 
{
    header("Location: ../404.php");
    exit();
}

if($action != "insert") {
$id = $_GET['id'];
}
if(isset($_POST['title']) && !empty($_POST['title'])) {
    $title = $_POST['title'];
}
else{
    if($action!="delete") {
        ?>
         <script>
        window.alert("مقدار دهی نشده");
        location.replace("../tag_edit.php?action=<?php echo $action; if($action!='insert') { ?>&id=<?= $id;} ?>");
    </script>
        <?php
        exit();
    }
}
switch ($action) 
{
    case 'update':
        $update = $link->prepare("UPDATE `tags` SET `title`=? WHERE `id`=?;");
                if($update) {
                   $update->bind_param("si",$title, $id);
                   if($update->execute()) {
                       ?>
                       <script>
                           window.alert("ویرایش  شد");
                           location.replace("../simple.php");
                       </script>
                       <?php
                           }
                           else{
                                   ?>
                       <script>
                           window.alert("ویرایش نشد");
                           location.replace("../tag_edit.php?action=<?php echo $action; if($action!='insert') { ?>&id=<?= $id;} ?>");
                       </script>
                       <?php
                           }
                         }  
        break;

    case 'delete':
        $delete1 = $link->prepare("DELETE FROM `article_tag` WHERE `tag_id`=?;");
        $delete1->bind_param("i",$id);
        $delete = $link->prepare("DELETE FROM `tags` WHERE `id`=?;");
        if($delete) {
          $delete->bind_param("i",$id);
          if($delete1->execute()) {
            if($delete->execute()) {
              ?>
              <script>
                  window.alert("حذف شد");
                  location.replace("../simple.php");
              </script>
              <?php
             }
            }
             else{
                          ?>
              <script>
                  window.alert("حذف نشد");
                  location.replace("../simple.php");
              </script>
              <?php
                  } 
                }
             
                  
            
        break;

    case 'insert':
        $myChars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $text = substr( str_shuffle($myChars), 5, 16 );
        $insert = $link->prepare("INSERT INTO `tags`(`id`, `title`, `slug`) VALUES (?,?,?);");
             if($insert) {
                $code = "NULL";
                $insert->bind_param("iss",$code, $title, $text);
                if($insert->execute()) {
                    ?>
                    <script>
                        window.alert("ثبت شد");
                        location.replace("../simple.php");
                    </script>
                    <?php
                        }
                        else{
                                ?>
                    <script>
                        window.alert("ثبت نشد");
                        location.replace("../tag_edit.php?action=<?= $action; ?>");
                    </script>
                    <?php
                        }
                }
        break;

}
mysqli_close($link);
?>