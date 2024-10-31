<?php 
session_start(); // Bắt đầu hoặc tiếp tục phiên làm việc

// Kiểm tra xem người dùng có gửi thông tin đăng nhập không
if (isset($_POST['uname']) && isset($_POST['pass'])) {
    include "../db_conn.php"; // Kết nối đến cơ sở dữ liệu

    // Làm sạch đầu vào
    $uname = trim($_POST['uname']); // Xóa khoảng trắng đầu và cuối
    $pass = trim($_POST['pass']); // Xóa khoảng trắng đầu và cuối

    $data = "uname=" . urlencode($uname); // Mã hóa tên người dùng để an toàn
    
    // Kiểm tra tính hợp lệ của đầu vào
    if (empty($uname)) {
        $em = "User name is required"; // Thông báo lỗi nếu tên người dùng trống
        header("Location: ../admin-login.php?error=" . urlencode($em) . "&$data");
        exit;
    } else if (empty($pass)) {
        $em = "Password is required"; // Thông báo lỗi nếu mật khẩu trống
        header("Location: ../admin-login.php?error=" . urlencode($em) . "&$data");
        exit;
    } else {
        // Chuẩn bị câu lệnh SQL
        $sql = "SELECT * FROM admin WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$uname]); // Thực thi câu lệnh với tên người dùng

        // Kiểm tra xem có một người dùng khớp với tên đăng nhập không
        if ($stmt->rowCount() === 1) {
            $user = $stmt->fetch(); // Lấy thông tin người dùng
            $username = $user['username'];
            $password = $user['password'];
            $email = $user['email'];
            $id = $user['admin_id'];
            $img = $user['image'];

            // Xác thực tên người dùng và mật khẩu
            if ($username === $uname) {
                if (password_verify($pass, $password)) { // Kiểm tra mật khẩu đã băm
                    // Lưu trữ thông tin người dùng vào phiên
                    $_SESSION['admin_id'] = $id;
                    $_SESSION['email'] = $email;
                    $_SESSION['username'] = $username;
                    $_SESSION['image'] = $img;

                    header("Location: users.php"); // Chuyển hướng đến trang bảng điều khiển
                    exit;
                } else {
                    $em = "Incorrect User name or password"; // Thông báo lỗi nếu mật khẩu không đúng
                    header("Location: ../admin-login.php?error=" . urlencode($em) . "&$data");
                    exit;
                }
            } else {
                $em = "Incorrect User name or password"; // Thông báo lỗi nếu tên người dùng không đúng
                header("Location: ../admin-login.php?error=" . urlencode($em) . "&$data");
                exit;
            }
        } else {
            $em = "Incorrect User name or password"; // Thông báo lỗi nếu không tìm thấy người dùng
            header("Location: ../admin-login.php?error=" . urlencode($em) . "&$data");
            exit;
        }
    }
} else {
    header("Location: ../admin-login.php?error=error"); // Chuyển hướng nếu không có dữ liệu gửi lên
    exit;
}
