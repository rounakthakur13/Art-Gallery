<?php
    $servername='localhost';
    $username='root';
    $password='';
    $dbname = 'art_gallery';
    global $conn;
    $conn=mysqli_connect($servername,$username,$password,$dbname);
      if(!$conn){
          die('Could not Connect MySql Server:' .mysql_error());
        }
?>