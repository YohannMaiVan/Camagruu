<?php
    session_start();
	require('Database/coDatabase.php');
	require (__DIR__ .'/model/user.php');

  // S'il y a une session alors on ne retourne plus sur cette page  
    if (isset($_SESSION['id'])){
        header('Location: index.php');
        exit;
    }
 
    // Si la variable "$_Post" contient des informations alors on les traitres
    if(!empty($_POST)){
        extract($_POST);
        $valid = true;
 
        if (isset($_POST['form_connexion'])){
			$login = htmlentities(trim($login));
			$mdp = trim($mdp);
 
			if (empty($login))
			{
				$valid = false;
				$er_login = "le login ne peut pas etre vide fdp";
			}
 
			if (empty($passwd))
			{
				$valid = false;
				$er_mdp = "le mot de passe ne doit pas etre vide";
			}
			
			if (!empty($_POST['login']) and !empty($_POST['passwd']))
			{
				$requser = user::connect_user();
				$userexist = $requser->rowCount();
			}
 
            // Si le token n'est pas vide alors on ne l'autorise pas à accéder au site
           // if($req['token'] <> NULL){
            //	$valid = false;
            //    $er_mail = "Le compte n'a pas été validé";	
            }
 
            // S'il y a un résultat alors on va charger la SESSION de l'utilisateur en utilisateur les variables $_SESSION
            if ($valid && $userexist == 1){
				$userinfo = $requser->fetch();
                $_SESSION['id'] = $userinfo['id']; // id de l'utilisateur unique pour les requêtes futures
                $_SESSION['login'] = $userinfo['login'];
                $_SESSION['mail'] = $userinfo['mail'];
				echo "connexion reussie";
                header('Location:  index.php');
                exit;
			} 
			if(isset ($er_login) )  
        }
?>