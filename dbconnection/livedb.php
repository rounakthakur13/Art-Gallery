<?php
    $servername='localhost';
    $username='id14255986_root';
    $password='zmA(a97(rA8[Ov&|';
    $dbname = 'id14255986_art_gallery';
    global $conn;
    $conn=mysqli_connect($servername,$username,$password,$dbname);
      if(!$conn){
          die('Could not Connect MySql Server:' .mysql_error());
        }
?>