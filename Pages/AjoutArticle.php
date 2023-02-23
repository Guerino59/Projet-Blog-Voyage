<?php
    $title = "Ajout article";
    require __DIR__."/../template/navbar/_navbar.php" 
?>
<link rel="stylesheet" href="../src/css/AjoutArticle.css">
<div class="ajout_article">
    <div class="titre_et_pays">
        <label for="titre">Nom de l'article</label>
        <input type="text" name="titre">
        <br><br>
        <?php require "../template/Inscription/sources/_inputPays.php" ?>
    </div>

    <div class="ajout_article_base">
        <div class="ajout_article_resume">
            <label for="resume">Resume article</label><br>
            <textarea name="resume" id="" cols="30" rows="10" class="resume_text"></textarea>
        </div>

        <div class="ajout_article_resume_img">
            <label for="resume">Upload img resume</label><br>
            <input type="file" name="resume-img" class="resume_img">
        </div>

        <div class="ajout_article_resume">
            <label for="resume">Commentaires lié a la photo</label><br>
            <textarea name="text-lie-img" id="" cols="30" rows="10" class="text_lie_image"></textarea>
        </div>

        <div class="ajout_article_resume">
            <label for="resume">Upload img</label><br>
            <input type="file" name="upload-img" class="image_lie_text">
        </div>
    </div>

    <div class="poster">
        <button>Poster ?</button>
    </div>

</div>