<?php 
     session_start();
    include_once 'includes/header.inc.php';
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
<body>
    <script>
        $(document).ready(function() {
            $("#feedSiteName").click(function() {
                // TODO do contentu dać id i wczytać na bieżąco 
               // $("#feedSiteName").id;
            })


        })
    </script>
    <?php
    if(isset($_SESSION['logged_id'])){
        include_once 'includes/content.inc.php';
        
    } else {
        echo "WITAJ";
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" 
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js"></script>
</body>
</html>