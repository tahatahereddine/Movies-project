<?php
session_start();
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

    $stmt = $conn->prepare("SELECT * FROM UTILISATEUR WHERE Email_User = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['mdp_User'])) {
        $_SESSION['user_id'] = $user['ID_User'];
        $_SESSION['loggedin'] = true;
        $_SESSION['prenom'] = $user['Prenom_User'];
        header("location: index.php");
        exit();
    } else {
        echo "Invalid email or password.";
    }
}
?>
