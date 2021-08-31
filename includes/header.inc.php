
    <nav class="navbar sticky-top navbar-light bg-dark justify-content-center px-0">
        <ul class="nav nav-pills nav-fill ">

            <?php
            if (isset($_SESSION['logged_id']))
                echo "<li class='nav-item px-5 border border-primary'><a class='nav-link' href='#'>{$_SESSION["login"]}</a></li>";
            ?>

            <li class="nav-item"><a class="nav-link " href="index.php">Home</a></li>

            <?php
            if (!isset($_SESSION['logged_id'])) {
                echo '<li class="nav-item"><a class="nav-link" href="loginForm.php">Login</a></li>
                  <li class="nav-item"><a class="nav-link" href="signUpForm.php">Sign Up</a></li>
                  ';
            } else {
                echo "<li class='nav-item'><a class='nav-link' href='addFeedForm.php'>Add feed<a></li>";
                echo "<li class='nav-item'><a class='nav-link' href='manageFeeds.php'>Manage feeds<a></li>";
                echo "<li class='nav-item'><a class='nav-link' href='includes/logout.inc.php'>Logout<a></li>";
            }
            ?>

            <li class="nav-item"><a class="nav-link" href="#">About</a></li>

        </ul>
    </nav>
