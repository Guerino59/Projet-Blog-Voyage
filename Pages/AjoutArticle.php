<?php
    $title = "Ajout article";
    require __DIR__."/../template/navbar/_navbar.php" 
?>
<link rel="stylesheet" href="../src/css/AjoutArticle.css">
<div class="ajout_article">
    <label for="titre">Nom de l'article</label>
    <input type="text" name="titre">

    <div class="ajout_article_base">
        <div class="ajout_article_resume">
            <label for="resume">Resume article</label><br>
            <input type="text" name="resume">
        </div>

        <div class="ajout_article_resume_img">
            <label for="resume">Upload img resume</label><br>
            <input type="file" name="resume-img">
        </div>

        <div class="ajout_article_resume">
            <label for="resume">Commentaires lié a la photo</label><br>
            <input type="text" name="commentaires-lie-img">
        </div>

        <div class="ajout_article_resume">
            <label for="resume">Upload img</label><br>
            <input type="file" name="upload-img">
        </div>
    </div>
    
    <div class="ajout_section">
        <select name="" id="">
            <option value="">Ajouter texte/image</option>
            <option value="">Ajouter image</option>
            <option value="">Ajouter texte</option>
        </select>
        <button>Ajouter section ?</button>
    </div>

    <div class="poster">
        <button>Poster ?</button>
    </div>

</div>