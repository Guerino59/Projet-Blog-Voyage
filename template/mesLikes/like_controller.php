<?php
require __DIR__ . "/../../BDD/requeteSQL/utilisateurs/recupInfo.php";
session_start();
if (empty($_GET["idUser"]) || $_GET["idUser"] != $_SESSION["idUser"]) {
    header("Location: /Projet-Blog-Voyage/Pages/filActu.php");
    exit;
}
$like = verifyLike($_GET["idUser"], $_GET["idArticle"]);
if ($like) {
    unLike($_GET["idUser"], $_GET["idArticle"]);
}
if (!$like) {
    Like($_GET["idUser"], $_GET["idArticle"]);
}
header("Location: /Projet-Blog-Voyage/Pages/filActu.php");
exit;
