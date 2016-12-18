<?php 
     session_start(); 
     require 'dbconn.php'; 
     $url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']; 
     $url_user = $_GET['current_user'];
     $user_username = $_GET['user_username'];
     echo file_get_contents("views/top.html");
?> 
    <body>
<div class="all">
<div class="navbar-fixed" id="main">
<nav class="nav2">
    <div class=" nav2">
            <a href="firmi.php"><img class="brandImg hide-on-med-and-down" src="img/logonav.png" /></a>
      <a href="index.html" style="margin-left: 3%; font-size: 45px; font-family: Century Gothic;" class="brand-logo hide-on-med-and-down fname"></a>
	  <a href="index.html" class="brand-logo hide-on-large-only fname">E-МАГАЗИН</a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons menuicon">menu</i></a>
      <ul style="margin-right: 5%;" class="right hide-on-med-and-down">
        <li><a href="index.html">Начало</a></li>
        <li><a href="index.html">За нас</a></li>
        <li><a href="firmi.php">Производители</a></li>
		<li class="active" ><a href="shop.php?shopping_name=<?php echo $url_user; ?>">Онлайн магазин</a></li>
		<a href="data.php?shopping_user=<?php echo $url_user; ?>"><li style="transform: skewX(0deg);"><i style="position: absolute; color: black; font-size: 45px;" class="material-icons">&#xE8CC;</i></li></a>
      </ul>
      <ul class="side-nav mininav" id="mobile-demo">
        <li style="transform: skewX(0deg);" ><a style="transform: skewX(0deg); color: seagreen;" href="index.html">Начало</a></li>
        <li style="transform: skewX(0deg);"><a style="transform: skewX(0deg); color: seagreen;" href="index.html">За нас</a></li>
        <li style="transform: skewX(0deg);"><a style="transform: skewX(0deg); color: seagreen;"href="firmi.php">Производители</a></li>
		<li class="active" style="transform: skewX(0deg); color: seagreen;"><a style="transform: skewX(0deg); color: seagreen;" href="shop.php?shopping_name=<?php echo $url_user; ?>">Онлайн магазин</a></li>
		<a href="data.php?shopping_user=<?php echo $url_user; ?>"><li style="transform: skewX(0deg);"><i style="transform: skewX(0deg); position: absolute; color: seagreen; font-size: 45px;" class="material-icons">&#xE8CC;</i></li></a>
      </ul>
    </div>
  </nav>
</div>     
    <div class="col s12 title2 hide-on-small-only"><h2>БИО ПРОИЗВОДИТЕЛИ</h2></div>

    <div class="container-fluid white">
        <div class="row"><br class="hide-on-small-only"/><br class="hide-on-small-only"/><br />

            <div class="col s8 firmi hide-on-med-and-down">
            <?php
            mysqli_set_charset($conn,"utf8");
        $query_Events = "SELECT * FROM `products` WHERE categoria = '$user_username' ORDER BY `id` ASC ";
        $rs = (mysqli_query($conn, $query_Events)) or die(mysqli_error($conn));
            if(!$rs){
               echo mysqli_error();
} else{
    while($row = mysqli_fetch_assoc($rs)){
        $name =  $row['name']; 
        $categoria = $row['categoria'];
        $descript = $row['descript'];
        $shortname = $row['shortname'];   
        
        $total = 0;
        $total += $row['id'];
        ?>            

            <div class="col s6 hide-on-med-and-down <?php for($x = 1; $x > 4; $x++){ 
            	echo "hiddenel"; } ?>
            ">
                <a href="product.php?user_username=<?php echo $row['shortname'];?>&current_user=<?php echo $url_user; ?>"><div class="card medium">
            <div class="card-image">
              <img src="uploads/<?php echo $shortname; ?>1.jpg">
              
            </div>
            <div class="card-content">
                <span class="card-title"><?php echo $name; ?></span>
              <p><?php echo $descript; ?></p>
                </div>
            <div class="card-action">
              <a href="product.php?user_username=<?php echo $row['shortname'];?>&current_user=<?php echo $url_user; ?>">НАУЧИ ПОВЕЧЕ</a>
            </div>
          </div>
                    </div></a>
                <?php 
                }
	
}
?>     </div>
           <?php
	if($total == 0){
		?>
<div class="col s8">
<h1 style="color: white; font-family: Century Gothic; text-shadow: 2px 2px 2px black;" >Няма открити продукти</h1>
</div>
		<?php
	}
