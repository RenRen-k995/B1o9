<?php 
session_start();
// Kiểm tra xem có dữ liệu POST từ form không
if(isset($_POST['email']) && isset($_POST['uname']) && isset($_POST['pass']) && isset($_FILES['image'])){  // $_FILES (not $_FILE)

    include "../db_conn.php"; // Kết nối đến cơ sở dữ liệu

    $email = $_POST['email']; // Lấy email từ form
    $uname = $_POST['uname']; // Lấy tên người dùng từ form
    $pass = $_POST['pass']; // Lấy mật khẩu từ form
    $img =  $_FILES['image']['name'];

    // Chuẩn bị dữ liệu để truyền lại nếu có lỗi
    $data = "email=".$email."&uname=".$uname."&image=".$img;
    
    // Kiểm tra nếu email để trống
    if (empty($email)) {
        $em = "Email is required!"; // Thông báo lỗi
        header("Location: ../admin_signup.php?error=$em&$data"); // Chuyển hướng đến trang đăng ký với thông báo lỗi
        exit;
    } 
    // Kiểm tra nếu tên người dùng để trống
    else if(empty($uname)){
        $em = "Username is required!"; // Thông báo lỗi
        header("Location: ../admin_signup.php?error=$em&$data"); // Chuyển hướng đến trang đăng ký với thông báo lỗi
        exit;
    } 
    // Kiểm tra nếu mật khẩu để trống
    else if(empty($pass)){
        $em = "Password is required!"; // Thông báo lỗi
        header("Location: ../admin_signup.php?error=$em&$data"); // Chuyển hướng đến trang đăng ký với thông báo lỗi
        exit;
    } 
    else {
        // Mã hóa mật khẩu trước khi lưu vào cơ sở dữ liệu
        $pass = password_hash($pass, PASSWORD_DEFAULT);

        $image_size = $_FILES['image']['size'];
        $image_temp = $_FILES['image']['tmp_name'];
        $error = $_FILES['image']['error'];
        
        if ($error === 0) {
            if ($image_size > 1000000) {
                $em= "Sorry, your file is too large.";
                header("Location: ../admin_signup.php?error=$em&$data");
                exit;
            } else {
                $image_ex = pathinfo($img, PATHINFO_EXTENSION); // Changed to use $img
                $image_ex = strtolower($image_ex);

                $allowed_exs = array('jpg', 'jpeg', 'png', 'gif');

                if (in_array($image_ex, $allowed_exs)) {
                    $new_image_name = uniqid("AVT-", true).'.'.$image_ex;
                    $image_path = '../img/Avatar/'.$new_image_name;
                    
                    // Move the uploaded image
                    move_uploaded_file($image_temp, $image_path);

                    // Insert into database (including the image)
                    $sql = "INSERT INTO admin(email, username, password, image) VALUES(?,?,?,?)";
                    $stmt = $conn->prepare($sql); // Chuẩn bị câu lệnh SQL
                    $stmt->execute([$email, $uname, $pass, $new_image_name]); // Include the new image name
                    
                    header("Location: ../admin-signup.php?success=Your account has successfully been created!");
                    exit;
                } else {
                    $em = "You can't upload files of this type"; 
                    header("Location: ../admin_signup.php?error=$em&$data");
                    exit;
                }
            }
        } else {
            $em = "Unknown error during file upload!";
            header("Location: ../admin_signup.php?error=$em&$data");
            exit;
        }      
    }
} else {
    // Nếu không có dữ liệu POST
    header("Location: ../admin-signup.php?error=lỗi"); // Chuyển hướng đến trang chính với thông báo lỗi
    exit;
}
?>
