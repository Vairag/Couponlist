<?php
	/* soak in the passed variable or set our own */
	// Sample URL - http://localhost/GGAdmin_new/provider_list_services.php
	//http://www.icouponlist.com/services.php?user=Ban622&pwd=j7huki&files=d1.jpg
	$format = strtolower($_GET['format']) == 'xml' ? 'xml' : 'json'; //Json is the default
	
	/* connect to the db */
    include("config.php");
	$db_select=config();
	
	/* grab the posts from the db */
	$query = "SELECT * FROM provider_list";
	$result = mysql_query($query);
	
	/* create one master array of the records */
	$posts = array();
	$result_files=array();
	if(mysql_num_rows($result)) {
		while($post = mysql_fetch_assoc($result)) {
			   $posts[]=$post;
		}
		header('Content-type: application/json');
		echo json_encode(array('Results'=>$posts));
	}
    else
	{   
	    $posts[]="Invalid User";
	    header('Content-type: application/json');
		echo json_encode(array('Results'=>$posts));
	
	}

?>