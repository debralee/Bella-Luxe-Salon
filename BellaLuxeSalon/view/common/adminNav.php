<?php
$title = "Admin Dashboard";
include("adminHeader.php");
?>

<body>
    <div class="wrapper">
        <aside id="sidebar">
            <div class="d-flex justify-content-between p-4 mb-5">
                <div class="sidebar-logo">
                    <a id="dashboard" class="logo_type" href="#">Bella Luxe Salon</a>
                </div>
                <button class="toggle-btn border-0" type="button">
                    <i id="icon" class='bx bx-chevrons-right'></i>
                </button>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a class="sidebar-link" href="dashboard.php">
                        <i class="bi bi-house"></i>
                        <!-- <span>Dashboard</span> -->
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#multi" aria-expanded="false" aria-controls="multi">
                        <i class="bi bi-pencil"></i>
                        <span>Edit Content</span>
                    </a>
                    <ul id="multi" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                                data-bs-target="#multi-two" aria-expanded="false" aria-controls="multi-two">
                                Menu
                            </a>
                            <ul id="multi-two" class="sidebar-dropdown list-unstyled collapse">
                                <li class="sidebar-item">
                                    <a href="adminCut.php" class="sidebar-link">
                                        Haircut & Style
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="adminColor.php" class="sidebar-link">
                                        Color & Dimension
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="adminWaves.php" class="sidebar-link">
                                        Waves & Texture
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="adminSpa.php" class="sidebar-link">
                                        Spa
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="adminMakeup.php" class="sidebar-link">
                                        Permanent Makeup
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>

                </li>
                <li class="sidebar-item">
                    <a href="index.php" class="sidebar-link">
                        <i class="bi bi-box-arrow-in-left"></i>
                        <span>Return to Home Page</span>
                    </a>
                </li>
            </ul>


        </aside>
        <div class="main">
            <nav class="navbar navbar-expand px-4 py-3">

                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item text-primary me-3">Welcome to your dashboard,
                            <?php echo $_SESSION['userName']; ?></li>
                        <li class="nav-item dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                                <i class="bi bi-person" style="font-size: 2rem; color: cornflowerblue;"></i>
                            </a>
                        </li>

                    </ul>
                </div>
            </nav>
            <main class="content px-3 py-4">
                <div class="containter-fluid"></div>