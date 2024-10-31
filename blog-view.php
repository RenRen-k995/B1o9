<?php 
session_start();
$logged = false;
if (isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
	 $logged = true;
	 $user_id = $_SESSION['user_id'];
}

if (isset($_GET['post_id'])) {

   	  include_once("admin/data/Post.php");
        include_once("admin/data/Comment.php");
        include_once("db_conn.php");
        $id = $_GET['post_id'];
        $post = getById($conn, $id);
        // $comments = getCommentsByPostID($conn, $id);
        // $categories = get5Categoies($conn); 

     if ($post == 0) {
     	  header("Location: blog.php");
	     exit;
     }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> <!-- Đặt mã ký tự cho tài liệu -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Responsive -->
    <title>Blog - <?=$post['post_title']?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css"> <!-- Liên kết đến file CSS tùy chỉnh -->
</head>
<!-- xong làm thêm light-dark mode như web education -->
<body> 
    <?php
        include 'inc/NavBar.php';
    ?>

    <div class="container mt-5"> <!-- Nội dung chính của trang -->
        <section class="d-flex">
            <main class="main-blog"> <!-- Phần nội dung blog -->
                <div class="card main-blog-card mb-5">
                    <img src="upload/blog/<?=$post['cover_url']?>" class="card-img-top" alt="..."> <!-- Ảnh của bài viết -->
                    <div class="card-body">
                        <h5 class="card-title"><?=$post['post_title']?></h5>
                        <p class="card-text"><?=$post['post_text']?></p>
                        <a href="blog.php" class="btn btn-secondary">Back to blog page</a>

                        <hr>
                        <div class="d-flex justify-content-between">
                            <div>
                                <i class="fa fa-comment" aria-hidden="true"></i> Comments 
                                (<?php
                                    echo countByPostID($conn, $post['post_id']);
                                ?>) &nbsp;&nbsp;

                                <i class="fa fa-thumbs-up" aria-hidden="true"></i> Likes 
                                (<?php
                                    echo likeCountByPostID($conn, $post['post_id']);
                                ?>) &nbsp;&nbsp;

                                <i class="fa fa-thumbs-down" aria-hidden="true"></i> Dislikes 
                                (<?php
                                    echo dislikeCountByPostId($conn, $post['post_id']);
                                ?>) &nbsp;&nbsp;

                                <i class="fa fa-share" aria-hidden="true"></i> Shares 
                                (<?php
                                    echo shareCountByPostID($conn, $post['post_id']);
                                ?>)
                            </div>

                            <small class="text-body-secondary"><?=$post['created_at']?></small>
                        </div>

                        <hr>
                        <form action="php/login.php" method="post">

                            <h5 class="mt-4 text-secondary mb-3">Add Comment</h5>

                            <div class="mb-3">
                                <input type="text" 
                                    class="form-control"
                                    name="uname">
                            </div>

                            <button type="submit" class="btn btn-primary">Comment</button>
                        </form>

                    </div>
                </div>
            </main>

            <aside class="aside-main"> <!-- Phần sidebar -->
                <div class="list-group category-aside">
                    <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                        Category
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">Category 1</a>
                    <a href="#" class="list-group-item list-group-item-action">Category 2</a>
                    <a href="#" class="list-group-item list-group-item-action">Category 3</a>
                </div>
            </aside>
        </section>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

<?php }else {
	header("Location: blog.php");
	exit;
} ?>