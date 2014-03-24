<?php
 // Database connection
include("config.php");		 
		 
		 if($_GET['err']=="forgot")
		   {    
		       if(config()) 
			   {
			     $result=mysql_query("SELECT * FROM admin");
				while($row = mysql_fetch_array($result))
				{
				   $message = "Dear Admin, 
				   Below is your Admin credentials. 
				   Username : ".$row['adminname']." 
				   Password : ".$row['adminpwd']."\nRegards\nYour CoupenList Team";
				}
			    
				$to2 = "jty@nakialtech.ca";
				//$to3 = "gunjan.kalariya@solution-hawk.com";
				$subject = "Your Password at CoupenList !";
				
				$from = "jty@nakialtech.ca";
				$headers = "From:" . $from;
				
				mail($to2,$subject,$message,$headers);
				//mail($to3,$subject,$message,$headers);
				
		        header("Location:index.php?err=success");
			 }
		   }
          else if(config())
		  { 	  
		    //echo "db selected" ;
			$result=mysql_query("SELECT * FROM `admin` WHERE `adminname`='".$_POST['usrname']."' and `adminpwd`='".$_POST['pwd']."'");
			
			$row = mysql_num_rows($result);
			if($row)
			{
		      session_start();
			  
			  //session_register("adminname");
			  
			  $_SESSION['adminname']=$_POST['usrname'];
			 
			header("Location:main.php");
			}
			else
			{  
			  header("Location:index.php?err=failed");
			
			}
           }
		   
?>