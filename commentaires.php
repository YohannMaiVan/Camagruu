<?php
session_start();
require('Database/coDatabase.php');
require (__DIR__ .'/model/gallery.php');
header('Content-Type: text/html; charset=utf-8');
if (isset ($_GET['id']) && !empty($_GET['id'])) {
	$getid = htmlspecialchars($_GET['id']);
	$picture = gallery::getPicture();
	var_dump($picture);
}

if (isset($_POST['submit_com'])) {
	if (isset($_POST['commentaire']) && !empty($_POST['commentaire'])) {
		$commentaire = htmlspecialchars($_POST['commentaire']);
		if (isset ($_SESSION['login'])) {
			gallery::addCom();
			$c_msg = "Votre commentaire a bien été posté";
		}
		else 
			$c_msg = "Vous devez être connecté pour poster un commentaire";
	}
	else {
		$c_msg = "Tous les champs doivent être complétés";
	}
}

require 'commentaires.html.php';
?>