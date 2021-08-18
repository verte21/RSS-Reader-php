<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RSS-Reader</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <style>

    </style>
</head>

<body>
    <div class="view " style="height: 100vh; background-image: url('img/template.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center;">
        <?php
        include_once 'includes/header.inc.php';
        ?>


        <div class="container h-75 align-items-center">

            <form action='includes/login.inc.php' method='post'>

                <div class="row py-5 justify-content-center text-center">
                    <div class="col-4 bg-myOrange">
                        <h4>Log in</h4>

                        <div class="text-center m-3">
                            <input type="text" name="login" class="form-control" placeholder="Login...">
                        </div>

                        <div class="text-center m-3">


                            <input type="password" name="password" class="form-control" placeholder="Password...">

                        </div>

                        <div class="text-center m-3">
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </div>


                    </div>

            </form>

        </div>


    </div>





    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js"></script>
</body>

</html>