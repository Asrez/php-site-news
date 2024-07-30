<?php
require "../config.php" ;
if(isset($_POST['subbtn'])) {
if(isset( $_POST['name']) && !empty( $_POST['name']) &&
isset( $_POST['password']) && !empty( $_POST['password']) && 
isset( $_POST['username']) && !empty( $_POST['username']))
 {
$name = $_POST['name'];
 $password = $_POST['password'];
$username = $_POST['username'];
$image = $_POST['image'];
 }
 else{
?>
<script>
window.alert("برخی فیلد ها مقدار پهی نشده اند");
 location.replace("../profile.php");
</script>
<?php
}
 try {
 if($image == "") {
$image = "user.png";
}
$update = $link->prepare("UPDATE `admins` SET `username` =?, `name`=?, `password` =?, `image` =? WHERE `id`=?;");
 if($update) {
                     $update->bind_param("ssssi",$username, $name ,$password , $image , $adminn_id);
                     if($update->execute()) {
                         ?>
                         <script>
                             window.alert("ویرایش  شد");
                             location.replace("../profile.php");
                         </script>
                         <?php
                             }
                             else{
                                     ?>
                         <script>
                             window.alert("ویرایش نشد");
                             location.replace("../profile.php");
                         </script>
                         <?php
                             }
                           }  
} catch (mysqli_sql_exception $e) {
?>
<script>
 window.alert("نام کاربری یا نام را تغییر دهید");
 location.replace("../profile.php");
 </script>
<?php
  }
}

 ?>
