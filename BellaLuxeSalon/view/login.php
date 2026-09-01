<?php
$title = "Login";
include("common/header.php");
include("common/nav.php");
?>

<body>
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <div class="card p-3 m-3 pt-md-3 pb-md-5 mt-md-5">
                    <h1 class="text-center logo_type">Sign Up</h1>
                    <form action="../includes/signup.inc.php" method="post">
                        <div class="mb-2 mb-md-3">
                            <label for="name" class="form-label">First Name:</label>
                            <input type="text" class="form-control" id="firstName" name="firstName">
                        </div>
                        <?php
                        if (isset($_GET['errorName'])) {
                            echo '<p class="text-danger">' . $_GET['errorName'] . '</p>';
                        }
                        ?>

                        <div class="mb-2 mb-md-3">
                            <label for="username" class="form-label">Username:</label>
                            <input type="text" class="form-control" id="uid" name="uid">
                        </div>
                        <?php
                        if (isset($_GET['errorUsername'])) {
                            echo '<p class="text-danger">' . $_GET['errorUsername'] . '</p>';
                        }
                        ?>
                        <div class="mb-2 mb-md-3">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" class="form-control" id="pwd" name="pwd">
                        </div>
                        <div class="mb-2 mb-md-3">
                            <label for="passwordRepeat" class="form-label">Repeat Password:</label>
                            <input type="password" class="form-control" id="pwdRepeat" name="pwdRepeat">
                        </div>
                        <?php
                        if (isset($_GET['passwordmatch'])) {
                            echo '<p class="text-danger">' . $_GET['passwordmatch'] . '</p>';
                        }
                        ?>
                        <div class="mb-2 mb-md-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="text" class="form-control" id="email" name="email">
                            <?php
                            if (isset($_GET['errorEmail'])) {
                                echo '<p class="text-danger">' . $_GET['errorEmail'] . '</p>';
                            }
                            ?>
                            <input type="checkbox" name="remember" id=""> Remember me
                        </div>
                        <?php
                        if (isset($_GET['emptyInput'])) {
                            echo '<p class="text-danger">' . $_GET['emptyInput'] . '</p>';
                        }
                        ?>

                        <button type="submit" name="submit" class="btn btn-primary">Sign Up</button>
                        <a href="index.php"><button type="submit" class="btn btn-warning">Cancel</button></a>
                        <?php
                        if (isset($_GET['success'])) {
                            echo '<p class="text-success mt-3">' . $_GET['success'] . '</p>';
                        }
                        ?>
                    </form>


                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="card p-3 m-3 pt-md-5 pb-md-5 mt-md-5">
                    <h1 class="text-center logo_type">Login</h1>

                    <form action="../includes/login.inc.php" method="post">
                        <div class="mb-2 mb-md-3">
                            <label for="username" class="form-label">Username:</label>
                            <input type="text" class="form-control" id="username" name="uid">
                        </div>
                        <div class="mb-2 mb-md-3">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" class="form-control" id="password" name="pwd">
                            <input type="checkbox" name="remember" id=""> Remember me
                        </div>
                        <a href="#" class="btn btn-link">Forgot your password?</a>

                        <button type="submit" name="submit" class="btn btn-primary">Login</button>
                        <a href="index.php"><button type="button" class="btn btn-warning">Cancel</button></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous">
    </script>
</body>

</html>