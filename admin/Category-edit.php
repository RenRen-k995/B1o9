<?php 
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['username']) && $_GET['id']) {
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard - Category Edit</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/side-bar.css">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="page-2">
    <?php 
    $key = "hhdsfs1263z";
    $id = $_GET['id'];
    include "inc/side-nav.php" ;
    include_once("data/Category.php");
    include_once("../db_conn.php");
    $category_other = getCategoryById($conn, $id);

    if (isset($_GET['category'])) {
        $category = $_GET['category'];
    } else {
        $category = $category_other['category'];
        $category_id = $category_other['id'];
    }
    ?>
    
    <div class="main-table wh-option-1">
        <h3 class="All-user">Edit 
            <a href="Category.php" class="btn btn-secondary">Category</a>
        </h3>
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

        <form class="shadow p-3" 
    	      action="req/Category-edit.php" 
    	      method="post">

		    <div class="mb-3">
		    <label class="form-label text-size">Category</label> 
		    <input type="text" class="form-control" name="category" value="<?=$category?>">
            <input type="text" class="form-control" name="id" value="<?=$category_id?>" hidden>
		    </div>
		   
            <!-- Create button -->
            <button type="submit" class="btn btn-primary">Change</button>
    	</form>
        
    </div>
	</section>
	</div>
    
    <script>
        var navList = document.getElementById('navList').children;
        navList.item(2).classList.add("active");
    </script>
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