<html>
<head><title>LOGIN</title></head>
<body>
<?php

	session_start();
	
	$username = adminpanel_BEBIO;
	$password = $_POST['password'];
	
	if($username&&$password)
	{
		$connect = mysql_connect("localhost", "kozle1_bebio", "bebio123") or die("Connection to DB failed!");
			
		mysql_select_db("kozle1_bebio")or die("Connection failed!");
		
		$query = mysql_query("SELECT * FROM `login` WHERE `username` = '$username' LIMIT 1");
		
		$numrows = mysql_num_rows($query);
		
		if($numrows !==0){
			while($row = mysql_fetch_assoc($query)){
				
				$pass = md5($password);
				$dbusername = $row['username'];
				$dbpassword = $row['password'];
				$id = $row['id'];
			}
			if($username == $dbusername && ($pass)==$dbpassword){
				$_SESSION['username'] = $username;
				$_SESSION['id'] = $id;
				
				header("Location: control.php");
				 

			} else
				echo "Your password is incorrect!"; ?>
					
				<?php
		} else
			die("That user does not exist!");
	} else
		die("Please enter a username and password!");
?>
</html>