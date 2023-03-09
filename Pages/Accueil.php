<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceuil</title>
    <link rel="stylesheet" href="../src/css/acceuil.css">
    <link rel="stylesheet" href="../template/Inscription/sources/style.css">
    <link rel="stylesheet" href="/Projet-Blog-Voyage/template/footer/sources/footer.css">
    <script src="../src/js/acceuil.js" defer></script>
    <script src="https://kit.fontawesome.com/6e2bb0e8df.js" crossorigin="anonymous"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>

    <button class="deja_membre">
        <?php
        if (isset($_SESSION["logged"])) :
        ?>
            <a href="./filActu.php">Fil d'actualité</a></button>
<?php else : ?>
    <a href="./connexion/connexion.php">Déjà Membre ?</a></button>
<?php endif; ?>
<div class="body_acceuil">
    <div class="acceuil_start">
        <h1>Bienvenue sur Blog Voyage</h1>
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
            <img src="../ressources/img/acceuil/22222.png" alt="" class="presentation2">
            <img src="../ressources/img/acceuil/Screenshot 2023-03-09 at 11-04-55 Details article.png" alt="" class="presentation1">
            <img src="../ressources/img/acceuil/33333.png" alt="" class="presentation3">
        </div>

    </div>

    <div id="form" class="acceuil_formulaire">
        <div class="passport">
            <!-- choisir design -->
            <div class="img_passport">
                <div class="passport_write">
                    <p class="name"></p>
                    <p class="mail"></p>
                    <p class="dateOfBirth"></p>
                    <p class="country"></p>
                    <p class="signature"></p>
                </div>
            </div>
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

    <?php require "../template/footer/_footer.php" ?>
</div>
</body>

</html>