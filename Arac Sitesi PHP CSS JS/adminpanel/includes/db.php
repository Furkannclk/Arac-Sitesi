<?php

try {

$db=new PDO("mysql:host=localhost;dbname=aracprojesi",'root','');
$db->exec("SET NAMES 'utf8'; SET CHARSET 'utf8'");

}
//pdoexpression
catch (pdoexpression $e) {
echo $e->getMessage();

$db = null;
}

?>
