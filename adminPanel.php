<?php
    session_start();
    include "class-autoload.inc.php";
    require_once 'includes/heading.inc.php';
    if ($_SESSION["login"] != "Test123"){
        header("Location:index.php");
    }
?>

<body class="h-100">

    <div class="content bg-myOrange align-items-center" style="height: 100vh">
        <?php
        include_once 'includes/header.inc.php';
        ?>
        
        <div class="row m-2" name="inputLink">
            <div class='border border-info border-3 rounded'>
                <h3 class='text-center pt-4'>Add feed to base</h3>
                <div class="text-center m-3">
                    <input id= "input" type="text" name="feedLinkToAdd" class="form-control" placeholder="Your feed link...">
                </div>

                <div class="text-center m-3">
                    <button id='submit-btn' class="btn btn-info col-4">Add feed</button>
                </div>
            </div>
        </div>

        <div class="row m-1 border border-info border-3 rounded justify-content-center ">
                <h3 class='text-center pt-4'>Feed list: </h3>
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                       
                                   <?php
                                        $obj = new UsersView();
                                        $obj->printPageNumbers(10);
                                   ?>
                        
                                    <li class="page-item">
                    </ul>
                </nav>

                <div class="col-10">
                <table class='table rounded table-primary table-striped text-center table-hover shadow p-1'>
                    <tbody id="feedsFromDb">
                        
                    </tbody>
                </table>

                </div>
               
                

        </div>

    </div>

    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {

            $('#feedsFromDb').load("includes/feedSources.inc.php", {
                    pageNumber: 1
                });
            $('.page-item').first().addClass('active');

            $(".page-link").click(function() {
                let pageNumber = $(this).attr('id');
                console.log(pageNumber);
                $('#feedsFromDb').load("includes/feedSources.inc.php", {
                    pageNumber: pageNumber
                });
                $(".page-link").parent().removeClass('active');
                $(this).parent().addClass('active');
                
            })
        

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