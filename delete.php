<?php
session_start();

if ($_SESSION['logueado']){

include_once("config_product.php");
include_once("db.class.php");
$link = new Db();
$idDel=$_GET['q'];
//DELETE FROM products WHERE id_product = 14;
$sql="delete from products where id_product=".$idDel;
$stmt=$link->run($sql);
header('location:welcome.php');
}
?>
