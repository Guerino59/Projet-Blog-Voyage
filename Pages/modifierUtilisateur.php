<?php 
require "../service/_shouldBeLogged.php";
// shouldBeLogged(true, "./exercice/connexion.php");

// if(empty($_GET["id"]) || $_SESSION["idUser"] != $_GET["id"])
// {
//     header("Location: ./Pages/Acceuil.php");
//     exit;
// }

require "../service/_pdo.php";
require "../service/_csrf.php";
// Je récupère les informations lié à mon utilisateur.
$pdo = connexionPDO();
$sql = $pdo->prepare("SELECT * FROM utilisateurs WHERE idUser=?");
$sql->execute([(int)$_SESSION["idUser"]]);
$user = $sql->fetch();

$username = $password = $email = $birth = $pays = "";
$error = [];
$regexPass = "/^(?=.*[!?@#$%^&*+-])(?=.*[0-9])(?=.*[A-Z])(?=.*[a-z]).{6,}$/";

if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['update']))
{
    if(empty($_POST["username"]))
        $username = $user["username"];
    else
    {
        $username = cleanData($_POST["username"]);
        if(!preg_match("/^[a-zA-Z'\s-]{2,25}$/", $username))
            $error["username"]= "Votre nom d'utilisateur ne peut contenir que des lettres";
    }
    if(empty($_POST["email"]))
        $email = $user["email"];
    else
    {
        $email = cleanData($_POST["email"]);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
            $error["email"]= "Votre nom d'utilisateur ne peut contenir que des lettres";
    }

    if(empty($_POST["birthday"]))
        $birthday = $user["birthday"];
    else
    {
        $birthday = cleanData($_POST["birthday"]);
    }

    if(empty($_POST["pays"]))
        $pays = $user["pays"];
    else
    {
        $pays = cleanData($_POST["pays"]);
    }

    if(empty($_POST["password"]))
        $password = $user["password"];
    else
    {
        $password = cleanData($_POST["password"]);
        if(empty($_POST["passwordBis"]))
        {
            $error["passwordBis"] = "Veuillez confirmer votre mot de passe";
        }
        else if($_POST["password"] != $_POST["passwordBis"])
        {
            $error["passwordBis"] = "Veuillez saisir le même mot de passe";
        }
        if(!preg_match($regexPass, $password))
        {
            $error["password"] = "Veuillez saisir un mot de passe valide";
        }
        else
            $password = password_hash($password, PASSWORD_DEFAULT);
    }
    if(empty($error))
    {
        $sql = $pdo->prepare("UPDATE users SET 
            username=:us,
            email = :em,
            pays = :py,
            birth = :bt,
            password = :mdp
            WHERE idUser = :id");
        $sql->execute([
            "id"=> $user["idUser"],
            "em"=> $email,
            "bt"=> $birth,
            "py"=> $pays,
            "mdp"=> $password,
            "us"=> $username
        ]);

        // Ajout d'un Flash Message;
        $_SESSION["flash"] = "Votre Profil a bien été édité.";
        // Je redirige mon utilisateur
        header("Location: ./.php");
        exit;
    }
}

?>
<style>
    form{
        display:flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }
    h2{
        text-align:center;
    }
</style>
<h2>Mise à jour du Profil</h2><hr>
<form action="" method="post">
    <!-- username -->
    <label for="username">Nom d'Utilisateur :</label>
    <input type="text" name="username" id="username" value="<?php echo $user['username']?>">
    <span class="error"><?php echo $error["username"]??"" ?></span>
    <br>
    <!-- Email -->
    <label for="email">Adresse Email :</label>
    <input type="email" name="email" id="email" value="<?php echo $user['email']?>">
    <span class="error"><?php echo $error["email"]??"" ?></span>
    <br>
    <!-- Password -->
    <label for="password">Mot de Passe :</label>
    <input type="password" name="password" id="password">
    <span class="error"><?php echo $error["password"]??"" ?></span>
    <br>
    <!-- password verify -->
    <label for="passwordBis">Confirmation du mot de passe :</label>
    <input type="password" name="passwordBis" id="passwordBis">
    <span class="error"><?php echo $error["passwordBis"]??"" ?></span>
    <br>
    <!-- Pays -->
    <?php require __DIR__."/../template/Inscription/sources/_inputPays.php"?>
    <br>
    <!-- Date Naissance -->
    <label for="birthday">Votre date de naissance : </label>
    <br>
    <input type="date" name="birthday" id="birthday" class="dateOfBirthInput">
    <br>
    <input type="submit" value="Mettre à jour" name="update">
</form>