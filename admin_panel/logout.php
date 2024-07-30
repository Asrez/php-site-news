<?php
session_start();
session_unset();
session_destroy();
?>
<!doctype html>
<html dir="rtl" lang="fa_IR">
<head>
<meta charset="utf-8">
<title> </title>
</head>

<body>
<script type="text/javascript">
	window.alert("با موفقیت از حساب کاربری خود خارج شدید");
location.replace("../index.php");
</script>
</body>
</html>