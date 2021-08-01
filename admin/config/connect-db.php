<?php

  

  $mysqli = mysqli_connect("localhost", "root", "", "litbang", 3306); 
  
  if(!$mysqli){
  	die('error: '. mysqli_connect_error());
  }

?>