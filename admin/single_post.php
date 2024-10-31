<?php 
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['username']) && isset($_GET['post_id'])) {
    $post_id = $_GET['post_id'];
    include_once("data/Post.php");
    include_once("../db_conn.php");
    $post = getById($conn, $post_id);
    $category = getCategoryById($conn, $post['category']);
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard - <?= $post['post_title'] ?></title>
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
    ?>
    <div class="main-single-post">
        <div class="card mx-auto main-blog-card mb-5" style="background-color: #fffb;">
            <img src="../upload/blog/<?= $post['cover_url'] ?>" class="card-img-top" alt="..."> <!-- Ảnh của bài viết -->
            <div class="card-body">
                <h5 class="card-title"><?= $post['post_title'] ?></h5>
                <?= $post['post_text'] ?>
                <p class="card-text d-flex justify-content-between">
                    <b>Category: <?=$category['category']?></b>
                    <small class="text-body-secondary">Date: <?= $post['created_at'] ?></small>
                </p>
            </div>
        </div>
    </div>
	</section>
	</div>
    
    <script>
        var navList = document.getElementById('navList').children;
        navList.item(1).classList.add("active");
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