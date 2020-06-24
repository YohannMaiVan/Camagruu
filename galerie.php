<?php
session_start();
require('Database/coDatabase.php');
require (__DIR__ .'/model/gallery.php');
require (__DIR__ .'/model/likeClass.php');

global $picsPerPage;
global $depart;
$picsPerPage = 5;
$donnees = gallery::imagesNumber();
$numTotalPics = count($donnees);
$numPages = ceil($numTotalPics / $picsPerPage);

if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $numPages) {
	$_GET['page'] = intval($_GET['page']);
	$currentPage = $_GET['page'];
 } else {
	$currentPage = 1;
 }

 $depart = ($currentPage - 1) * $picsPerPage;

 if (isset($_SESSION['login']) && isset($_POST['deletePic']) && isset($_POST['id_picture']))
	 $deletePic = gallery::deletePicture();
 
/* 
 $req = $bdd->prepare("SELECT user_image from images WHERE id_image = ?");
 $req->execute(array($donnees[id_image]));
*/

require 'galerie.html.php';
?>