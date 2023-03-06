<?php
require __DIR__ . "/../../BDD/requeteSQL/utilisateurs/recupInfo.php";
session_start();
$like = verifyLike($_GET["idUser"], $_GET["idArticle"]);
if ($like) {
    unLike($_GET["idUser"], $_GET["idArticle"]);
}
if (!$like) {
    Like($_GET["idUser"], $_GET["idArticle"]);
    echo "coucou";
}
header("Location: /Projet-Blog-Voyage/Pages/filActu.php");
exit;
