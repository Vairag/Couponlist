<?php
error_reporting( E_ALL & ~E_NOTICE );
/* require the user as the parameter */
if(isset($_GET['user'])) {

	/* soak in the passed variable or set our own */
	// Sample URL - http://localhost/GGAdmin/services.php?user=Gun726&pwd=863z6c&files=Nidhi_surat_BBA.jpg
	//http://www.icouponlist.com/services.php?user=Ban622&pwd=j7huki&files=d1.jpg
	
	$format = strtolower($_GET['format']) == 'xml' ? 'xml' : 'json'; //xml is the default
	
	$user_id = $_GET['user']; //no default
    $pwd=$_GET['pwd'];
	$files=$_GET['files'];
	
	/* connect to the db */
    include("config.php");
	$db_select=config();
	//echo $files;
	
	$files_array=array();
	$tok = strtok($files, ", ");
	while ($tok !== false) {
	
    $files_array[]=$tok; 
    $tok = strtok(", ");
    }
	
	
	/* grab the posts from the db */
	$query = "SELECT files FROM client_details WHERE username ='".$user_id."' and password ='".$pwd."'  ";
	//$result = mysql_query($query) or die('Errant query:  '.$query);
	$result = mysql_query($query);
	
	/* create one master array of the records */
	$posts = array();
	$result_files=array();
	if(mysql_num_rows($result)) {
		while($post = mysql_fetch_assoc($result)) {
		  			 
			$db_files_array=array();
			$tok = strtok($post['files'], ", ");
			while ($tok !== false) {
			
			$db_files_array[]=$tok; 
			$tok = strtok(", ");
			}
					
			foreach ($db_files_array as $db_file)
			{  $flag="N";
			   foreach ($files_array as $url_file)
			   {
			     if($url_file == $db_file)
				 {
				   $flag="Y";
				 }
				 
			   }
			   if($flag!="Y")
			   {
			     $result_files[]=$db_file;
			   }
			}
			
			$rootpath="http://www.icouponlist.com/clients/".$user_id."/";
			foreach ($result_files as $f)
			{
			   $posts[]=$rootpath.$f;
			}
			//print_r($posts);
			//$posts[] = array('Results'=>$post);
		}
		header('Content-type: application/json');
		echo json_encode(array('Results'=>$posts));
	}
    else
	{   
	    $posts[]="Invalid username or password !";
	    header('Content-type: application/json');
		echo json_encode(array('Results'=>$posts));
	
	}
	
}
?>