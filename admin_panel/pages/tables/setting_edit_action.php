<?php
session_start();
$link=mysqli_connect("localhost","root","","news");
$action=$_GET['action'];
$id=$_GET['id'];
if(isset($_POST['qlink'] )){
    $key_setting=basename($_FILES["key_setting"]["name"]);
    $target_dir="../../../image/";
    $target_file=$target_dir.basename($_FILES["key_setting"]["name"]);
    $uploadok=1;
    $imagefiletype=pathinfo($target_file,PATHINFO_EXTENSION);
    $value_setting=$_POST['value_setting'];
    $linkQ=$_POST['qlink'] ;
}
if($action!="delete"){

    if($imagefiletype!="jpg" &&$imagefiletype!="png"&& $imagefiletype!="jpeg" && $imagefiletype!="gif")
    {
        echo('
    
    <script type="text/javascript">
    window.alert("شما فقط پسوند های png , jpg , jpeg ,gif مجاز هستید");
        location.replace("article_edit.php?action=<?php  echo $action ; if($action!="insert"){?> & slug=<?php  echo $slug ;  }?>");
    </script>');
        $uploadok=0;
    }
                      if(!file_exists($target_file)){
                        
     move_uploaded_file($_FILES["image"]["tmp_name"],$target_file);
    }}
else{
    if($action=='update'){
    ?>
    <script>
        window.alert("فیلد ها مقدار دهی نشده اند");
        location.replace("setting_edit.php?id=<?php echo $id; ?>");
    </script>
    <?php }
}
if($action=='update'){
    $query="UPDATE `setting` SET `value_setting`='$value_setting',`link`='$linkQ' WHERE id=$id";
   if(mysqli_query($link,$query)===true){
    ?>
    <script>
        window.alert("ویرایش شد");
        location.replace("data.php");
    </script>
    <?php
}
else{
    ?>
    <script>
        window.alert("ویرایش  نشد . دوباره امتحان کنید");
        location.replace("setting_edit.php?id=<?php echo $id; ?>&action=<?php echo $action; ?>");
    </script>
    <?php
}}
if($action=="delete"){
    $query="UPDATE `setting` SET `value_setting`='nullimg.png',`link`='' WHERE id=$id";
    if(mysqli_query($link,$query)===true){
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
         window.alert("حذف  نشد . دوباره امتحان کنید");
         location.replace("dat.php");
     </script>
     <?php
 }
}
mysqli_close();
?>