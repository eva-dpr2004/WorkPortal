<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Modifier</title>
</head>
<body>
    <header>
        <a href="./index.php"><img src="./images/workportal.png" alt="Logo WorkPortal" title="© Copyright 2024 Eva De Palma Rosario"></a>
    </header>
    <?php 
        //Connexion bdd
        include_once "connexion.php";

        //Récupération de l'id dans le lien
        $id = $_GET['id'];

        //requête pour afficher les infos d'un employé
        $req = mysqli_query($con, "SELECT * FROM employe WHERE id = $id");

        $row = mysqli_fetch_assoc($req);

        //Vérification si le bouton à été cliqué
        if(isset($_POST['button'])){
            //extraction des infos envoyés dans des variable par la méthode POST
            extract($_POST);
            //verif que tout les champs ont été remplis
            if(isset($nom) && isset($prenom) && isset($age) && isset($role) && isset($sexe)){
                //requête de modif
                $req = mysqli_query($con, "UPDATE employe SET nom = '$nom', prenom = '$prenom', age = '$age', role = '$role', sexe = '$sexe' WHERE id = $id");
                //si la requête se fait redirect
                if($req){
                    header("location: index.php");
                }
                else{
                    $message = "Employé non modifié";
                }
            }
            else{
                $message = "Veuillez remplir tous les champs.";
            }
        }
    ?>
    <div class="form">
        <a href="./index.php" class="back_btn"><img src="./images/back.svg" alt="Flèche retour">Retour</a>
        <h2>Modifier l'employé : <?=$row['prenom']?></h2>
        <p class="erreur_message">
            <?php 
            if(isset($message)){
                echo $message;
            }
            ?>
        </p>
        <form action="" method="post">
            <label>Nom</label>
            <input type="text" name="nom" value="<?=$row['nom']?>">
            <label>Prénom</label>
            <input type="text" name="prenom" value="<?=$row['prenom']?>">
            <label>Age</label>
            <input type="number" name="age" value="<?=$row['age']?>">
            <label>Role</label>
            <input type="text" name="role" value="<?=$row['role']?>">
            <label>Sexe</label>
            <select name="sexe">
                <option value="homme" <?php if($row['sexe'] == 'homme') echo 'selected="selected"'; ?>>Homme</option>
                <option value="femme" <?php if($row['sexe'] == 'femme') echo 'selected="selected"'; ?>>Femme</option>
            </select>
            <input type="submit" value="Modifier" name="button">
            <label></label>
        </form>
    </div>
    <footer style="background-color:rgb(255, 255, 255);margin-top:5%;">
        <p class="pfooter">Ce projet et son contenu incluant un logo à été réalisé par eva-dpr2004 .</p>
    </footer>
</body>
</html>
