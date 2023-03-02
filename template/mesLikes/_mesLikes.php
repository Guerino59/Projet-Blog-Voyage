<?php
// require __DIR__ . "/../../BDD/requeteSQL/utilisateurs/recupInfo.php";

$mesLikes = getLikeByIdUser($_SESSION["idUser"]);
if (isset($_SESSION["flash"])) {
    $flash =  $_SESSION["flash"];
    unset($_SESSION["flash"]);
}
if (isset($flash)) : ?>
    <p><?php echo $flash ?></p>
<?php endif; ?>

<?php
foreach ($mesLikes as $monLike) :
?>
    <?php 
          $article = articleByIdArticle($monLike["idArticle"]);
          $userUsername = infoUsers($article["idUser"]);
    ?>

    <div class="Resume-cards">
        <span class="pseudo"><?php echo $userUsername["username"] ?></span>
        <span class="paysFav"><?php echo $article["nomPays"] ?></span>
        <a href="/Projet-Blog-Voyage/Pages/detailsArticle.php?idArticle=<?php echo $article["idArticle"] ?>"><img src=<?php echo $article["photoResume"] ?>></a>
        <span class="resume"><?php echo $article["texteResume"] ?></span>
        <form action="" method="post">
            <label for="like"><i class="<?php 
                if($like)
                var_dump($like);
                echo "fa-solid";
                if(!$like)
                echo "fa-regular";
            ?> fa-heart"></i></label>
            <input hidden name="like" id="like" type="submit" value="">
        </form>
    </div>
<?php endforeach; ?>
<?php 
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["like"])){
    $like = verifyLike($_SESSION["idUser"], $monLike["idArticle"]);
    if($like){
        unLike($_SESSION["idUser"], $monLike["idArticle"]);
    }
    if(!$like){
        like($_SESSION["idUser"], $monLike["idArticle"]);
    }
}

?>