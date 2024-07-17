<?php
session_start();
$link=mysqli_connect("localhost" , "root" ,"" ,"news") ;
 ?>
<header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">پنل</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>کنترل پنل مدیریت</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
<?php
$count_venify_query="SELECT COUNT(id) AS count FROM comments WHERE venify=0";
$count_venify_result=mysqli_query($link,$count_venify_query);
$count_venify_row=mysqli_fetch_array($count_venify_result);
$venify_query="SELECT * FROM comments WHERE venify=0";
$venify_result=mysqli_query($link,$venify_query);

?>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success"><?php echo $count_venify_row['count']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header"><?php echo $count_venify_row['count']; ?> پیام تایید نشده</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu"> 
                  <!-- start message -->
                  <?php while($venify_row=mysqli_fetch_array($venify_result)){ ?>
                  <li>
                   
                    <a href="#">
                      <div class="pull-right">
                      <i class="fas fa-user"></i>
                      </div>
                      <h4>
                        <?php echo $venify_row['name']; ?>
                        <small><i class="fa fa-clock-o"></i> <?php echo $venify_row['date']; ?></small>
                      </h4>
                      <p><?php echo $venify_row['comment']; ?></p>
                    </a>
                  </li>
                  <?php } ?>
                  <!-- end message -->
                </ul>
              </li>
              <li class="footer"><a href="simple.php">نمایش تمام پیام ها</a></li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">

              <img src='../../dist/img/<?php if(isset($_SESSION["state_login"]) && $_SESSION["state_login"]===true){
  echo $_SESSION["admin_image"];
} ?>' class="user-image" alt="User Image">
              <span class="hidden-xs"><?php if(isset($_SESSION["state_login"]) && $_SESSION["state_login"]===true){
  echo $_SESSION["name"];
} ?>
</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src='../../dist/img/<?php if(isset($_SESSION["state_login"]) && $_SESSION["state_login"]===true){
  echo $_SESSION["admin_image"];
} ?>' class="img-circle" alt="User Image">

                <p>
                  <?php if(isset($_SESSION["state_login"]) && $_SESSION["state_login"]===true){
  echo $_SESSION["name"];
} ?>
                  <small>مدیریت کل سایت</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="../examples/lockscreen.php">صفحه من</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="simple.php">ادمین ها</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="../examples/lockscreen.php" class="btn btn-default btn-flat">پروفایل</a>
                </div>
                <div class="pull-left">
                  <a href="../../logout.php" class="btn btn-default btn-flat">خروج</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
         
        </ul>
      </div>
    </nav>
  </header>
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-right image">
          <img src='../../dist/img/<?php if(isset($_SESSION["state_login"]) && $_SESSION["state_login"]===true){
  echo $_SESSION["admin_image"];
} ?>' class="img-circle" alt="User Image">
        </div>
        <div class="pull-right info">
          <p><?php if(isset($_SESSION["state_login"]) && $_SESSION["state_login"]===true){
  echo $_SESSION["name"];
} ?>
</p>
          <a href="#"><i class="fa fa-circle text-success"></i> آنلاین</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="جستجو">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">منو</li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>داشبرد</span>
            <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../../index2.php"><i class="fa fa-circle-o"></i> داشبرد اصلی</a></li>
          </ul>
        </li>
       
        <li>
          <a href="pages/widgets.php">
            <i class="fa fa-th"></i> <span>ویجت ها</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>نمودارها</span>
            <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../charts/chartjs.html"><i class="fa fa-circle-o"></i>نمودار ChartJS</a></li>
            <li><a href="../charts/morris.html"><i class="fa fa-circle-o"></i>نمودار Morris</a></li>
            <li><a href="../charts/flot.html"><i class="fa fa-circle-o"></i>نمودار Flot</a></li>
            <li><a href="../charts/inline.html"><i class="fa fa-circle-o"></i>نمودار Inline charts</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>اشیای گرافیکی</span>
            <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../UI/general.html"><i class="fa fa-circle-o"></i> عمومی</a></li>
            <li><a href="../UI/icons.html"><i class="fa fa-circle-o"></i> آیکون</a></li>
            <li><a href="../UI/buttons.html"><i class="fa fa-circle-o"></i> دکمه</a></li>
            <li><a href="../UI/sliders.html"><i class="fa fa-circle-o"></i> اسلایدر</a></li>
            <li><a href="../UI/timeline.html"><i class="fa fa-circle-o"></i> تایم لاین</a></li>
            <li><a href="../UI/modals.html"><i class="fa fa-circle-o"></i> مدال</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>مدیریت اطلاعات</span>
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
          <a href="../calendar.html">
            <i class="fa fa-calendar"></i> <span>تقویم</span>
            <span class="pull-left-container">
              <small class="label pull-left bg-red">۳</small>
              <small class="label pull-left bg-blue">۱۷</small>
            </span>
          </a>
        </li>
        <li>
          <a href="../mailbox/mailbox.html">
            <i class="fa fa-user"></i> <span>ادمین ها</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>راهنما</span>
            <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../pages/examples/invoice.html"><i class="fa fa-circle-o"></i> سفارش</a></li>
            <li><a href="../pages/examples/profile.html"><i class="fa fa-circle-o"></i> پروفایل</a></li>
            <li><a href="../pages/examples/login.html"><i class="fa fa-circle-o"></i> صفحه ورود</a></li>
            <li><a href="../pages/examples/register.html"><i class="fa fa-circle-o"></i> ثبت نام</a></li>
            <li><a href="../pages/examples/lockscreen.html"><i class="fa fa-circle-o"></i> قفل صفحه</a></li>
            <li><a href="../pages/examples/404.html"><i class="fa fa-circle-o"></i> ارور ۴۰۴</a></li>
            <li><a href="../pages/examples/500.html"><i class="fa fa-circle-o"></i> ارور ۵۰۰</a></li>
            <li><a href="../pages/examples/blank.html"><i class="fa fa-circle-o"></i> صفحه خالی</a></li>
            <li><a href="../pages/examples/pace.html"><i class="fa fa-circle-o"></i> صفحه سریع</a></li>
          </ul>
        </li>
        <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>مستندات</span></a></li>
        <li class="header">برچسب ها</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>مهم</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>هشدار</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>اطلاعات</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>