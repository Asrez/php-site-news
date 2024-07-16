<?php
session_start();
$link=mysqli_connect("localhost","root","","news");
$action=$_GET['action'];
if($action!="insert"){$slug=$_GET['slug'];}
if(isset($_POST["title"]) && !empty($_POST["title"])&&
isset($_POST["summery"]) && !empty($_POST["summery"])&&
isset($_POST["content"]) && !empty($_POST["content"]))

{
   
      
                $title=$_POST['title'];
                $summery=$_POST['summery'];
                $content=$_POST['content'];
                $source=$_POST['source'];
                $category=$_POST['category'];
                $admin=$_SESSION["admin_id"];
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
location.replace("article_edit.php?action=<?php  echo $action ; if($action!="insert"){?> & slug=<?php  echo $slug ;  }?>");
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
        location.replace("article_edit.php?action=<?php  echo $action ; if($action!="insert"){?> & slug=<?php  echo $slug ;  }?>");
    </script>');
        $uploadok=0;
    }
                      if(file_exists($target_file)){
                         echo('
    
    <script type="text/javascript">
    window.alert("فایل انتخابی در سرویس دهنده موجود است");
        location.replace("article_edit.php?action=<?php  echo $action ; if($action!="insert"){?> & slug=<?php  echo $slug ;  }?>");
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
        $found_article="SELECT * FROM articles WHERE slug='$slug'";
        $found_article_result=mysqli_query($link,$found_article);
        $found_article_row=mysqli_fetch_array($found_article_result);
        $id=$found_article_row['id'];
        $delete_comment="DELETE FROM `comments` WHERE article_id='$id'";
        $delete_article_tag="DELETE FROM `article_tag` WHERE article_id='$id'";
        $delete="DELETE FROM `articles` WHERE slug ='$slug'";
        if(mysqli_query($link,$delete_comment)===true){
            if(mysqli_query($link,$delete_article_tag)===true){
                if(mysqli_query($link,$delete)===true){
            
            ?>
            <script>
                window.alert("با موفقیت حذف شد");
                location.replace("data.php");
            </script>
            <?php
            }
          }
        }
        else{
            ?>
            <script>
                window.alert("حذف نشد");
                location.replace("article_edit.php?action=<?php  echo $action ; if($action!="insert"){?> & slug=<?php  echo $slug ;  }?>");
            </script>
            <?php
        }
        mysqli_close();
        break;
        case "update":
            $update="UPDATE `articles` SET title ='$title', summery='$summery', content ='$content', image ='$image', source ='$source', category_id ='$category'  WHERE slug='$slug'";
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
                    location.replace("article_edit.php?action=<?php  echo $action ; if($action!="insert"){?> & slug=<?php  echo $slug ;  }?>");
                </script>
                <?php
            }mysqli_close();
            break;
        
}

             

$myChars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%%^&^&**()_+';
$text=substr( str_shuffle($myChars), 5, 16 );
$date=date('Y-m-d h:i:s');

             $insert_article="INSERT INTO `articles`(`id`, `publicationdate`, `title`, `summery`, `content`, `image`, `source`, `viewcount`, `category_id`, `admin_id`, `slug`)
                                             VALUES ('NULL','$date','$title','$summery','$content','$image','$source','0','$category','$admin','$text')";
                                                                                                                                                                                                        
             if(mysqli_query($link,$insert_article)===true){
                ?>
                <script>
                    window.alert("خبر با موفقیت ثبت شد");
                    location.replace("data.php");
                </script>
                <?php
              }
              else{
                ?>
                <script>
                window.alert("خطا در ثبت خبر");
                location.replace("article_edit.php?action=<?php  echo $action ; if($action!="insert"){?> & slug=<?php  echo $slug ;  }?>");
            </script>
            <?php
              }
            
              mysqli_close();
              ?>