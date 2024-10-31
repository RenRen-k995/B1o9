<?php 
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['username'])) {
    if (isset($_POST['submit'])) {
        include "../../db_conn.php";
        $admin_id = $_SESSION['admin_id'];
        
        // Fetch existing admin data
        $select_user = $conn->prepare("SELECT * FROM `admin` WHERE admin_id = ? LIMIT 1");
        $select_user->execute([$admin_id]);
        $fetch_user = $select_user->fetch(PDO::FETCH_ASSOC);

        $prev_image = $fetch_user['image'];
        $current_username = $fetch_user['username'];
        $current_email = $fetch_user['email'];

        // Handle Username Update
        $username = !empty($_POST['username']) ? filter_var($_POST['username'], FILTER_SANITIZE_STRING) : $current_username;
        $update_name = $conn->prepare("UPDATE `admin` SET username = ? WHERE admin_id = ?");
        $update_name->execute([$username, $admin_id]);

        // Handle Email Update
        $email = !empty($_POST['email']) ? filter_var($_POST['email'], FILTER_SANITIZE_STRING) : $current_email;
        if ($email !== $current_email) {
            // Check if email already exists
            $select_email = $conn->prepare("SELECT email FROM `admin` WHERE email = ? AND admin_id != ?");
            $select_email->execute([$email, $admin_id]);
            if ($select_email->rowCount() > 0) {
                header("Location: ../profile.php?error=Email already taken!");
                exit;
            } else {
                $update_email = $conn->prepare("UPDATE `admin` SET email = ? WHERE admin_id = ?");
                $update_email->execute([$email, $admin_id]);
            }
        }

        // Handle Image Update
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $image = $_FILES['image']['name'];
            $image_size = $_FILES['image']['size'];
            $image_tmp_name = $_FILES['image']['tmp_name'];

            if ($image_size <= 2000000) {
                $allowed_exs = ['jpg', 'jpeg', 'png', 'gif'];
                $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));

                if (in_array($ext, $allowed_exs)) {
                    $rename = uniqid("AVT-", true) . '.' . $ext;
                    $image_folder = realpath(dirname(__FILE__) . '/../../img/Avatar/') . '/' . $rename;
                    
                    if (move_uploaded_file($image_tmp_name, $image_folder)) {
                        // Update image in database
                        $update_image = $conn->prepare("UPDATE `admin` SET image = ? WHERE admin_id = ?");
                        $update_image->execute([$rename, $admin_id]);

                        // Remove previous image if new one is uploaded
                        if (!empty($prev_image) && $prev_image != $rename) {
                            unlink(realpath(dirname(__FILE__) . '/../../img/Avatar/') . '/' .$prev_image);
                        }

                        // Update session image
                        $_SESSION['image'] = $rename;
                    } else {
                        header("Location: ../profile.php?error=Failed to upload image.");
                        exit;
                    }
                } else {
                    header("Location: ../profile.php?error=You can't upload files of this type.");
                    exit;
                }
            } else {
                header("Location: ../profile.php?error=Sorry, your image is too large.");
                exit;
            }
        }

        // Update session data
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;

        // Redirect with success message
        header("Location: ../profile.php?success=Profile successfully updated!");
        exit;

    } else {
        header("Location: ../profile.php");
        exit;
    }

} else {
    header("Location: ../admin-login.php");
    exit;
}
