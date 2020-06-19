<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/editprofil.css">
	<title>Mon profil</title>
</head>
<body class="z site">
<div class="z header">
            <div class=" header__menu">
                <div class="square_btn">
                    <a href="inscription.html.php">S'inscrire</a>&nbsp;&nbsp;
                </div>
                <div class="square_btn">
                    <a href="connexion.html">Se connecter</a>&nbsp;&nbsp;
                </div>
                <div class="square_btn">
                    <a href="forget_pwd.html">Mot de passe oublié</a>&nbsp;&nbsp;
                </div>
            </div>
		</div>
	<div class="z section">
		<div class="formu">
	<h1>Mon profil</h1>
	<div class="form2">
	<form method="POST" action="profil.php">
		<div class="pseudo">
		<label>Pseudo actuel :</label>
		<input type="text" value="<?php echo $userinfo['user']; ?>" disabled>
		</div>
		<div>
		<label>Entrez votre nouveau pseudo :</label>
		<input type="text" name="newpseudo" placeholder="...">
		</div>
		<div class="mail">
		<label for="mail1">Votre mail actuel :</label>
		<input type="text" value="<?php echo $userinfo['mail']; ?>" disabled>
		</div>
		<div>
		<label for="mail1">Entrez votre nouveau mail :</label>
		<input type="text" name="newmail" placeholder="...">
		</div>
		<div class="passwd">
		<label>Entrez votre nouveau mot de passe :</label>
		<input type="password" name="newmdp1" placeholder="...">
		</div>
		<div>
		<label>Confirmation du mot de passe :</label>
		<input type="password" name="newmdp2" placeholder="..."/>
		</div>
		<div class="maj">
			<input type="submit" name="submit" value="Mettre à jour mon profil !"/>
		</div>
	</form>	
	</div>
	<div class="retour"><a href="index.php" id="home"><span>Retour page d'accueil</span></a></div>
	
	</div>
</div>
<div class="z footer">
            <div>Camagru</div>
         <div>&copy;2020</div>
        </div>
</body>
</html>