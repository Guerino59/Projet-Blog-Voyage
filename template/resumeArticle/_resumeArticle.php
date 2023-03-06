<?php
// require __DIR__ . "/../../BDD/requeteSQL/utilisateurs/recupInfo.php";

$articles = AllArticle();
if (isset($_SESSION["flash"])) {
    $flash =  $_SESSION["flash"];
    unset($_SESSION["flash"]);
}
if (isset($flash)) : ?>
    <p><?php echo $flash ?></p>
<?php endif; ?>
<?php
foreach ($articles as $article) :
?>
    <?php $userUsername = infoUsers($article["idUser"]); ?>
    <div class="Resume-cards">
        <span class="pseudo"><?php echo $userUsername["username"] ?></span>
        <span class="paysFav"><?php echo $article["nomPays"] ?></span>
        <a class="photo" href="/Projet-Blog-Voyage/Pages/detailsArticle.php?idArticle=<?php echo $article["idArticle"] ?>"><img src=<?php echo $article["photoResume"] ?>></a>
        <span class="resume"><?php echo $article["texteResume"] ?></span>
        <a class="like" href="/Projet-Blog-Voyage/template/mesLikes/like_controller.php?idUser=<?php echo $_SESSION["idUser"] ?>&idArticle=<?php echo $article["idArticle"] ?>">
            <i class="<?php
                        $like = verifyLike($_SESSION["idUser"], $article["idArticle"]);
                        if ($like) {
                            echo "fa-solid";
                        }
                        if (!$like) {
                            echo "fa-regular";
                        }
                        ?> fa-heart"></i></a>
    </div>
<?php endforeach; ?>
<?php


?>