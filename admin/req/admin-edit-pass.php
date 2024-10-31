<?php 
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['username'])) {

    if(isset($_POST['cpass']) && isset($_POST['newpass']) && isset($_POST['confirm_newpass'])) {
        include "../../db_conn.php";
        $cpass = $_POST['cpass'];
        $newpass = $_POST['newpass'];
        $confirm_newpass = $_POST['confirm_newpass'];
        $admin_id = $_SESSION['admin_id'];

        if (empty($cpass)) {
            $em= "Current password is required!";
            header("Location: ../profile.php?perror=$em#cpassword");
            exit;
        } else if (empty($newpass)) {
            $em= "New password is required!";
            header("Location: ../profile.php?perror=$em#cpassword");
            exit;
        } else if (empty($confirm_newpass)) {
            $em= "Confirming new password is required!";
            header("Location: ../profile.php?perror=$em#cpassword");
            exit;
        } else if ($confirm_newpass != $newpass) {
            $em = "New password and confirm password doesn't match"; 
            header("Location: ../profile.php?perror=$em#cpassword");
            exit;
        } 
        
        $sql = "SELECT password FROM admin WHERE admin_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$admin_id]);

        $data = $stmt->fetch();
        
        if (!password_verify($cpass, $data['password'])) {
            $em = "Incorrect password"; 
            header("Location: ../profile.php?perror=$em#cpassword");
            exit;
        } else {
            // Mã hóa mật khẩu trước khi lưu vào cơ sở dữ liệu
            $newpass = password_hash($newpass, PASSWORD_DEFAULT);

            $sql = "UPDATE admin SET password = ? WHERE admin_id = ?";
            $stmt = $conn->prepare($sql);
            $res = $stmt->execute([$newpass, $admin_id]);
        
            if ($res) {
                $sm= "The password has successfully been changed!";
                header("Location: ../profile.php?psuccess=$sm#cpassword");
                exit;
            } else {
                $em= "Unknown error occurred";
                header("Location: ../profile.php?perror=$em#cpassword");
                exit;
            }
        }
        
        

    } else {
        header("Location: ../profile.php"); 
        exit;
    }

} else {
    header("Location: ../admin-login.php"); // Nếu người dùng không đăng nhập, chuyển hướng đến trang đăng nhập quản trị viên.
    exit; // Kết thúc việc xử lý trang, không thực hiện thêm mã lệnh nào nữa.
}
