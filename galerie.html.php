<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css">
    <title>Galerie</title>
</head>
<body class='z'>
        <div class="z header">
            <div>
                &nbsp;
            </div>
            <div class="z header-menu">
                <div class="z button btn btn-light">
                    <a href="inscription.html.php">S'inscrire</a>
                </div>
                <div class="z button btn btn-light">
                    <a href="connexion.html">Se connecter</a>
                </div>
                <div class="z button btn btn-light">
                    <a href="forget_pwd.html">Mot de passe oublié</a>
                </div>
            </div>
            <div>
                <div class="header-logo__2">
                    <img src="img/logo2.png" alt="logo2" height="100" width="100">
                </div>
            </div>
        </div>
        
        <h1>La galerie d'images</h1>		
		<div class="galerie">
            <?php
                $donnees = gallery::fetchGallery();
                foreach ($donnees as $pics)
                { ?>
                <div class="fivePics x">
                <a href="commentaires.php?id=<?php echo $pics['id_image'];?>">
                <img src="<?php echo $pics['path_image'];?>"  width="100%" height="225px"/></a>
                <?php echo $pics['id_image'];
                    $likes = likeClass::fetchLikes($pics['id_image']);
                    $likes = $likes->rowCount();
                ?>

                <!-- 1 for likes 2 for dislikes -->                           
                <?php if (isset ($_SESSION['login']) && ($pics['user_image'] == $_SESSION['login'])){
                     echo $pics['id_image'];?>
                     <a href="likes.php?t=1&amp;id=<?php echo $pics['id_image'] ?>">J'aime</a> <?php echo $likes ?> <br>
                     <a href="likes.php?t=2&amp;id=<?php echo $pics['id_image'] ?>">Je n'aime pas</a> (1) <br>
                <form method="post">
                    <input type="hidden" name="id_picture" value="<?php echo $pics['id_image'];?>"/>
                    <input type="submit" name ="deletePic" value="Supprimer la photo" />
                </form>
                <?php } ?>
            
            
            </div>
            <?php
                }
			?>
		</div>

        <div>
        <?php
            
            for($i=1;$i<=$numPages;$i++) {
                if ($i == $currentPage) {
                    echo $i.' ';
                }
                else {
                    echo '<a href="galerie.php?page=' . $i.'">' .$i . '</a>';
                }
            }
        ?>
        </div>


        <div class="z footer">
            <div>Camagru</div>
         <div>&copy;2020</div>
        </div>
        <script src="JS/cam.js"></script>
</body>
</html>