<?php
include 'db.php';
include 'functions.php';
include 'header.php';
$id = $_SESSION['id'];


$sql = "SELECT * FROM AIMER A JOIN film F ON A.ID_Film = F.ID_Film WHERE ID_USER =".$id.";";
$titre = "Vos films favoris";
afficher_section($conn, $sql, $titre);

?>