<?php 
    if (isset($key) && $key == "hhdsfs1263z") {
    // Kiểm tra xem biến $key có tồn tại và có giá trị chính xác là "hhdsfs1263z" không.
    // Nếu đúng, phần giao diện sidebar sẽ được hiển thị.
?>
<input type="checkbox" id="checkbox">
	<header class="header">
		<h2 class="u-name">La Mancha <b>Land</b>
			<label for="checkbox">
				<i id="navbtn" class="fa fa-bars" aria-hidden="true"></i>
			</label>
		</h2>
		<div class="d-flex align-items-center">
			<i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;
			<span><b> @<?php echo $_SESSION['username']; ?></b></span>
		</div>
	</header>
	<div class="body">
		<nav class="side-bar">
			<div class="user-p">
				<a href="index.php"><img class="bg" src="../img/beechi_bolley_burr.jpg"></a>
			</div>
			<ul id="navList"> <!-- Bắt đầu danh sách điều hướng trong sidebar -->
				<li >
					<a href="Users.php">
						<i class="fa fa-users" aria-hidden="true"></i>
                        <!-- Icon 'fa-users' đại diện cho mục quản lý người dùng -->
						<span>Users</span> <!-- Tên mục 'Users' -->
					</a>
				</li>
                <li>
					<a href="Post.php">
						<i class="fa fa-wpforms" aria-hidden="true"></i>
                        <!-- Icon 'fa-wpforms' đại diện cho mục quản lý bài viết -->
						<span>Post</span> <!-- Tên mục 'Post' -->
					</a>
				</li>
                <li>
					<a href="Category.php">
						<i class="fa fa-window-restore" aria-hidden="true"></i>
                        <!-- Icon 'fa-window-restore' đại diện cho mục quản lý danh mục -->
						<span>Category</span> <!-- Tên mục 'Category' -->
					</a>
				</li>
                <!-- Mục 'Pages' đã bị comment và tạm thời không sử dụng -->
				<li>
					<a href="#">
						<i class="fa fa-envelope-o" aria-hidden="true"></i>
                        <!-- Icon 'fa-envelope-o' đại diện cho mục tin nhắn -->
						<span>Message</span> <!-- Tên mục 'Message' -->
					</a>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-comment-o" aria-hidden="true"></i>
                        <!-- Icon 'fa-comment-o' đại diện cho mục bình luận -->
						<span>Comment</span> <!-- Tên mục 'Comment' -->
					</a>
				</li>
				<!-- Mục 'About' đã bị comment và tạm thời không sử dụng -->
				<li>
					<a href="#">
						<i class="fa fa-cog" aria-hidden="true"></i>
                        <!-- Icon 'fa-cog' đại diện cho mục cài đặt -->
						<span>Setting</span> <!-- Tên mục 'Setting' -->
					</a>
				</li>
				<li>
					<a href="../logout.php">
						<i class="fa fa-power-off" aria-hidden="true"></i>
                        <!-- Icon 'fa-power-off' đại diện cho chức năng đăng xuất -->
						<span>Logout</span> <!-- Tên mục 'Logout' -->
					</a>
				</li>
			</ul>
		</nav>
<?php
    } else {
        echo "error"; // Nếu biến $key không tồn tại hoặc không đúng giá trị, sẽ hiển thị 'error'.
    }
?>