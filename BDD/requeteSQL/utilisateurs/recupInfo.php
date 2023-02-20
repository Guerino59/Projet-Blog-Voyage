<?php
require __DIR__."/../../../service/_pdo.php";
    function infoUsers(int $idUser)
    {
        $pdo = connexionPDO();
        $sql = $pdo -> prepare("SELECT * FROM utilisateurs WHERE idUser = ?");
        $sql->execute([$idUser]);
        return $sql->fetch();
    }
?>