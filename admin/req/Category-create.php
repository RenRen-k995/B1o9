<?php 
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['username'])) {

    if(isset($_POST['category'])) {
        include "../../db_conn.php";
        $category = $_POST['category'];

        if (empty($category)) {
            $em= "Category is required!";
            header("Location: ../Category-add.php?error=$em");
            exit;
        }

        
        $sql = "INSERT INTO category(category) VALUES (?)";
        $stmt = $conn->prepare($sql);
        $res = $stmt->execute([$category]);
    

    if ($res) {
        $sm= "Successfully created!";
        header("Location: ../Category-add.php?success=$sm");
        exit;
    } else {
        $em= "Unknown error occurred";
        header("Location: ../Category-add.php?error=$em");
        exit;
    }

    } else {
        header("Location: ../Category-add.php"); 
        exit;
    }

} else {
    header("Location: ../admin-login.php"); // Nếu người dùng không đăng nhập, chuyển hướng đến trang đăng nhập quản trị viên.
    exit; // Kết thúc việc xử lý trang, không thực hiện thêm mã lệnh nào nữa.
}
