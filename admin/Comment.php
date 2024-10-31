<?php 
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['username'])) {
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard - Comments</title>
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
    include_once("data/Comment.php");
    include_once("data/Post.php");
    include_once("../db_conn.php");
    $comments = getAllComment($conn);
    ?>
    <div class="main-table wh-option-1">
        <h3 class="All-user">All Comments</h3>
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
        <?php if ($comments !=0) { ?>
            <section class="table-body">
                <table class="table t1 table-striped-custom">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Post Title</th>
                            <th scope="col">Comment</th>
                            <th scope="col">User</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($comments as $comment) {
                        ?>
                        <tr>
                            <td scope="row" style="width: .5rem !important;"><?= $comment['comment_id'] ?></td>
                            <td>
                                <a href="single_post.php?post_id=<?=$comment['post_id']?>">
                                <?php
                                $p = getById($conn, $comment['post_id']);
                                echo $p['post_title'];
                                ?></a>
                            </td>
                            <td>
                                <?=$comment['comment']?>
                            </td>
                            <td>
                                <?php
                                $u = getUserById($conn, $comment['user_id']);
                                echo $u['username'];
                                ?>
                            </td>
                            <td class="no-wrap">
                                <a href="comment-delete.php?comment_id=<?= $comment['comment_id'] ?>" class="btn btn-danger">Delete</a>
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
        navList.item(3).classList.add("active");
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