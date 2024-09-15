<?php

include 'db.php';

ob_start();
session_start();

# Genel İslemler

if(isset($_GET['sil'])) {

  $prop = $_GET['p'];
  $id   = $_GET['id'];
  if($prop == 'category') {
    $delete = $db->prepare("DELETE FROM categories WHERE id=?");
    $run = $delete->execute(array($id));

    if($run) {
      header('location:../kategoriler.php?action=ok');
    } else {
      header('location:../kategoriler.php?action=no');
    }
  }
  if($prop == 'arac') {
    $delete = $db->prepare("DELETE FROM araclar WHERE id=?");
    $run = $delete->execute(array($id));

    if($run) {
      header('location:../araclar.php?action=ok');
    } else {
      header('location:../araclar.php?action=no');
    }
  }
  if($prop == 'intro') {
    $delete = $db->prepare("DELETE FROM intro WHERE id=?");
    $run = $delete->execute(array($id));

    if($run) {
      header('location:../intro.php?action=ok');
    } else {
      header('location:../intro.php?action=no');
    }
  }

}

# İntro
if(isset($_POST['updateIntroText'])) {
  $yazi = $_POST['text'];

  $sql = $db->prepare("UPDATE intro SET yazi=:detail WHERE id=1");
  $sql_run = $sql->execute(array('detail' => $yazi));

  if($sql_run) {
    header('location:../intro.php?action=ok');
  } else {
    header('location:../intro.php?action=no');
  }

}

if (isset($_POST['introImageEkle'])) {

  for($i=0; $i<count($_FILES["image"]["name"]); $i++) {
    $dosyaYukle=$_FILES["image"]["tmp_name"][$i];
    $klasor="../../img/intro";
    $benzersizad = uniqid();
    $resimyol=substr($klasor, 6)."/intro-".$benzersizad.'-'.'.png';
    move_uploaded_file($dosyaYukle, "$klasor/intro-$benzersizad-.png");

    $ekle = $db->prepare("INSERT INTO intro SET image=:img");
    $ekle_run = $ekle->execute(array('img' => $resimyol));

    if($ekle_run) {
      header('location:../intro.php?action=ok');
    } else {
      echo "string";
    }
  }
}

# Hakkinda Yazisi Güncelleme
if(isset($_POST['updateAbout'])) {
  $yazi = $_POST['text'];

  $sql = $db->prepare("UPDATE hakkinda SET yazi=:detail WHERE id=1");
  $sql_run = $sql->execute(array('detail' => $yazi));

  if($sql_run) {
    header('location:../hakkimizda.php?action=ok');
  } else {
    header('location:../hakkimizda.php?action=no');
  }

}

# Kategoriler
if(isset($_POST['addCategory'])){
  $names = $_POST['categoryName'];
  $imgn = $_FILES['catImage']["name"];

  $sor = $db->prepare("SELECT * FROM categories WHERE name=?");
  $sor->execute(array($names));

  $count = $sor->rowCount();

  if($count == 0) {

    if($imgn != null) {
      $uploads_dir = '../../img/categories';
      @$tmp_name = $_FILES['catImage']["tmp_name"];
      @$name = $_FILES['catImage']["name"];
      @$tip = $_FILES['catImage']["type"];

      $benzersizsayi1 = rand(20000,32000);
      $benzersizsayi2 = rand(20000,32000);

      $yeniTip = 'png';

      $benzersizad = $benzersizsayi1.$benzersizsayi2;
      $resimyol=substr($uploads_dir, 6)."/cat-".$benzersizad.'-'.'.'.$yeniTip;
      @move_uploaded_file($tmp_name, "$uploads_dir/cat-$benzersizad-.$yeniTip");
    } else {
      echo "string";
    }

    $sql = $db->prepare("INSERT INTO categories SET name=:isim , image=:resim");
    $sql_run = $sql->execute(array('isim' => $names , 'resim' => $resimyol));
    if($sql_run) {
      header('location:../kategoriler.php?action=ok');
    } else {
      header('location:../kategoriler.php?action=no');
    }
  } else {
    header('location:../kategoriler.php?p=add&action=var');
  }

}

