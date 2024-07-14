<?php
session_start();
$link=mysqli_connect("localhost","root","","news");
$action=$_GET['action'];
if($action!="insert"){$id=$_GET['id'];}
if(isset($_POST["username"]) && !empty($_POST["username"])&&
isset($_POST["name"]) && !empty($_POST["name"])&&
isset($_POST["password"]) && !empty($_POST["password"]))

{
   
      
                $username=$_POST['username'];
                $name=$_POST['name'];
                $password=$_POST['password'];
                $image=basename($_FILES["image"]["name"]);
                $target_dir="../../dist/img/";
                $target_file=$target_dir.basename($_FILES["image"]["name"]);
                $uploadok=1;
                $imagefiletype=pathinfo($target_file,PATHINFO_EXTENSION);
   
              
}
else{ 
    if($action!="delete"){
  ?>
  <script type="text/javascript">
    window.alert("برخی فیلد ها مقدار دهی نشده است");
location.replace("article_edit.php?action=<?php  echo $action ; if($action!="insert"){?> & id=<?php  echo $id ;  }?>");
</script>
  <?php
 }
}
if($action!="delete"){

    if($imagefiletype!="jpg" &&$imagefiletype!="png"&& $imagefiletype!="jpeg" && $imagefiletype!="gif")
    {
        echo('
    
    <script type="text/javascript">
    window.alert("شما فقط پسوند های png , jpg , jpeg ,gif مجاز هستید");
        location.replace("article_edit.php?action=<?php  echo $action ; if($action!="insert"){?> & id=<?php  echo $id ;  }?>");
    </script>');
        $uploadok=0;
    }
                      if(file_exists($target_file)){
                         echo('
    
    <script type="text/javascript">
    window.alert("فایل انتخابی در سرویس دهنده موجود است");
        location.replace("article_edit.php?action=<?php  echo $action ; if($action!="insert"){?> & id=<?php  echo $id ;  }?>");
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
        $delete="DELETE FROM `admins` WHERE id ='$id'";
        if(mysqli_query($link,$delete)===true){
            ?>
            <script>
                window.alert("با موفقیت حذف شد");
                location.replace("simple.php");
            </script>
            <?php

        }
        else{
            ?>
            <script>
                window.alert("حذف نشد");
                location.replace("article_edit.php?action=<?php  echo $action ; if($action!="insert"){?> & id=<?php  echo $id ; }?>");
            </script>
            <?php
        }
        mysqli_close();
        break;
        case "update":
            $update="UPDATE `admins` SET username ='$username', name='$name', password ='$password', image ='$image'  WHERE id='$id'";
            if(mysqli_query($link,$update)==true)
            {
                ?>
                <script>
                    window.alert("با موفقیت ویرایش شد");
                    location.replace("data.php");
                </script>
                <?php
    
            }
            else{
                ?>
                <script>
                    window.alert("ویرایش نشد");
                    location.replace("article_edit.php?action=<?php  echo $action ; if($action!="insert"){?> & id=<?php  echo $id ;  }?>");
                </script>
                <?php
            }mysqli_close();
            break;
        
}

             


$date=date('Y-m-d h:i:s');
             $insert_article="INSERT INTO `admins`(`id`, `name`, `username`, `password`, `image`, `date`) VALUES ('NULL','$name','$username','$password','$image','$date')";
                                                                                                                                                                                                        
             if(mysqli_query($link,$insert_article)===true){
                ?>
                <script>
                    window.alert("کاربر با موفقیت ثبت شد");
                    location.replace("data.php");
                </script>
                <?php
              }
              else{
                ?>
                <script>
                window.alert("خطا در ثبت کاربر");
                location.replace("article_edit.php?action=<?php  echo $action ; if($action!="insert"){?> & slug=<?php  echo $slug ;  }?>");
            </script>
            <?php
              }
            
              mysqli_close();
              ?>