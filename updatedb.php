<?php
	   // Database connection
		  include("config.php");
		  if(config())
		  { 
		    
		    $u1=substr($_POST['clientname'],0,3);
		    $u2=rand(100,999);
		    $username=$u1.$u2;
			
			$query1 = "INSERT INTO client_details (`client_name`, `username`, `password`, `files`) VALUES ('".$_POST['clientname']."', '".$username."', '".str_rand(6, 'alphanum')."', '')";
			$result=mysql_query($query1);
			$structure='./clients/'.$username.'/';
			
			
			if (!mkdir($structure, 0755, false)) {
				die('Failed to create folders...');
			 }

		  }
		  else
		  {  die("Database Selection Failed:".mysql_error());
		  }
		   // redirect to main page
           header("Location:main.php");  
           

function str_rand($length = 6, $seeds = 'alphanum')
{
    // Possible seeds
    $seedings['alpha'] = 'abcdefghijklmnopqrstuvwqyz';
    $seedings['numeric'] = '0123456789';
    $seedings['alphanum'] = 'abcdefghijklmnopqrstuvwqyz0123456789';
    $seedings['hexidec'] = '0123456789abcdef';
    
    // Choose seed
    if (isset($seedings[$seeds]))
    {
        $seeds = $seedings[$seeds];
    }
    
    // Seed generator
    list($usec, $sec) = explode(' ', microtime());
    $seed = (float) $sec + ((float) $usec * 100000);
    mt_srand($seed);
    
    // Generate
    $str = '';
    $seeds_count = strlen($seeds);
    
    for ($i = 0; $length > $i; $i++)
    {
        $str .= $seeds{mt_rand(0, $seeds_count - 1)};
    }
    
    return $str;
}
?>

