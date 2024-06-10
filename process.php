<?php
include 'db.php';
include 'functions.php';

// Handle Sign-Up
if (isset($_POST['signup'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $date_naiss = $_POST['date_naiss'];

    if(!utilisateurExiste($conn, $email)){
        creerUtilisateur($conn, $nom, $prenom, $date_naiss, $email, $mdp);
    }

}

    


// Handle Sign-In
if (isset($_POST['signin'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    connecterUtilisateur($conn, $email, $password);
}
?>
