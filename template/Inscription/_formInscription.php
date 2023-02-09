<?php 
    require __DIR__."/../../service/_csrf.php";
    require __DIR__."/../../service/_googleCaptcha.php";
    require __DIR__."/../../service/_pdo.php";
    require __DIR__."/../../service/_cleanData.php";

    $username = $email = $password = $date = $pays = "";
    $error = [];
    $regexPass = "/^(?=.*[!?@#$%^&*+-])(?=.*[0-9])(?=.*[A-Z])(?=.*[a-z]).{6,}$/";

    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['inscription']))
        {
            $pdo = connexionPDO();
            if(empty($_POST["username"]))
                $error["username"] = "Veuillez saisir un nom d'utilisateur !";
            else
            {
                if(strlen($_POST["username"]) < 7 || strlen($_POST["username"]) > 20)
                    $error["username"] = "Votre nom d'utilisateur doit être compris entre 7 et 20 caractères";
                else
                {
                    $username = cleanData($_POST["username"]);
                    if(!preg_match("/^[a-zA-Z'\s-]$/", $username))
                        $error["username"] = "Votre Nom d'utilisateur doit contenir que des lettres";
                }
            }
            
            

        }

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
    <?php require __DIR__."/./sources/_inputPays.php"?>
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
    <div class="g-recaptcha mb-3" data-sitekey="6LfQpWckAAAAADT2gLfOKTWaBeYyUnOG62KHWruc"></div>
    <?php setCSRF(5); ?>
    <br>
    <input type="submit" value="Valider" name="inscription">
</form>