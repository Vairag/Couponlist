<?php

// Database connection
	include("config.php");
	  if(config())
	  { 		  
		
		mysql_query("delete from provider_list where provider_id='".$_GET['p_id']."'");
		header("Location:main.php");   		  
	  }
	  else
	  {  die("Database Selection Failed:".mysql_error());
	  }

   
 
		
?>