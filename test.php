<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.87.0">
    <title>Dashboard Template · Bootstrap v5.1</title>

    <link rel="stylesheet" href="css/bootstrap.css">
    
    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.1/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.1/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.1/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#7952b3">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow justify-content-center">
  <ul class="nav nav-pills nav-fill">
            <?php
            if (isset($_SESSION['logged_id']))
                echo "<li class='nav-item px-5 border border-primary'><a class='nav-link' href='#'>{$_SESSION["login"]}</a></li>";
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

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">

        <li>
                    <h2 class="text-myBlue text-center">Your feeds</h2>
                </li>
                <?php
                $obj = new UsersView();
                $obj->showNamesOnNav();
                ?>


        </ul>
      </div>
    </nav>



    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <div class="table-responsive">
                <table class="table table-striped table-sm ">
                    <tbody id="tableFeeds">
                            <!-- space for feeds -->
                    </tbody>
                </table>
            </div>

        </div>
      </div>

      
      </div>
    </main>
  </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>
