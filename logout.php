<?php  
session_start();

session_unset();
session_destroy();

header("Location: login.php");
exit;

// thêm xác nhận logout "Yes No" vào