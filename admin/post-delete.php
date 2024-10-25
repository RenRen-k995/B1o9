<?php 
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['username']) && $_GET['post_id']) {

    $post_id = $_GET['post_id'];

    include_once("data/Post.php");
    include_once("../db_conn.php");
    $res = deleteById($conn, $post_id);
    if($res){
        $em= "Successfully deleted!";
        header("Location: post.php?success=$em");
        exit;
    }else{
        $em= "Unknown error occurred";
        header("Location: post.php?error=$em");
        exit;
    }
} else {
    header("Location: ../admin-login.php"); // Nếu người dùng không đăng nhập, chuyển hướng đến trang đăng nhập quản trị viên.
    exit; // Kết thúc việc xử lý trang, không thực hiện thêm mã lệnh nào nữa.
}
?>