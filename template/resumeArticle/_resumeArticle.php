<?php
// require __DIR__ . "/../../BDD/requeteSQL/utilisateurs/recupInfo.php";

$articles = AllArticle();

foreach ($articles as $article) :
?>
    <?php $userUsername = infoUsers($article["idUser"]); ?>
    <div class="Resume-cards">
        <span class="pseudo"><?php echo $userUsername["username"] ?></span>
        <span class="paysFav"><?php echo $article["nomPays"] ?></span>
        <a href="#"><img src=<?php echo $article["photoResume"] ?>></a>
        <span class="resume"><?php echo $article["texteResume"] ?></span>
        <i class="fa-regular fa-heart"></i>
    </div>
<?php endforeach; ?>