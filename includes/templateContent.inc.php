<?php
include "class-autoload.inc.php";
?>

<script>
        $(document).ready(function() {
            $("a[name='feedSiteName']").click(function() {
                // TODO do contentu dać id i wczytać na bieżąco 
                var feedLink = $(this).attr("id");
                console.log(feedLink);
            
                $('#tableFeeds').load("includes/feedContent.inc.php", {
                    link: feedLink
                });
               
            })

        })
</script>

<div class="container-fluid flex-grow-1 d-flex h-100 ">
    <div class="row flex-fill flex-column flex-sm-row">
        <div class="col-sm-3 col-md-2 sidebar flex-shrink-1 bg-dark pt-3">
            <ul class="nav flex-sm-column">
                <li>
                    <h2 class="text-light">Your feeds</h2>
                </li>
                <?php
                $obj = new UsersView();
                $obj->showNamesOnNav();
                ?>
            </ul>
        </div>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 flex-grow-1 py-3">
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <tbody id="tableFeeds">


                    </tbody>
                </table>
            </div>
            </main>


        </div>


    </div>




</div>