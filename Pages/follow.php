<?php  
    require __DIR__."/../BDD/requeteSQL/utilisateurs/recupInfo.php";
    require __DIR__ . "/../template/navbar/_navbar.php";
    $followed = getFollow($_SESSION["idUser"]);
    ?>
    <link rel="stylesheet" href="/Projet-Blog-Voyage/src/css/follow.css">
    <h2>Les personnes que vous suivez</h2>
    <ul class="follow">
    <?php
    foreach($followed as $f):
        $userFollow = infoUsers($f["UserSuivi"]);
    ?>
    
    <li class="utilisateurs">
        <a href="/Projet-Blog-Voyage/Pages/pageUtilisateurs.php?idUser=<?php echo $userFollow["idUser"] ?>">
             <p><?php echo $userFollow["username"] ?></p>
             <img src="<?php echo $userFollow["profilePicture"] ?>" alt="">
        </a>
    </li>
   
    <?php endforeach;?>
    
    </ul>
    <?php require __DIR__."/../template/footer/_footer.php" ?>