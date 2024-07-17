<?php
$link=mysqli_connect("localhost","root","","news");
$action=$_GET['action'];
$id=$_GET['id'];
switch ($action) {
    case 'update':
       $update="UPDATE `comments` SET `venify`='1' WHERE id='$id'";
       if($up_result=mysqli_query($link,$update)){
        ?>
        <script>
            window.alert("تایید شد");
            location.replace("simple.php");
        </script>
        <?php
       }
       else{
?>
        <script>
            window.alert("دوباره تلاش کنید");
            location.replace("simple.php");
        </script>
        <?php
       }
        break;
    
     case 'delete':
       $delete="DELETE FROM `comments` WHERE id='$id'";
       if($up_result=mysqli_query($link,$delete)){
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
            window.alert("حذف نشد دوباره تلاش کنید");
            location.replace("simple.php");
        </script>
        <?php
       }
         break;
        
}
mysqli_close($link);
?>