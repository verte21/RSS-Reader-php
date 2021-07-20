<?php
    // Create connection
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $name = 'rss projekt';

    $con = mysqli_connect($host, $user, $pass, "rss projekt");
    // Check connection
    if (mysqli_connect_errno()) {
    echo "Database connection failed!: " . mysqli_connect_error();
    }

    $sql = "SELECT * FROM rss_info ORDER BY id DESC LIMIT 20";
    $query = mysqli_query($con,$sql);

    header( "Content-type: text/xml");

    echo "<?xml version='1.0' encoding='UTF-8'?>
    <rss version='2.0'>
    <channel>
    <title>w3schools.in | RSS</title>
    <link>/</link>
    <description>Cloud RSS</description>
    <language>en-us</language>";

    while($row = mysqli_fetch_array($con,$query)){
    $title=$row["title"];
    $link=$row["link"];
    $description=$row["description"];

    echo "<item>
    <title>$title</title>
    <link>$link</link>
    <description>$description</description>
    </item>";
    }
    echo "</channel></rss>";
?>