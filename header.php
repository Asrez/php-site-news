<?php
$link=mysqli_connect("localhost","root","","news");
$setting_Query_Advertise_header="SELECT * FROM   setting where key_setting='Advertise_header' ";
$setting_result_Advertise_header=mysqli_query($link,$setting_Query_Advertise_header);
$setting_row_Advertise_header=mysqli_fetch_array($setting_result_Advertise_header);

?>

<header id="header">
    <div id="top_header">
        <div class="container">
            <div class="row">
                <div class="col-5 col-md-2">
                    <ul class="lang_menu">
                        <li><a href="#">فارسی</a> </li>
                        <li><a href="#">العربية</a> </li>
                        <li class="d-none d-lg-inline-block"><a href="#">English</a> </li>
                    </ul>
                </div>
                <div class="col-7 col-md-3">
                    <ul class="top_menu">
                        <li><a href="contact_us.php">تماس با ما</a> </li>
                        <li><a href="about_us.php">درباره با ما</a> </li>
                        <li><a href="archive.php">آرشیو</a> </li>
                        <li class="d-none d-lg-inline-block"><a href="#">تبلیغات</a> </li>
                    </ul>
                </div>
                <div class="d-none col-md-3 d-md-block">
                    <div class="search">
                        <form action="#" method="post" role="form">
                            <div class="input-group">
                                <input type="text" name="search" placeholder="جستجو ...">
                                <button type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
                    </div>
                </div>
                <div class="d-none col-lg-2 d-lg-block">
                    <div class="date_time" >
                        <?php
                        include ("jdf.php");
                        $date=jdate("d F Y") ;
                        echo $date;
                        ?>
                    </div>
                </div>
                <div class="d-none col-md-4 col-lg-2 d-md-block">
                    <ul class="header_social text-left">
                        <li><a href="https://www.facebook.com"><i class="fab fa-facebook-f"></i></a> </li>
                        <li><a href="https://twitter.com"><i class="fab fa-twitter"></i></a> </li>
                        <li><a href="https://www.instagram.com"><i class="fab fa-instagram"></i></a> </li>
                        <li><a href="https://www.telegram.com"><i class="fab fa-telegram-plane"></i></a></li>
                        <li><a href="admin_panel/pages/examples/login.php"><i class="fas fa-rss"></i></a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6">
                <h1>
                <?php
            $setting_Query="SELECT * FROM   setting where key_setting='logo_header' ";
            include("setting_query_result.php");
            $logo_image=$setting_row['value_setting'];
            ?>
                    <a href="index.php" class="logo" style="background-image: url('image/<?php echo $logo_image ;?>');"></a>
                </h1>
            </div>
            <div class="col-12 col-lg-6 text-center">
                <div class="ads">
                    <figure>
                        <a href="<?php echo $setting_row_Advertise_header['link'];?>">
                            
                            <img src="image/<?php echo $setting_row_Advertise_header['value_setting'];?>" class="img-fluid" alt="ads" title="ads">
                        </a>
                    </figure>
                </div>
            </div>
        </div>
    </div>
    <nav id="menu">
        <div class="container">
            <ul class="d-none d-lg-block">
            <li>
                   <a href="index.php">
                      صفحه نخست
                    </a> 
</li>
            <?php
               $categoryn_parent="SELECT * FROM `categorys` WHERE parent_id=0 ";
               $result_category_parent=mysqli_query($link,$categoryn_parent);
               while($row_category_parent=mysqli_fetch_array($result_category_parent)) {?>
               <li>
                   <a href="#">
                        <?php  echo $row_category_parent["title"]; ?>
                    </a> 
                   <?php
                   $id_category_parent=$row_category_parent['id'];
                   $category_down_query="SELECT * FROM categorys WHERE parent_id=$id_category_parent"; 
                   $result_category_down=mysqli_query($link,$category_down_query);?>
                   
                   <ul class="submenu">

                               <?php  while($row_category_down=mysqli_fetch_array($result_category_down)) { ?>
                       <li>
                           <a href="category.php?category_slug=<?php echo $row_category_down['slug'];?>">
                           <?php echo $row_category_down ['title']; ?>
                            </a> 
                       </li>
                   
                   
                   <?php } ?>
                   </ul>
               </li>
                   <?php }  ?>
                    
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-4 d-inline-block d-md-none">
                <button class="btn openbtn" onclick="opennav()">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
            <div class="col-8 d-md-none">
                <div class="search">
                    <form action="#" method="post" role="form">
                        <div class="input-group">
                            <input type="text" name="search" id="search" placeholder="جستجو ..." >
                            <button type="submit" name="button" id="button">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>


                       
