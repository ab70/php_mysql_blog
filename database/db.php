<?php 
   
   $host = "localhost";
   $user = "root";
   $pass = "";
   $db   = "news_project";
   $conn = mysqli_connect($host, $user, $pass, $db );

   //db connection check
   if (!$conn) {
       die("Conenction not stablished".mysqli_connect_error());
   }
   

?>