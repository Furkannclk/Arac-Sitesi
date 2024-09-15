<?php

include 'db.php';

# İntro Yazısı Çağırma
function getIntroText() {
  global $db;

  $sql = $db->prepare("SELECT * FROM intro WHERE id=1");
  $sql->execute();
  $sql_run = $sql->fetch(PDO::FETCH_ASSOC);

  return $sql_run['yazi'];

}

# Hakkında Yazısı Çağırma
function getAboutText() {
  global $db;

  $sql = $db->prepare("SELECT * FROM hakkinda WHERE id=1");
  $sql->execute();
  $sql_run = $sql->fetch(PDO::FETCH_ASSOC);

  return $sql_run['yazi'];

}

# Kategori İsmi
function getCatName($id) {
  global $db;

  $sql = $db->prepare("SELECT * FROM categories WHERE id=?");
  $sql->execute(array($id));
  $sql_run = $sql->fetch(PDO::FETCH_ASSOC);

  return $sql_run['name'];
}

# İşlemlerin Sonuçları
function getActionBlock($prop) {

  if($prop == 'ok') {
    echo "<div class='card p-3 my-4 bg-primary'>";
    echo "<b class='text-white'>İşlem Başarılı</b>";
    echo "</div>";
  }
  if($prop == 'no') {
    echo "<div class='card p-3 my-4 bg-danger'>";
    echo "<b class='text-white'>İşlem Başarısız</b>";
    echo "</div>";
  }
  if($prop == 'olusturulmus') {
    echo "<div class='card p-3 my-4 bg-dark'>";
    echo "<b class='text-white'>İşlem Başarısız , aynı isimde veri var.</b>";
    echo "</div>";
  }

}

?>
