<?php 
    require "../../service/_csrf.php";
?>


<form action="" method="post">
    <label for="username">Nom d'utilisateur : </label>
    <br>
    <input type="text" name="username" id="username">
    <br>
    <span class="error"><?php echo $error ["username"] ?? "" ?></span>
    <br>
    <label for="email">Adresse Mail : </label>
    <br>
    <input type="email" name="email" id="email">
    <br>
    <span class="error"><?php echo $error ["email"] ?? "" ?></span>
    <br>
    <?php require "./sources/_inputPays.php"?>
    <br>
    <span class="error"><?php echo $error ["pays"] ?? "" ?></span>
    <br>
    <label for="birthday">Votre date de naissance : </label>
    <br>
    <input type="date" name="birthday" id="birthday">
    <br>
    <span class="error"><?php echo $error ["birthday"] ?? "" ?></span>
    <br>
    <label for="password">Mot de passe : </label>
    <br>
    <input type="password" name="password" id="password">
    <br>
    <span class="error"><?php echo $error ["password"] ?? "" ?></span>
    <br>
    <label for="verifPass">Confirmer votre mot de passe : </label>
    <br>
    <input type="password" name="verifPass" id="verifPass">
    <br>
    <span class="error"><?php echo $error ["verifPassword"] ?? "" ?></span>
    <input type="checkbox" name="cgu" id="cgu" value="cgu">
    <label for="cgu">En cochant cette case, vous acceptez nos conditions d'utilisation</label>
    <span class="error"><?php echo $error["cgu"]??""?></span>
    <br>
    <div>
        <label for="captcha">VEUILLEZ RECOPIER LE TEXTE CI DESSOUS</label>
        <br>
        <img src="../../service/_captcha.php" alt="captcha">
        <br>
        <br>
        <input type="text" name="captcha" id="captcha" pattern="[A-Z0-9]{6}">
    </div>
    <?php setCSRF(5); ?>
    <br>
    <span class="error"><?php echo $error??"" ?></span>
    <input type="submit" value="Valider">
</form>