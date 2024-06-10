<?php
session_start();
include 'db.php';

// Handle Sign-Up
if (isset($_POST['signup'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $date_naiss = $_POST['date_naiss'];

    // Validate passwords
    if ($password !== $confirm_password) {
        echo "Passwords do not match.";
        exit;
    }

    // Check if email already exists
    $check_email = $conn->prepare("SELECT * FROM UTILISATEUR WHERE Email_User = ?");
    $check_email->bind_param("s", $email);
    $check_email->execute();
    $result = $check_email->get_result();

    if ($result->num_rows > 0) {
        echo "Email already exists.";
        exit;
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Insert user into database
    $stmt = $conn->prepare("INSERT INTO UTILISATEUR (Nom_User, Prenom_User, Date_naiss, Email_User, mdp_User) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $nom, $prenom, $date_naiss, $email, $hashed_password);

    if ($stmt->execute()) {
        $_SESSION['user_id'] = $stmt->insert_id;
        $_SESSION['loggedin'] = true;
        $_SESSION['prenom'] = $prenom;
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
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
        header("Location: index.php");
        exit();
    } else {
        echo "Invalid email or password.";
    }
}
?>
