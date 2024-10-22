<?php 
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['username']) && $_GET['user_id']) {
    $user_id = $_GET['user_id'];

    include_once("data/User.php");
    include_once("../db_conn.php");
    $res = deleteById($conn, $user_id);
    if($res){
        $em= "Successfully deleted!";
        header("Location: users.php?success=$em");
        exit;
    }else{
        $em= "Unknown error occurred";
        header("Location: users.php?error=$em");
        exit;
    }
} else {
    header("Location: ../admin-login.php"); // Nếu người dùng không đăng nhập, chuyển hướng đến trang đăng nhập quản trị viên.
    exit; // Kết thúc việc xử lý trang, không thực hiện thêm mã lệnh nào nữa.
}
?>
