<?php 
     session_start(); 
     require 'dbconn.php'; 
     $user_username = mysqli_real_escape_string($conn,$_REQUEST['user_username']); 
     $current_user = $_SESSION['user_username']; 
     if($_SESSION['user_username']){ 
         header("location:iygUOUguogufUOUOUBUFRYxryygIO86787TUVG7.php?user_username=$user_username&current_user=$current_user"); 
     } 
 ?> 
<?php  
     $user_username = mysqli_real_escape_string($conn,$_REQUEST['user_username']); 
     $current_user = $_SESSION['user_username']; 
     $profile_username=$row['shortname']; 
 ?> 
 <?php 
     $url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']; 
 ?> 
<?php
     $query_select = "SELECT * FROM `users` WHERE shortname = '$user_username' LIMIT 1";
     $rs2 = (mysqli_query($conn, $query_select)) or die(mysqli_error($conn));
     	if(!$rs2){
     		echo mysqli_error();
		} else{
			while($rws = mysqli_fetch_assoc($rs2)){
	$username =  $rws['username']; 
	$shortname = $rws['shortname'];
      ?>
        		<html>
    <head>
            <meta charset="UTF-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0"/>    
	<title>CONTROL PANEL</title>
	<link rel="icon" href="img/logonav.png">

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
<style>

.no-js #loader { display: none;  }
.js #loader { display: block; position: absolute; left: 100px; top: 0; }
.se-pre-con {
	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999;
	background: url('img/Preloader_2.gif') center no-repeat #fff;
}
</style>
    </head>
        <script>

	$(window).load(function() {
		$(".se-pre-con").fadeOut("slow");;
	});
</script>
	<div class="se-pre-con"></div>
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
               	<h1 class="hide-on-med-and-down" style="color: white;">ПОТВЪРДЕТЕ ПРЕМАХВАНЕТО НА <br /> "<?php echo $username; ?>"</h1><hr /><br />
               	<h5 class="hide-on-large-only" style="color: white;">ПОТВЪРДЕТЕ ПРЕМАХВАНЕТО НА <br /> "<?php echo $username; ?>"</h5><hr /><br />
               	<form method="post" action="iygUOUguogufUOUOUBUFRYxryygIO86787TUVG7.php?user_username=<?php echo $shortname; ?>">
               		<input style="width: 80%; height: 50px; background-color: seagreen; border: 3px solid white; font-size: 20px; color: white;" type="submit" value="ПОТВЪРЖДАВАМ" name="delete">
               	</form>
               		<?php
               			if(isset($_POST['delete'])){
               				$sqll = "DELETE FROM users WHERE username = '$username' ";

if ($conn->query($sqll) === TRUE) {
    echo "
    <h4>УСПЕШНО ПРЕМАХНАХТЕ ПРОИЗВОДИТЕЛЯ!</h4>"; 
    ?>
    <a style="color: white; text-decoration: underline;" href="delete.php">Върни се назад <i class="material-icons">undo</i></a>
        <?php
} else {
    echo "Error deleting record: " . $conn->error;
}
               			
               		?>
               </div>
        </div>
    </div>
                    <footer class="page-footer1">
                    <div class="footer-copyright footer-info2">
            <div class="container">
                © 2016 <a style="color: white;" href="http://www.gimdesign.eu">GIMDESIGN</a>- Всички права са запазени
            <a class="grey-text text-lighten-4 right" href="#main">Начало</a>
            </div>
          </div>
        </footer>
    </body>
</html>
        		
        		
        	<?php
}
			}
				
		} 

?>