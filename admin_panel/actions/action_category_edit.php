<?php
require "../config.php";
$action = $_GET['action'];
if($action != "insert") {
$id = $_GET['id'];}
$parent_id = $_GET['parent_id'];
if(isset($_POST['title']) && !empty($_POST['title'])) {
    $title = $_POST['title'];
}
else{
    if($action != "delete") {
    ?>
    <script>
        window.alert("مقدار دهی نشده");
        location.replace("../category_edit.php?action=<?= $action; ?>&parent_id=<?php echo $parent_id; if($action!="insert") { ?>&id=<?= $id;} ?>");
    </script>
    <?php
exit();
}}
switch ($action) {
    case 'update':
        $update = $link->prepare("UPDATE `categorys` SET  `title`=?  WHERE `id`=?;");
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
                  location.replace("../category_edit.php?action=<?= $action; ?>&parent_id=<?php echo $parent_id; if($action!="insert") { ?>&id=<?= $id;} ?>");
              </script>
              <?php
                  }
                }    
        break;
    
    case 'delete':
       $delete = $link->prepare("DELETE FROM `categorys` WHERE `id`=?;");
       $delete1 = $link->prepare("DELETE FROM `categorys` WHERE `parent_id`=?;");
       $delete1->bind_param("i",$id);
       if($delete) {
          $delete->bind_param("i",$id);
          if($delete->execute()) {
            if($delete1->execute()) {
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
                  location.replace("../category_edit.php?action=<?= $action; ?>&parent_id=<?php echo $parent_id; if($action!="insert") { ?>&id=<?= $id;} ?>");
              </script>
              <?php
                  }
                }    
                   break;
    case 'insert':
         $myChars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
         $text = substr( str_shuffle($myChars), 5, 10 );
         $insert = $link->prepare("INSERT INTO `categorys`(`id`, `title`, `parent_id`, `slug`) VALUES (?, ?, ?, ?)");
         if($insert) {
            $code="NULL";
            $insert->bind_param("isis",$code, $title, $parent_id, $text);
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
                    location.replace("../category_edit.php?action=<?= $action; ?>&parent_id=<?php echo $parent_id; if($action!="insert") { ?>&id=<?= $id;} ?>");
                </script>
                <?php
                    }
            }
      break;
        
        
}
?>