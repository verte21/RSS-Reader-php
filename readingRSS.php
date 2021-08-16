<?php



 $domOBJ = new DOMDocument();
 $domOBJ->load("https://techcommunity.microsoft.com/gxcuf89792/rss/Category?category.id=ITOpsTalk&interaction.style=forum");


$channel = $domOBJ->getElementsByTagName('channel');
foreach ($channel as $data) {
  $channelTitle = $data->getElementsByTagName("description")->item(0)->nodeValue;
  echo "$channelTitle";

}


 $content = $domOBJ->getElementsByTagName('item');
 foreach ($content as $data) {
  $title = $data->getElementsByTagName("title")->item(0)->nodeValue;
  $link = $data->getElementsByTagName("link")->item(0)->nodeValue;
  echo    "<tr>
              <td>$title</td>
              <td><a href='$link'>Czytaj...</a></td>
              <br>
          </tr>";
}


  //$title = $domOBJ->getElementsByTagName("title")->item(0)->nodeValue;
  // echo "$title";
  // echo "<br>";


 
  

 
?>