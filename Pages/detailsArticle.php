<?php
    $title = "Ajout article";
    require __DIR__."/../template/navbar/_navbar.php" 
?>
<link rel="stylesheet" href="../src/css/detailsArticle.css">
<div class="details_Article">
    <div class="titre">
        <label for="titre">Nom de l'article</label>
        <br>
        <input type="text" name="titre" placeholder="Article 1" disabled>
    </div>

    <!-- resume -->
    <div class="details_Article_base">
        <div class="details_Article_resume">
            <p>Petit texte franchement très sympa</p>
        </div>

        <div class="details_Article_resume_img">
            <img src="../ressources/img/acceuil/avion_acceuil.jpg" alt="">
        </div>
    </div>

    <!-- autres -->
    <div>
        <div class="details_Article_autres">
            <img src="../ressources/img/acceuil/avion_acceuil.jpg" alt="">
        </div>

        <div class="details_Article_autres">
            <textarea>Un grand texte très sympa</textarea>
        </div>
    </div>
    
    <div class="commentaires">
        <div>Commentaires Intérieur</div>
        <div>Ajout Commentaires</div>
    </div>
</div>