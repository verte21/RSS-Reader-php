<?php
 session_start();
    require_once 'includes/heading.inc.php';
?>

<body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js"></script>

<?php
        require_once 'includes/header.inc.php';

    if (isset($_SESSION['logged_id'])) {
        include_once 'includes/templateContent.inc.php';
    } else {
         include_once 'includes/startingPage.inc.php';
    }
?>
  </body>
</html>