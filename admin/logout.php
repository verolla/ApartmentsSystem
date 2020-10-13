<?php
session_start();
session_destroy();
setcookie('username', '', time() - 1*24*60*60);
setcookie('psw', '', time() - 1*24*60*60);
header("location: admin.php");
?>