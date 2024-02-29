<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Gestion Employés</title>
</head>
<body>
    <header>
        <a href="./index.php"><img src="./images/workportal.png" alt="Logo WorkPortal" title="© Copyright 2024 Eva De Palma Rosario"></a>
    </header>
    <main>
    <div class="container">
        <h1>Gérez vos employés de manière rapide et efficace !</h1>
        <a href="./ajouter.php" class="Btn_add"><img src="./images/plus.png">Ajouter un nouvel employé !</a>
        <table>
            <tr id="items">
                <th>Nom</th>
                <th>Prénom</th>
                <th>Age</th>
                <th>Role</th>
                <th>Sexe</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
            <?php 
                include_once "connexion.php";
                $req = mysqli_query($con, "SELECT * FROM Employe");

                if(mysqli_num_rows($req) == 0){
                    // si il y a pas d'employe ce message va s'afficher
                    echo "Il n'y a pas encore d'employé ajouté !";
                }else{
                    while($row=mysqli_fetch_assoc($req)){
                        ?>
                        <tr>
                            <td><?= $row['nom'] ?></td>
                            <td><?= $row['prenom'] ?></td>
                            <td><?= $row['age'] ?></td>
                            <td><?= $row['role'] ?></td>
                            <td><?= $row['sexe'] ?></td>
                            <td><a href="./modifier.php?id=<?=$row['id']?>"><img src="./images/pen.png"></a></td>
                            <td><a href="./supprimer.php?id=<?=$row['id']?>"><img src="./images/trash.png"></a></td>
                        </tr>
                        <?php
                    }
                }
            ?>
        </table>
    </div>
    </main>
    <footer style="background-color:rgb(255, 255, 255);margin-top:5%;">
        <p class="pfooter">Ce projet et son contenu incluant un logo à été réalisé par eva-dpr2004 .</p>
    </footer>
</body>
</html>
