<?php
  $title = "Admin Dashboard";
  include ("common/adminHeader1.php");

?>

<body>
    <div class="wrapper">
        <aside id="sidebar">
            <div class="d-flex justify-content-between p-4">
                <div class="sidebar-logo">
                    <a id="dashboard" class="" href="#">Dashboard</a>
                </div>
                <button class="toggle-btn border-0" type="button">
                    <i id="icon" class='bx bx-chevrons-right'></i>
                </button>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a class="sidebar-link" href="#">
                        <i class='bxr bx-user'></i>
                        <span>Profile</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="#">
                        <i class="bi bi-list-task"></i>
                        <span>Task</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
                        <i class="bx bxs-bug-alt"></i>
                        <span>Auth</span>
                    </a>
                    <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">
                                Login
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">
                                Register
                            </a>

                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#multi" aria-expanded="false" aria-controls="multi">
                        <i class="bi bi-bar-chart"></i>
                        <span>Multi Level</span>
                    </a>
                    <ul id="multi" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                                data-bs-target="#multi-two" aria-expanded="false" aria-controls="multi-two">
                                Two Links
                            </a>
                            <ul id="multi-two" class="sidebar-dropdown list-unstyled collapse">
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link">
                                        Link 1
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link">
                                        Link 2
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>

                </li>
                <li class="sidebar-item">
                    <a href="" class="sidebar-link">
                        <i class='bxr  bx-bell-ring'></i>
                        <span>Notifications</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="" class="sidebar-link">
                        <i class='bxr  bx-cog'></i>
                        <span>settings</span>
                    </a>
                </li>
            </ul>
            <div class="sidebar-footer">
                <a href="" class="sidebar-link">
                    <i class="bi bi-box-arrow-in-left"></i>
                    <span>Logout</span>
                </a>
            </div>

        </aside>
        <div class="main">
            <nav class="navbar navbar-expand px-4 py-3">
                <form action="#" class="d-none d-sm-line-block">
                    <div class="input-group input-group-navbar">
                        <input type="text" class="form-control border-0 rounded-0 pe-0" placeholder="Search..."
                            aria-label="Search">
                        <button class="btn border-0 rounded-0" type="button"></button>
                        <i class="bi bi-search"></i>
                    </div>
                </form>
                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                                <img src="" alt="" class="avatar img-fluid">
                                <i class="bi bi-person"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end rounded-0 border-0 shadow mt-3">
                                <a href="#" class="dropdown-item">
                                    <i class="bi bi-database"></i>
                                    <span>Analytics</span>
                                </a>
                                <a href="#" class="dropdown-item">
                                    <i class="bi bi-gear"></i>
                                    <span>Settings</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item">
                                    <i class="bi bi-question-circle"></i>
                                    <span>Help Center</span>
                                </a>
                            </div>
                        </li>

                    </ul>
                </div>
            </nav>
            <main class="content px-3 py-4">
                <div class="containter-fluid">
                    <div class="mb-3">
                        <h3 class="fw-bold fs-4 mb-3">
                            Admin Dashboard
                        </h3>
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <div class="card shadow">
                                    <div class="card-body py-4">
                                        <h6 class="mb-2 fw-bold">Member Progress</h6>
                                        <p class="fw-bold mb-2">
                                            $89,1891
                                        </p>

                                        <p class="mb-0"></p>
                                        <span class="bagde bg-success me-2">+9.0%</span>
                                        <span class="fw-bold">Since last month</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

        </div>

    </div>

    <script src="scripts/script.js"></script>
    <?php
  include ("common/footer.php");
?>