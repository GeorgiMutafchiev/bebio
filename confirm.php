<?php 
     session_start(); 
     require 'dbconn.php';
     $url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']; 
     $user_username = $_GET['user_username'];
     
     $query_select = "SELECT * FROM `users` WHERE shortname = '$user_username' LIMIT 1";
     $rs2 = (mysqli_query($conn, $query_select)) or die(mysqli_error($conn));
     	if(!$rs2){
     		echo mysqli_error();
		} else{
			while($rws = mysqli_fetch_assoc($rs2)){
	$username =  $rws['username']; 
	echo file_get_contents("views/top.html");
      ?>
    <body>
<div class="admincol">
<div class="navbar-fixed" id="main">
<nav class="nav1">
    <div class=" nav1">
            <img class="brandImg1 hide-on-med-and-down" src="img/logonav.png" />
      <a href="index.html" style="margin-left: 3%; font-size: 45px; font-family: Century Gothic;" class="brand-logo hide-on-med-and-down fname"></a>
	  <a href="index.html" class="brand-logo hide-on-large-only fname2">BEBIO</a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons menuicon2">menu</i></a>
      <ul style="margin-right: 5%;" class="right hide-on-med-and-down">
        <li><a href="control.php">Добави</a></li>
        <li><a href="delete.ph">Премахни</a></li>
        <li><a href="firmi.php">Поръчки</a></li>
		<li class="active" ><a href="logout.php?logout-from-admin-panel">Изход</a></li>
      </ul>
      <ul class="side-nav mininav" id="mobile-demo">
        <li style="transform: skewX(0deg);"><a style="transform: skewX(0deg); color: seagreen;" href="control.php">Добави</a></li>
        <li style="transform: skewX(0deg);"><a style="transform: skewX(0deg); color: seagreen;" href="delete.php">Премахни</a></li>
        <li style="transform: skewX(0deg);"><a style="transform: skewX(0deg); color: seagreen;"href="firmi.php">Поръчки</a></li>
		<li style="transform: skewX(0deg); color: seagreen;" class="active"><a style="transform: skewX(0deg); color: seagreen;" href="logout.php?logout-from-admin-panel">Изход</a></li>
      </ul>
    </div>
  </nav>
</div>     
    <div class="container add">
        <div class="row">
            <div class="col s12 center">
               	<h1 style="color: white;">ПОТВЪРДЕТЕ ПРЕМАХВАНЕТО НА <?php echo $username; ?></h1>
               </div>
        </div>
    </div>
    	<?php
	echo file_get_contents("views/footer.html");
	}			
	} 
?>

