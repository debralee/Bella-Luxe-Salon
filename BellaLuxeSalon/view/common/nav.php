<body>
    <!-- HEADER ==================================================== -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container-fluid">
            <!-- Brand -->
            <a href="index.php" class="navbar-brand logo_type">Bella Luxe Salon</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link icon" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link icon" href="#service">Services</a></li>
                    <li class="nav-item"><a class="nav-link icon" href="#gallery">Gallery</a></li>
                    <li class="nav-item"><a class="nav-link icon" href="#testimonials">Testimonials</a></li>
                    <li class="nav-item"><a class="nav-link icon" href="#contact">Contact</a></li>
                </ul>
                <div class="d-flex">
                    <ul class="navbar-nav ml-auto">
                        <!-- Social Media links -->
                        <li class="nav-item p-1"><a class=""
                                href="https://www.facebook.com/" target="_blank"><img
                                    src="images/facebookWhite.png" alt="Facebook Icon" width="46" height="46"></a></li>
                        <li class="nav-item p-1"><a class=""
                                href="https://www.instagram.com/" target="_blank"><img
                                    src="images/instagramWhite.png" alt="Instagram Icon" width="46" height="46"></a></li>
                        <li class="nav-item p-1"><a class=""
                                href="https://www.twitter.com/" target="_blank"><img
                                    src="images/twitterWhite.png" alt="Twitter Icon" width="46" height="46"></a></li>
                        <li class="nav-item p-2">
                            <p class="text-light">777-777-7777</p>
                        </li>
                        <?php
                        if (isset($_SESSION['userId'])) {
                        ?>
                            <li class="nav-item"><a href="#" class="nav-link">Hello <?php echo $_SESSION['userName']; ?></a>
                            </li>
                            <li class="nav-item"><a href="../includes/logout.inc.php" class="nav-link">Logout</a></li>
                            <?php
                            if ($_SESSION['userRole'] == 'Admin') {
                            ?>
                                <li><a href="dashboard.php" class="nav-link">Dashboard</a></li>
                            <?php
                            }
                        } else {
                            ?>
                            <li class="nav-item"><a href="login.php" class="nav-link">Login</a></li>
                            <li class="nav-item"><a href="login.php" class="nav-link">Sign Up</a></li>
                        <?php
                        }
                        ?>

                    </ul>
                </div>
            </div>
        </div>
    </nav>