<?php
try{
    $bdd = new PDO('mysql:host=localhost;dbname=edueasydb;charset=utf8;', 'root', '');
}catch(Exception $e){
    die('Une erreur a été trouvée : ' . $e->getMessage());
}
