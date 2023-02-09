<?php 
    require __DIR__."/../../service/_csrf.php";
    require __DIR__."/../../service/_googleCaptcha.php";
    require __DIR__."/../../service/_pdo.php";
    require __DIR__."/../../service/_cleanData.php";

    $username = $email = $password = $date = $pays = "";
    $error = [];
    $regexPass = "/^(?=.*[!?@#$%^&*+-])(?=.*[0-9])(?=.*[A-Z])(?=.*[a-z]).{6,}$/";

    $error = $target_file = $target_name = $mime_type = $oldName = "";

$target_dir = __DIR__."./upload/";

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
                    if(!preg_match("/^[a-zA-Z'\s-]$/", $username))
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
                
                $mime_type = mime_content_type($_FILES["superFichier"]["tmp_name"]);
                
                if(file_exists($target_file))
                    $error["file"] = "Ce fichier existe déjà";
                
                if($_FILES["superFichier"]["size"] > 500000)
                    $error["file"] = "Ce fichier est trop gros.";
                
                if(!in_array($mime_type, $typePermis))
                    $error["file"] = "Ce type de fichier n'est pas accepté.";
        
                if(empty($error["file"]))
                {  
                    if(move_uploaded_file($_FILES["superFichier"]["tmp_name"], $target_file))
                    {
                    
                    }
                    else
                        $error["file"] = "Erreur lors du téléversage";
                }
            }
            if(empty($_POST["date"]))
                $error["date"] = "Veuillez entrer votre date de naissance";
            else
            {
                $date = $_POST["date"];
            }
        }
        var_dump($_POST["date"]);
?>


<form action="" method="post" enctype="multipart/form-data">
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