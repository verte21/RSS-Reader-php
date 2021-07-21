<?php
include_once 'includes/header.inc.php';
include 'class-autoload.inc.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action='includes/signup.inc.php' method='post'>
        <div class="form-row col-md-5 ">
             <input type="email" name="email" class="form-control" placeholder="Email...">
            <input type="text" name="login" class="form-control" placeholder="Login...">
            <input type="password" name="password" class="form-control" placeholder="Password...">
            <input type="password" name="passwordRepeat" class="form-control" placeholder="Repeat password...">



        </div>
        <div class="d-flex justify-content-center">
            <button class="btn btn-primary" type="submit" name="submit">Sign In</button>

        </div>

    </form>
</body>

</html>