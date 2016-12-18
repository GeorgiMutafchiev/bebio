 <?php 
     session_start(); 
     require 'dbconn.php'; 
     $url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']; 
     $user_username = $_GET['user_username'];
 ?> 
<?php
     $query_select = "SELECT * FROM `users` WHERE shortname = '$user_username' LIMIT 1";
     $rs2 = (mysqli_query($conn, $query_select)) or die(mysqli_error($conn));
     	if(!$rs2){
     		echo mysqli_error();
		} else{
			while($rws = mysqli_fetch_assoc($rs2)){
	$username =  $rws['username']; 
        $category = $rws['category'];
        $tel = $rws['tel'];
        $adress = $rws['adress'];
        $web = $rws['web'];
        $description = $rws['description'];
        $shortname = $rws['shortname'];
        $naselenomqsto = $rws['naselenomqsto'];
        $shortdesc = $rws['shortdesc'];
        $email = $rws['email'];
echo file_get_contents( "views/top.html" );
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
        <li class="active" ><a href="firmi.php">Производители</a></li>
		<li><a href="shopname.php">Онлайн магазин</a></li>
      </ul>
      <ul class="side-nav mininav" id="mobile-demo">
        <li style="transform: skewX(0deg);"><a style="transform: skewX(0deg); color: seagreen;" href="index.html">Начало</a></li>
        <li style="transform: skewX(0deg);"><a style="transform: skewX(0deg); color: seagreen;" href="index.html">За нас</a></li>
        <li style="transform: skewX(0deg);" class="active"><a style="transform: skewX(0deg); color: seagreen;"href="firmi.php">Производители</a></li>
		<li style="transform: skewX(0deg); color: seagreen;"><a style="transform: skewX(0deg); color: seagreen;" href="shopname.php">Онлайн магазин</a></li>
      </ul>
    </div>
  </nav>
</div>     
        <style>
            .banner {
    width:100%;
    height: 250px;
    position: relative;
    background-image: url(img/<?php echo $category; ?>.jpg);
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
                        <h4><?php echo $username; ?></h4>
            </div>
        <div class="row">
            <div class="col s12 banner">
                  <nav style="background-color: transparent; margin-left: 64%; width: 35%; margin-top: 190px; box-shadow: none;">
    <div class="navi" style="background-color: transparent;">
    </div>
  </nav>
            </div>
        </div>
        <div class="row mar ">
        	<div class="col s8 desc">
        		<p><?php echo $shortdesc; ?></p>
        	</div>
        	<div class="col s4 maininfo"
        		<ul><br />
        			<li><h5>тел.: <?php echo $tel; ?></h5></li>
            <li><h5>уебсайт:<a style="color: white;" href="http://<? echo $web; ?>"> <?php echo $web; ?></a></h5></li>
        			<li><h5>имейл: <?php echo $email; ?></h5></li>
        			<li><h5>адрес: <?php echo $naselenomqsto; ?></h5></li>
        			<li><h5><?php echo $adress; ?></h5></li>
        		</ul>
        	</div>
    </div>
<div class="row imgs " style="background-color: seagreen; padding-top: 20px; padding-bottom: 16px;     	-webkit-box-shadow: 0px 3px 26px -3px rgba(133,133,133,1);

-moz-box-shadow: 0px 3px 26px -3px rgba(133,133,133,1);

box-shadow: 0px 3px 26px -3px black;">
<div class="carousel carousel-slider">
    <a class="carousel-item" href="#one!"><img src="http://lorempixel.com/800/400/food/1"></a>
    <a class="carousel-item" href="#two!"><img src="http://lorempixel.com/800/400/food/2"></a>
    <a class="carousel-item" href="#three!"><img src="http://lorempixel.com/800/400/food/3"></a>
    <a class="carousel-item" href="#four!"><img src="http://lorempixel.com/800/400/food/4"></a>
  </div>

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
                        <h4><?php echo $username; ?></h4>
            </div>
          <div class="col s3 ppic_med2 hide-on-med-and-up">
                <img src="uploads/<?php echo $shortname; ?>1.jpg" class=" responsive-img" rel="profileBanner"/>
                        <h4 class="usernamee" ><?php echo $username; ?></h4>
            </div>
        <div class="row">
            <div class="col s12 banner">
                
            </div>
        </div>
        <div class="row mar2">
        <div class="col s12 maininfo center"><br class="hide-on-small-only hide-on-large-only" /><br class="hide-on-small-only hide-on-large-only" /><br class="hide-on-small-only hide-on-large-only" /><br class="hide-on-small-only hide-on-large-only" /><br class="hide-on-small-only hide-on-large-only" /><br class="hide-on-small-only hide-on-large-only" /><br class="hide-on-small-only hide-on-large-only" /><br class="hide-on-small-only hide-on-large-only" /><br class="hide-on-small-only hide-on-large-only" /><br class="hide-on-small-only hide-on-large-only" /><br class="hide-on-small-only hide-on-large-only" /><br class="hide-on-small-only hide-on-large-only" /><br class="hide-on-small-only hide-on-large-only" />

        		<ul style="list-style: none; margin-top: -10%;">
        			<li><h5>тел.: <?php echo $tel; ?></h5></li>
            <li><h5>уебсайт:<a style="color: white;" href="http://<?php echo $web; ?>"> <?php echo $web; ?></a></h5></li>
        			<li><h5>имейл: <?php echo $email; ?></h5></li>
        			<li><h5>адрес: <?php echo $naselenomqsto; ?></h5></li>
        			<li><h5><?php echo $adress; ?></h5></li>
        		</ul><br class="hide-on-small-only hide-on-large-only" />

        		<hr />
        	</div>
	<div class="col s12 desc">
        		<p><?php echo $shortdesc; ?></p>
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
echo file_get_contents( "views/footer.html" );
			}
				
		}
?>