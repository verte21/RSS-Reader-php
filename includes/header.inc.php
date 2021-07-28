<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.css">

</head>

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



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js"></script>
</body>

</html>