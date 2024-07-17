<?php
session_start();
$link=mysqli_connect("localhost","root","","news");
$action=$_GET['action'];
if($action!="insert"){
    $slug=$_GET['slug'];}
if(isset($_POST["title"]) && !empty($_POST["title"]))
{
                $title=$_POST['title'];
}
else{ 
    if($action!="delete"){
  ?>
  <script type="text/javascript">
    window.alert(" مقدار دهی نشده است");
location.replace("tag_edit.php?action=<?php  echo $action ; if($action!="insert"){?> & slug=<?php  echo $slug ;  }?>");
</script>
  <?php 
 }

}

switch ($action){
    case "delete":
        $delete="DELETE FROM `tags` WHERE slug='$slug'";
            if(mysqli_query($link,$delete)===true){
            ?>
            <script>
                window.alert("با موفقیت حذف شد");
                location.replace("simple.php");
            </script>
            <?php
            }
        else{
            ?>
            <script>
                window.alert("حذف نشد");
                location.replace("tag_edit.php?action=<?php  echo $action ; if($action!="insert"){?> & slug=<?php  echo $slug ;  }?>");
            </script>
            <?php
        }
        break;
        case "update":           
            $update="UPDATE `tags` SET `title`='$title' WHERE slug='$slug'";
            if(mysqli_query($link,$update)==true)
            {
                ?>
                <script>
                    window.alert("با موفقیت ویرایش شد");
                    location.replace("simple.php");
                </script>
                <?php

            }
            else{
                ?>
                <script>
                    window.alert("ویرایش نشد");
                    location.replace("tag_edit.php?action=<?php  echo $action ; if($action!="insert"){?> & slug=<?php  echo $slug ;  }?>");
                </script>
                <?php
                }
            break;
            case "insert":
                $query__="SELECT COUNT(id) AS count FROM tags WHERE title='$title'";
$result__=mysqli_query($link,$query__);
$row__=mysqli_fetch_array($result__);
if($row__['count']>0){
    ?>
 <script>   window.alert("عنوان تگ را تغییر دهید");
            location.replace("tag_edit.php?action=<?php  echo $action ; if($action!="insert"){?> & slug=<?php  echo $slug ;  }?>");
 </script>
    <?php
}         


$myChars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%%^&^&**()_+';
$text=substr( str_shuffle($myChars), 5, 16 );
             $insert_admin="INSERT INTO `tags`(`id`, `title`, `slug`) VALUES ('NULL','$title','$text')";
                                                                                                                                                                                                        
             if(mysqli_query($link,$insert_admin)===true){
                ?>
                <script>
                    window.alert("تگ با موفقیت ثبت شد");
                    location.replace("simple.php");
                </script>
                <?php
              }
              else{
                ?>
                <script>
                window.alert("خطا در ثبت تگ");
                location.replace("tag_edit.php?action=<?php  echo $action ; if($action!="insert"){?> & slug=<?php  echo $slug ;}?>");
            </script>
            <?php
              }
                break;
        
}
mysqli_close($link);
?>