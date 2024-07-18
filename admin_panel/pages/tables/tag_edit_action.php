<?php
session_start();
$link=mysqli_connect("localhost","root","","news");
$action=$_GET['action'];
if($action!="insert"){
$id=$_GET['id'];
}
if(isset($_POST['title']) && !empty($_POST['title'])){
    $title=$_POST['title'];
}
else{
    if($action!="delete"){
        ?>
         <script>
        window.alert("مقدار دهی نشده");
        location.replace("tag_edit.php?action=<?php echo $action; if($action!='insert'){ ?>&id=<?php echo $id;} ?>");
    </script>
        <?php
        exit();
    }
}
switch ($action) 
{
    case 'update':
        $update="UPDATE `tags` SET `title`='$title' WHERE `id`='$id';";
        if(mysqli_query($link,$update)){
            ?>
            <script>
           window.alert("ویرایش شد");
           location.replace("simple.php");
       </script>
           <?php
        }
        else{
             ?>
            <script>
           window.alert("ویرایش نشد");
           location.replace("tag_edit.php?action=<?php echo $action; if($action!='insert'){ ?>&id=<?php echo $id;} ?>");
       </script>
           <?php
        }
        break;

    case 'delete':
        $delete="DELETE FROM `tags` WHERE `id`='$id';";
        if(mysqli_query($link,$delete)){
            ?>
            <script>
           window.alert("حذف شد");
           location.replace("simple.php");
       </script>
           <?php
        }
        else{
             ?>
            <script>
           window.alert("حذف نشد");
           location.replace("tag_edit.php?action=<?php echo $action; if($action!='insert'){ ?>&id=<?php echo $id;} ?>");
       </script>
           <?php
        }
        break;

    case 'insert':
        $myChars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%%^&^&**()_+';
        $text=substr( str_shuffle($myChars), 5, 16 );
        $insert="INSERT INTO `tags`(`id`, `title`, `slug`) VALUES ('NULL','$title','$text');";
        if(mysqli_query($link,$insert)){
            ?>
            <script>
           window.alert("ثبت شد");
           location.replace("simple.php");
       </script>
           <?php
        }
        else{
             ?>
            <script>
           window.alert("ثبت نشد");
           location.replace("tag_edit.php?action=<?php echo $action; if($action!='insert'){ ?>&id=<?php echo $id;} ?>");
       </script>
           <?php
        }
        break;

}
mysqli_close($link);
?>