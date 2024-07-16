<?php
session_start();
$link=mysqli_connect("localhost","root","","news");
$action=$_GET['action'];
if($action!="insert"){
    $id=$_GET['id'];}
if($action=="update"){
    $username_admin=$_GET['username_admin'];
    $name_admin=$_GET['name_admin'];
}
if(isset($_POST["username"]) && !empty($_POST["username"])&&
isset($_POST["name"]) && !empty($_POST["name"])&&
isset($_POST["password"]) && !empty($_POST["password"]))

{
   
      
                $username=$_POST['username'];
                $name=$_POST['name'];
                $password=$_POST['password'];
                $image=basename($_FILES["image"]["name"]);
                $image=basename($_FILES["image"]["name"]);
                $target_dir="../../../image/";
                $target_file=$target_dir.basename($_FILES["image"]["name"]);
                $uploadok=1;
                $imagefiletype=pathinfo($target_file,PATHINFO_EXTENSION);
   
              
}
else{ 
    if($action!="delete"){
  ?>
  <script type="text/javascript">
    window.alert("برخی فیلد ها مقدار دهی نشده است");
location.replace("admin_edit.php?action=<?php  echo $action ; if($action!="insert"){?> & id=<?php  echo $id ;  }?>");
</script>
  <?php
 }
}
$query__="SELECT COUNT(id) AS count FROM admins WHERE username='$username' OR name='$name'";
$result__=mysqli_query($link,$query__);
$row__=mysqli_fetch_array($result__);


if($action!="delete"){

    if($imagefiletype!="jpg" &&$imagefiletype!="png"&& $imagefiletype!="jpeg" && $imagefiletype!="gif")
    {
        echo('
    
    <script type="text/javascript">
    window.alert("شما فقط پسوند های png , jpg , jpeg ,gif مجاز هستید");
        location.replace("admin_edit.php?action=<?php  echo $action ; if($action!="insert"){?> & id=<?php  echo $id ;  }?>");
    </script>');
        $uploadok=0;
    }
                      if(file_exists($target_file)){
                         echo('
    
    <script type="text/javascript">
    window.alert("فایل انتخابی در سرویس دهنده موجود است");
        location.replace("admin_edit.php?action=<?php  echo $action ; if($action!="insert"){?> & id=<?php  echo $id ;  }?>");
    </script>');
    }
     if(move_uploaded_file($_FILES["image"]["tmp_name"],$target_file)){
                          echo('
    
    <script type="text/javascript">
    window.alert("فایل به سرویس دهنده میزبان ارسال شد");
    </script>');
    }
}
switch ($action){
    case "delete":
        $update_article="UPDATE `articles` SET `admin_id`='13' WHERE admin_id='$id';";
        $delete="DELETE FROM `admins` WHERE id ='$id'";
        if(mysqli_query($link,$update_article)===true){
            if(mysqli_query($link,$delete)===true){
            ?>
            <script>
                window.alert("با موفقیت حذف شد");
                location.replace("simple.php");
            </script>
            <?php
            }

        }
        else{
            ?>
            <script>
                window.alert("حذف نشد");
                location.replace("admin_edit.php?action=<?php  echo $action ; if($action!="insert"){?> & id=<?php  echo $id ;  }?>");
            </script>
            <?php
        }
        mysqli_close();
        break;
        case "update":
            if($row__['count']>1 &&
                $username!=$username_admin
             && $name!=$name_admin){
                
                ?>
                <script>
                    window.alert("نام کاربری یا نام را تغییر دهید");
                    location.replace("admin_edit.php?action=<?php  echo $action ; if($action!="insert"){?> & id=<?php  echo $id ;  }?>");
                </script>
                <?php
}
            if($image ==""){
                $image="user.png";
            }
            $update="UPDATE `admins` SET username ='$username', name='$name', password ='$password', image ='$image'  WHERE id='$id'";
            if(mysqli_query($link,$update)==true)
            {
                ?>
                <script>
                    window.alert("با موفقیت ویرایش شد");
                    location.replace("simple.php");
                </script>
                <?php
    
            }
            else{
                ?>
                <script>
                    window.alert("ویرایش نشد");
                    location.replace("admin_edit.php?action=<?php  echo $action ; if($action!="insert"){?> & id=<?php  echo $id ;  }?>");
                </script>
                <?php
                }
            mysqli_close();
            break;
        
}
if($action=="insert"){
if($row__['count']>0){
    ?>
 <script>   window.alert("نام کاربری یا نام را تغییر دهید");
            location.replace("admin_edit.php?action=<?php  echo $action ; if($action!="insert"){?> & id=<?php  echo $id ;  }?>");
 </script>
    <?php
}         


$date=date('Y-m-d h:i:s');
             $insert_admin="INSERT INTO `admins`(`id`, `name`, `username`, `password`, `image`, `date`) VALUES ('NULL','$name','$username','$password','$image','$date')";
                                                                                                                                                                                                        
             if(mysqli_query($link,$insert_admin)===true){
                ?>
                <script>
                    window.alert("کاربر با موفقیت ثبت شد");
                    location.replace("simple.php");
                </script>
                <?php
              }
              else{
                ?>
                <script>
                window.alert("خطا در ثبت کاربر");
                location.replace("admin_edit.php?action=<?php  echo $action ; if($action!="insert"){?> & id=<?php  echo $id ;  }?>");
            </script>
            <?php
              }}
            
              mysqli_close($link);
              ?>