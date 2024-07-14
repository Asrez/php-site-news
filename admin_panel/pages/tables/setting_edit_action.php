<?php
session_start();
$link=mysqli_connect("localhost","root","","news");
$action=$_GET['action'];
$id=$_GET['id'];
if(isset($_POST['value_setting'] ) && 
isset($_POST['qlink'] )){
    $key_setting=$_POST['key_setting'] ;
    $value_setting=$_POST['value_setting'];
    $linkQ=$_POST['qlink'] ;
}
else{
    ?>
    <script>
        window.alert("فیلد ها مقدار دهی نشده اند");
        location.replace("setting_edit.php?id=<?php echo $id; ?>");
    </script>
    <?php 
}

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
        location.replace("setting_edit.php?id=<?php echo $id; ?>");
    </script>
    <?php
}
mysqli_close();
?>