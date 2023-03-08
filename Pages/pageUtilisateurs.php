<?php
$title = "Votre profil";
require __DIR__ . "/../template/navbar/_navbar.php";
$id = $_GET["idUser"]??$_SESSION["idUser"];
$user = infoUsers($id);
$articles = mesArticles($id);
?>
<link rel="stylesheet" href="../src/css/pageUtilisateurs.css">

<div class="info_Profil">
    <div class="utilisateurs">
        <img src="<?php echo $user["profilePicture"] ?>" alt="">
        <p><?php echo $user["username"] ?></p>
        <?php if($_GET["idUser"] != $_SESSION["idUser"]) :?>
            <input type="button" value="Suivre">
        <?php endif; ?>
    </div>
    <?php
        require __DIR__."/../template/userProfil/_userProfil.php" ;
    ?>
    <link rel="stylesheet" href="../src/css/filActu.css">
</div>