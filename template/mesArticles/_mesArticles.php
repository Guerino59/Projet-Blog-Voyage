<?php
// require __DIR__ . "/../../BDD/requeteSQL/utilisateurs/recupInfo.php";

$mesArticles = mesArticles($_SESSION["idUser"]);

foreach ($mesArticles as $monArticle) :
?>
    <?php $userUsername = infoUsers($monArticle["idUser"]); ?>
    
    <div class="Resume-cards">
        <span class="pseudo"><?php echo $userUsername["username"] ?></span>
        <span class="paysFav"><?php echo $monArticle["nomPays"] ?></span>
        <a href="#"><img src=<?php echo $monArticle["photoResume"] ?>></a>
        <span class="resume"><?php echo $monArticle["texteResume"] ?></span>
        <i class="fa-regular fa-heart"></i>
    </div>
    <div class="modif">
        <a href="">Editer mon message</a>
        <a href="/Projet-Blog-Voyage/Pages/gestionArticle/deleteArticle.php?idArticle=<?php echo $monArticle['idArticle']?>">Supprimer mon message</a>
    </div>
<?php endforeach; ?>