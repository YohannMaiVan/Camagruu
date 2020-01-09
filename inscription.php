<?php
session_start();
include('bd/connexionDB.php');

if (isset($_SESSION['id']))
{
    header('Location: index.php');
    exit;
}

if (!empty($_POST))
{
    extract($_POST);
    $valid = true;

    if (isset($_POST['inscription']))
    {
        $login = htmlentities(trim($login));
        $mail = htmlentities(strtolower(trim($mail)));
        $mdp = trim(($mdp));
        $confmdp = trim($confmdp);
    }

    if (empty($login))
    {
        $valid = false;
        $er_login = "le login ne peut pas etre vide fdp";
    }

    if (empty($mail))
    {
        $valid = false;
        $er_mail = "ce mail ne peut pas etre vide fdp";
    }
    else if (!preg_match("/^[a-z0-9\-_.]+@[a-z]+\.[a-z]{2,3}$/i", $mail))
    {
        $valid = false;
        $er_mail = "ce mail n est pas valide fdp";
    }
    else
    {
        $req_mail = $DB->query("SELECT mail from utilisateur WHERE mail = ?", array($mail));
        $req_mail = $req_mail->fetch();

        if ($req_mail['mail'] != "")
        {
            $valid = false;
            $er_mail = "ce mail existe deja";
        }
    }
    
    if (empty($mdp) || empty($confmdp))
    {
        $valid = false;
        $er_mdp = "le mot de passe ne doit pas etre vide";
    }
    else if ($mdp != $confmdp)
    {
        $valid = false;
        $er_mdp = "la confirmation du mdp ne correspond PAS";
    }
}
    if ($valid == TRUE)
    {
        $date_account = date('Y-m-d H:i:s');
        $DB->insert("INSERT INTO utilisateur (login, mail, mdp, date_account) VALUES (?,?,?,?)",
        array($login, $mail, $mdp, $date_account));

        $mdp = crypt($mdp, "$6$rounds=5000$macleapersonnaliseretagardersecret$"); // pas sur si il faut le mettre ici ou avant la DB

        header('Location: index.php)');
        exit;
    }
?>

