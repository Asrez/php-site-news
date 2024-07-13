<?php
session_start();
$link=mysqli_connect("localhost","root","","news");
$action=$_GET['action'];
$id=$_GET['id'];
if(isset($_POST['key_setting'] ) && !empty($_POST['key_setting']) &&
isset($_POST['value_setting'] ) && !empty($_POST['value_setting']) && 
isset($_POST['link'] ) && !empty($_POST['link'])){
    $key_setting=$_POST['key_setting'] ;
    $value_setting=$_POST['value_setting'];
    $link=$_POST['link'] ;
}
else{
    if($action!="delete"){
    ?>
    <script>
        window.alert("فیلد ها مقدار دهی نشده اند");
        location.replace(setting_edit.php);
    </script>
    <?php 
    }
}
switch ($action){
    case 'delete':
        $query="DELETE FROM `setting` WHERE id=$id";
        break;
    case 'update':
        $query="UPDATE `setting` SET `id`='$id', `key_setting`='$key_setting',`value_setting`='$value_setting',`link`='$link' WHERE id=$id";
        break;
    case 'insert':
        $query="INSERT INTO `setting`(`id`, `key_setting`, `value_setting`, `link`) VALUES ('NULL','$key_setting','$value_setting','$link')";
        break;
}
if(mysqli_query($link,$query)===true){
    ?>
    <script>
        window.alert("ثبت شد");
        location.replace(data.php);
    </script>
    <?php
}
else{
    ?>
    <script>
        window.alert("ثبت نشد . دوباره امتحان کنید");
        location.replace(setting_edit.php);
    </script>
    <?php
}
?>