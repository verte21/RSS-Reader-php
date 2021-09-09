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
        
            let firstFeed = $("a[name='feedSiteName']").first().attr("id");
            if (firstFeed == undefined) {
              $('#tableFeeds').load("includes/emptyFeedList.inc.php");
            } else {
               $('#tableFeeds').load("includes/feedContent.inc.php", {
                    link: firstFeed
                });
            }
            
        })

</script>


<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-myGreen sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
        <li>
                    <h2 class="text-myBlue text-center">Your feeds</h2>
                </li>
                <?php
                  $obj = new UsersView();
                  $obj->showNamesOnNav();
                ?>

        </ul>
      </div>
    </nav>



    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-3">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 border-bottom">
                <table class="table shadow table-striped table-hover">
                    <tbody id="tableFeeds">
                            <!-- space for feeds -->
                    </tbody>
                </table>
            </div>
        </div>
      </div>
    </main>
    
  </div>
</div>




