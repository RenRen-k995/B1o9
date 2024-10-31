<nav class="navbar navbar-expand-lg bg-body-tertiary"> <!-- Navbar chính -->
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Blog Page</a> <!-- Tiêu đề của navbar -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent"> <!-- Các mục trong navbar -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="blog.php">Blog</a>
                    </li>
                    <li class="nav-item dropdown"> <!-- Dropdown cho danh mục -->
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Category
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="Category.php">Category 1</a></li>
                            <li><a class="dropdown-item" href="Category.php">Category 2</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="nav-link" href="login.php">Login | Signup</a> <!-- Liên kết đến trang đăng nhập và đăng ký -->
                    </li>
                </ul>
                <form class="d-flex" role="search"> <!-- Form tìm kiếm -->
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>