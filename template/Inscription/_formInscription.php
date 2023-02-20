<?php 
    require __DIR__."/../../service/_csrf.php";
    require __DIR__."/../../service/_googleCaptcha.php";
    require __DIR__."/../../service/_pdo.php";
    require __DIR__."/../../service/_cleanData.php";
    $username = $email = $password = $date = $pays = "";
    $error = [];
    $regexPass = "/^(?=.*[!?@#$%^&*+-])(?=.*[0-9])(?=.*[A-Z])(?=.*[a-z]).{6,}$/";
    $reCaptchaCode = $_POST['g-recaptcha-response'] ?? null;
    $target_file = $target_name = $mime_type = $oldName = $photo = "";
    $dirPhoto = "\Projet-Blog-Voyage\\template\\Inscription\\upload\\";
    $target_dir = __DIR__."\\upload\\";
    $typePermis = ["image/png", "image/jpeg", "image/gif", "application/pdf"];
    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['inscription']))
        {
            $pdo = connexionPDO();

            if(empty($_POST["username"]))
                $error["username"] = "Veuillez saisir un nom d'utilisateur !";
            else
            {
                if(strlen($_POST["username"]) < 7 || strlen($_POST["username"]) > 20)
                    $error["username"] = "Votre nom d'utilisateur doit être compris entre 7 et 20 caractères !";
                else
                {
                    $username = cleanData($_POST["username"]);
                    if(!preg_match("/^[a-zA-Z'\s-]{7,25}$/", $username))
                        $error["username"] = "Votre Nom d'utilisateur doit contenir que des lettres !";
                }
            }

            if(empty($_POST["email"]))
            $error["email"] = "Veuillez saisir un email !";
            else
            {
                $email = cleanData($_POST["email"]);
                if(!filter_var($email, FILTER_VALIDATE_EMAIL))
                    $error["email"] = "Veuillez saisir un email valide !";
                
                $sql = $pdo->prepare("SELECT * FROM utilisateurs WHERE email = :em"); 
                $sql->execute(["em"=>$email]);
                $resultat = $sql->fetch();
                if($resultat)
                    $error["email"] = "Cet email est déjà enregistré !";
            }
            if(empty($_POST["pays"]))
                $error["pays"] = "Veuillez selectionner un pays !";
            else
            {
                $pays = $_POST["pays"];
            }

            if(!is_uploaded_file($_FILES["superFichier"]["tmp_name"]))
            $error["file"] = "Aucun fichier téléversé !";
            else
            {
                
                $oldName = basename($_FILES["superFichier"]["name"]);
                
                $target_name = uniqid(time()."-", true)."-".$oldName;
                
                $target_file = $target_dir . $target_name;
                $photo = $dirPhoto . $target_name;
                var_dump($photo);
                $mime_type = mime_content_type($_FILES["superFichier"]["tmp_name"]);
                
                if(file_exists($target_file))
                    $error["file"] = "Ce fichier existe déjà";
                
                if($_FILES["superFichier"]["size"] > 500000)
                    $error["file"] = "Ce fichier est trop gros.";
                
                if(!in_array($mime_type, $typePermis))
                    $error["file"] = "Ce type de fichier n'est pas accepté.";
        
            }
            if(empty($_POST["birthday"]))
                $error["birthday"] = "Veuillez entrer votre date de naissance";
            else
            {
                $birthday = $_POST["birthday"];
                $date = date_parse($birthday);
                if($date["year"] > 2015 || $date["year"] < 1900)
                {
                    $error["birthday"] = "Veuillez saisir une date valide";
                }
            }
            if(empty($_POST["password"]))
            {
                $error["password"] = "Veuillez entrer un mot de passe !";
            }
            else
            {
                $password = cleanData($_POST["password"]);
                if(!preg_match($regexPass, $password))
                    $error["password"] = "Veuillez saisir un mot de passe contenant au moins une majuscule, un chiffre et un caractere special";
                else
                    $password = password_hash($password, PASSWORD_DEFAULT);
            }
            if(empty($_POST["verifPass"]))
                $error["verifPass"] = "Veuillez confirmer votre mot de passe";
            else
            {
                if($_POST["password"] != $_POST["verifPass"])
                    $error["verifPass"] = "Veuillez saisir le meme mot de passe";
                
            }
            if(empty($_POST["cgu"]))
                $error["cgu"] = "Veuillez cocher la case ci dessus";
            if(is_null($reCaptchaCode) || verifyReCaptcha($reCaptchaCode) === false)
                $error["captcha"] = "false";
            if(!isCSRFValid())
                $error["csrf"] = "La méthode utilisée n'est pas permise !";

            if(empty($error))
            {
                if(move_uploaded_file($_FILES["superFichier"]["tmp_name"], $target_file))
                {
                    $pdo = connexionPDO();
                    $sql = $pdo->prepare("INSERT INTO utilisateurs(username, birthDate, paysFavoris, password, email, profilePicture) VALUES(?, ?, ?, ?, ?, ?)");
                    $sql->execute([$username, $birthday, $pays, $password, $email, $photo]);
                    $_SESSION["flash"] = "Votre compte à bien été crée. Vous pouvez desormais vous connecté";
                    header("Location: /Projet-Blog-Voyage/Pages/connexion/connexion.php");
                    exit;
                }
                else
                $error["file"] = "Erreur lors du téléversage";
                
            }
            
        }
        
?>


<form action="" method="post" enctype="multipart/form-data">
    <label for="username">Nom d'utilisateur : </label>
    <br>
    <input type="text" name="username" id="username" class="nameInput">
    <br>
    <span class="error"><?php echo $error ["username"] ?? "" ?></span>
    <br>
    <label for="email">Adresse Mail : </label>
    <br>
    <input type="email" name="email" id="email" class="mailInput">
    <br>
    <span class="error"><?php echo $error ["email"] ?? "" ?></span>
    <br>
    <?php require __DIR__."/./sources/_inputPays.php"?>
    <br>
    <span class="error"><?php echo $error ["pays"] ?? "" ?></span>
    <br>
    <label for="birthday">Votre date de naissance : </label>
    <br>
    <input type="date" name="birthday" id="birthday" class="dateOfBirthInput">
    <br>
    <span class="error"><?php echo $error ["birthday"] ?? "" ?></span>
    <br>
    <label for="file">Choisis ta photo de profil : </label>
    <br>
    <input type="file" name="superFichier" id="fichier">
    <br>
    <span class="error"><?php echo $error ["file"] ?? "" ?></span>
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
    <span class="error"><?php echo $error ["verifPass"] ?? "" ?></span>
    <label for="cgu">En cochant cette case, vous acceptez nos conditions d'utilisation</label>
    <input type="checkbox" name="cgu" id="cgu" value="cgu">
    <span class="error"><?php echo $error["cgu"]??""?></span>
    <br>
    <div class="g-recaptcha mb-3" data-sitekey="6LfQpWckAAAAADT2gLfOKTWaBeYyUnOG62KHWruc"></div>
    <?php setCSRF(5); ?>
    <span class="error"><?php echo $error["csrf"] ?? ""?></span>
    <br>
    <input type="submit" value="Valider" name="inscription">
</div>
</form>