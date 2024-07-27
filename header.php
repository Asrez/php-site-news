<?php
include ("jdf.php");
$date = jdate("d F Y");
$setting_row_logo = getSetting("logo_header");
$logo_image = $setting_row_logo['value_setting']; 
$setting_row_header_h = getSetting("Advertise_header");
$row_instagram = getSetting("instagram_icon");
$row_telegram = getSetting("telegram_icon");
$row_twitter = getSetting("twitter_icon");
$row_facebook = getSetting("facebook_icon");
$result_category_parent = getCategories();
$array_parent_category=[];
$array_sub_category=[];
while($row_category_parent = $result_category_parent->fetch_assoc()){
      $array_parent_category[]=$row_category_parent;
      $id_parent_category=$row_category_parent['id'];
      $result_category_down = getCategories($id_parent_category); 
      while($row_category_down = $result_category_down->fetch_assoc()) {
        $array_sub_category[]=$row_category_down;
      }
}
?>
<header id="header">
    <div id="top_header">
        <div class="container">
            <div class="row">
                <div class="col-5 col-md-2">
                <ul class="top_menu">
                        <li><a href="contact_us.php">تماس با ما</a> </li>
                        <li><a href="about_us.php">درباره با ما</a> </li>
                        <li><a href="archive.php">آرشیو</a> </li>
                        
                    </ul>
                </div>
                <div class="col-7 col-md-3">
                   
                </div>
                <div class="d-none col-md-3 d-md-block">
                    <div class="search">
                        <form action="archive.php" method="post" role="form">
                            <div class="input-group">
                                <input type="text" name="search"  placeholder="جستجو ...">
                                <button type="submit" name="btnsearch">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
                    </div>
                </div>
                <div class="d-none col-lg-2 d-lg-block">
                    <div class="date_time" >
                        <?= $date; ?>
                    </div>
                </div>
                <div class="d-none col-md-4 col-lg-2 d-md-block">
                    <ul class="header_social text-left">
                        <li><a href="<?= $row_facebook['link']; ?>"><i class="fab fa-facebook-f"></i></a> </li>
                        <li><a href="<?= $row_twitter['link']; ?>"><i class="fab fa-twitter"></i></a> </li>
                        <li><a href="<?= $row_instagram['link']; ?>"><i class="fab fa-instagram"></i></a> </li>
                        <li><a href="<?= $row_telegram['link']; ?>"><i class="fab fa-telegram-plane"></i></a></li>
                        <li><a href="admin_panel/login.php"><i class="fas fa-rss"></i></a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6">
                <h1>
                
                    <a href="index.php" class="logo" style="background-image: url('image/<?= $logo_image ;?>');"></a>
                </h1>
            </div>
            <div class="col-12 col-lg-6 text-center">
                <div class="ads">
                    <figure>
                       
                        <a href="<?= $setting_row_header_h['link'];?>">
                            
                            <img src="image/<?= $setting_row_header_h['value_setting'];?>" class="img-fluid" alt="ads" title="ads">
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
                     foreach($array_parent_category as $row_category_parent) {?>
               <li>
                   <a href="#">
                        <?= $row_category_parent["title"]; ?>
                    </a> 
                   <ul class="submenu">

                     <?php 
                     foreach($array_sub_category as $row_category_down) {
                        if ($row_category_down['parent_id'] == $row_category_parent['id']){?>

                       <li>
                           <a href="category.php?category_slug=<?= $row_category_down['slug'];?>">
                           <?= $row_category_down ['title']; ?>
                            </a> 
                       </li>
                   
                   
                    <?php } 
                }?>
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
                            <input type="text" id="searchbox" placeholder="جستجو ..." />
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


                       
