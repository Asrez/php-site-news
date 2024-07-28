<?php 
require "../config.php";
if(
  isset($_POST["username"]) && !empty($_POST["username"])&&
  isset($_POST["password"]) && !empty($_POST["password"])
  )
  {
    $username = $_POST['username'];
    $password = $_POST['password'];
  }
  else{

  ?>
  <script> 
  window.alert("برخی فیلد ها مقدار دهی نشده اند ");
  location.replace("../login.php");
  </script> 
  <?php
  }

  $result = get_tables_with_where(" `admins` "," WHERE `username` = '$username' AND `password`= '$password'");
  $row = $result->fetch_assoc();
  if($row){
    $_SESSION["state_login"] = true;
    $_SESSION["name"] = $row['name'];
    $_SESSION["username"] = $row['username'];
    $_SESSION["admin_image"] = $row['image'];
    $_SESSION["admin_id"] = $row['id'];
    echo ("<script > window.alert('{$row['name']}به پنل ادمین خوش آمدید');
    location.replace('../index.php');
</script>");
  }

  else{
    echo ("<script> window.alert('ادمینی با این مشخصات وجود ندارد');
    location.replace('../login.php'); </script>");
  }
 
  ?>