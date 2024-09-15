<?php
include '../config.php';

if(isset($_GET["id"])){
    $numara=$_GET["id"];

    $sorgu = "DELETE FROM intro WHERE id ='$numara'";

    if ($con->query($sorgu) === TRUE) {
        header("location: intro.php");
    } else {
        echo "Error: " . $sorgu . "<br>" . $baglanti->error;
    }

}else{
    die("Numara yok !");
}


?>