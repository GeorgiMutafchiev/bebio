<?php
session_start();
require 'dbconn.php'; 
$url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']; 
$url_name = $_GET['shopping_name'];
if($url_name == ""){
echo "Please login!";
} else {
?>  
<html>
<head>
<meta charset="utf8_bin">
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>    
<title>BEBIO</title>
<link rel="icon" href="img/logonav.png">
<script src="js/jquery.js" type="text/javascript" ></script>
<script src="js/materialize.js" type="text/javascript" ></script>
<link href="css/materialize.css" rel="stylesheet" />
<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">
<link href="css/style.css" rel="stylesheet" />
<link href="css/animate.css" rel="stylesheet" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script src="js/scroll.js" type="text/javascript"></script>
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

<div class="all">
<div class="navbar-fixed" id="main">
<nav class="nav2">
<div class=" nav2">
<a href="shop.php?shopping_name=<?php echo $url_name; ?>"><img class="brandImg hide-on-med-and-down" src="img/logonav.png" /></a>
<a href="index.html" style="margin-left: 3%; font-size: 45px; font-family: Century Gothic;" class="brand-logo hide-on-med-and-down fname"></a>
<a href="index.html" class="brand-logo hide-on-large-only fname">E-МАГАЗИН</a>
<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons menuicon">menu</i></a>
<ul style="margin-right: 5%;" class="right hide-on-med-and-down">
<li><a href="index.html">Начало</a></li>
<li><a href="index.html">За нас</a></li>
<li><a href="firmi.php">Производители</a></li>
<li class="active" ><a href="#">Онлайн магазин</a></li>
<a href="data.php?shopping_user=<?php echo $url_name; ?>"><li style="transform: skewX(0deg);"><i style="position: absolute; color: black; font-size: 45px;" class="material-icons">&#xE8CC;</i></li></a>
</ul>
<ul class="side-nav mininav" id="mobile-demo">
<li style="transform: skewX(0deg);" ><a style="transform: skewX(0deg); color: seagreen;" href="index.html">Начало</a></li>
<li style="transform: skewX(0deg);"><a style="transform: skewX(0deg); color: seagreen;" href="index.html">За нас</a></li>
<li style="transform: skewX(0deg);"><a style="transform: skewX(0deg); color: seagreen;"href="firmi.php">Производители</a></li>
<li class="active" style="transform: skewX(0deg); color: seagreen;"><a style="transform: skewX(0deg); color: seagreen;" href="#">Онлайн магазин</a></li>
<a href="data.php?shopping_user=<?php echo $url_name; ?>"><li style="transform: skewX(0deg);"><i style="transform: skewX(0deg); position: absolute; color: seagreen; font-size: 45px;" class="material-icons">&#xE8CC;</i></li></a>
</ul>
</div>
</nav>
</div>     
<div class="col s12 title2 hide-on-small-only"><h2>ОНЛАЙН МАГАЗИН</h2></div>

<div class="container-fluid white">
<div class="row"><br class="hide-on-small-only"/><br class="hide-on-small-only"/><br />

<div class="col s8 firmi hide-on-med-and-down">
<?php
mysqli_set_charset($conn,"utf8");
$query_Events = "SELECT * FROM `products` ORDER BY `id` ASC LIMIT 4";
$rs = (mysqli_query($conn, $query_Events)) or die(mysqli_error($conn));
if(!$rs){
echo mysqli_error();
} else{
while($row = mysqli_fetch_assoc($rs)){
$name =  $row['name']; 
$descript = $row['descript'];
$price = $row['price'];
$shortname = $row['shortname'];
$proizvoditel = $row['proizvoditel'];
?>                
<div class="col s6 hide-on-med-and-down <?php for($x = 1; $x > 4; $x++){ 
echo "hiddenel"; } ?>
">
<a href="product.php?user_username=<?php echo $row['shortname'];?>&current_user=<?php echo $url_name; ?>"><div class="card medium">
<div class="card-image">
<img src="uploads/<?php echo $shortname; ?>1.jpg">

</div>
<div class="card-content">
<span class="card-title"><?php echo $name; ?></span>
<p><?php echo $descript; ?></p>
</div>
<div class="card-action">
<a href="product.php?user_username=<?php echo $row['shortname'];?>&current_user=<?php echo $url_name; ?>">НАУЧИ ПОВЕЧЕ</a>
</div>
</div>
</div></a>
<?php 
}

}
?>     </div>



