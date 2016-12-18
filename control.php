<?php 
session_start();
if(isset($_SESSION['username'])) {
include "dbconn.php"; 
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
        <li><a href="#">Добави</a></li>
        <li><a href="delete.php">Премахни</a></li>
        <li><a href="shopcontrol.php">Магазин</a></li>
		<li class="active" ><a href="logout.php?logout-from-admin-panel">Изход</a></li>
      </ul>
      <ul class="side-nav mininav" id="mobile-demo">
        <li style="transform: skewX(0deg);"><a style="transform: skewX(0deg); color: seagreen;" href="#">Добави</a></li>
        <li style="transform: skewX(0deg);"><a style="transform: skewX(0deg); color: seagreen;" href="delete.php">Премахни</a></li>
        <li style="transform: skewX(0deg);"><a style="transform: skewX(0deg); color: seagreen;"href="firmi.php">Поръчки</a></li>
		<li style="transform: skewX(0deg); color: seagreen;" class="active"><a style="transform: skewX(0deg); color: seagreen;" href="logout.php?logout-from-admin-panel">Изход</a></li>
      </ul>
    </div>
  </nav>
</div>     
    <div class="container add">
        <div class="row">
            <div class="col s12">
                <h4 class="center" style="color: white;">ДОБАВИ ПРОИЗВОДИТЕЛ</h4>
                <hr /><br class="hide-on-med-and-down" />
                <div class="col s12 inputs">
                <form enctype="multipart/form-data" class="col s12" action="control.php" method="post">
                    <input style="color: white;" type="text" name="username" placeholder="Име на фирмата" >
                        <input style="color: white;" type="text" name="shortname" placeholder="Код на фирмата" ><br />

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

                    <input style="color: white;" type="text" name="naselenomqsto" placeholder="Град" required>
                        <input style="color: white;" type="text" name="adress" placeholder="Адрес на фирмата" required>
                    <input style="color: white;" type="text" name="ceo" placeholder="Основател на фирмата" required>
                        <input style="color: white;" type="text" name="tel" placeholder="Телефон на фирмата" required>
                    <input style="color: white;" type="email" name="email" placeholder="Имейл адрес на фирмата" required>
                        <input style="color: white;" type="text" name="web" placeholder="Уебсайт на фирмата" required>
                    <textarea type="textarea" name="shortdesc" rows="5" placeholder="Въведете кратко описание на фирмата (до 255 символа)"></textarea>
                        <textarea type="textarea" name="description" rows="15" placeholder="Въведете подробно описание на фирмата"></textarea> 
                    <hr />
                    <div class="center">
                    <p style="color: white;">Изберете профилна снимка:</p>
                    <input type="file" name="profilepic" id="profilepic" required><hr />
                    <p style="color: white;">Добавете снимки:</p>
                    <input type="file" name="pic1">
                    <input type="file" name="pic2">
                    <input type="file" name="pic2"><hr />
                        <input style="margin-top: 2%;" type="submit" name="submit" value="ДОБАВИ"></div>
                </form>
                    <?php
                                            if(isset($_POST['submit'])){
                             $username = $_POST['username'];
                                $shortname = $_POST['shortname'];
                                    $naselenomqsto = $_POST['naselenomqsto'];
                                        $adress = $_POST['adress'];
                                            $ceo = $_POST['ceo'];
                                            $category = $_POST['categoria'];
                             $tel = $_POST['tel'];
                                $email = $_POST['email'];
                                    $web = $_POST['web'];
                                        $shortdesc = $_POST['shortdesc'];
                                            $description = $_POST['description'];
                                               $sql = "INSERT INTO users (username, shortname, category, naselenomqsto, adress, ceo, tel, email, web, shortdesc, description)
 VALUES ('$username','$shortname','$category','$naselenomqsto','$adress','$ceo','$tel','$email','$web', '$shortdesc', '$description')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
    
$uploaddir = "uploads/" . $shortname;
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
                    </div></div>
        </div>
    </div>
<?php
echo file_get_contents("views/footer.html");
} else{
echo "Please login!"; 
?>
<a href="admin.php">CLICK HERE</a>
<?php } ?>