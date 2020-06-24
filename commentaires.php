<?php
session_start();
require('Database/coDatabase.php');
require (__DIR__ .'/model/gallery.php');
header('Content-Type: text/html; charset=utf-8');

if (isset ($_GET['id']) && !empty($_GET['id'])) {
	$getid = htmlspecialchars($_GET['id']);
	$picture = gallery::getPicture();
}
$mail = gallery::selectMail();

if (isset($_POST['submit_com'])) {
	if (isset($_POST['commentaire']) && !empty($_POST['commentaire'])) {
		$commentaire = htmlspecialchars($_POST['commentaire']);
		if (isset ($_SESSION['login'])) {
			gallery::addCom();
			$c_msg = "Votre commentaire a bien été posté";
		
			$msg = "bonjour vous avez recu un nouveau commentaire";
			$objet = 'nouveau commentaire';
			$emailFrom = 'maris.grinbergs1301@gmail.com';
            $header="MIME-Version: 1.0\r\n";
            $header.= "From: " . $emailFrom . "\r\n";
            $header.='Content-Type:text/html; charset="uft-8"'."\n";
			$header.='Content-Transfer-Encoding: 8bit';
			
            mail($mail[0]["mail"], $objet, $msg, $header);
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