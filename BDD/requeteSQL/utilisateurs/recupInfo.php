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

function mesArticles($idUser)
{
    $pdo = connexionPDO();
    $sql = $pdo->prepare("SELECT * FROM article WHERE idUser=?");
    $sql->execute([$idUser]);
    return $sql->fetchAll();
}

function deleteArticle($idArticle)
{
    $pdo = connexionPDO();
    $sql = $pdo->prepare("DELETE FROM article WHERE idArticle=?");
    $sql->execute([$idArticle]);
}

function newArticle($idUser, $titleArticle, $pays, $photoResume, $texteResume, $photoCommentaires, $texteContenu)
{
    $pdo = connexionPDO();
    $sql = $pdo->prepare("INSERT INTO article(idUser, nomArticle, nomPays, photoResume, texteResume, photoContenu, texteContenu) VALUES(?, ?, ?, ?, ?, ?, ?)");
    $sql->execute([$idUser, $titleArticle, $pays, $photoResume, $texteResume, $photoCommentaires, $texteContenu]);
}

function articleByIdArticle($idArticle)
{
    $pdo = connexionPDO();
    $sql = $pdo->prepare("SELECT * FROM ARTICLE WHERE idArticle =:idA");
    $sql->execute(["idA" => $idArticle]);
    return $sql->fetch();
}

function updateArticle($titleArticle, $pays, $photoResume, $texteResume, $photoCommentaires, $texteContenu, $idArticle)
{
    $pdo = connexionPDO();
    $sql = $pdo->prepare("UPDATE article SET nomArticle =:nA, nomPays =:nP, photoResume =:pR , texteResume =:tR, photoContenu =:pC, texteContenu =:tC WHERE idArticle =:idA");
    $sql->execute([
        "nA" => $titleArticle,
        "nP" => $pays,
        "pR" => $photoResume,
        "tR" => $texteResume,
        "pC" => $photoCommentaires,
        "tC" => $texteContenu,
        "idA" => $idArticle
    ]);
}
function selectAllCommByIdArticle($idArticle)
{
    $pdo = connexionPDO();
    $sql = $pdo->prepare("SELECT * FROM commentaire WHERE articleID =:idA");
    $sql->execute(["idA" => $idArticle]);
    return $sql->fetchAll();
}
function addComm($articleID, $userID, $comm)
{
    $pdo = connexionPDO();
    $sql = $pdo->prepare("INSERT INTO commentaire(articleID, userID, comm) VALUES(?, ?, ?)");
    $sql->execute([$articleID, $userID, $comm]);
}
