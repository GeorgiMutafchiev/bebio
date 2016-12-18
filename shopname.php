<?php
require 'dbconn.php'; 
?>
<html>
<head><title>E-SHOP</title>
<link rel="icon" href="img/logonav.png">
<meta charset="UTF-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0"/>    
	<title>Начало</title>
    <script src="js/jquery.js" type="text/javascript" ></script>
	<link href="css/materialize.css" rel="stylesheet" />
    <link href="tipuesearch/tipuesearch.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet" />
	<link href="css/animate.css" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="js/materialize.js" type="text/javascript" ></script>
    <script src="js/scroll.js" type="text/javascript" ></script>
	<script src="js/javascript.js" type="text/javascript" ></script>

</head>

<body>
<video autoplay loop muted class="bgvideo hide-on-small-only" id="bgvideo"> 
	<source src="vid/vid2.mp4" type="video/mp4">
	</video>
	<div class="navbar-fixed" id="main">
    
<nav class="nav1">
    <div class=" nav1">
        <img class="brandImg1 hide-on-med-and-down" src="img/logonav.png" />
      <a href="index.html" style="margin-left: 3%; font-size: 45px; font-family: Century Gothic;" class="brand-logo hide-on-med-and-down fname"></a>
	  <a href="index.html" class="brand-logo hide-on-large-only fname2">BEBIO</a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons menuicon2">menu</i></a>
      <ul style="margin-right: 5%;" class="right hide-on-med-and-down">
        <li class="active" ><a href="index.html">Начало</a></li>
        <li><a href="index.html">За нас</a></li>
        <li><a href="firmi.php">Производители</a></li>
		<li><a href="shopname.php">Онлайн магазин</a></li>
      </ul>
      <ul class="side-nav mininav" id="mobile-demo">
        <li style="transform: skewX(0deg);" class="active" ><a style="transform: skewX(0deg); color: seagreen;" href="#main">Начало</a></li>
        <li style="transform: skewX(0deg);"><a style="transform: skewX(0deg); color: seagreen;" href="#aboutUs2">За нас</a></li>
        <li style="transform: skewX(0deg);"><a style="transform: skewX(0deg); color: seagreen;"href="firmi.php">Производители</a></li>
		<li style="transform: skewX(0deg); color: seagreen;"><a style="transform: skewX(0deg); color: seagreen;" href="shopname.php">Онлайн магазин</a></li>
      </ul>
    </div>
  </nav>
</div> 
<div class="container">
<div class="col s10 center">

<br class="hide-on-med-and-down" /><br class="hide-on-med-and-down" /><br class="hide-on-med-and-down" /><br />
<div class="bordered">
<div class="hide-on-small-only"><h2 style="color:white;">ВХОД В BEBIO:</h2><hr /></div>
<div class="hide-on-med-and-up"><h4 style="color:white;">ВХОД В BEBIO:</h4><hr /></div>
	<form style="color: white; text-align: center;" action="shopname.php" method="post">
		<input style="width: 80%;" type="text" name="username" placeholder="Три имена на латиница" required>
		<input style="width: 80%;" type="password" name="password" placeholder="Парола:" required>
		<input style="width: 80%; background: none; border: 2px solid white; color: white; font-size: 25px; text-shadow: 1px 1px 1px black;" type="submit" value="ВХОД" name="submit">
		<a href="shopreg.php"><input style="width: 50%; background: none; margin-top: 10px; border: 2px solid seagreen; color: white; font-size: 15px; text-shadow: 1px 1px 1px black;" type="button" value="РЕГИСТРАЦИЯ"></a>
	</form>
	<?php
		if(isset($_POST['submit'])){
		$usern = $_REQUEST['username'];
		$user = str_replace(' ', '', $usern);
                $email = $_POST['email'];
                $pass = $_POST['password'];
                $query_select = "SELECT * FROM login WHERE username='$user' LIMIT 1";
     $rs2 = (mysqli_query($conn, $query_select));
     	if(!$rs2){
     		echo "<h4>ГРЕШКА ПРИ ВЛИЗАНЕ!</h4>";
		} else{
			while($rws = mysqli_fetch_assoc($rs2)){
			$dbpass = $rws['password'];
			if(md5($pass) == $dbpass){
header("Location: shop.php?shopping_name=$user");
} else {
    echo "<h4>ГРЕШКА ПРИ ВЛИЗАНЕ!</h4>";
}

		}
	}
	}
	?>
	<hr /></div>
	</div></div>
</body>
</html>