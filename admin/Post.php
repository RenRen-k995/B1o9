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
<body>
    <?php 
    $key = "hhdsfs1263z";
    include "inc/side-nav.php" ;
    include_once("data/Post.php");
    include_once("../db_conn.php");
    $posts = getAll($conn);
    ?>
    <section class="section-1">
    <div class="main-table">
        <h3 class=" All-user">All Posts 
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
                <table class="table t1">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($posts as $post) {?>
                        <tr>
                            <td scope="row"><?= $post['post_id'] ?></td>
                            <td><a href="single_post.php?post_id=<?= $post['post_id'] ?>"><?= $post['post_title'] ?></a></td>
                            <td><?= $post['post_text'] ?></td>
                            <td>
                                <a href="post-delete.php?post_id=<?= $post['post_id'] ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </section>
        <?php }else{ ?>
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