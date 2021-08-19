<?php
        session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RSS-Reader</title>
    <link rel="stylesheet" href="css/bootstrap.css">

</head>



<body class="h-100">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js"></script>

    

    <div class="view" style="height: 100vh; background-image: url('img/rss-feed-reader-startpage.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center;">

        <?php
        include_once 'includes/header.inc.php';
        ?>

        <?php
        if (isset($_SESSION['logged_id'])) {
            include_once 'includes/templateContent.inc.php';
        } else {
            // include_once 'includes/startingPage.inc.php';
        }
        ?>

    </div>





        

    <!--TODO <?php
                include_once 'includes/footer.inc.php';
                ?> -->


</body>

</html>