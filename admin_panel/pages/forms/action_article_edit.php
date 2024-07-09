<?php 
session_start();
$link=mysqli_connect("localhost","root","","news");
if(!isset($_SESSION["state_login"]) && $_SESSION["state_login"]===false)
{
	?>
    <script type="text/javascript">
	location.replace("../../../index.php");
	</script>
    <?php
}
if(isset($_POST["title"]) 
&& !empty($_POST["title"])&&
isset($_POST["summery"]) && !empty($_POST["summery"])&&
isset($_POST["content"]) && !empty($_POST["content"])&&
isset($_POST["source"]) && !empty($_POST["source"])&&
isset($_POST["category"]) && !empty($_POST["category"]))

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
                // $check=getimagesize($_FILES["image"]["tmp_name"]);
              
}
else{
  ?>
  <script type="text/javascript">
    window.alert("برخی فیلد ها مقدار دهی نشده است")
location.replace("article_edit.php");
</script>
  <?php

}
if($imagefiletype!="jpg" &&$imagefiletype!="png"&& $imagefiletype!="jpeg" && $imagefiletype!="gif")
{
	echo('

<script type="text/javascript">
window.alert("شما فقط پسوند های png , jpg , jpeg ,gif مجاز هستید");
	location.replace("admin_product.php");
</script>');
	$uploadok=0;
}
                  if(file_exists($target_file)){
	                 echo('

<script type="text/javascript">
window.alert("فایل انتخابی در سرویس دهنده موجود است");
	location.replace("article_edit.php");
</script>');
}
 if(move_uploaded_file($_FILES["image"]["tmp_name"],$target_file)){
                      echo('

<script type="text/javascript">
window.alert("فایل به سرویس دهنده میزبان ارسال شد");
</script>');
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
                    location.replace("../index1.php");
                </script>
                <?php
              }
              else{
                ?>
                <script>
                window.alert("خطا در ثبت خبر");
                location.replace("article_edit.php");
            </script>
            <?php
              }
              ?>