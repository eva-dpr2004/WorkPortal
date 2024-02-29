<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Ajouter</title>
</head>
<body>
    <header>
        <a href="./index.php"><img src="./images/workportal.png" alt="Logo WorkPortal" title="© Copyright 2024 Eva De Palma Rosario"></a>
    </header>
    <?php
if (isset($_POST['button'])) {
    extract($_POST);
    if (isset($nom) && isset($prenom) && isset($age) && isset($role) && isset($sexe)) {
        // Vérification avec des expressions régulières
        if (!preg_match("/^[a-zA-Z]+$/", $nom)) {
            $message = "Le nom ne doit contenir que des lettres.";
        } elseif (!preg_match("/^[a-zA-Z]+$/", $prenom)) {
            $message = "Le prénom ne doit contenir que des lettres.";
        } elseif (!preg_match("/^[a-zA-Z]+$/", $role)) {
            $message = "Le rôle ne doit contenir que des lettres.";
        } else {
            // Insertion des données dans la base de données
            include_once "connexion.php";
            $req = mysqli_query($con, "INSERT INTO employe VALUES(NULL, '$nom', '$prenom', '$age', '$role', '$sexe')");
            if ($req) {
                header("location: index.php");
            } else {
                $message = "Employé non ajouté";
            }
        }
    } else {
        $message = "Veuillez remplir tous les champs.";
    }
}
?>

    <div class="form">
        <a href="./index.php" class="back_btn"><img src="./images/back.svg" alt="Flèche retour">Retour</a>
        <h2>Ajouter un employé</h2>
        <p class="erreur_message">
            <?php 
                if(isset($message)){
                    echo $message;
                }
            ?>
        </p>
        <form action="" method="post">
            <label>Nom</label>
            <input type="text" name="nom">
            <label>Prénom</label>
            <input type="text" name="prenom">
            <label>Age</label>
            <input type="number" name="age">
            <label>Role</label>
            <input type="text" name="role">
            <label>Sexe</label>
            <select name="sexe">
                <option value="femme">Femme</option>
                <option value="homme">Homme</option>
            </select>
            <input type="submit" value="Ajouter" name="button">
        </form>
    </div>
    <footer style="background-color:rgb(255, 255, 255);margin-top:5%;">
        <p class="pfooter">Ce projet et son contenu incluant un logo à été réalisé par eva-dpr2004 .</p>
    </footer>
</body>
</html>
