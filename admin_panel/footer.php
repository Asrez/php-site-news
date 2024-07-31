<?php
if (!defined("LOAD")) exit();

$footer=get_tables_with_where(" `setting` ","WHERE `key_setting` = 'footer' ");
$footer_row=$footer->fetch_assoc();
?>
<footer class="main-footer text-left">
    <strong>Copyright &copy; 2024 <a href="<?= $footer_row['link'] ?>"><?= $footer_row['value_setting'] ?></a></strong>
</footer>