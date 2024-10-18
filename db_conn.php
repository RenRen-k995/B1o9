<?php 

$sName = "localhost"; // Địa chỉ máy chủ cơ sở dữ liệu
$uName = "root"; // Tên người dùng cho cơ sở dữ liệu
$pass = ""; // Mật khẩu cho người dùng cơ sở dữ liệu
$db_name = "blog_db"; // Tên cơ sở dữ liệu

try {
    // Tạo một đối tượng PDO mới để kết nối với cơ sở dữ liệu
    $conn = new PDO("mysql:host=$sName;dbname=$db_name", 
                    $uName, $pass);
    // Thiết lập chế độ báo lỗi cho PDO
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    // Nếu có lỗi xảy ra trong quá trình kết nối, in ra thông báo lỗi
    echo "Connection failed: " . $e->getMessage();
}
