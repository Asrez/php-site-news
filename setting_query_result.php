<?php
$setting_Query=$link->prepare("SELECT * FROM `setting` where `key_setting`=? ");
$setting_Query->bind_param("s",$keyy);
$setting_Query->execute();
$setting_result=$setting_Query->get_result();
$setting_row=$setting_result->fetch_assoc();
?>