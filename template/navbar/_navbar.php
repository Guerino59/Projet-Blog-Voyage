<?php
    require __DIR__."/../../service/_shouldBeLogged.php";
    require __DIR__."/../../BDD/requeteSQL/utilisateurs/recupInfo.php";
    shouldBeLogged(true, "/Projet-Blog-Voyage/Pages/Accueil.php");
    
    $user = infoUsers($_SESSION["idUser"]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title??"" ?></title>
    <link rel="stylesheet" href="/Projet-Blog-Voyage/template/navbar/sources/style.css">
    <script src="https://kit.fontawesome.com/6e2bb0e8df.js" crossorigin="anonymous"></script>
    <script src="/Projet-Blog-Voyage/template/navbar/sources/script.js" defer></script>
    
</head>
<body>

<nav>
    <ul>
        <li><a href="/Projet-Blog-Voyage/Pages/Accueil.php">LOGO</a></li>
        <li><a href="/Projet-Blog-Voyage/Pages/filActu.php"><i class="fa-solid fa-house"></i></a></li>
        <li><a href="/Projet-Blog-Voyage/Pages/MesLikes.php"><i class="fa-solid fa-heart"></i></a></li>
        <li><a href="/Projet-Blog-Voyage/Pages/AjoutArticle.php"><i class="fa-solid fa-circle-plus"></i></a></li>
        <li class="profile-nav">
            <a href=""><?php echo $user["username"]?></a>
            <img src=<?php echo $user["profilePicture"]?> alt="">
        </li>
    </ul>
</nav>
<a href="/Projet-Blog-Voyage/Pages/connexion/deconnexion.php">DECONNEXION</a>

