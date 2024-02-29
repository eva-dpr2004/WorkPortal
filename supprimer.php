<?php 
    include_once "connexion.php";
    //Récup de l'id dans le lien
    $id = $_GET['id'];
    //Requête pour delete
    $req = mysqli_query($con, "DELETE FROM employe WHERE id = $id");
    //redirection vers l'index.php
    header("Location:index.php")
?>