if(isset($_POST['editCategory'])){
  $names = $_POST['categoryName'];
  $id   = $_POST['id'];
  $imgn = $_FILES['catImage']["name"];
  if($imgn != null) {
    $uploads_dir = '../../img/categories';
    @$tmp_name = $_FILES['catImage']["tmp_name"];
    @$name = $_FILES['catImage']["name"];
    @$tip = $_FILES['catImage']["type"];

    $benzersizsayi1 = rand(20000,32000);
    $benzersizsayi2 = rand(20000,32000);

    $yeniTip = 'png';

    $benzersizad = $benzersizsayi1.$benzersizsayi2;
    $resimyol=substr($uploads_dir, 6)."/cat-".$benzersizad.'-'.'.'.$yeniTip;
    @move_uploaded_file($tmp_name, "$uploads_dir/cat-$benzersizad-.$yeniTip");
  } else {

    $sor = $db->prepare("SELECT * FROM categories WHERE id=?");
    $sor->execute(array($id));
    $cek = $sor->fetch(PDO::FETCH_ASSOC);

    $resimyol = $cek['image'];
  }

  $sql = $db->prepare("UPDATE categories SET name=:isim , image=:resim WHERE id=:id");
  $sql_run = $sql->execute(array('isim' => $names , 'id' => $id , 'resim' => $resimyol));

  if($sql_run) {
    header('location:../kategoriler.php?action=ok');
  } else {
    header('location:../kategoriler.php?action=no');
  }
}

# Araçlar
if(isset($_POST['addCar'])) {
  $names = $_POST['carName'];
  $imgn = $_FILES['carImage']["name"];
  $cate = $_POST['carCategory'];
  $text = $_POST['text'];
  $carPrice = $_POST['carPrice'];

  if($imgn != null) {
    $uploads_dir = '../../img/cars';
    @$tmp_name = $_FILES['carImage']["tmp_name"];
    @$name = $_FILES['carImage']["name"];
    @$tip = $_FILES['carImage']["type"];

    $benzersizsayi1 = rand(20000,32000);
    $benzersizsayi2 = rand(20000,32000);

    $yeniTip = 'png';

    $benzersizad = $benzersizsayi1.$benzersizsayi2;
    $resimyol=substr($uploads_dir, 6)."/car-".$benzersizad.'-'.'.'.$yeniTip;
    @move_uploaded_file($tmp_name, "$uploads_dir/car-$benzersizad-.$yeniTip");
  } else {
    echo "string";
  }

  $sql = $db->prepare("INSERT INTO araclar SET name=:isim , image=:resim , kategori=:category , aciklama=:textt , carPrice=:fiyat");
  $sql_run = $sql->execute(array('isim' => $names  , 'resim' => $resimyol , 'category' => $cate , 'textt' => $text , 'fiyat' => $carPrice));

  if($sql_run) {
    header('location:../araclar.php?action=ok');
  } else {
    header('location:../araclar.php?action=no');
  }

}

if(isset($_POST['editCar'])) {
  $id    = $_POST['id'];
  $names = $_POST['carName'];
  $imgn = $_FILES['carImage']["name"];
  $cate = $_POST['carCategory'];
  $text = $_POST['text'];
  $carPrice = $_POST['carPrice'];

  if($imgn != null) {
    $uploads_dir = '../../img/cars';
    @$tmp_name = $_FILES['carImage']["tmp_name"];
    @$name = $_FILES['carImage']["name"];
    @$tip = $_FILES['carImage']["type"];

    $benzersizsayi1 = rand(20000,32000);
    $benzersizsayi2 = rand(20000,32000);

    $yeniTip = 'png';

    $benzersizad = $benzersizsayi1.$benzersizsayi2;
    $resimyol=substr($uploads_dir, 6)."/car-".$benzersizad.'-'.'.'.$yeniTip;
    @move_uploaded_file($tmp_name, "$uploads_dir/car-$benzersizad-.$yeniTip");
  } else {
    $sql = $db->prepare("SELECT * FROM araclar WHERE id=?");
    $sql->execute(array($id));
    $cek = $sql->fetch(PDO::FETCH_ASSOC);

    $resimyol = $cek['image'];
  }

  $sql = $db->prepare("UPDATE araclar SET name=:isim , image=:resim , kategori=:category , aciklama=:textt, carPrice=:fiyat WHERE id=$id");
  $sql_run = $sql->execute(array('isim' => $names  , 'resim' => $resimyol , 'category' => $cate , 'textt' => $text , 'fiyat' => $carPrice));

  if($sql_run) {
    header('location:../araclar.php?action=ok');
  } else {
    header('location:../araclar.php?action=no');
  }

}

?>
