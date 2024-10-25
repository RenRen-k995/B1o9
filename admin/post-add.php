<?php 
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['username'])) {
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard - Create Post</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/side-bar.css">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="../css/richtext.min.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="../js/jquery.richtext.min.js"></script>
</head>
<body>
    <?php 
    $key = "hhdsfs1263z";
    include "inc/side-nav.php" ;
    include_once("data/Post.php");
    include_once("../db_conn.php");
    $posts = getAll($conn);
    ?>
    <section class="section-2">
    <div class="main-post-table">
    <div> 
        <h3 class=" All-user">Create New Post 
            <a href="post.php" class="btn btn-secondary">Posts</a>
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
    	      action="req/post-create.php" 
    	      method="post"
              enctype="multipart/form-data">

		    <div class="mb-3">
		    <label class="form-label text-size">Title</label> 
		    <input type="text" 
		           class="form-control"
		           name="title"
		           value="<?php echo (isset($_GET['uname']))? htmlspecialchars($_GET['uname']):"" ?>">
		    </div>

            <div class="mb-3">
		    <label class="form-label text-size">Cover Image</label> 
		    <input type="file" 
		           class="form-control"
		           name="cover">
		    </div>

            <div class="mb-3">
		    <label class="form-label text-size">Text</label> 
		    <textarea class="form-control text" name="text"></textarea>
		    </div>

            <!-- chỗ này m sửa username với password lại màu khác nha, chứ chữ đen hơi khó thấy, do cấn cái bg, cho đậm lên các kiểu :v -->
		   
            <!-- Login button -->
            <button type="submit" class="btn btn-primary">Create</button>
    	</form>
    </div>
	</section>
	</div>
    
    <script>
        var navList = document.getElementById('navList').children;
        navList.item(1).classList.add("active");

        $(document).ready(function() {
            $('.text').richText();
        });

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