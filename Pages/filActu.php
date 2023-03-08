<?php
$title = "Fil d'Actualité";
$bodyclass = "payscss";
require __DIR__ . "/../template/navbar/_navbar.php";
require __DIR__ . "/../BDD/requeteSQL/utilisateurs/recupInfo.php";
?>
<link rel="stylesheet" href="../src/css/filActu.css">
<?php
require __DIR__."/../template/search/_search.php";
require __DIR__ . "/../template/resumeArticle/_resumeArticle.php";
?>
<?php require __DIR__ . "/../template/footer/_footer.php"; ?>