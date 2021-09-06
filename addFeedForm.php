<?php
session_start();
include "class-autoload.inc.php";
require_once 'includes/heading.inc.php';
?>

<body class="h-100">

    <div class="content bg-myOrange align-items-center" style="height: 100vh">
        <?php
        include_once 'includes/header.inc.php';
        ?>

        <div class="row m-2" name="inputLink">
            <div class='border border-info border-3 rounded'>
                <h3 class='text-center pt-4'>Paste your feed link here</h3>
                <div class="text-center m-3">
                    <input id= "input" type="text" name="feedLinkToAdd" class="form-control" placeholder="Your feed link...">
                </div>

                <div class="text-center m-3">
                    <button id='submit-btn' class="btn btn-info col-4">Add feed</button>
                </div>
            </div>
        </div>
        <div class="row m-2">
            <div class='border border-info border-3 rounded'>
                <h3 class='text-center pt-4'>Or choose from our base</h3>
               
                <table class='table rounded table-primary table-hover table-sm table-striped text-center'>
                    <tbody id="feedsFromDb">
                        <?php
                        $obj = new UsersView();
                        $obj->showNamesOnAddFeed(5)
                        ?>
                    </tbody>
                </table>
            
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $("button[name='addFeed']").click(function() {
                let feedLink = $(this).attr("id");
                let feedIdInDb = $(this).attr("data-feed-id-in-db");

                $(this).load("includes/addFeedFromBase.inc.php", {
                    link: feedLink,
                    id: feedIdInDb
                });
            })


            $("#submit-btn").click(function() {
                let feedLink = document.getElementById("input").value;

                $(this).load("includes/addFeedFromLink.inc.php", {
                    link: feedLink,
                });
            })

        })
    </script>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js"></script>
</body>

</html>