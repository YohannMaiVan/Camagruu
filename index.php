<!DOCTYPE html>
<?php
session_start();
require('Database/coDatabase.php');
require (__DIR__ .'/model/gallery.php');
?>
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
                <a href="index.php" class="square_btn">Accueil</a>&nbsp;                    
                <a href="profil.php" id="profile" class="square_btn">Mon profil</a>&nbsp;
                <a href="galerie.php" class="square_btn">Galerie</a>&nbsp;
                <a href="deconnexion.php" class="square_btn">Se déconnecter</a>&nbsp;                
                </div>
        </div>
        <div class="z section">
            <div class="z center">
                <a href="index.php"><img src="img/logo2.png" width="100px" height="100px"></a>
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
                        <div class="upload">
                            <form method="post" enctype="multipart/form-data">
                            <input type="file" name="files[]" multiple />
                            <input type="submit" value="Upload File" name="submit" />
                        </form>
                        </div>
                    </div>
                </div>


                <div class="z section-menu-images"> 

                    <div class="z canvas">
                        <canvas id="canvas" width="500px" height="500px"></canvas>
                        <?php
                            $donnees = gallery::fetchMiniatures();
                            foreach ($donnees as $miniatures)
                            { ?>
                            <img src="<?php echo $miniatures['path_image'];?>"  width="150px" height="112,5px">
                            <?php
                            }
                        ?>
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
        <script src="JS/upload.js"></script>
</body>
</html>