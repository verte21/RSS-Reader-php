<header class="navbar navbar-dark navbar-lg sticky-top bg-myGreen flex-md-nowrap p-0 shadow justify-content-center h-10">
                <ul class="nav nav-pills-lg nav-fill ">
            <?php
            if (isset($_SESSION['logged_id']))
                echo "<li class='nav-item px-5 border border-primary rounded shadow '><a class='nav-link' href='#'>{$_SESSION["login"]}</a></li>";
            ?>

            <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>

            <?php
            if (!isset($_SESSION['logged_id'])) {
                echo '<li class="nav-item"><a class="nav-link" href="loginForm.php">Login</a></li>
                  <li class="nav-item"><a class="nav-link" href="signUpForm.php">Sign Up</a></li>
                  ';
            } else {
                echo "<li class='nav-item'><a class='nav-link' href='addFeedForm.php'>Add feed</a></li>";
                echo "<li class='nav-item'><a class='nav-link' href='manageFeeds.php'>Manage feeds</a></li>";
                echo "<li class='nav-item'><a class='nav-link' href='includes/logout.inc.php'>Logout</a></li>";
            }
            ?>
        </ul>
</header>