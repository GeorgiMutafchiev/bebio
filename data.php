 <?php 
     session_start(); 
     require 'dbconn.php';
     $url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']; 
     $url_user = $_GET['shopping_user'];
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
    <div class="container add">
        <div class="row">
            <div class="col s12">
                <h4 class="center" style="color: white;">КОШНИЦА НА:</h4>
                <hr />
                <h2 style="color: white; text-shadow: 2px 2px 2px black;" class="center" ><?php echo $url_user; ?></h2>
                <div class="col s12">
                
                    <hr /><br />
                    
       <table style="color: white;" class="responsive-table bordered centered">
        <thead>
          <tr>
              <th data-field="id">Продукт:</th>
              <th data-field="name">Количество:</th>
              <th data-field="name">Крайна цена:</th>
              <th data-field="price">Дата:</th>
              <th data-field="price">ID:</th>
          </tr>
        </thead>

        <tbody>
                                         <?php
            mysqli_set_charset($conn,"utf8");
        $query_Events = "SELECT * FROM " . $url_user . " WHERE `id` != 1";
        $rs = (mysqli_query($conn, $query_Events)) or die(mysqli_error($conn));
            if(!$rs){
               echo mysqli_error();
} else{
    while($row = mysqli_fetch_assoc($rs)){
        $produkt =  $row['produkt'];   
        $id = $row['id'];
        
        mysqli_set_charset($conn,"utf8");
        $query_Eventss = "SELECT * FROM `products` WHERE `shortname` = '$produkt' ";
        $rss = (mysqli_query($conn, $query_Eventss)) or die(mysqli_error($conn));
            if(!$rss){
               echo mysqli_error();
} else{
    while($row = mysqli_fetch_assoc($rss)){
        $name =  $row['name'];    
        $price =  $row['price'];  
        $date = $row['date'];
        ?>  
        <tr>
    
            <td><?php echo $name; ?></td>
            <td>1</td>
            <td><?php echo $price; ?></td>
            <td><?php echo date("Y/m/d") ?></td>
            <td><?php echo $id; ?></td>
            </tr>
            <?php } } } } ?>
          
        </tbody>
      </table>
      <hr />
      <div class="col s12 center">
      <form method="post" action="data.php?shopping_user=<?php echo $url_user; ?>">
      <input class="center" style="width: 40%; margin-top 10px; font-size: 20px; color: white;" name="passcheck" placeholder="Моля въведете парола:" type="password" required><br />
      		<input style="margin-top 20px; text-shadow: 1px 1px 1px black; font-size: 30px; color: white; background-color: seagreen; border: 2px solid white;" name="submit" value="ПОРЪЧАЙ" type="submit">
      </form>
      <form method="post" action="data.php?shopping_user=<?php echo $url_user; ?>">
            <input style="color: white; background: none; text-shadow: 1px 1px 1px black;" type="submit" value="X - премахни продукти" name="del">
            </form>
            <?php if(isset($_POST['del'])){
            	$sql = "DELETE FROM " . $url_user . " WHERE `accountname` !='$url_user'";

if ($conn->query($sql) === TRUE) {
    echo "Успешно премахнати продукти!";
    
} else {
    echo "Грешка при премахването на продуктите: " . $conn->error;
}} ?>
      </div>
      <?php
      	if(isset($_POST['submit'])){
      	
      	 $pass = $_POST['passcheck'];
                $query_select = "SELECT * FROM login WHERE username='$url_user' LIMIT 1";
     $rs2 = (mysqli_query($conn, $query_select));
     	if(!$rs2){
     		echo "<h4>Неуспешно изпратена поръчка!</h4>";
		} else{
			while($rws = mysqli_fetch_assoc($rs2)){
			$dbpass = $rws['password'];
			if(md5($pass) == $dbpass){
			$sql = "INSERT INTO orders (potrebitel)
 VALUES ('$url_user')";

if (mysqli_query($conn, $sql)) {
	    echo "Вашата поръчка е изпратена успешно! Очаквайте потвърждение на имейл!";
    }
} else {
    echo "<p style='color:white; font-align: center;'>Неуспешно изпратена поръчка!</p>";
			}	
		}
	} 
}
      ?>
      <br />
      <hr />
      <br />
                    </div></div>
        </div>
    </div>
<?php echo file_get_contents("views/footer.html"); ?>
    
