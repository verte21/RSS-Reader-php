<?php
include "class-autoload.inc.php";
?>

<script>
        $(document).ready(function() {
            $("a[name='feedSiteName']").click(function() {
                var feedLink = $(this).attr("id");
                $('#tableFeeds').load("includes/feedContent.inc.php", {
                    link: feedLink
                });
            })
        })

        $(document).ready(function() {
            var firstFeed = $("a[name='feedSiteName']").first().attr("id");
            $('#tableFeeds').load("includes/feedContent.inc.php", {
                    link: firstFeed
                });
        })

</script>


<div class="container-fluid flex-grow-1 d-flex vh-100">
    <div class="row flex-fill flex-column flex-sm-row">

        <div class="col-sm-3 col-md-2 sidebar flex-shrink-1 bg-dark pt-3 sidebar">
            <ul class="nav flex-sm-column sticky-top pt-1">
                <li>
                    <h2 class="text-light text-center">Your feeds</h2>
                </li>
                <?php
                $obj = new UsersView();
                $obj->showNamesOnNav();
                ?>
            </ul>
        </div>


       
    

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 flex-grow-1 py-3 border rounded bg-info">
    
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <tbody id="tableFeeds">
                            <!-- space for feeds -->
                    </tbody>
                </table>
            </div>
            </main>
        </div>




    </div>
</div>




