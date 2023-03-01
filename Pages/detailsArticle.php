<?php
$title = "Ajout article";
require __DIR__ . "/../template/navbar/_navbar.php";
$article = articleByIdArticle($_GET["idArticle"]);
$usernameArticle = infoUsers($article["idUser"]);
?>
<link rel="stylesheet" href="../src/css/detailsArticle.css">

<div class="details_Article">
    <div class="titre">
        <h2><?php echo $article["nomArticle"] ?></h2>
        <h4><?php echo $article["nomPays"] ?></h4>
    </div>
    <div class="auteur">
        <p><?php echo $usernameArticle["username"] ?></p>
        <img src="<?php echo $usernameArticle["profilePicture"] ?>" alt="">
    </div>
    <!-- resume -->
    <div class="details_Article_base">
        <div class="details_Article_resume">
            <p><?php echo $article["texteResume"] ?></p>
        </div>

        <div class="details_Article_resume_img">
            <img src="<?php echo $article["photoResume"] ?>" alt="">
        </div>
    </div>

    <!-- autres -->
    <div class="autres">
        <div class="details_Article_autres">
            <img src="<?php echo $article["photoContenu"] ?>" alt="">
        </div>

        <div class="details_Article_autres">
            <p><?php echo $article["texteContenu"] ?></p>
        </div>
    </div>

</div>