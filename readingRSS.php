<?php



 $domOBJ = new DOMDocument();
 $domOBJ->load("https://zaufanatrzeciastrona.pl/feed/");
 $content = $domOBJ->getElementsByTagName('channel');


 foreach ($content as $data) {
  $title = $data->getElementsByTagName("title")->item(0)->nodeValue;
  echo "$title";
  echo "<br>";
}

 
  

 
?>