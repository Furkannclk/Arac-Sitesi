<?php
include '../config.php';

if(isset($_GET["id"])){
    $numara=$_GET["id"];

    $sorgu = "DELETE FROM images WHERE id ='$numara'";

    if ($con->query($sorgu) === TRUE) {
        header("location: arac.php");
    } else {
        echo "Error: " . $sorgu . "<br>" . $baglanti->error;
    }

}else{
    die("Numara yok !");
}


?>