<div class="col s12 firmi hide-on-large-only">
<?php
mysqli_set_charset($conn,"utf8");
$query_Events = "SELECT * FROM `products` ORDER BY `id` ASC LIMIT 4";
$rs = (mysqli_query($conn, $query_Events)) or die(mysqli_error($conn));
if(!$rs){
echo mysqli_error();
} else{
while($row = mysqli_fetch_assoc($rs)){
$name =  $row['name']; 
$descript = $row['descript'];
$price = $row['price'];
$shortname = $row['shortname'];
$proizvoditel = $row['proizvoditel']; ?>  

<div class="col s12 ">
<a href="product.php?user_username=<?php echo $row['shortname'];?>&current_user=<?php echo $url_name; ?>"><div class="card medium">
<div class="card-image">
<img src="uploads/<?php echo $shortname; ?>1.jpg">

</div>
<div class="card-content">
<span class="card-title"><?php echo $name; ?></span>
<p><?php echo $description; ?></p>
</div>
<div class="card-action">
<a href="product.php?user_username=<?php echo $row['shortname'];?>&current_user=<?php echo $url_name; ?>&current_user=<?php echo $url_name; ?>">НАУЧИ ПОВЕЧЕ</a>
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
    <a href="productscategory.php?user_username=<?php echo $row['short']; ?>&current_user=<?php echo $url_name; ?>" ><li style=" font-size: 20px; text-align: left; width: 100%; background-color: seagreen; box-shadow: 3px 3px 3px black;" class="waves-effect waves-light btn cats">
<span class="title" style="color: white;" ><?php echo $char; ?></span>
    <a href="productscategory.php?user_username=<?php echo $row['short']; ?>&current_user=<?php echo $url_name; ?>"  class="secondary-content"><i style="color: white;" class="material-icons ">menu</i></a>
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
    <a href="productscategory.php?user_username=<?php echo $row['short']; ?>&current_user=<?php echo $url_name; ?>" ><li style=" font-size: 20px; text-align: left; width: 100%; background-color: seagreen; box-shadow: 3px 3px 3px black;" class="waves-effect waves-light btn cats">
<span class="title" style="color: white;" ><?php echo $char; ?></span>
    <a href="productscategory.php?user_username=<?php echo $row['short']; ?>&current_user=<?php echo $url_name; ?>"  class="secondary-content"><i style="color: white;" class="material-icons ">menu</i></a>
                 </li></a>
           </ul>         
<?php 
}

}
?>  


</div>
<div class="col s12 firmi hide-on-med-and-down">
<?php
mysqli_set_charset($conn,"utf8");
$query_Events = "SELECT * FROM `products` WHERE `id` > 5 ORDER BY `id` ASC";
$rs = (mysqli_query($conn, $query_Events)) or die(mysqli_error($conn));
if(!$rs){
echo mysqli_error();
} else{
while($row = mysqli_fetch_assoc($rs)){
$name =  $row['name']; 
$descript = $row['descript'];
$price = $row['price'];
$shortname = $row['shortname'];
$proizvoditel = $row['proizvoditel']; ?>                

<div class="col s4 hide-on-med-and-down <?php for($x = 1; $x > 4; $x++){ 
echo "hiddenel"; } ?>
">
<a href="product.php?user_username=<?php echo $row['shortname'];?>&current_user=<?php echo $url_name; ?>"><div class="card medium">
<div class="card-image">
<img src="uploads/<?php echo $shortname; ?>1.jpg">

</div>
<div class="card-content">
<span class="card-title"><?php echo $name; ?></span>
<p><?php echo $descript; ?></p>
</div>
<div class="card-action">
<a href="product.php?user_username=<?php echo $row['shortname'];?>&current_user=<?php echo $url_name; ?>">НАУЧИ ПОВЕЧЕ</a>
</div>
</div>
</div></a>
<?php 
}

}
?>     </div>

<div class="col s12 firmi hide-on-large-only">
<?php
mysqli_set_charset($conn,"utf8");
$query_Events = "SELECT * FROM `products` WHERE `id` > 5 ORDER BY `id` ASC";
$rs = (mysqli_query($conn, $query_Events)) or die(mysqli_error($conn));
if(!$rs){
echo mysqli_error();
} else{
while($row = mysqli_fetch_assoc($rs)){
$name =  $row['name']; 
$descript = $row['descript'];
$price = $row['price'];
$shortname = $row['shortname'];
$proizvoditel = $row['proizvoditel']; ?>                

<div class="col s12 hide-on-large-only"> <?php for($x = 1; $x > 4; $x++){ 
echo "hiddenel"; } ?>

<a href="product.php?user_username=<?php echo $row['shortname'];?>&current_user=<?php echo $url_name; ?>"><div class="card medium">
<div class="card-image">
<img src="uploads/<?php echo $shortname; ?>1.jpg">

</div>
<div class="card-content">
<span class="card-title"><?php echo $name; ?></span>
<p><?php echo $shortdesc; ?></p>
</div>
<div class="card-action">
<a href="product.php?user_username=<?php echo $row['shortname'];?>&current_user=<?php echo $url_name; ?>">НАУЧИ ПОВЕЧЕ</a>
</div>
</div>
</div></a>
<?php 
}

} 
}
?>     </div>
</div>
</div>
</div>
</body>
</html>