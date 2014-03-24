<?php

// Database connection
	include("config.php");
	  if(config())
	  { 		  
		rrmdir("./clients/".$_GET['id']);
		mysql_query("delete from client_details where username='".$_GET['id']."'");
		header("Location:main.php");   		  
	  }
	  else
	  {  die("Database Selection Failed:".mysql_error());
	  }

   function rrmdir($dir) {
   if (is_dir($dir)) {
     $objects = scandir($dir);
     foreach ($objects as $object) {
       if ($object != "." && $object != "..") {
         if (filetype($dir."/".$object) == "dir") rrmdir($dir."/".$object); else unlink($dir."/".$object);
       }
     }
     reset($objects);
     rmdir($dir);
   }
 }
		
?>