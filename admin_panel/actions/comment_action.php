<?php
require "../config.php";
$action = $_GET['action'];
$id = $_GET['id'];
switch ($action) {
    case 'update':
       $update = $link->prepare("UPDATE `comments` SET `venify`=? WHERE `id`=?");
       if($update) {
        $num = 1;
          $update->bind_param("ii",$num, $id);
          if($update->execute()) {
              ?>
              <script>
                  window.alert("تایید  شد");
                  location.replace("../simple.php");
              </script>
              <?php
                  }
                  else{
                          ?>
              <script>
                  window.alert("تایید نشد");
                  location.replace("../simple.php");
              </script>
              <?php
                  }
                } 
        break;
    
     case 'delete':
       $delete = $link->prepare("DELETE FROM `comments` WHERE `id`=?;");
       if($delete) {
          $delete->bind_param("i",$id);
          if($delete->execute()) {
              ?>
              <script>
                  window.alert("حذف شد");
                  location.replace("../simple.php");
              </script>
              <?php
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
        
}
mysqli_close($link);
?>