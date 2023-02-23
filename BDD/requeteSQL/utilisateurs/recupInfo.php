<?php
require __DIR__ . "/../../../service/_pdo.php";
function infoUsers(int $idUser)
{
    $pdo = connexionPDO();
    $sql = $pdo->prepare("SELECT * FROM utilisateurs WHERE idUser = ?");
    $sql->execute([$idUser]);
    return $sql->fetch();
}

function AllArticle()
{
    $pdo = connexionPDO();
    $sql = $pdo->query("SELECT * FROM article");
    $sql->execute();
    return $sql->fetchAll();
}
