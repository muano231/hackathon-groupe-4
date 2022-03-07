<?php
  try{
    $bdd = new PDO ("mysql:host=leoternleoterras.mysql.db;dbname=leoternleoterras;charset=utf8","leoternleoterras","Lacacanisette450");
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }catch(Exception $e){
    die("Error : " .$e->getMessage());
  }
?>
