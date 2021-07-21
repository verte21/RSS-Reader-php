<?php



 $domOBJ = new DOMDocument();
 $domOBJ->load("https://zaufanatrzeciastrona.pl/post/category/drobiazgi/feed/");

 $content = $domOBJ->getElementsByTagName('item');
 
 foreach( $content as $data )
 {
   $title = $data->getElementsByTagName("title")->item(0)->nodeValue;
   $link = $data->getElementsByTagName("link")->item(0)->nodeValue;
   echo "$title :: $link";
   echo "<br>";

 }
?>