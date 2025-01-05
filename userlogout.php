<?php
session_start();

session_unset();
session_destroy();

setcookie("user_email", "", time() - 3600, "/");
setcookie("user_password", "", time() - 3600, "/");


header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: Wed, 11 Jan 2025 05:00:00 GMT");

header("Location: loginuser.php");
exit();
?>
