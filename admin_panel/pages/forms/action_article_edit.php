<?php 
session_start();
$link=mysqli_connect("localhost","root","","news");
           
                $title=$_post['title'];
                $summery=$_post['summery'];
                $content=$_post['content'];
                $source=$_post['source'];
                $category=$_post['category'];
                $admin=$_SESSION["admin_id"];
                $pro_image=basename($_FILES["image"]["name"]);
                $target_dir="image/products/";
                $target_file=$target_dir.basename($_FILES["image"]["name"]);
                $uploadok=1;
                $imagefiletype=pathinfo($target_file,PATHINFO_EXTENSION);
                $check=getimagesize($_FILES["pro_image"]["tmp_name"]);
                if($check===true)
                 {
                    	$uploadok=1;	
                 }
                else
                  {	
                  echo('

<script type="text/javascript">
window.alert("پرونده انتخابی از نوع تصویر نیست");
	location.replace("article_edit.php");
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
window.alert("پرونده به سرویس دهنده میزبان ارسال شد");
</script>');
}
             

             function slugify($text, string $divider = '-')
{
  // replace non letter or digits by divider
  $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

  // transliterate
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

  // remove unwanted characters
  $text = preg_replace('~[^-\w]+~', '', $text);

  // trim
  $text = trim($text, $divider);

  // remove duplicate divider
  $text = preg_replace('~-+~', $divider, $text);

  // lowercase
  $text = strtolower($text);

  if (empty($text)) {
    return 'n-a';
  }

  return $text;
}
              $insert_article="INSERT INTO `articles`(`id`, `publicationdate`, `title`, `summery`, `content`, `image`, `source`, `viewcount`, `category_id`, `admin_id`, `slug`) VALUES ('NULL','date('Y-m-d h:i:sa')','$title','$summery','$content','$pro_image','$source','0','$category','$admin','$text')";
              if(mysqli_query($link,$insert_article)){
                ?>
                <script>
                    window.alert("خبر با موفقیت ثبت شد");
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