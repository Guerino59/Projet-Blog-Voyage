<?php $mesArticles = mesArticles($id); ?>
<?php foreach ($mesArticles as $monArticle) : ?>
    <?php $userUsername = infoUsers($monArticle["idUser"]);?>
    <link rel="stylesheet" href="/Projet-Blog-Voyage/template/userProfil/sources/style.css">

    <div class="Resume-cards">
        <span class="pseudo"><?php echo $userUsername["username"] ?></span>
        <span class="paysFav"><?php echo $monArticle["nomPays"] ?></span>
        <a href="/Projet-Blog-Voyage/Pages/detailsArticle.php?idArticle=<?php echo $monArticle["idArticle"] ?>">
        <img src=<?php echo $monArticle["photoResume"] ?>></a>
        <span class="resume"><?php echo $monArticle["texteResume"] ?></span>
        <i class="fa-regular fa-heart"></i>
    </div>
<?php endforeach; ?>