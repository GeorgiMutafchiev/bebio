 <?php 
     session_start(); 
     require 'dbconn.php'; 
     $user_username = mysqli_real_escape_string($conn,$_REQUEST['user_username']); 
     $shopping_user = $_SESSION['current_user']; 
     if($_SESSION['user_username']){ 
         header("location:print.php?user_username=$user_username"); 
     } 
 ?> 
  <?php 
     $current_user = mysqli_real_escape_string($conn,$_REQUEST['current_user']); 
     $current_user = $_SESSION['current_user']; 
 ?> 


 <?php 
     $url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']; 
     $url_user = $_GET['user_username'];
 ?> 
<html>
    <head>
            <meta charset="UTF-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0"/>    
	<title>PRINT</title>
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
    <div class="admincol">
    <body style="background-color: seagreen;">

<br/ ><br /><br /><hr /><br />
    <script type="text/javascript">     
    function PrintDiv() {    
       var divToPrint = document.getElementById('divToPrint');
       var popupWin = window.open('', '_blank', 'width=1240,height=720');
       popupWin.document.open();
       popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
            }
 </script>

        <div id="divToPrint" style="display:none;">
  <div style="width:800px;height:600px;background-color:teal;">  
  <?php
    $pagecontents = file_get_contents("orders/" . $url_user . ".txt");

    ?><p> <?php echo $pagecontents; ?> </p> <?php

?>
  </div>
</div>
<div class="col s12 center">
               	<h1 class="hide-on-med-and-down" style="color: white; text-shadow: 2px 2px 2px black;">ПРИНТИРАЙТЕ ПОРЪЧКАТА</h1><hr /><br />
               	
               	<input style="width: 80%; height: 50px; background-color: seagreen; border: 3px solid white; font-size: 20px; color: white;" type="button" value="ПРИНТИРАЙ" onclick="PrintDiv();" />
               	<br /><br /><hr /><br />
    <a style="color: white; text-decoration: underline;" href="shopcontrol.php">Назад <i class="material-icons">undo</i></a>
    <br />
    <br />
    <br />
    <hr />
    <br />
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
    </div>
</html>