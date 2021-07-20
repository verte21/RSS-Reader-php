
<?php
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


    <form>
        <div class="mb-3 text-center">
            <label for="exampleInputEmail1" class="form-label">Login</label>

            <div class="row justify-content-center">
                <div class="col-md-5">
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                </div>

            </div>
        </div>

        <div class="mb-3 text-center">
            <label for="exampleInputPassword1" class="form-label">Password</label>

            <div class="row justify-content-center">
                <div class="col-md-5">
                    <input type="password" class="form-control align-self-center" id="exampleInputPassword1">

                </div>

            </div>

        </div>
        <div class="col-md-12">
            <div class="text-center">
                <button type="submit" class="btn btn-primary ">Submit</button>
            </div>
        </div>
    </form>






    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js"></script>
</body>

</html>