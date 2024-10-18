<?php 
session_start();

if (isset($_POST['uname']) && isset($_POST['pass'])) {
    include "../db_conn.php";

    // Sanitize input
    $uname = trim($_POST['uname']);
    $pass = trim($_POST['pass']);

    $data = "uname=" . urlencode($uname); // Use urlencode for safety
    
    // Input validation
    if (empty($uname)) {
        $em = "User name is required";
        header("Location: ../admin-login.php?error=" . urlencode($em) . "&$data");
        exit;
    } else if (empty($pass)) {
        $em = "Password is required";
        header("Location: ../admin-login.php?error=" . urlencode($em) . "&$data");
        exit;
    } else {
        // Prepare the SQL statement
        $sql = "SELECT * FROM admin WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$uname]);

        if ($stmt->rowCount() === 1) {
            $user = $stmt->fetch();
            $username = $user['username'];
            $password = $user['password'];
            $email = $user['email'];
            $id = $user['id'];

            // Verify username and password
            if ($username === $uname) {
                if (password_verify($pass, $password)) {
                    $_SESSION['id'] = $id;
                    $_SESSION['email'] = $email;
                    $_SESSION['username'] = $username;
                    header("Location: dashboard.php");
                    exit;
                } else {
                    $em = "Incorrect User name or password";
                    header("Location: ../admin-login.php?error=" . urlencode($em) . "&$data");
                    exit;
                }
            } else {
                $em = "Incorrect User name or password";
                header("Location: ../admin-login.php?error=" . urlencode($em) . "&$data");
                exit;
            }
        } else {
            $em = "Incorrect User name or password";
            header("Location: ../admin-login.php?error=" . urlencode($em) . "&$data");
            exit;
        }
    }
} else {
    header("Location: ../admin-login.php?error=error");
    exit;
}
