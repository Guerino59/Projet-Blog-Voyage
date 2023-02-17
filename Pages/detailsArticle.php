<?php
    $title = "Ajout article";
    require __DIR__."/../template/navbar/_navbar.php" 
?>
<link rel="stylesheet" href="../src/css/detailsArticle.css">
<div class="details_Article">
    <div class="titre">
        <label for="titre">Nom de l'article</label>
        <input type="text" name="titre" placeholder="Article 1">
    </div>

    <div class="details_Article_base">
        <div class="details_Article_resume">
            <p>Petit texte franchement très sympa</p>
        </div>

        <div class="details_Article_resume_img">
            <img src="../ressources/img/acceuil/avion_acceuil.jpg" alt="">
        </div>

        <div class="details_Article_resume">
            <img src="../ressources/img/acceuil/avion_acceuil.jpg" alt="">
        </div>

        <div class="details_Article_resume">
            <p>Un grand texte très sympa</p>
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