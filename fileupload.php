<?php

  if ($_FILES["file"]["error"] > 0)
  {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
  }
  else
  {   
      $username=$_GET['uid'];
	  $filename=$_FILES[$username]["name"];
	  $filepath="./clients/" . $username . "/" . $filename;
	  
	  move_uploaded_file($_FILES[$username]["tmp_name"],
	  $filepath);
	  
	  // Database connection
	      include("config.php");
		  if(config())
		  { 
		    //select previous list of files
		    $filequery = "SELECT files FROM client_details WHERE username ='".$username."'";
			$resultfiles=mysql_query($filequery);
			
			while($row = mysql_fetch_array($resultfiles))
			{   
			    if($row['files']!= NULL && $filename!= NULL)
			    {
			    	$filename=$row['files'].", ".$filename;
				}
				else if($row['files']!= NULL)
				{
				  $filename=$row['files'];
				}
				/*
				if($row['files_path']!= NULL && $filename!= NULL)
			    {
			   	 $filepath=$row['files_path'].", ".$filepath;
				}
				else if($row['files_path']!= NULL && $filename == NULL)
				{
				  $filepath=$row['files_path'];
				}
				else if($row['files_path'] == NULL && $filename== NULL)
				{
				  $filepath="";
				}
				*/
			}
			
			// update file details
			
				$query1="UPDATE client_details SET  files ='".$filename."' WHERE username ='".$username."'";
			    $result=mysql_query($query1);
				
			
		  
		  }
		  else
		  {  die("Database Selection Failed:".mysql_error());
		  }
		  
	      header("Location:main.php");  // redirect  
    }
?>