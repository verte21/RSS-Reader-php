<?php
        include 'class-autoload.inc.php';
        require_once 'includes/heading.inc.php';
        require_once 'includes/functions.inc.php';

?>


<body>

    <div class="view " style="height: 100vh; background-image: url('img/template.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center;">

        <?php
        include_once 'includes/header.inc.php';
        ?>

        <div class="container h-90 align-items-center">

            <form action='includes/signup.inc.php' method='post'>

                <div class="row py-5 justify-content-center text-center">
                    <div class="col-4 bg-myOrange">
                        <h4>Register</h4>

                        <div class="text-center m-3">
                            <input type="text" name="login" class="form-control" placeholder="Login...">
                        </div>
                        <div class="text-center m-3">
                            <input type="email" name="email" class="form-control" placeholder="Email...">
                        </div>
                        <div class="text-center m-3">
                            <input type="password" name="password" class="form-control" placeholder="Password...">
                        </div>
                        <div class="text-center m-3">
                            <input type="password" name="passwordRepeat" class="form-control" placeholder="Repeat password...">
                        </div>
                        <div class="text-center m-3">
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </div>

                        <?php
                            if (isset($_GET["err"])) {
                                printInputError($_GET["err"]);
                            }
                        ?>

                    </div>

                </div>
            </form>
        </div>






        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="js/bootstrap.js"></script>
</body>

</html>