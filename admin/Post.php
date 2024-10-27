<?php 
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['username'])) {
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard - Posts</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/side-bar.css">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="page-1">
    <?php 
    $key = "hhdsfs1263z";
    include "inc/side-nav.php" ;
    include_once("data/Post.php");
    include_once("data/Comment.php");
    include_once("../db_conn.php");
    $posts = getAll($conn);
    ?>
    <div class="main-table">
        <h3 class="All-user">All Posts 
            <a href="post-add.php" class="btn btn-success">Add New</a>
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
        <?php if ($posts !=0) { ?>
            <section class="table-body">
            <table class="table t1 table-striped-custom">
                <thead>
                    <tr>
                        <th style="width: 5%;">#</th> <!-- Set smaller width for the ID -->
                        <th style="min-width: 190px">Title</th> <!-- Adjust width for Title -->
                        <th style="min-width: 150px;">Category</th>
                        <th style="width: 10%;">Comments</th>
                        <th style="width: 15%;">Likes</th>
                        <th style="min-width: 170px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($posts as $post) {
                        $category = getCategoryById($conn, $post['category']);
                    ?>
                    <tr>
                        <td><?= $post['post_id'] ?></td>
                        <td><a href="single_post.php?post_id=<?= $post['post_id'] ?>"><?= $post['post_title'] ?></a></td>
                        <td><?=$category['category']?></td>
                        <td><i class="fa fa-comment" aria-hidden="true"></i> 
                        <?php
                            echo CountByPostID($conn, $post['post_id']);
                        ?>
                        </td>
                        <td><i class="fa fa-thumbs-up" aria-hidden="true"></i> 
                        <?php
                            echo likeCountByPostID($conn, $post['post_id']);
                        ?>  
                        </td>
                        <td>
                            <a href="post-delete.php?post_id=<?= $post['post_id'] ?>" class="btn btn-danger">Delete</a>
                            <a href="post-edit.php?post_id=<?= $post['post_id'] ?>" class="btn btn-warning ms-2">Edit</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            </section>
        <?php } else { ?>
            <div class="alert alert-warning">
                Empty!
            </div> 
        <?php } ?>
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