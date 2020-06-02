<!DOCTYPE html>
<?php
session_start();
require "merge.php";?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css">
    <title>connecté</title>
</head>
<body class='z site'>
        <div class='z header'>
                <div class="header__name">
                <?php
                if (isset($_SESSION['login']))
                {
                       ?> <p class="square_btn"><?php echo "Bonjour  " .$_SESSION['login'];?></p>
                &nbsp; &nbsp;
                <?php
                }
                ?></div>
                <div class="header__menu">
                <a href="profil.php" id="profile" class="square_btn">Mon profil</a>&nbsp;
                <a href="deconnexion.php" class="square_btn">Se déconnecter</a>&nbsp;
                <a href="deconnexion.php" class="square_btn">Accueil</a>&nbsp;
                <a href="deconnexion.php" class="square_btn">Gallerie</a>&nbsp;
                </div>
        </div>
        <div class="z section">
            <div class="z center">
                <img src="img/logo2.png" width="100px" height="100px">
            </div>
            <div class="z section-menu">
                <div class="section-left">
                        <div class="z filter">
                                    <div>
                                    <input type="radio" id="filter1" name="filtre">
                                    <img src="img/leo.png" alt="leo" height="70" width="70">
                                    </div>
                                    <div>
                                    <input type="radio" id="filter2" name="filtre">
                                    <img src="img/leo.png" alt="leo" height="70" width="70">
                                    </div>
                                    <div>
                                    <input type="radio" id="filter3" name="filtre">
                                    <img src="img/leo.png" alt="leo" height="70" width="70">
                                    </div>
                                </div>    
                    <div class="z section-menu__cam">
                        <div><video id="video" width="300px" height="300px" autoplay></video></div>
                        <div><button id="snap" disabled>Snap Photo</button></div>
                    </div>
                </div>
                <div class="z section-menu-images"> 
                    <div class="z canvas">
                        <canvas id="canvas" width="300px" height="200px"></canvas>
                    </div>    
                </div>
             </div>
        </div>
        <div class="z footer">
            <div>Camagru</div>
         <div>&copy;2020</div>
        </div>
        <script src="JS/cam.js"></script>
        <script src="JS/image.js"></script>
        <script src="JS/filtre.js"></script>
</body>
</html>