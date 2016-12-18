<?php 
     session_start(); 
     require 'dbconn.php'; 
     $user_username = mysqli_real_escape_string($conn,$_REQUEST['shopping_user']); 
     $current_user = $_SESSION['shopping_user']; 
     if($_SESSION['shopping_user']){ 
         header("location:profile.php?shopping_user=$shopping_username&current_user=$current_user"); 
     } 
 ?> 
<?php  
     $user_username = mysqli_real_escape_string($conn,$_REQUEST['shopping_user']); 
     $current_user = $_SESSION['shopping_user']; 
     $profile_username=$row['user']; 
     
 ?> 
 <?php 
     $url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']; 
     $url_user = $_GET['shopping_user'];
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
    <div class="container add">
        <div class="row">
            <div class="col s12">
                <h4 class="center" style="color: white;">ПОРЪЧКА НА:</h4>
                <hr />
                <h2 style="color: white; text-shadow: 2px 2px 2px black;" class="center" ><?php echo $url_user; ?></h2>
                <div class="col s12 inputs">
                
                    <hr /><br />
                    
       <table style="color: white;" class="col s12 responsive-table bordered centered">
        <thead>
          <tr>
              <th data-field="id">Продукт:</th>
              <th data-field="name">Количество:</th>
              <th data-field="name">Крайна цена:</th>
              <th data-field="price">Дата:</th>
          </tr>
        </thead>

        <tbody>
                                         <?php
            mysqli_set_charset($conn,"utf8");
        $query_Events = "SELECT * FROM " . $url_user . " WHERE `accountname` = '$url_user'";
        $rs = (mysqli_query($conn, $query_Events)) or die(mysqli_error($conn));
            if(!$rs){
               echo mysqli_error();
} else{
    while($row = mysqli_fetch_assoc($rs)){
        $email = $row['email'];
        $tel = $row['tel'];
        $adress = $row['adress'];  
        
        mysqli_set_charset($conn,"utf8");
        $query_Event = "SELECT * FROM " . $url_user . " WHERE `accountname` != '$url_user'";
        $rsss = (mysqli_query($conn, $query_Event)) or die(mysqli_error($conn));
            if(!$rsss){
               echo mysqli_error();
} else{
    while($rowss = mysqli_fetch_assoc($rsss)){
        $produkt = $rowss['produkt'];
        
        mysqli_set_charset($conn,"utf8");
        $query_Eventss = "SELECT * FROM `products` WHERE `shortname` = '$produkt' ";
        $rss = (mysqli_query($conn, $query_Eventss)) or die(mysqli_error($conn));
            if(!$rss){
               echo mysqli_error();
} else{
    while($rws = mysqli_fetch_assoc($rss)){
        $name =  $rws['name'];    
        $price =  $rws['price'];  
        $date = $rws['date'];
        $shortname = $rws['shortname'];
        ?>
        <tr>
    
            <td><?php echo $name; ?></td>
            <td>1</td>
            <td><?php echo $price; ?></td>
            <td><?php echo date("Y/m/d") ?></td>
            </tr>
        <?php
        $info[] = $rws['name'];
        $pref = "<pre>";
        $pres = "</pre>";
        $infos[] = $rws['price'];
              $myfile = fopen("orders/$url_user.txt", "w") or die("Unable to open file!");
              fwrite($myfile, $pref);
              		fwrite($myfile, $url_user);
              fwrite($myfile, $pres);
              fwrite($myfile, $pref);
              		fwrite($myfile, $email);
              fwrite($myfile, $pres);
              fwrite($myfile, $pref);
              		fwrite($myfile, $tel);
              fwrite($myfile, $pres);
              fwrite($myfile, $pref);
              		fwrite($myfile, $adress);
              fwrite($myfile, $pres);
              fwrite($myfile, $pref);
              fwrite($myfile, $pref);
              $art = "АРТИКУЛИ:";
              		fwrite($myfile, $art);
              fwrite($myfile, $pres);
fwrite($myfile, print_r($info, TRUE));
fwrite($myfile, $pres);
fwrite($myfile, $pref);
$txt = "ОТНАСЯ СЕ ЗА ЕДИН БРОЙ!\r\n"; 
fwrite($myfile, $pres);
fwrite($myfile, $txt);
fwrite($myfile, $pref);
$pr = "ЦЕНА ЗА 1 БРОЙ В ЛВ.";
fwrite($myfile, $pref);
              		fwrite($myfile, $pr);
              fwrite($myfile, $pres);
fwrite($myfile, print_r($infos, TRUE));
fwrite($myfile, $pres);
fclose($myfile);
        ?>  
        
             <?php } } } } } } ?>
          
        </tbody>
      </table>
      <hr />
      <div class="col s12 center">
      <form method="post" action="orderconfirm.php?shopping_user=<?php echo $url_user; ?>">
      		<input style="margin-top 30px; text-shadow: 1px 1px 1px black; font-size: 30px; color: white; background-color: seagreen; border: 2px solid white;" name="submit" value="ПОТВЪРДИ" type="submit">
      </form></div>
      <?php
      

      
      if(isset($_POST['submit'])){
       mysqli_set_charset($conn,"utf8");
        $query_Events = "SELECT * FROM " . $url_user . " WHERE `accountname` = '$url_user' LIMIT 1";
        $rs = (mysqli_query($conn, $query_Events)) or die(mysqli_error($conn));
            if(!$rs){
               echo mysqli_error();
} else{
    while($row = mysqli_fetch_assoc($rs)){
        $email = $row['email'];
        $tel = $row['tel'];
        $adress = $row['adress'];  
        
         
      $to = $email;
$subject = "BEBIO BULGARIA: Потвърдена поръчка / Order confirmation";
$txt = "Здравейте, \r\n . Вашата поръчка е приета успешно и ще бъде изпратена след обработката й. Ще получите пратката на адрес: " . $adress . " в срок от 5 работни дни. \r\n
Телефон на потребителя: " . $tel . " \r\n
Потребителско име: " . $url_user . " \r\n
За допълнителна информация, тел. 0892238257 (Георги Мутафчиев). \r\n
С уважение, \r\n
Екипът на BEBIO BULGARIA. \r\n
\r\n -----------------------------------------------------------------------------------------------------------------------------------------------------------------------
Zdraveite, \r\n Vashata porychka e prieta uspeshno i shte byde izpratena sled obrabotkata i. Shte poluchite pratkata na adres: " . $adress . " v srok ot 5 rabotni dni. \r\n
Telefon na potrebitelq: " . $tel . " \r\n
Potrebitelsko ime: " . $url_user . " \r\n
Za dopylnitelna informaciq, tel. 0892238257 (Georgi Mutafchiev). \r\n
S uvajenie, \r\n
Ekipyt na BEBIO BULGARIA. \r\n
";   
$sender = "bebio.bulgaria@gmail.com";
 $mail_from = "From: $sender" .
                    "\r\n" . "Reply-To: $sender" . "\r\n";
                    $mail_from.="Content-type: text/html; charset = utf-8 \r\n";
        
mail($to,$subject,$txt,$mail_from);
}  
} 
$sql2 = "DELETE FROM " . $url_user . " WHERE accountname != '$url_user'";

$sql = "DELETE FROM orders WHERE potrebitel='$url_user'";

if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {
    header("Location: print.php?user_username=$url_user");
    echo "Успешно приета поръчка! Върни се назад:";?>
    <a href="shopcontrol.php">BACK</a>
    <?php
} else {
    echo "Грешка при приема на поръчката: " . $conn->error;
} }
?>
      <br />
      <hr />
      <br />
      <h6 style="color: white;" >* Натисни бутона "ПОТВЪРДИ", само ако продуктите са подготвени за изпращане.</h6>
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

<a href="admin.php">CLICK HERE</a>
