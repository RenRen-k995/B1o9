<?php 
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['username'])) {
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard - Profile</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/side-bar.css">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="page-2">
    <?php 
    $key = "hhdsfs1263z";
    include "inc/side-nav.php" ;
    include_once("data/Admin.php");
    include_once("../db_conn.php");
    $admin = getByID($conn, $_SESSION['admin_id']);
    ?>
    <div class="main-table wh-option-2">
        <h3 class="All-user">Admin Profile <a href="../admin-signup.php" class="btn btn-success">Add New</a></h3>
        <?php if (isset($_GET['error'])) { ?>
        <div class="alert alert-warning">
            <?=htmlspecialchars($_GET['error'])?>
        </div>
        <?php } ?>

        <?php if (isset($_GET['success'])) { ?>
        <div class="alert alert-success">
            <?=htmlspecialchars($_GET['success'])?>
        </div>
        <?php } ?>

        <form class="shadow p-3 form" 
    	      action="req/admin-edit.php" 
    	      method="post"
              enctype="multipart/form-data">
            <h5 class="All-user profile"><b>Change Profile Information</b></h5>
            <div class="mb-3">
                <label class="form-label text-size">Email</label> 
                <input type="text" class="form-control input-custom" name="email" placeholder="<?=$admin['email']?>">
		    </div>
            <div class="mb-3">
                <label class="form-label text-size">Username</label> 
                <input type="text" class="form-control input-custom" name="username" placeholder="<?=$admin['username']?>">
		    </div>
            <div class="mb-3">
		    <label class="form-label text-size">Avatar</label> 
		    <input type="file" 
		           class="form-control"
		           name="image">
		    </div>
            <!-- Create button -->
            <button type="submit" name="submit" class="btn btn-primary">Change</button>
    	</form>

        <form class="shadow p-3 mt-4 form" 
    	      action="req/admin-edit-pass.php" 
    	      method="post">
            <h5 class="All-user profile" id="cpassword"><b>Change Password</b></h5>
            <?php if (isset($_GET['perror'])) { ?>
            <div class="alert alert-warning">
                <?=htmlspecialchars($_GET['perror'])?>
            </div>
            <?php } ?>

            <?php if (isset($_GET['psuccess'])) { ?>
            <div class="alert alert-success">
                <?=htmlspecialchars($_GET['psuccess'])?>
            </div>
            <?php } ?>

		    <div class="mb-3">
                <label class="form-label text-size">Current Password</label> 
                <input type="password" class="form-control input-custom" name="cpass">
		    </div>
            <div class="mb-3">
                <label class="form-label text-size">New Password</label> 
                <input type="password" class="form-control input-custom" name="newpass">
		    </div>
            <div class="mb-3">
                <label class="form-label text-size">Confirm New Password</label> 
                <input type="password" class="form-control input-custom" name="confirm_newpass">
		    </div>
		   
            <!-- Create button -->
            <button type="submit" class="btn btn-primary">Change Password</button>
    	</form>
        
    </div>
	</section>
	</div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
    crossorigin="anonymous"></script>
</body>
</html>

<?php 
} else {
    header("Location: ../admin-login.php"); // Nếu người dùng không đăng nhập, chuyển hướng đến trang đăng nhập quản trị viên.
    exit; // Kết thúc việc xử lý trang, không thực hiện thêm mã lệnh nào nữa.
}
?>