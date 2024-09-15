<?php
include "../adminpanel/includes/db.php";

ob_start();
session_start();

if(isset($_POST['loginBtn'])){

    $login = $_POST['login'];
    $pass =$_POST['pass'];
    if ($login != "" && $pass != ""){

      $sql = $db->prepare("SELECT count(*) as loginCount FROM login WHERE name=:name and pass=:pass");
      $sql->execute(array('name' => $login , 'pass' => $pass));
      $key = $sql->fetch(PDO::FETCH_ASSOC);

      $count = $key['loginCount'];

        if($count > 0){
            $_SESSION['login'] = $login;
            header('Location: ../adminpanel/index.php');
        }else{
         echo' <div id="formFooter">';
          echo '<a class="underlineHover" href="#">Hatalı Kullanıcı Adı Veya Şifre</a>';
       echo ' </div>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Oto Galeri</title>
  <link rel="stylesheet" href="./style.css">

</head>
<body>

<div class="wrapper fadeInDown">
  <div id="formContent">
    
    <h2 class="active"> Giriş Yap</h2>

    
    <div id="logo" class="pull-left">
        <h1><a href="../index.php" class="scrollto">Oto <span>Galeri</span></a></h1>
      </div>

    
    <form action="" method="post">
      <input type="text" id="login" class="fadeIn second" name="login" placeholder="Kullanıcı Adı">
      <input type="text" id="password" class="fadeIn third" name="pass" placeholder="Şifre">
      <input type="submit" class="fadeIn fourth" name="loginBtn" value="Giriş Yap">
    </form>


  </div>
</div>


</body>
</html>
