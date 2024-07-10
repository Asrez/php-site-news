<?php 
 session_start();
 $link=mysqli_connect("localhost","root","","news");
 $article_slug=$_GET['article_slug'];
 $article_queryy="SELECT * FROM articles WHERE slug='$article_slug'";
 $article_resultt=mysqli_query($link,$article_queryy);
 $article_roww=mysqli_fetch_array($article_resultt);
 $article_id=$article_roww['id'];


                            if(isset($_POST['btnsubmit'])){
                                if($_POST['sum'] == $_POST['sum']){
                                if(isset($_POST['name']) && !empty($_POST['name']) &&
                                isset($_POST['Email']) && !empty($_POST['Email']) &&
                                isset($_POST['comment']) && !empty($_POST['comment'])
                                ){
                                    $name=$_POST['name'];
                                    $email=$_POST['Email'];
                                    $comment=$_POST['comment'];
                                }
                                else{
                                    ?>
                                    <script>
                                        window.alert("برخی فیلد ها مقدار دهی نشده است");
                                    </script>
                                    <?php
                                }
                                $date=date('Y-m-d h:i:s');
                                $insert_comment_query="INSERT INTO `comments`(`id`, `name`, `email`, `comment`, `date`, `article_id`, `venify`) VALUES ('NULL','$name','$email','$comment','$date','$article_id','0')";
                                if(mysqli_query($link,$insert_comment_query)===true){
                                    ?>
                                    <script>
                                        window.alert("سپاس از نظر شما.نظرات بعد از بررسی در سایت قرار خواهد گرفت");        
                                        location.replace("show_news.php?article_slug=<?php echo $article_slug; ?>");
                                        
                                        </script>
                                    <?php
                                  }
                                  else{
                                    ?>
                                    <script>
                                    window.alert("ثبت کامنت با شکست مواجه شد . دوباره تلاش کنید");
                                    location.replace("show_news.php?article_slug=<?php echo $article_slug; ?>");
                                </script>
                                <?php
                                  }
                                }
                            }
                            
                            ?>