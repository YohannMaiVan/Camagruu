<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="flexmodel.css">
    <title>Document</title>
</head>
<body class='z'>
<?php
if (isset($_SESSION['id']))
{
        ?>
        <div>Bonjour, $_SESSION['id']</div>
        <?php

}
?>

        <div class='z header'>
                    <a href="inscription.html.php">S'inscrire</a>
                    <a href="connexion.html">Se connecter</a>
                    <a href="forget_pwd.html">Mot de passe oublié</a>
        </div>  
        <div class="z section">
                <div class="z left">CAM</div>
        
                <div class="z right">IMG</div>
        
        </div>
</body>
</html>