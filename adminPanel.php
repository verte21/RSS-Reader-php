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
                    <input id= "input-add" type="text" name="feedLinkToAdd" class="form-control" placeholder="Your feed link...">
                </div>

                <div class="text-center m-3">
                    <button id='submit-btn' class="btn btn-info col-4">Add feed</button>
                </div>
            </div>
        </div>

        <div class="row m-1 border border-info border-3 rounded justify-content-center ">
            <div class="row justify-content-center m-2">
            <div class="col-8">
                        <input id="input-search" class="form-control mr-sm-2" type="search" placeholder="Search..." aria-label="Search">
                    </div>
            </div>
            <div class="row justify-content-center">
            <div class="col-4"> 
            <button id='search-btn' class="btn btn-info" type="submit">Search</button>

            </div>

            </div>
                    
                     
                     <h3 class='text-center pt-1'>Feed list: </h3>
                <nav aria-label="Page navigation example">
                    <ul id='pagination' class="pagination justify-content-center">
                        <?php
                            $obj = new UsersView();
                            $obj->printPageNumbers(10, "");
                        ?>         
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js"></script>

    <script>
        $(document).ready(function() {
            const firstActive = () => {$('.page-item').first().addClass('active');}
            firstActive();

          
            $('#feedsFromDb').load("includes/feedSources.inc.php", {
                pageNumber: 1
            });
        
            $("#search-btn").click(function() {
                let queryString = document.getElementById("input-search").value;
                $("#pagination").empty();

                $('#pagination').load("includes/pagesPrinting.inc.php", {
                    rowsPerPage: 10,
                    searchQuery: queryString
                });

                $('#feedsFromDb').load("includes/feedSources.inc.php", {
                    pageNumber: 1,
                    queryString: queryString
                });
               
                $('.page-item').first().addClass('active')
            })

             $(document).on('click', ".page-link" ,function() {
                let pageNumber = $(this).attr('id');
                let queryString = document.getElementById("input-search").value;
                $('#feedsFromDb').load("includes/feedSources.inc.php", {
                    pageNumber: pageNumber,
                    queryString: queryString
                });

                $(".page-link").parent().removeClass('active');
                $(this).parent().addClass('active');
                
            })
            
            $("#submit-btn").click(function() {
                let feedLink = document.getElementById("input-add").value;

                $(this).load("includes/adminAddFeedFromLink.inc.php", {
                    link: feedLink
                });
            })

            $(document).on('click',"td #deleteButton", function() {
                let feedId = $(this).attr("data-feed-id");
                console.log("tutaj");

                $(this).load("includes/adminDeleteFeed.inc.php", {
                    feedId: feedId,
                });
            });
        })
    </script>


</body>

</html>