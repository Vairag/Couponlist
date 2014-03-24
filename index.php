<?php error_reporting (E_ALL ^ E_NOTICE); ?>
<html>
<head>
    <link href="loginstyle.css" rel="stylesheet" type="text/css"/>
	<script type="text/javascript">
	function cancelForm()
	{  
		document.forms["loginform"]["usrname"].value="";
		document.forms["loginform"]["pwd"].value="";
		
	}
    </script>	
</head>
<body>
<div id="logo"><img src="img/apps_title.png" width=300px height=80px/></div>
<div id="area">
<form name="loginform" action="checklogin.php" method="post" enctype="multipart/form-data" >


	<input name="usrname" id="usrname" type="text" required="required"/><br/>
    <input name="pwd" id="pwd" type="password" required="required"/><br/>
	<input type="submit" id="buttonsubmit" value="LOGIN"/>
	<input type="button" id="buttoncancel" value="CANCEL" onclick="return cancelForm()"/>
	<br/>
	<br/>
	
	<div id="fillerror" >
	
		   <?php
		        
		       if($_GET['err']=="failed")
			    {
			     echo "Username or Password is not correct!";
			    }
				if($_GET['err']=="success")
				{
			     echo "Password is sent to your email!";
				}
			
		   ?>
    </div>  
</form><br/>
<a href="checklogin.php?err=forgot">Forgot your Password ?</a><br/>
</a><br/><br/><br/><br/><br/><br/>
</div>
<div class="details">
This is Test environment of actual Admin Panel created for <a href="http://www.icouponlist.com/" target="_blank">icouponlist</a>.<br>
Test username & password is superpower.
<br><br>
It maintains list of clients, generate client's username and password. And based on it allows usage services in icoupon Android app.<br>
See the allowed files for test user via Restful service <a href="http://studystuff.24.eu/couponlist/services.php?user=Tri526&pwd=wpqj5s&files=d1.jpg" target="_blank">here</a>.
<br><br>
By : Vairag  Godhani
<br>
</div>
 
</body>
</html>
