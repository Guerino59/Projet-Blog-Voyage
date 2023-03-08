<?php

$mesArticles = mesArticles($_SESSION["idUser"]);
if (isset($_SESSION["flash"])) {
    $flash =  $_SESSION["flash"];
    unset($_SESSION["flash"]);
}
if (isset($flash)) : ?>
    <p><?php echo $flash ?></p>
<?php endif; ?>
<?php
foreach ($mesArticles as $monArticle) :
?>
    <?php $userUsername = infoUsers($monArticle["idUser"]);

    ?>

    <div class="Resume-cards">
        <span class="pseudo"><?php echo $userUsername["username"] ?></span>
        <span class="paysFav"><?php echo $monArticle["nomPays"] ?></span>
        <a href="/Projet-Blog-Voyage/Pages/detailsArticle.php?idArticle=<?php echo $monArticle["idArticle"] ?>"><img src=<?php echo $monArticle["photoResume"] ?>></a>
        <span class="resume"><?php echo $monArticle["texteResume"] ?></span>
        <i class="fa-regular fa-heart"></i>
    </div>
    <div class="modif">
        <a href="/Projet-Blog-Voyage/Pages/gestionArticle/updateArticle.php?idArticle=<?php echo $monArticle['idArticle'] ?>">Editer mon message</a>
        <a href="/Projet-Blog-Voyage/Pages/gestionArticle/deleteArticle.php?idArticle=<?php echo $monArticle['idArticle'] ?>">Supprimer mon message</a>
    </div>
<?php endforeach; ?>