?>


<div class="col s12 firmi hide-on-large-only">
            <?php
            mysqli_set_charset($conn,"utf8");
        $query_Events = "SELECT * FROM `products` WHERE categoria = '$user_username' ORDER BY `id` ASC ";
        $rs = (mysqli_query($conn, $query_Events)) or die(mysqli_error($conn));
            if(!$rs){
               echo mysqli_error();
} else{
     while($row = mysqli_fetch_assoc($rs)){
        $name =  $row['name']; 
        $categoria = $row['categoria'];
        $descript = $row['descript'];
        $shortname = $row['shortname'];
        ?>                

            <div class="col s12 ">
                <a href="product.php?user_username=<?php echo $row['shortname'];?>&current_user=<?php echo $url_user; ?>"><div class="card medium">
            <div class="card-image">
              <img src="uploads/<?php echo $shortname; ?>1.jpg">
              
            </div>
            <div class="card-content">
                <span class="card-title"><?php echo $name; ?></span>
              <p><?php echo $descript; ?></p>
                </div>
            <div class="card-action">
              <a href="product.php?user_username=<?php echo $row['shortname'];?>&current_user=<?php echo $url_user; ?>">НАУЧИ ПОВЕЧЕ</a>
            </div>
          </div>
                    </div></a>
                <?php 
                }
	
}
?>     </div>

<div class="col s12 collect hide-on-large-only">
 <?php
            mysqli_set_charset($conn,"utf8");
        $query_Events = "SELECT * FROM `categories` ORDER BY `id` ASC";
        $rs = (mysqli_query($conn, $query_Events)) or die(mysqli_error($conn));
            if(!$rs){
               echo mysqli_error();
} else{
    while($row = mysqli_fetch_assoc($rs)){
        $char =  $row['char']; 
        $short = $row['short'];
?>           
                                <ul class="collection hoverable">
    <a href="productscategory.php?user_username=<?php echo $row['short']; ?>&current_user=<?php echo $url_user; ?>" ><li style=" font-size: 20px; text-align: left; width: 100%; background-color: seagreen; box-shadow: 3px 3px 3px black;" class="waves-effect waves-light btn cats">
<span class="title" style="color: white;" ><?php echo $char; ?></span>
    <a href="productscategory.php?user_username=<?php echo $row['short']; ?>&current_user=<?php echo $url_user; ?>"  class="secondary-content"><i style="color: white;" class="material-icons ">menu</i></a>
                 </li></a>
           </ul>         

                                       <?php 
                }
	
}
?>  
            </div>
            <div class="col s4 collect hide-on-med-and-down">
            <?php
            mysqli_set_charset($conn,"utf8");
        $query_Events = "SELECT * FROM `categories` ORDER BY `id` ASC";
        $rs = (mysqli_query($conn, $query_Events)) or die(mysqli_error($conn));
            if(!$rs){
               echo mysqli_error();
} else{
    while($row = mysqli_fetch_assoc($rs)){
        $char =  $row['char']; 
        $short = $row['short'];
?>           
                               <ul class="collection hoverable">
    <a href="productscategory.php?user_username=<?php echo $row['short']; ?>&current_user=<?php echo $url_user; ?>" ><li style=" font-size: 20px; text-align: left; width: 100%; background-color: seagreen; box-shadow: 3px 3px 3px black;" class="waves-effect waves-light btn cats">
<span class="title" style="color: white;" ><?php echo $char; ?></span>
    <a href="productscategory.php?user_username=<?php echo $row['short']; ?>&current_user=<?php echo $url_user; ?>"  class="secondary-content"><i style="color: white;" class="material-icons ">menu</i></a>
                 </li></a>
           </ul>         

                      <?php 
                }
	
}
?>  


    </div>
        </div>
    </div>
        </div>
    </body>
</html>