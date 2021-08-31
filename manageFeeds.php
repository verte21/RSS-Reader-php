<?php
session_start();
include "class-autoload.inc.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RSS-Reader</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <style>
        .bg-myOrange {
            background-color: #FFD154;
        }
    </style>

</head>



<body class="h-100">

    <div class="content bg-myOrange align-items-center" style="height: 100vh">
        <?php
        include_once 'includes/header.inc.php';
        ?>

        <div class="row m-2">
            <form class='border border-info border-3 rounded' action="includes/addFeed.inc.php" method='post'>
                <h3 class='text-center pt-4'>Your feeds: </h3>
                <table class='table rounded table-sm table-primary table-striped text-center'>
                    <tbody id="feedsFromDb">
                        <?php
                            $obj = new UsersView();
                            $obj->showNamesForManageFeedsTable()
                        ?>
                    </tbody>
                </table>
            </form>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $("p[name='deleteFeed']").click(function() {
                var feedLink = $(this).attr("id");

                $(this).load("includes/deleteFeedFromUserDb.inc.php", {
                    link: feedLink,
                });
            })

        })
    </script>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js"></script>
</body>

</html>