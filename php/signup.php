<?php 

// Kiểm tra xem có dữ liệu POST từ form không
if(isset($_POST['email']) && isset($_POST['uname']) && isset($_POST['pass'])){

    include "../db_conn.php"; // Kết nối đến cơ sở dữ liệu

    $email = $_POST['email']; // Lấy email từ form
    $uname = $_POST['uname']; // Lấy tên người dùng từ form
    $pass = $_POST['pass']; // Lấy mật khẩu từ form

    // Chuẩn bị dữ liệu để truyền lại nếu có lỗi
    $data = "email=".$email."&uname=".$uname;
    
    // Kiểm tra nếu email để trống
    if (empty($email)) {
        $em = "Email là bắt buộc"; // Thông báo lỗi
        header("Location: ../index.php?error=$em&$data"); // Chuyển hướng đến trang đăng ký với thông báo lỗi
        exit;
    } 
    // Kiểm tra nếu tên người dùng để trống
    else if(empty($uname)){
        $em = "Tên người dùng là bắt buộc"; // Thông báo lỗi
        header("Location: ../index.php?error=$em&$data"); // Chuyển hướng đến trang đăng ký với thông báo lỗi
        exit;
    } 
    // Kiểm tra nếu mật khẩu để trống
    else if(empty($pass)){
        $em = "Mật khẩu là bắt buộc"; // Thông báo lỗi
        header("Location: ../signup.php?error=$em&$data"); // Chuyển hướng đến trang đăng ký với thông báo lỗi
        exit;
    } 
    else {
        // Mã hóa mật khẩu trước khi lưu vào cơ sở dữ liệu
        $pass = password_hash($pass, PASSWORD_DEFAULT);

        // Câu lệnh SQL để chèn người dùng mới vào cơ sở dữ liệu
        $sql = "INSERT INTO users(email, username, password) VALUES(?,?,?)";
        $stmt = $conn->prepare($sql); // Chuẩn bị câu lệnh SQL
        $stmt->execute([$email, $uname, $pass]); // Thực thi câu lệnh SQL với thông tin người dùng

        // Chuyển hướng đến trang chính với thông báo thành công
        header("Location: ../signup.php?success=Tài khoản của bạn đã được tạo thành công");
        exit;
    }
} else {
    // Nếu không có dữ liệu POST
    header("Location: ../index.php?error=lỗi"); // Chuyển hướng đến trang chính với thông báo lỗi
    exit;
}
?>
