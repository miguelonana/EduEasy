<?php

require('actions/database.php');

$getAllMyQuestions = $bdd->prepare('SELECT id, titre, description FROM question WHERE id_auteur = ? ORDER BY id DESC');
$getAllMyQuestions->execute(array($_SESSION['userId']));