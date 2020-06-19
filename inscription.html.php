<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/inscription.css">
    <title>Inscription</title>
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
        <h1>Créer votre compte</h1>
            <form method="POST" action="inscription.php">
            <div class="form2">
                <div class="field"><label for="pseudo">Identifiant: <br></label><input type="text" name="login" id="pseudo"><br></div>
                <div class="field"><label for="email">Votre addresse mail: <br></label><input type="mail" name="mail" id="email"><br></div>
                <div class="field"><label for="mdp">Mot de passe: <br></label><input type="password" name="passwd" id="mdp"><br></div>
                <div class="field"><label for="confirm_mdp">Confirmer le Mdp: <br></label><input type="password" name="confmdp" id="confmdp"><br></div>
                </div>
                <div class="form3">
                <input type="submit" name="form_inscription" value="Créer un compte"/><br>
                <a href="connexion.html" id="creation-cancel-button"><span>Vous avez déjà un compte?</span></a><br>
                <a href="index.php" id="home"><span>Retour page d'accueil</span></a>
                </div>
                </div>
            </form>
            </div>
    </div>
    <div class="z footer">
            <div>Camagru</div>
         <div>&copy;2020</div>
    </div>
</body>
</html>