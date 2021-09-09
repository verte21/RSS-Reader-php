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

        <div class="row m-2">
                <h3 class='text-center pt-4'>Your feeds: </h3>
                <table class='table rounded table-sm table-primary table-striped text-center shadow'>
                    <tbody id="feedsFromDb">
                        <?php
                            $obj = new UsersView();
                            $obj->showNamesForManageFeedsTable()
                        ?> 
                    </tbody>
                </table>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $("button[name='deleteFeed']").click(function() {
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