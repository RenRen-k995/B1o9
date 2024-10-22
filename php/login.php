<?php 
session_start(); // Bắt đầu phiên làm việc (session)

// Kiểm tra xem có dữ liệu POST từ form không
if(isset($_POST['uname']) && isset($_POST['pass'])){

    include "../db_conn.php"; // Kết nối đến cơ sở dữ liệu

    $uname = $_POST['uname']; // Lấy tên người dùng từ form
    $pass = $_POST['pass']; // Lấy mật khẩu từ form

    $data = "uname=".$uname; // Chuẩn bị dữ liệu để truyền lại nếu có lỗi
    
    // Kiểm tra nếu tên người dùng để trống
    if(empty($uname)){
        $em = "Tên người dùng là bắt buộc"; // Thông báo lỗi
        header("Location: ../login.php?error=$em&$data"); // Chuyển hướng đến trang đăng nhập với thông báo lỗi
        exit;
    } 
    // Kiểm tra nếu mật khẩu để trống
    else if(empty($pass)){
        $em = "Mật khẩu là bắt buộc"; // Thông báo lỗi
        header("Location: ../login.php?error=$em&$data"); // Chuyển hướng đến trang đăng nhập với thông báo lỗi
        exit;
    } else {
        // Truy vấn cơ sở dữ liệu để tìm người dùng
        $sql = "SELECT * FROM users WHERE username = ?"; // Câu lệnh SQL
        $stmt = $conn->prepare($sql); // Chuẩn bị câu lệnh SQL
        $stmt->execute([$uname]); // Thực thi câu lệnh SQL với tên người dùng

        // Kiểm tra xem có kết quả nào không
        if($stmt->rowCount() == 1){
            $user = $stmt->fetch(); // Lấy thông tin người dùng

            $username =  $user['username']; // Lấy tên người dùng
            $password =  $user['password']; // Lấy mật khẩu (đã được mã hóa)
            $email =  $user['email']; // Lấy email
            $id =  $user['id']; // Lấy ID người dùng

            // Kiểm tra tên người dùng có khớp không
            if($username === $uname){
                // Kiểm tra mật khẩu có khớp không
                if(password_verify($pass, $password)){
                    // Thiết lập các biến phiên (session)
                    $_SESSION['user_id'] = $id; // Lưu ID người dùng vào phiên
                    $_SESSION['email'] = $email; // Lưu email vào phiên

                    header("Location: ../index.php"); // Chuyển hướng đến trang chính
                    exit;
                } else {
                    // Nếu mật khẩu không đúng
                    $em = "Tên người dùng hoặc mật khẩu không đúng"; // Thông báo lỗi
                    header("Location: ../login.php?error=$em&$data"); // Chuyển hướng đến trang đăng nhập với thông báo lỗi
                    exit;
                }
            } else {
                // Nếu tên người dùng không khớp
                $em = "Tên người dùng hoặc mật khẩu không đúng"; // Thông báo lỗi
                header("Location: ../login.php?error=$em&$data"); // Chuyển hướng đến trang đăng nhập với thông báo lỗi
                exit;
            }
        } else {
            // Nếu không tìm thấy người dùng
            $em = "Tên người dùng hoặc mật khẩu không đúng"; // Thông báo lỗi
            header("Location: ../login.php?error=$em&$data"); // Chuyển hướng đến trang đăng nhập với thông báo lỗi
            exit;
        }
    }
} else {
    // Nếu không có dữ liệu POST
    header("Location: ../login.php?error=lỗi"); // Chuyển hướng đến trang đăng nhập với thông báo lỗi
    exit;
}
?>

