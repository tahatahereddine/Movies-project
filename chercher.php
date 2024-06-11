<?php
include 'functions.php';
include 'db.php';
include 'header.php';

if(isset($_POST['film'])){
    $sql = "SELECT * FROM film WHERE Nom_film LIKE '%".$_POST['film']."%' LIMIT 24;";
    $titre = 'Titre similaire à "'.$_POST['film'].'"';
    afficher_section($conn, $sql, $titre);
}

include 'footer.php';

?>