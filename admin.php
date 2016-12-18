<?php
require 'dbconn.php'; 
echo file_get_contents("views/top.html");
?>

<body>
<video autoplay loop muted class="bgvideo hide-on-small-only" id="bgvideo"> 
	<source src="vid/vid2.mp4" type="video/mp4">
	</video>
<div class="container">
<div class="col s10 center">

<br class="hide-on-med-and-down" /><br class="hide-on-med-and-down" /><br class="hide-on-med-and-down" /><br /><br />
<div class="bordered">
<h2 style="color:white;">ВЛЕЗТЕ В АДМИН ПАНЕЛ</h2><hr />
	<form style="color: white; text-align: center;" action="login.php" method="post">
		<input style="width: 80%;" type="text" name="username" placeholder="Въведете администраторско име" required>
		<input style="width: 80%;" type="password" name="password" placeholder="Въведете администраторска парола" required>
		<input style="width: 80%; color: black;" type="submit" value="LOGIN" name="submit">
	</form><hr /></div>
	</div></div>
</body>
</html>