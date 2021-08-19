<?php



 $domOBJ = new DOMDocument();
 $domOBJ->load("http://feeds.feedburner.com/niebezpiecznik?format=xml");


$channel = $domOBJ->getElementsByTagName('channel');
foreach ($channel as $data) {
  $channelTitle = $data->getElementsByTagName("description")->item(0)->nodeValue;
  echo "$channelTitle";

}


 $content = $domOBJ->getElementsByTagName('entry'); // albo item
 foreach ($content as $data) {
  $title = $data->getElementsByTagName("title")->item(0)->nodeValue;
  $link = $data->getElementsByTagName("link")->item(0)->nodeValue; // moze byc tez id
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