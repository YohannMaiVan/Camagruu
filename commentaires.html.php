<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css">
    <title>Photo</title>
</head>
<body class='z'>
        <div class="z header">
            <div>
                &nbsp;
            </div>
            <div class="header__menu">
                <a href="index.php" class="square_btn">Accueil</a>&nbsp;                    
                <a href="profil.php" id="profile" class="square_btn">Mon profil</a>&nbsp;
                <a href="galerie.php" class="square_btn">Galerie</a>&nbsp;
                <a href="deconnexion.php" class="square_btn">Se déconnecter</a>&nbsp;                
                </div>
            <div>
                <div class="header-logo__2">
                    <img src="img/logo2.png" alt="logo2" height="100" width="100">
                </div>
            </div>
        </div>
		<h2>La photo</h2>	
		
		
		<img src ="<?php echo $picture['path_image'];?>" width="350px" height="255px"/>
		<form method="POST">
			<input type="textarea" name ="commentaire" placeholder="Ecrivez un commentaire..."/><br/>
			<input type="submit" name="submit_com" value="Envoyer"/>
		</form>
		<?php if (isset($c_msg)) { echo $c_msg;} ?>
	  
	  <h2>Commentaires</h2>
    <div>
      <?php
        $result = gallery::fetchCom();
        foreach($result as $comm) { ?>
		    <span><?php echo $comm['com_user'] ?> :</span> <?php echo $comm['commentaire']?> <br>
	    <?php } ?>
        </div>
        <div class="z footer">
            <div>Camagru</div>
         <div>&copy;2020</div>
        </div>
        <script src="JS/cam.js"></script>
</body>
</html>