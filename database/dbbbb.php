<?php 
    $host = "localhost";
    $user = "root";
    $dbname = "nested";
    $pass = "";
    $conn = mysqli_connect($host,$user, $pass, $dbname);
    
    $sql = "SELECT  * FROM lecture";
    $sqlRun = mysqli_query($conn, $sql);
    
    
    if(!$conn){
    	echo 'connection error';
    }
    $jrow = array();
  while ($row = mysqli_fetch_assoc($sqlRun)) {
  	
  	$jrow[] = $row;
  }
   $jsrow = json_encode($jrow);
   echo $jsrow; 

 ?>