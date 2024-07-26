<?php 
session_start();
$link=mysqli_connect("localhost","root","","news");


if(
  isset($_POST["username"]) && !empty($_POST["username"])&&
  isset($_POST["password"]) && !empty($_POST["password"])
  )
  {
    $username=$_POST['username'];
    $password=$_POST['password'];
  }
  else{

  ?>
  <script> 
  window.alert("برخی فیلد ها مقدار دهی نشده اند ");
  location.replace("login.php");
  </script> 
  <?php
  }

  $query="SELECT * FROM admins WHERE username='$username' AND password='$password'; ";
  $result=mysqli_query($link,$query);
  $row=mysqli_fetch_array($result);
  if($row){
    $_SESSION["state_login"]=true;
    $_SESSION["name"]=$row['name'];
    $_SESSION["username"]=$row['username'];
    $_SESSION["admin_image"]=$row['image'];
    $_SESSION["admin_id"]=$row['id'];
    echo ("<script > window.alert('{$row['name']}به پنل ادمین خوش آمدید');
    location.replace('../../index2.php');
</script>");
  }

  else{
    echo ("<script> window.alert('ادمینی با این مشخصات وجود ندارد');
    location.replace('login.php'); </script>");
  }
 
  ?>