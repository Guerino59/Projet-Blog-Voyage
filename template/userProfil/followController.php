<?php
session_start();
    require __DIR__ . "/../../BDD/requeteSQL/utilisateurs/recupInfo.php";
    $follow = verifyFollow($_SESSION["idUser"], $_GET["idFollowed"]);
    if ($follow) {
        unfollow($_SESSION["idUser"], $_GET["idFollowed"]);
        $_SESSION["flash"] = "Vous avez unfollow ";
    }
    if (!$follow) {
        follow($_SESSION["idUser"], $_GET["idFollowed"]);
        $_SESSION["flash"] = "Vous avez follow";
    }
    $followed = $_GET["idFollowed"];
    header("Location: /Projet-Blog-Voyage/Pages/pageUtilisateurs.php?idUser=$followed");
    exit;
?>