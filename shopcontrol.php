<?php 
session_start();
if(isset($_SESSION['username'])) {
include "dbconn.php"; 
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
        <li><a href="delete.php">Премахни</a></li>
        <li><a href="shopcontrol.php">Магазин</a></li>
		<li class="active" ><a href="logout.php?logout-from-admin-panel">Изход</a></li>
      </ul>
      <ul class="side-nav mininav" id="mobile-demo">
        <li style="transform: skewX(0deg);"><a style="transform: skewX(0deg); color: seagreen;" href="control.php">Добави</a></li>
        <li style="transform: skewX(0deg);"><a style="transform: skewX(0deg); color: seagreen;" href="delete.php">Премахни</a></li>
        <li style="transform: skewX(0deg);"><a style="transform: skewX(0deg); color: seagreen;"href="shopcontrol.php">Поръчки</a></li>
		<li style="transform: skewX(0deg); color: seagreen;" class="active"><a style="transform: skewX(0deg); color: seagreen;" href="logout.php?logout-from-admin-panel">Изход</a></li>
      </ul>
    </div>
  </nav>
</div>     
    <div class="container add">
        <div class="row">
            <div class="col s12">
                <h4 class="center" style="color: white;">ДОБАВИ ПРОДУКТ</h4>
                <hr /><br class="hide-on-med-and-down" />
                <div class="col s12 inputs">
                <form enctype="multipart/form-data" class="col s12" action="shopcontrol.php" method="post">
                    <input style="color: white;" type="text" name="username" placeholder="Име на продукта" >
                    
                        <select class="category" name="proizvoditel" style="color: white;">
                              <option style="color: white;" value="" disabled selected>Производител на продукта:</option>
                         <?php
            mysqli_set_charset($conn,"utf8");
        $query_Eventss = "SELECT * FROM `users` ORDER BY `id` DESC ";
        $rss = (mysqli_query($conn, $query_Eventss)) or die(mysqli_error($conn));
            if(!$rss){
               echo mysqli_error();
} else{
    while($roww = mysqli_fetch_assoc($rss)){
        $name =  $roww['shortname'];     ?> 
      <option style="color: white;" value="<?php echo $name; ?>"><?php echo $name; ?></option>
                              <?php 
                        	}
                        }
                        ?>
    </select>
    <input style="color: white;" type="text" name="shortname" placeholder="Кратко име на продукта" required>
                    <input style="color: white;" type="text" name="price" placeholder="Цена на продукта за 1 брой" required>
                        <textarea type="textarea" name="descript" rows="15" placeholder="Описание на продукта"></textarea> 
                    <hr />
                    <div class="center">
                    <p style="color: white;">Снимка на продукта:</p>
                    <input type="file" name="profilepic" id="profilepic"><hr />
                    <p style="color: white;">Добавете снимки:</p>
                    <input type="file" name="pic1">
                    <input type="file" name="pic2">
                    <input type="file" name="pic2"><hr />
                    <select class="category" name="categoria" style="color: white;">
      <option style="color: white;" value="" disabled selected>Изберете категория:</option>
      <option style="color: white;" value="mlechni">Млечни продукти</option>
      <option style="color: white;" value="mesni">Месни продукти</option>
      <option style="color: white;" value="med">Мед</option>
      <option style="color: white;" value="plodove">Плодове</option>
      <option style="color: white;" value="zelenchuci">Зеленчуци</option>
      <option style="color: white;" value="zarneni">Зърнени култури</option>
      <option style="color: white;" value="qdki">Ядки</option>
      <option style="color: white;" value="rozi">Розово масло</option>
      <option style="color: white;" value="bilki">Билки</option>
    </select>
                        <input style="margin-top: 2%;" type="submit" name="submit" value="ДОБАВИ"></div>
                </form>
                    <?php
                                            if(isset($_POST['submit'])){
                             $username = $_POST['username'];
                                $proizvoditel = $_POST['proizvoditel'];
                                $categoria = $_POST['categoria'];
                                    $price = $_POST['price'];
                                    $shortname = $_POST['shortname'];
                                         $descript = $_POST['descript'];
                                               $mysql = "INSERT INTO `products` (name, categoria, proizvoditel, shortname, price, descript)
 VALUES ('$username','$categoria','$proizvoditel','$shortname','$price','$descript')";

if (mysqli_query($conn, $mysql)) {
    echo "New record created successfully";
    
$uploaddir = "uploads/products/" . $shortname;
$uploadfile = $uploaddir . basename($_FILES['profilepic']['name']);



if (move_uploaded_file($_FILES['profilepic']['tmp_name'], $uploadfile)) {
    echo "File is valid, and was successfully uploaded.\n";
} else {
    echo "Possible file upload attack!\n";
}
$uploadfile2 = $uploaddir . basename($_FILES['pic1']['name']);

if (move_uploaded_file($_FILES['pic1']['tmp_name'], $uploadfile2)) {
    echo "File is valid, and was successfully uploaded.\n";
} else {
    echo "Possible file upload attack!\n";
}
$uploadfile3 = $uploaddir . basename($_FILES['pic2']['name']);
if (move_uploaded_file($_FILES['pic2']['tmp_name'], $uploadfile3)) {
    echo "File is valid, and was successfully uploaded.\n";
} else {
    echo "Possible file upload attack!\n";
}
$uploadfile4 = $uploaddir . basename($_FILES['pic3']['name']);
if (move_uploaded_file($_FILES['pic3']['tmp_name'], $uploadfile4)) {
    echo "File is valid, and was successfully uploaded.\n";
} else {
    echo "Possible file upload attack!\n";
} 
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
                         }
                    ?>
                    <hr /><br />
      </div></div>
        </div>
    </div>
    <div class="container add">
        <div class="row">
            <div class="col s12 center">
                <h4 class="center" style="color: white;">ВСИЧКИ ПОРЪЧКИ:</h4>
                <hr /><br class="hide-on-med-and-down" />
                <div class="col s12 inputs">
                     <?php
            mysqli_set_charset($conn,"utf8");
        $query_Events = "SELECT * FROM `orders` ORDER BY `id` ASC ";
        $rs = (mysqli_query($conn, $query_Events)) or die(mysqli_error($conn));
            if(!$rs){
               echo mysqli_error();
} else{
    while($row = mysqli_fetch_assoc($rs)){
        $potrebitel =  $row['potrebitel'];?> 
        	                 
  <div class="chip" style="width: 80%;">
    <?php echo $potrebitel; ?>
    <a href="orderconfirm.php?shopping_user=<?php echo $potrebitel; ?>"><i class="material-icons" style="color: seagreen;">&#xE7F7;</i></a>
  </div><hr />
        <?php } } ?>
                    </div></div>
        </div>
    </div>
    
                   <footer class="page-footer1">
          <div class="container footer-info1">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">BEBIO - Онлайн магазин</h5>
                <p class="grey-text text-lighten-4">BEBIO – първият български онлайн магазин за БИО-сертифицирани продукти, произведени само в България. Платформата Ви дава възможност да се докоснете до натурални хранитенлни и нехранителни стоки както и да се запознаете с биографиите на българските БИО-производители.</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Полезни линкове</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="shop.php">Онлайн магазин</a></li>
                  <li><a class="grey-text text-lighten-3 modal-trigger" href="#modal1">F.A.Q</a></li>
                  <li><a class="grey-text text-lighten-3" href="firmi.php">Производители</a></li>
                  <li><a class="grey-text text-lighten-3" href="#">Присъедини се</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright footer-info2">
            <div class="container">
                © 2016 <a style="color: white;" href="http://www.gimdesign.eu">GIMDESIGN</a>- Всички права са запазени
            <a class="grey-text text-lighten-4 right hide-on-small-only" href="#main">Начало</a>
            </div>
          </div>
        </footer>
        <div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>Общи условия за ползване:</h4>
      <p>BEBIO - Онлайн магазин е онлайн платформа с търговско предназначение. Всички цени на изложените в сайта продукти са в български лева и с включен ДДС. С натискане на бутона "Потвърди поръчката" всеки потребител на платформата се задължава да изплати изпратената му на имейл с потвърждение сума в български лева (включваща поръчания артикул и неговата доставка). На имейл с потвърждение ще получите освен дължимата сума, информация за доставката и допълнтелна информация (ако е необходима). Всяка поръчка може да обхваща само ЕДИН от изложените артикули (важи до 31.12.2016г). Плащането на поръчката се извършва по ДВА начина (важи до 31.12.2016г): 1. Плащане в брой при получаване на поръчката; 2. Плащане чрез банков превод; Доставката се извършва в срок от 3 работни дни чрез спедиторска фирма (Еконт, Спиди и подобни, в зависимост от желанието на потребителя). Администраторският екип на BEBIO - Онлайн магазин се задължава да Ви информира незабавно в една от изброените ситуации: 1. Ако поръчан от Вас продукт не е в наличност и се налага удължаване срока за доставка; 2. Допускане на грешка при пресмятането на общата дължима сума; (важи до 31.12.2016г).</p>
      <h4>Какво предлага BEBIO - Онлайн магазин?<h4>
      <h4>В платформата ще откриете:</h4>
      <ol>
      <li>Информация за всеки БИО производител в определена за него профилна страница.</li>
      <li>Интерактивно представена информация свързана с БАБ (Българска асоциация на Биопроизводителите) с образователна цел.</li>
      <li>Онлайн базиран магазин.</li>
      <li>Богат асортимент от БИО-сертифицирани български продукти.</li>
      </ol>
      <p>За допълнителни въпроси: тел. 0892238257 (СЕО); 0895607249(Търговски мениджър)	email: bebiobg@abv.bg</p>
      <h7>*BEBIO - Онлайн магазин запазва правото си да променя общите правила на онлайн платформата!</h7>
    </div>
    <div class="modal-footer">
      <a href="#" class="modal-action modal-close waves-effect waves-green btn-flat ">СЪГЛАСЕН СЪМ</a>
    </div>
  </div>
    </body>
</html>
<?php
} else{
echo "Please login!"; 
?>
<a href="admin.php">CLICK HERE</a>
<?php } ?>