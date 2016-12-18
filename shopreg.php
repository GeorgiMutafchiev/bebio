<?php
require 'dbconn.php'; 
echo file_get_contents("views/top.html");
?>
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
<div class="hide-on-small-only"><h2 style="color:white;">РЕГИСТРАЦИЯ В BEBIO:</h2><hr /></div>
<div class="hide-on-med-and-up"><h4 style="color:white;">РЕГИСТРАЦИЯ В BEBIO:</h4><hr /></div>
	<form style="color: white; text-align: center;" action="shopreg.php" method="post">
		<input style="width: 80%;" type="text" name="username" placeholder="Въведете три имена: * на латиница!" required>
		<input style="width: 80%;" type="text" name="adress" placeholder="Въведете адрес за доставка:" required>
		<input style="width: 80%;" type="text" name="tel" placeholder="Въведете телефон:" required>
		<input style="width: 80%;" type="email" name="email" placeholder="Въведете имейл адрес:" required>
		<input style="width: 80%;" type="password" name="password" placeholder="Въведете парола:" required>
		<input style="width: 80%; background: none; border: 2px solid white; color: white; font-size: 25px; text-shadow: 1px 1px 1px black;" type="submit" value="РЕГИСТРАЦИЯ" name="submit">
				<a href="shopname.php"><input style="width: 50%; background: none; margin-top: 10px; border: 2px solid seagreen; color: white; font-size: 15px; text-shadow: 1px 1px 1px black;" type="button" value="ВХОД"></a>

		
	</form>

	<?php
		if(isset($_POST['submit'])){
		$user = $_REQUEST['username'];
		$pass = md5($_REQUEST['password']);
		$user = str_replace(' ', '', $user);
		 $sqlii = "INSERT INTO `login` (username, password)
 VALUES ('$user','$pass')";

			$sql = "CREATE TABLE IF NOT EXISTS " . $user . " (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `adress` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `tel` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `produkt` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `kolichestvo` int(255) NOT NULL DEFAULT '1',
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `accountname` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ";
if ($conn->query($sql) === TRUE) {
                                $adress = $_POST['adress'];
                                    $tel = $_POST['tel'];
                                $email = $_POST['email'];
                                    
                                               $sqli = "INSERT INTO " . $user . " (accountname, adress, tel, email)
 VALUES ('$user','$adress','$tel','$email')";
} else {
    echo "Error creating table: " . $conn->error;
}
                             
if (mysqli_query($conn, $sqli) && mysqli_query($conn, $sqlii)) {
	echo "<h4>Успешна регистрация!</h4>";
}
?>
</div>
  <?php  }
$conn->close();
	?>
	<hr /></div>
	</div></div>
</body>
</html>