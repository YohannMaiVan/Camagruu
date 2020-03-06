<!DOCTYPE html>
<?php
session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="flexmodel.css">
    <title>Document</title>
</head>
<body class='z'>
        <div class='z header'>
                <?php
                if (isset($_SESSION['login']))
                {

                        echo "Bonjour, " .$_SESSION['login'];
                }
                ?>
                    <a href="inscription.html.php">S'inscrire</a>
                    <a href="connexion.html">Se connecter</a>
                    <a href="forget_pwd.html">Mot de passe oublié</a>
                <?php
                if (isset($_SESSION['login']))
                {
                ?>
        	<a href="profil.php" id="profile"><span>Mon profil</span></a>
                
                <a href="deconnexion.php">Se déconnecter</a> <?php }
                ?>
        </div>  
        <div class="z section">
                <div class="z left">CAM</div>
        
                <div class="z right">IMG</div>
        
        </div>
</body>
</html>