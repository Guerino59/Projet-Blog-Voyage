<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/css/acceuil.css">
    <title>Document</title>
</head>
<body>
    <div class="body_acceuil">
        <div class="acceuil_start">
            <p>En savoir plus ?</p>
            <button>⬇️</button>
        </div>

        <div class="acceuil_presentation">
            <div>
                <p>Tout le monde souhaite voyager, mais pour aller ou, quand, comment,
                    à quoi s'attendre et que faire sur place,
                </p>
                <p>
                Autant de questions qui nous éloigne de nos reves, ici les 
                ennuis siparaissent et des amitiés naissent !
                </p>
            </div>
            <div>
                <img src="../ressources/img/acceuil/presentation1.jpg" alt="" class="presentation1">
                <img src="../ressources/img/acceuil/presentation2.webp" alt="" class="presentation2">
                <img src="../ressources/img/acceuil/presentation3.webp" alt="" class="presentation3">
            </div>
  
        </div>

        <div class="acceuil_formulaire">
            <div class="passport">
                <div>
                </div>
                <!-- choisir design -->
            </div>
            <div class="form_passport">
                <div>
                <!-- Intégrer le formulaire -->
                <?php require "../template/Inscription/_formInscription.php" ?>
                </div>
            </div>
        </div>

        <div class="acceuil_bas_de_page">
            <div class="acceuil_bas_de_page_info">
                    <p>En savoir plus sur nous ?</p>
                    <p>(faire un petit résumer pour parler de la création du site)</p>
            </div>
        </div>

        <footer>
            <p>Nos divers liens et reseaux</p>
        </footer>
    </div>
</body>
</html>