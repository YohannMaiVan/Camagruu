<?php
session_start();
require('Database/coDatabase.php');
require (__DIR__ .'/model/gallery.php');
require (__DIR__ .'/model/likeClass.php');

$getlogin = isset($_SESSION['login']) ? htmlspecialchars($_SESSION['login']) : NULL;
if (isset($_GET['t'], $_GET['id'], $getlogin) && !empty($_GET['t']) && !empty($_GET['id']) && !($getlogin === NULL)){
	$getid = (int) $_GET['id'];
	$getLike = (int) $_GET['t'];
	$picture = gallery::getPicture();
	var_dump($picture);

	$check = likeClass::checkNumLikes($getid, $getlogin);
	/* LIKE insertion into DB */

		if ($picture['id_image'] == $getid) {
			
			if($getLike == 1) {
				if ($check->rowCount() == 1) {
					echo "valeur de login $getlogin et id $getid valeur de getlike : $getLike";
				likeClass::delLike($getlogin, $getid);
				echo "------------->TEST DU DISLIKE<------------";
				} 

				else {

				likeClass::addLike(NULL, 1, $getlogin, $getid);
				echo "---------->TEST DU LIKE<----------";
				}
			}
		} 
		
		else
			exit('Mega Erreur');
		}

require 'commentaires.html.php';

?>