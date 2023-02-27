<?php
$title = "Mes articles";
require __DIR__."/../template/navbar/_navbar.php";
    if(!isset($_GET["id"]) || $_GET["id"] != $_SESSION["idUser"])
    {
       header("Location: ./Accueil.php");
       exit;
    }
    else
    {
       
    require __DIR__."/../template/mesArticles/_mesArticles.php" ;
    
    }   
    ?>   
    <link rel="stylesheet" href="../src/css/filActu.css">

    
  
