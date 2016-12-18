 <?php 
     session_start(); 
     require 'dbconn.php'; 
     $url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']; 
     $url_user = $_GET['current_user'];
	$user_username = $_GET['user_username'];
     $query_select = "SELECT * FROM `products` WHERE shortname = '$user_username' LIMIT 1";
     $rs2 = (mysqli_query($conn, $query_select)) or die(mysqli_error($conn));
     	if(!$rs2){
     		echo mysqli_error();
		} else{
			while($rws = mysqli_fetch_assoc($rs2)){
	$name =  $rws['name']; 
        $category = $rws['category'];
        $descript = $rws['descript'];
        $price = $rws['price'];
        $proizvoditel = $rws['proizvoditel'];
        $shortname = $rws['shortname'];
        
        $query_select2 = "SELECT * FROM `users` WHERE shortname = '$proizvoditel' LIMIT 1";
     $rs = (mysqli_query($conn, $query_select2)) or die(mysqli_error($conn));
     	if(!$rs){
     		echo mysqli_error();
		} else{
			while($row = mysqli_fetch_assoc($rs)){
	$username =  $row['username'];
        $tel = $row['tel'];
        $description = $row['description'];
        $email = $row['email'];
        $proizshort = $row['shortname'];
        
  	echo file_get_contents("views/top.html");      
        
?>
    <body>
<div class="alles">
<div class="navbar-fixed" id="main">
<nav class="nav1">
    <div class=" nav1">
            <img class="brandImg1 hide-on-med-and-down" src="img/logonav.png" />
      <a href="index.html" style="margin-left: 3%; font-size: 45px; font-family: Century Gothic;" class="brand-logo hide-on-med-and-down fname"></a>
	  <a href="index.html" class="brand-logo hide-on-large-only fname2">BEBIO</a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons menuicon2">menu</i></a>
      <ul style="margin-right: 5%;" class="right hide-on-med-and-down">
        <li><a href="index.html">Начало</a></li>
        <li><a href="index.html">За нас</a></li>
        <li><a href="firmi.php">Производители</a></li>
		<li class="active" ><a href="shop.php?shopping_name=<?php echo $url_user; ?>">Онлайн магазин</a></li>
      </ul>
      <ul class="side-nav mininav" id="mobile-demo">
        <li style="transform: skewX(0deg);"><a style="transform: skewX(0deg); color: seagreen;" href="index.html">Начало</a></li>
        <li style="transform: skewX(0deg);"><a style="transform: skewX(0deg); color: seagreen;" href="index.html">За нас</a></li>
        <li style="transform: skewX(0deg);" ><a style="transform: skewX(0deg); color: seagreen;"href="firmi.php">Производители</a></li>
		<li style="transform: skewX(0deg); color: seagreen;" class="active"><a style="transform: skewX(0deg); color: seagreen;" href="shop.php?shopping_name=<?php echo $url_user; ?>">Онлайн магазин</a></li>
      </ul>
    </div>
  </nav>
</div>     
        <style>
            .banner {
    width:100%;
    height: 250px;
    position: relative;
    background-image: url(img/mlechni.jpg);
    background-repeat: round;
    border-bottom: 5px solid white;
        -webkit-box-shadow: 0px -8px 21px 0px rgba(0,0,0,0.34);

-moz-box-shadow: 0px -8px 21px 0px rgba(0,0,0,0.34);

box-shadow: 0px -8px 21px 0px rgba(0,0,0,0.34);
}
        </style>
    <div class="container pp hide-on-med-and-down">
                    <div class="col s3 ppic">
                <img src="uploads/<?php echo $shortname;?>1.jpg" class="responsive-img materialboxed " rel="profileBanner"/>
                        <div class="hide-on-med-and-down"><h4><?php echo $name; ?></h4></div>
                        <div class="hide-on-small-only hide-on-large-only"><h5><?php echo $name; ?></h5></div>
            </div>
        <div class="row">
            <div class="col s12 banner">

            </div>
        </div>
        <div class="row mar ">
        	<div class="col s6 desc">
        		<h4 style="color: white; margin-left: 5%; text-shadow: 2px 2px 2px black;">ЗА ПРОДУКТА:</h4>
        		<form method="post" action="product.php?user_username=<?php echo $user_username; ?>&current_user=<?php echo $url_user; ?>">
				<hr />
        		<h3 style="color: white; text-shadow: 2px 2px 2px black; margin-left: 15%;">ЦЕНА: <?php echo $price; ?> лв.</h3>
        		<input style="font-size: 30px; margin-left: 20%;" name="submit" type="submit" value="ПОРЪЧАЙ" class="waves-effect waves-light btn green">
        		
        		
        		</form>
        		<?php
if(isset($_POST['submit'])){
	$sql = "INSERT INTO " . $url_user . " (produkt)
VALUES ('$shortname')";

if ($conn->query($sql) === TRUE) {
    echo "Успешно добавено в кошницата Ви!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
    }
	?>
        	</div>
        	<div class="col s6 maininfo"
        		<ul>
        			<li><h4>ЗА ПРОИЗВОДИТЕЛЯ:</h4></li><hr />
            <li><h5>фирма:<a style="color: white;" href="profile.php?user_username=<?php echo $proizshort; ?>"> <?php echo $username; ?></a></h5></li>
        			<li><h5>имейл: <?php echo $email; ?></h5></li>
        			<li><h5>телефон: <?php echo $tel; ?></h5></li>
        		</ul>
        	</div>
    </div>
    <div class="col s12 desc" >
    <hr />
                		<p><?php echo $descript; ?></p>
                	</div>
<div class="row imgs " style="background-color: seagreen; padding-top: 20px; padding-bottom: 16px;     	-webkit-box-shadow: 0px 3px 26px -3px rgba(133,133,133,1);

-moz-box-shadow: 0px 3px 26px -3px rgba(133,133,133,1);

box-shadow: 0px 3px 26px -3px black;">

                    <div class="col s4 materialboxed"><img class="imgr" src="uploads/<?php echo $shortname; ?>2.jpg" /></div>
                    <div class="col s4 materialboxed"><img class="imgr" src="uploads/<?php echo $shortname; ?>3.jpg" /></div>
                    <div class="col s4 materialboxed"><img class="imgr" src="uploads/<?php echo $shortname; ?>4.jpg" /></div>
                </div>
                <div class="col s12 desc" style="padding-right: 10px; padding-left: 10px; font-size: 15px;">
                		<p><?php echo $description; ?></p>
        <hr /><br class="hide-on-med-and-down" />
                	</div>
    </div>
        
    <div class="container pp hide-on-large-only">
                    <div class="col s3 ppic_med hide-on-small-only">
                <img src="uploads/<?php echo $shortname; ?>1.jpg" class=" materialboxed responsive-img" rel="profileBanner"/>
                        <h4 style="margin-top: -25px;"><?php echo $name; ?></h4>
            </div>
          <div class="col s3 ppic_med2 hide-on-med-and-up">
                <img src="uploads/<?php echo $shortname; ?>1.jpg" class=" responsive-img" rel="profileBanner"/>
                        <h4 class="usernamee" ><?php echo $name; ?></h4>
            </div>
        <div class="row">
            <div class="col s12 banner">
                
            </div>
        </div>
        <div class="row mar2">
        <div class="col s12 maininfo center"><br class="hide-on-small-only hide-on-large-only" /><br class="hide-on-small-only hide-on-large-only" /><br class="hide-on-small-only hide-on-large-only" /><br class="hide-on-small-only hide-on-large-only" /><br class="hide-on-small-only hide-on-large-only" /><br class="hide-on-small-only hide-on-large-only" /><br class="hide-on-small-only hide-on-large-only" /><br class="hide-on-small-only hide-on-large-only" /><br class="hide-on-small-only hide-on-large-only" /><br class="hide-on-small-only hide-on-large-only" /><br class="hide-on-small-only hide-on-large-only" /><br class="hide-on-small-only hide-on-large-only" /><br class="hide-on-small-only hide-on-large-only" />

        		<ul style="list-style: none; margin-top: -10%;">
        			<li><h5>За продукта:</h5></li><hr />
            <li><h4>ЦЕНА:<?php echo $price; ?> лв.</h4></li>
            <hr /><br />
            		<form method="post" action="product.php?user_username=<?php echo $user_username; ?>&current_user=<?php echo $url_user;?>">
        		<input style="font-size: 30px;" type="submit" name="submitt" value="ПОРЪЧАЙ" class="waves-effect waves-light btn green" style="margin-left: 0%;">
        		</form><br /><hr />
        		
        		<?php
if(isset($_POST['submitt'])){
	$sql = "INSERT INTO " . $url_user . " (produkt)
VALUES ('$shortname')";

if ($conn->query($sql) === TRUE) {
    echo "Успешно добавено в кошницата Ви!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
    }
	?>
        		
            <li><h5>За производителя:</h5></li>
        			<li><h5>име: <?php echo $username; ?></h5></li>
        			<li><h5>телефон: <?php echo $tel; ?></h5></li>
        			<li><h5><?php echo $adress; ?></h5></li>
        		</ul><br class="hide-on-small-only hide-on-large-only" />

        		<hr />
        	</div>
	<div class="col s12 desc">
        		<p><?php echo $descript; ?></p>
        	</div>
        	
        </div>
<div class="row imgs " style="background-color: darkorange; padding-top: 20px; padding-bottom: 16px;     	-webkit-box-shadow: 0px 3px 26px -3px rgba(133,133,133,1);

-moz-box-shadow: 0px 3px 26px -3px rgba(133,133,133,1);

box-shadow: 0px 3px 26px -3px black;">
                    <div class="col s12 materialboxed"><img class="imgr" src="uploads/<?php echo $shortname; ?>2.jpg" />
    <br /><br /></div>
    
                    <div class="col s12 materialboxed"><img class="imgr" src="uploads/<?php echo $shortname; ?>3.jpg" />
    <br /><br /></div>
    
                    <div class="col s12 materialboxed"><img class="imgr" src="uploads/<?php echo $shortname; ?>4.jpg" />
    <br /><br /></div>
    
                </div>
                <div class="row">
                	<div class="col s12 desc" >
                		<p><?php echo $description; ?></p>
                	</div>
                </div>
</div></div>	
        	<?php
        	echo file_get_contents("views/footer.html");
        	} } } }
?>

