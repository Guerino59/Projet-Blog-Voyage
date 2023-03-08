<?php
require __DIR__."/../service/_cleanData.php";
require __DIR__."/../BDD/requeteSQL/utilisateurs/recupInfo.php";

$paysChoisi = "";
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["search"])){
        if(!empty($_POST["pays"]))
        {
            $paysChoisi = cleanData($_POST["pays"]); 
        }
        else
        {
            $_SESSION["flash"] = "Veuillez renseigner un pays !";
            header("location: /Projet-Blog-Voyage/Pages/filActu.php");
            exit;
        }
    }
    $bodyclass = "payscss";
    // var_dump($bodyclass);
    require __DIR__."/../template/navbar/_navbar.php";
$pays = AllArticleByPays($paysChoisi);
?>
<link rel="stylesheet" href="/Projet-Blog-Voyage/template/resumeArticle/sources/style.css">
<?php require __DIR__."/../template/search/_search.php"; ?>
<?php if (!$pays) : ?>
    <div class="nolike">
        <h1>Aucun article ne correspond à "<?php echo $paysChoisi ?>"</h1>
        <a href="/Projet-Blog-Voyage/Pages/AjoutArticle.php">Soyez le premier à en parler </a>
    </div>
<?php else : ?>
    <h1><?php echo $paysChoisi ?></h1>
<?php endif; ?>
<div class="container">
    <?php
    foreach ($pays as $p) :
    ?>
        <?php
        $userUsername = infoUsers($p["idUser"]);
        $nblike = nbLike($p["idArticle"]);
        ?>
        <div class="Resume-cards">
            <span class="pseudo"><?php echo $userUsername["username"] ?></span>
            <span class="paysFav"><?php echo $p["nomPays"] ?></span>
            <a class="photo" href="/Projet-Blog-Voyage/Pages/detailsArticle.php?idArticle=<?php echo $p["idArticle"] ?>"><img src=<?php echo $p["photoResume"] ?>></a>
            <span class="resume"><?php echo $p["texteResume"] ?></span>
            <a class="like" href="/Projet-Blog-Voyage/template/mesLikes/like_controller.php?idUser=<?php echo $_SESSION["idUser"] ?>&idArticle=<?php echo $p["idArticle"] ?>">
                <i class="<?php
                            $like = verifyLike($_SESSION["idUser"], $p["idArticle"]);
                            if ($like) {
                                echo "fa-solid";
                            }
                            if (!$like) {
                                echo "fa-regular";
                            }
                            ?> fa-heart fa-2x"></i><span class="nbLike"><?php echo $nblike["COUNT(*)"] . " Likes" ?></span></a>

        </div>

    <?php endforeach; ?>
</div>

