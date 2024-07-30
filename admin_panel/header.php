<?php
if (!defined("LOAD")) exit();

$count_venify_row = get_count_tables(" `comments` "," WHERE `venify`= 0");
$venify_result = commentswithVenify(0);
 ?>
<header class="main-header">
    <a href="index2.html" class="logo">
      <span class="logo-mini">پنل</span>
      <span class="logo-lg"><b>کنترل پنل مدیریت</b></span>
    </a>
    <nav class="navbar navbar-static-top">
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success"><?= $count_venify_row['count'] ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header"><?= $count_venify_row['count'] ?> پیام تایید نشده</li>
              <li>
                <ul class="menu"> 
                  <?php while($venify_row = $venify_result->fetch_assoc()) { ?>
                  <li>
                    <a href="#">
                      <div class="pull-right">
                      <i class="fas fa-user"></i>
                      </div>
                      <h4>
                        <?= $venify_row['name'] ?>
                        <small><i class="fa fa-clock-o"></i> <?= $venify_row['date'] ?></small>
                      </h4>
                      <p><?= $venify_row['comment'] ?></p>
                    </a>
                  </li>
                  <?php } ?>
                </ul>
              </li>
              <li class="footer"><a href="simple.php">نمایش تمام پیام ها</a></li>
            </ul>
          </li>
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src='dist/img/<?= $_SESSION["admin_image"] ?>' class="user-image" alt="User Image">
              <span class="hidden-xs"><?= $_SESSION["name"] ?>
</span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <img src='dist/img/<?= $_SESSION["admin_image"] ?>' class="img-circle" alt="User Image">
                <p>
                  <?= $_SESSION["name"] ?>
                  <small>مدیریت کل سایت</small>
                </p>
              </li>
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="lockscreen.php">صفحه من</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="simple.php">ادمین ها</a>
                  </div>
                </div>
              </li>
              <li class="user-footer">
                <div class="pull-right">
                  <a href="ockscreen.php" class="btn btn-default btn-flat">پروفایل</a>
                </div>
                <div class="pull-left">
                  <a href="logout.php" class="btn btn-default btn-flat">خروج</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-right image">
          <img src='dist/img/<?= $_SESSION["admin_image"] ?>' class="img-circle" alt="User Image">
        </div>
        <div class="pull-right info">
          <p><?= $_SESSION["name"] ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> آنلاین</a>
        </div>
      </div>
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="جستجو">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">منو</li>
        <li class="active treeview">
          <a href="index.php">
            <i class="fa fa-dashboard"></i> <span>داشبرد</span>
            <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php"><i class="fa fa-circle-o"></i> داشبرد اصلی</a></li>
          </ul>
        </li>
       
        <li class="treeview" id="information">
          <a href="data.php">
            <i class="fa fa-table" ></i> <span>مدیریت اطلاعات</span>
            <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="data.php"><i class="fa fa-circle-o"></i> مدیریت مقالات و تنظیمات</a></li>
            <li><a href="simple.php"><i class="fa fa-circle-o"></i>  مدیریت تگ ها وادمین ها .پو ...</a></li>
          </ul>
        </li>
        <li>
          <a href="../index.php">
            <i class="fa fa-eye"></i> <span>سایت اصلی</span>
          </a>
        </li>
      </ul>
    </section>
  </aside>