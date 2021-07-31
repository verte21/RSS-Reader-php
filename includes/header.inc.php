<body>

    <nav class="navbar navbar-light bg-dark justify-content-center">
        <ul class="nav nav-pills nav-fill ">

            <?php
            if (isset($_SESSION['logged_id']))
            echo "<li class='nav-item px-5 border border-primary'><a class='nav-link' href='#'>{$_SESSION["login"]}</a></li>";
            ?>

            <li class="nav-item"><a class="nav-link " href="index.php">Home</a></li>

            <?php
            if (!isset($_SESSION['logged_id'])) {
                echo '<li class="nav-item"><a class="nav-link" href="loginForm.php">Login</a></li>
                               <li class="nav-item"><a class="nav-link" href="signUpForm.php">Sign Up</a></li>';
            }
            ?>

            <li class="nav-item"><a class="nav-link" href="#">Random feed</a></li>
            <li class="nav-item"><a class="nav-link" href="#">About Us</a></li>
            <li class="nav-item"><a class="nav-link" href="includes/logout.inc.php">Log Out</a></li>

            <!-- <?php
                if (isset($_SESSION['logged_id']))
                    echo ' <li class="nav-item"><a class="nav-link" href="includes/logout.inc.php">Log Out</a></li>';
            ?> -->
        </ul>

    </nav>
</body>