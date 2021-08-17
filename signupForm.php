<?php
include 'class-autoload.inc.php';
?>

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

<div class="view " style="height: 100vh; background-image: url('img/template.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center;">

<?php
    include_once 'includes/header.inc.php';
?>


    <!-- orange colour  = RGB  255, 206, 85 -->
    <form class='container-fluid' action='includes/signup.inc.php' method='post'>

            <!-- Content -->
            <div class="container ">
                <!--Grid row-->

                <!--Grid column-->
                <div class="col-md-6 col-xl-5 mb-3">
                    <!--Form-->
                    <div class="card wow fadeInRight" data-wow-delay="0.3s">
                        <div class="card-body">
                            <!--Header-->
                            <div class="text-center">
                                <h3 class="white-text">
                                    <i class="fas fa-user white-text"></i> Register:
                                </h3>
                                <hr class="hr-light">
                            </div>
                            <!--Body-->
                            <div class="md-form">
                                <i class="fas fa-user prefix white-text active"></i>
                                <!-- <input type="text" id="form3" class="white-text form-control"> -->
                                <input type="text" name="login" class="form-control" placeholder="Login...">

                            </div>
                            <div class="md-form">
                                <i class="fas fa-envelope prefix white-text active"></i>
                                <input type="email" name="email" class="form-control" placeholder="Email...">

                                <!-- <input type="email" id="form2" class="white-text form-control"> -->

                            </div>
                            <div class="md-form">
                                <i class="fas fa-lock prefix white-text active"></i>
                                <!-- <input type="password" id="form4" class="white-text form-control"> -->
                                <input type="password" name="password" class="form-control" placeholder="Password...">
                            </div>

                            <div class="md-form">
                                <i class="fas fa-lock prefix white-text active"></i>
                                <!-- <input type="password" id="form4" class="white-text form-control"> -->
                                <input type="password" name="passwordRepeat" class="form-control" placeholder="Repeat password...">
                            </div>


                            <div class="text-center mt-4">
                                <button class="btn btn-indigo">Sign up</button>
                            </div>
                        </div>
                    </div>
                    <!--/.Form-->
                </div>
                <!--Grid column-->
            </div>
            <!-- Content -->
    
        <!-- Full Page Intro -->










    </form>

</div>






    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js"></script>
</body>

</html>