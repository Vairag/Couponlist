<?php
session_start();
if(!isset($_SESSION['adminname']))
{
   header("Location:index.php");
}
?>
<html>
<head>
<link href="mainstyle.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript">
function validateForm()
{
 document.getElementById('createclient').innerHTML="<form action='updatedb.php' method='post' enctype='multipart/form-data'>Enter ClientName : <input name='clientname' style='height:32px;width:200px;' required='required' type='text'/> <input type='submit' id='create' value='Create'/> </form>"; 
}


</script>
</head>

<body>
<div id="logo"><img src="img/apps_title.png" width=300px height=80px/></div>
<input type="button" id="newclient" value="New Client" onclick="return validateForm()"/>
<input type="button" id="changepwd" value="Change Password" ONCLICK="window.location.href='changepwd.php'"/>
<input type="button" id="logout" value="Logout" ONCLICK="window.location.href='index.php'"/>
<div id="welcome">
<?php
      echo "Welcome, Dear &nbsp;".$_SESSION['adminname']."<br />";
?>
</div>
<div id="createclient">
</div>

<?php
	    // Database connection
		  include("config.php");
		  if(config())
		  { 
		  
			$query1 = "SELECT * FROM client_details";
			$result=mysql_query($query1);
			$print="<table id='maintable' border='1'> 
						<tr>
							<th>Client Name</th>
							<th>User Name</th>
							<th>Password</th>
							<th>Select file</th>
							<th>Upload file</th>
							<th>Uploaded files</th>
							<th>Delete Clients</th>
						</tr>";	
			while($row = mysql_fetch_array($result))
            {
			   $print=$print."
				 	    <tr>
							<td > ".$row['client_name']." </td>
							<td > ".$row['username']." </td>
							<td > ".$row['password']." </td>
		                    <form action='fileupload.php?uid=".$row['username']."' method='post' enctype='multipart/form-data'>  				
							<td > <input type='file' name='".$row['username']."'/> </td>
							<td > <input type='submit' id='upload' value='Upload'> </td>
							</form>
							<td > ".$row['files']." </td>
							<td > <input type='button' id='delete' value='Delete Client' ONCLICK='window.location.href=\"deleteclient.php?id=".$row['username']."\"'/></td>
							
						</tr>";	
					
			}
			echo $print."</table>";	
			
		  }
		  else
		  {  die("Database Selection Failed:".mysql_error());
		  }  
		// header("Location:main.php");  // redirect
?><br>
<form id="provider_form" action='addprovider.php?' method='post' enctype='multipart/form-data'>  				
							 <input type='text' style='height:32px;width:200px;' required='required' name='provider_name' value="add provider name..."/> 
							 <select name="provider_type" style='height:32px;width:100px;' required='required'>
								  <option value="Text">Text</option>
								  <option value="URL">URL</option>
								  <option value="Code">Code</option>
							 </select>
							 <input style='height:32px;width:200px;' required='required' type='text' name='start_position' value="add start position..."/> 
							 <input style='height:32px;width:200px;' required='required' type='text' name='end_position' value="add end position..."/> 
							<input type='submit' id="add" value="ADD"/> 
</form>
<?php
	    // Database connection
		  if(config())
		  { 
		  
			$query1 = "SELECT * FROM provider_list";
			$result=mysql_query($query1);
			$print="<table id='maintable' border='1'> 
						<tr>
							<th>Provider Name</th>
							<th>Provider Type</th>
							<th>Start Position</th>
							<th>End Position</th>
							<th>Delete Provider</th>
							
						</tr>";	
			while($row = mysql_fetch_array($result))
            {
			   $print=$print."
				 	    <tr>
							<td > ".$row['provider_name']." </td>
							<td > ".$row['provider_type']." </td>
							<td > ".$row['start_position']." </td>
							<td > ".$row['end_position']." </td>
							<td > <input type='button' id='p_delete' value='Delete' ONCLICK='window.location.href=\"deleteprovider.php?p_id=".$row['provider_id']."\"'/></td>
						</tr>";	
					
			}
			echo $print."</table>";	
			
		  }
		  else
		  {  die("Database Selection Failed:".mysql_error());
		  }  
		// header("Location:main.php");  // redirect
?>
</body>
</html>
