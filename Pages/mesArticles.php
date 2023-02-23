<?php
require "../service/_shouldBeLogged.php";
shouldBeLogged(true, "/Projet-Blog-Voyage/Pages/Accueil.php");
    if(!isset($_GET["id"]) || $_GET["id"] != $_SESSION["idUser"])
    {
       header("Location: ./Accueil.php");
       exit;
    }
    else
    {
        echo "COUCOU";
    }
?>