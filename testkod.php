<div class="content">

 <form method="post" action="">
  <input type="text" name="feedurl" placeholder="Enter website feed URL">&nbsp;<input type="submit" value="Submit" name="submit">
 </form>
 <?php

 $url = "https://zaufanatrzeciastrona.pl/post/category/drobiazgi/feed/";
 if(isset($_POST['submit'])){
   if($_POST['feedurl'] != ''){
     $url = $_POST['feedurl'];
   }
 }

 $invalidurl = false;
 if(@simplexml_load_file($url)){
  $feeds = simplexml_load_file($url);
 }else{
  $invalidurl = true;
  echo "<h2>Invalid RSS feed URL.</h2>";
 }


 $i=0;
 if(!empty($feeds)){

  $site = $feeds->channel->title;
  $sitelink = $feeds->channel->link;

  echo "<h1>".$site."</h1>";
  foreach ($feeds->channel->item as $item) {

   $title = $item->title;
   $link = $item->link;
   $description = $item->description;
   $postDate = $item->pubDate;
   $pubDate = date('d - m - Y   H:i',strtotime($postDate));


   
   if($i>=5) break;
  ?>
   <div class="post">
     <div class="post-head">
       <h2><a class="feed_title" href="<?php echo $link; ?>"><?php echo $title; ?></a></h2>
       <span><?php echo $pubDate; ?></span>
     </div>
     <div class="post-content">
       <?php echo implode(' ', array_slice(explode(' ', $description), 0, 20)) . "..."; ?> <a href="<?php echo $link; ?>">Read more</a>
     </div>
   </div>

   <?php
    $i++;
   }
 }else{
   if(!$invalidurl){
     echo "<h2>No item found</h2>";
   }
 }
 ?>
</div>