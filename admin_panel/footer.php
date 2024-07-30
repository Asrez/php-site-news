<?php 
if (!defined("LOAD")) exit();

$setting = get_tables_with_where(' `setting` ',"`key_setting` = 'footer'");
$setting_row=$setting->fetch_assoc();
?>
<footer class="main-footer text-left">
    <strong>Copyright & copy; 2024 <a href="<?= $setting_row['link'] ?>"><?= $setting_row['value_setting'] ?></a></strong>
  </footer>
<aside class="control-sidebar control-sidebar-dark">
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
  </aside>
  <div class="control-sidebar-bg"></div>
  </div>