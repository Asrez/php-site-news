<?php
session_start();
$link=mysqli_connect("localhost","root","","news");
$action=$_GET['action'];
$id=$_GET['id'];
if(isset($_POST['qlink'] )&& !empty($_POST['qlink'])){
    $image=basename($_FILES["image"]["name"]);
    $target_dir="../../../image/";
    $target_file=$target_dir.basename($_FILES["image"]["name"]);
    $uploadok=1;
    $imagefiletype=pathinfo($target_file,PATHINFO_EXTENSION);
    $linkQ=$_POST['qlink'] ;
}
else{
    if($action=='update'){
    ?>
    <script>
        window.alert("فیلد ها مقدار دهی نشده اند");
        location.replace("setting_edit.php?id=<?php echo $id; ?>");
    </script>
    <?php
    exit();
    }
}           
 
if($action!="delete"){

    if($imagefiletype!="jpg" &&$imagefiletype!="png"&& $imagefiletype!="jpeg" && $imagefiletype!="gif")
    {
        echo('
    
    <script type="text/javascript">
    window.alert("شما فقط پسوند های png , jpg , jpeg ,gif مجاز هستید");
        location.replace("article_edit.php?action=<?php  echo $action ; if($action!="insert"){?> & slug=<?= urlencode($slug) ?>");
    </script>');
        $uploadok=0;
    }
                      if(!file_exists($target_file)){
                        
     move_uploaded_file($_FILES["image"]["tmp_name"],$target_file);}
}

if($action=='update'){
    $update = $link->prepare("UPDATE `setting` SET `value_setting`=?,`link`=? WHERE `id`=?");
       if($update){
          $update->bind_param("ssi",$image,$linkQ , $id);
          if($update->execute()){
              ?>
              <script>
                  window.alert("ویرایش  شد");
                  location.replace("data.php");
              </script>
              <?php
                  }
                  else{
                          ?>
              <script>
                  window.alert("ویرایش نشد");
                  location.replace("setting_edit.php?id=<?php echo $id; ?>");
              </script>
              <?php
                  }
                } 
            }
if($action=="delete"){
    $nullimg="nullimg.png";
    $liink="";
    $delete = $link->prepare("UPDATE `setting` SET `value_setting`=? ,`link`=? WHERE `id`=?;");
       if($delete){
          $delete->bind_param("ssi",$nullimg,$liink,$id);
          if($delete->execute()){
              ?>
              <script>
                  window.alert("حذف شد");
                  location.replace("data.php");
              </script>
              <?php
                  }
                  else{
                          ?>
              <script>
                  window.alert("حذف نشد");
                  location.replace("setting_edit.php?id=<?php echo $id; ?>");
              </script>
              <?php
                  }
                }    
}
mysqli_close($link);
?>