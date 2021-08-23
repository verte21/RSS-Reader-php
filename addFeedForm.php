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

        <div class="row m-2" name="inputLink">
            <form class='border border-info border-3 rounded' action="includes/addFeed.inc.php" method='post'>
                <h3 class='text-center pt-4'>Paste your feed link here</h3>
                <div class="text-center m-3">
                    <input type="text" name="feedLinkToAdd" class="form-control" placeholder="Your feed link...">
                </div>

                <div class="text-center m-3">
                    <button type="submit" name="submit" class="btn btn-info">Add feed</button>
                </div>
            </form>
        </div>

        <div class="row m-2">
            <form class='border border-info border-3 rounded' action="includes/addFeed.inc.php" method='post'>
                <h3 class='text-center pt-4'>Or choose from our base</h3>
                <table class='table rounded table-sm table-primary table-striped text-center'>
                    <tbody id="feedsFromDb">

                        <?php
                        $obj = new UsersView();
                        $obj->showNamesOnAddFeed(5)
                        ?>
                    </tbody>
                </table>
            </form>


        </div>


    </div>








    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $("p[name='addFeed']").click(function() {
                var feedLink = $(this).attr("id");
                var feedIdInDb = $(this).attr("data-feed-id-in-db");

                $(this).load("includes/addFeedFromBase.inc.php", {
                    link: feedLink,
                    id: feedIdInDb
                });
            })

            // $("p[name='addFeed']").on("click",  function() {
            //     var feedLink = $(this).attr("id");
            //     var feedIdInDb = $(this).attr("data-feed-id-in-db");
        
            //     $("html").load("includes/addFeedFromBase.inc.php", {
            //             link: feedLink,
            //             id: feedIdInDb
            //     });
            // });

        })
    </script>

  
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js"></script>
</body>

</html>