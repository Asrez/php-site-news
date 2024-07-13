<?php
session_start();
$link=mysqli_connect("localhost" , "root" ,"" ,"news") ;
$id=$_SESSION['admin_id'];
                  if(isset($_POST['name']) && !empty($_POST['name']) && 
                  isset($_POST['password']) && !empty($_POST['password']) && 
                  isset($_POST['username']) && !empty($_POST['username'])  )
                  {
                     $admin_name=$_POST['name'];
                     $admin_family=$_POST['family'];
                     $admin_email=$_POST['email'];
                     $admin_password=$_POST['password'];
                     $admin_username=$_POST['username'];
                     $admin_image=$_POST['image'];
                     $image=basename($_FILES["image"]["name"]);
                     $target_dir="../../../image/";
                     $target_file=$target_dir.basename($_FILES["image"]["name"]);
                  }
                  else{
                    ?>
                    <script>
                      window.alert("فیلدی را خالی نگذارید");
                    //   location.replace("profile.php");
                      </script>
                    <?php
                  }
                  if(file_exists($target_file)){
                    echo('
 
 <script type="text/javascript">
 window.alert("فایل انتخابی در سرویس دهنده موجود است");
   location.replace("profile.php");
 </script>');
 }
  if(move_uploaded_file($_FILES["image"]["tmp_name"],$target_file)){
                       echo('
 
 <script type="text/javascript">
 window.alert("فایل به سرویس دهنده میزبان ارسال شد");
 </script>');
 }
 $query_select_admin="SELECT * FROM admins WHERE id= $id";
 $result=mysqli_query($link,$query_select_admin);
 $row=mysqli_fetch_array($result);
                  $id=$row['id'];
                  $date=$row['date'];
                  $query_update_admins="UPDATE `admins` SET `id`='$id',`name`='$admin_name',`username`='$admin_username',`password`='$admin_password',`image`='$admin_image',`date`='$date' WHERE 1";
                  if(mysqli_query($link,$query_update_admins)===true){
                    ?>
                    <script>
                        window.alert(" با موفقیت ویرایش شد");
                        location.replace("profile.php");
                    </script>
                    <?php
                  }
                  else{
                    ?>
                    <script>
                    window.alert("خطا در  ویرایش مشخصات");
                    location.replace("profile.php");
                </script>
                <?php
                  }
                ?>